<?php

use GuzzleHttp\Client;
use App\Libraries\DefuseEncryption;
function indonesianDate($date, $type = 1)
{
    $array_month      = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
    $array_month_lite = array("01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr", "05" => "Mei", "06" => "Jun", "07" => "Jul", "08" => "Ags", "09" => "Sep", "10" => "Okt", "11" => "Nov", "12" => "Des");
    $array_day        = array("1" => "Senin", "2" => "Selasa", "3" => "Rabu", "4" => "Kamis", "5" => "Jumat", "6" => "Sabtu", "7" => "Minggu");
    $array_day_lite   = array("1" => "Sen", "2" => "Sel", "3" => "Rab", "4" => "Kam", "5" => "Jum", "6" => "Sab", "7" => "Min");
    $date = date_create($date);
    switch ($type) {
        case 1:
            return date_format($date, "d") . " " . $array_month[date_format($date, "m")] . " " . date_format($date, "Y");
            break;
        case 2:
            return date_format($date, "d") . " " . $array_month[date_format($date, "m")] . " " . date_format($date, "Y");
            break;
        case 3:
            return $array_day[date_format($date, "N")] . ", " . date_format($date, "d") . " " . $array_month_lite[date_format($date, "m")] . " " . date_format($date, "y");
            break;
        case 4:
            return $array_day[date_format($date, "N")] . ", " . date_format($date, "d") . " " . $array_month[date_format($date, "m")] . " " . date_format($date, "Y");
            break;
        case 5:
            return $array_day_lite[date_format($date, "N")] . ", " . date_format($date, "d/m/Y");
            break;
        case 6:
            return date_format($date, "d-m-Y");
            break;
        case 7:
            return date_format($date, "d") . " " . $array_month_lite[date_format($date, "m")] . " " . date_format($date, "y") . ", " . date_format($date, "H:i");
            break;
        case 8:
            return date_format($date, "d") . " " . $array_month[date_format($date, "m")] . " " . date_format($date, "y") . ", " . date_format($date, "H:i");
            break;
        case 9:
            return date_format($date, "d") . "-" . date_format($date, "m") . "-" . date_format($date, "y") . ", " . date_format($date, "H") . "." . date_format($date, "i");
            break;
        default:
            return "-";
            break;
    };
}

function differenceTwoDate($first, $last, $step = '+1 day')
{
    $dates   = array();
    $current = strtotime($first);
    $last    = strtotime($last);

    while ($current <= $last) {
        $dates[] = date("Y-m-d", $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

function differenceNowDate($date)
{
    $date = date_create($date);
    $now  = date_create(date("Y/m/d H:i:s"));
    $diff = $now->diff($date);

    $minutes = $diff->days * 24 * 60;
    $minutes += $diff->h * 60;
    $minutes += $diff->i;

    if ($minutes <= 0) {
        $difference = "Baru Saja";
    } else if ($minutes < 60) {
        $difference = $diff->i . " Menit";
    } else if ($minutes < 1440) {
        $calculate  = $diff->h;
        $difference = $calculate . " Jam";
    } else if ($minutes < 43200) {
        $difference = $diff->days . " Hari";
    } else if ($minutes < 518400) {
        $difference = $diff->m . " Bulan";
    } else {
        $difference = $diff->y . " Tahun";
    }

    return $difference;
}

function clearRupiah($string)
{
    return str_replace(",", "", str_replace(".", "", str_replace("Rp", "", $string)));
}

function rupiah($amount, $prefix = "Rp")
{
    return $prefix . number_format($amount, 0, ",", ".");
}
function remUnderscoreToUppercase($string){
    implode(" ",explode("_",$string));
}

function getMenu()
{
    $crud = new \App\Models\CRUD_model("system.menu");
    $session = \Config\Services::session();
    $session_app = $session->get(SESSIONCODE);
    $main_menu = $crud->getMenu();
    foreach ($main_menu as $main) {
        extract($main, EXTR_PREFIX_ALL, "main");
        $sub_menu_data = $crud->getMenu($main_id);
        $with_sub = ($sub_menu_data->countAllResults() > 0) ? 'nav-dropdown' : '';
        $with_sub_toogle = ($sub_menu_data->countAllResults() > 0) ? 'nav-dropdown-toggle' : '';

        echo '<li class="nav-item"><li class="sidebar-nav-item ' . $with_sub . '">';
        echo '<a href="' . base_url(str_replace("{role}", $session_app["role_as"], $main_url)) . '" class="nav-link ' . $with_sub_toogle . '">';
        echo '<i class="nav-icon icon-' . $main_icon . '"></i> ' . $main_name;
        echo '</a>';
        if ($sub_menu_data->countAllResults() > 0) {
            echo '<ul class="nav-dropdown-items">';
            foreach ($sub_menu_data->get()->getResultArray() as $sub) {
                extract($sub, EXTR_PREFIX_ALL, "sub");

                echo '<li class="nav-item">';
                echo '<a  class="nav-link" href="' . base_url(str_replace("{role}", $session_app["role_as"], $sub_url)) . '">';
                echo '<i class="nav-icon icon-' . $sub_icon . '"></i> ' . $sub_name;
                echo '</a>';
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
}

function casting()
{
    $data = func_get_args();
    $output = array();
    foreach ($data as $item) {
        if (preg_match('/\sas\s/', $item, $matches, PREG_OFFSET_CAPTURE)) {
            $field = explode(" as ", $item);
            $item = $field[0];
            $alias = array($field[1]);
        } else {
            $alias = explode(".", $item);
        }
        $output[] = "CAST(" . $item . " as text) as " . end($alias);
    }
    return implode(",", $output);
}
function casting_no_alias()
{
    $data = func_get_args();
    $output = array();
    foreach ($data as $item) {
        $output[] = "CAST(" . $item . " as text)";
    }
    return implode(",", $output);
}

function compare_password($p1, $p2)
{
    $decryptor = new DefuseEncryption();
    $password = $decryptor->decrypt($p1);
    if ($password == $p2) return true;
    return false;
}

function errorValidation()
{
    return array(
        'required' => 'Kolom %s harus terisi',
        'min_length' => 'Panjang karakter minimal adalah 16',
        'max_length' => 'Panjang karakter maksimal adalah 16',
        'is_natural' => 'Karakter selain numerik tidak diizinkan',
        'valid_email' => 'Email tidak sesuai dengan format',
        'is_unique' => 'Maaf %s sudah terdaftar'
    );
}

function notifExpo($title, $body, $to, $id, $invoice = 1, $url = "")
{
    $curl = curl_init();

    $param = array(
        "to" => $to,
        "sound" => "default",
        "title" => $title,
        "body" => $body,
        "data" => array(
            "id" => $invoice
        ),
        "priority" => "high",
        "channelId" => "cashless-messages",
    );

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://exp.host/--/api/v2/push/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($param),
        CURLOPT_COOKIE => "",
        CURLOPT_HTTPHEADER => array("Content-Type: application/json", "Accept-Encoding: gzip, deflate", "Accept: application/json"),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $crud = new \App\Models\CRUD_model('firebase_notification');

    $saveData = array(
        "user_id" => $id,
        "title" => $title,
        "message" => $body
    );

    $crud->insertData($saveData);

    return $response;
}

function notifFirebase($title, $body, $to, $url = "")
{
    $request = guzzleRequest("fcm.googleapis.com/fcm/send", [
        "header" => [
            "Content-Type" => "application/json",
            "Authorization: key=" . FIREBASE_LEGACY_KEYS
        ],
        "param" => [
            "to" => '/topics/' . $to,
            "priority" => "high",
            "data" => array(
                "title" => $title,
                "body" => $body,
                "url" => $url,
                "time" => date("Y-m-d H:i:s")
            )
        ]
    ]);

    return $request->getBody();
}

function guzzleRequest($target, $config, $type = "GET")
{
    try {
        $client = new Client(array(
            'base_uri' => $target,
            'timeout'  => TIMEOUT_GUZZLE
        ));
        return $client->request($type, '', $config);
    } catch (RequestException $e) {
        echo Psr7\str($e->getRequest());
        if ($e->hasResponse()) {
            return Psr7\str($e->getResponse());
        }
    }
}

function curlNoData($link,$header,$type){
    if(!isset($header) && !isAjax()){
        header("HTTP/1.0 511 Network Authentication Required");
        echo "Authentication required";
        echo '<br> <a href="'.base_url("logout").'">Logout</a>';
        exit();
    }

    if(!isset($header) && isAjax()){
        echo json_encode(array("message" => "Error header null", "code" => 1003));
        header("HTTP/1.0 511 Network Authentication Required");
        header('Content-Type: application/json');
        exit();
    }
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $link,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $type,
        CURLOPT_POSTFIELDS => "",
        CURLOPT_COOKIE => "",
        CURLOPT_HTTPHEADER => $header,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    if($err && !isAjax()){
    print_r($err);
    echo '<br> <a href="">Refresh Page</a>';
    exit();
    }
    curl_close($curl);
    return $response;
}

function curlCustomHeader($link,$header,$param,$type){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $link,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $type,
        CURLOPT_POSTFIELDS => $param,
        CURLOPT_COOKIE => "",
        CURLOPT_HTTPHEADER => $header,
    ));


    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    if($err && !isAjax()){
    print_r($err);
    echo '<br> <a href="">Refresh Page</a>';
    exit();
    }

    curl_close($curl);
    return $response;
}

function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}
function validateJWTTokenn(){
    $ci = &get_instance();
    $headers = $ci->input->request_headers();

    $decodedToken = false;

    $token = $ci->post("token");
    if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {
        $decodedToken = AUTHORIZATION::validateTimestamp($headers['Authorization']);
    } else if(!empty($token)){
        $decodedToken = AUTHORIZATION::validateTimestamp($token);
    }
    if ($decodedToken != false) {
        return $decodedToken;
    } else {
        $response = array(
            "error" => 99,
            "message" => "Token Unauthorized or Expired",
            "data" => null
            );
        $ci->response($response);
        exit();
    }
}
function parse_size($size)
{
    $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
    $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
    if ($unit) {
        // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
        return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
    } else {
        return round($size);
    }
}
function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return implode('',array_slice($numbers, 0, $quantity));
}
function base64url_encode($plainText)
{
    return strtr(base64_encode($plainText), '+/=', '-_,');
}

function base64url_decode($b64Text)
{
    return base64_decode(strtr($b64Text, '-_','+/='));
}