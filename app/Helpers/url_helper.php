<?php

use Config\App;
function random_strings($length_of_string) 
{ 
  
    // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),  0, $length_of_string); 
}

function linkTo($target, $role = true)
{
    $ci = new App();
    if (explode("/", $target)[0] == $ci->config->item("")) {
        return base_url($target);
    }
    $session = \Config\Services::session();
    $session = $session->get(SESSIONCODE);
    $prefixUrl = "panel/";
    $creden = ($session) ? $session['role_as'] . "/" : "";
    return base_url($prefixUrl . (($role) ? $creden : "")  . $target);
}

function random_numeric($length_of_string) 
{ 
  
    // String of all alphanumeric character 
    $str_result = '0123456789'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),  0, $length_of_string); 
}

function vendor($source)
{
    return base_url("vendor/" . $source);
}

function assets_url($source)
{
    return base_url("assets/" . $source);
}

function styles($source)
{
    return base_url("styles/" . $source);
}

function scripts($source)
{
    return base_url("scripts/" . $source);
}

function images($source)
{
    return base_url("images/" . $source);
}

function simpleCurl($link, $param, $token=""){
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $link,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $param,
		CURLOPT_COOKIE => "ci_session=og5ll7lpv420d018uano5v2u47cfukki",
		CURLOPT_HTTPHEADER => array( "content-type: application/json","Token:".$token ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	return $response;
}