<?php

//--------------------------------------------------------------------
// App Namespace
//--------------------------------------------------------------------
// This defines the default Namespace that is used throughout
// CodeIgniter to refer to the Application directory. Change
// this constant to change the namespace that all application
// classes should use.
//
// NOTE: changing this will require manually modifying the
// existing namespaces of App\* namespaced-classes.
//
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
|--------------------------------------------------------------------------
| Composer Path
|--------------------------------------------------------------------------
|
| The path that Composer's autoload file is expected to live. By default,
| the vendor folder is in the Root directory, but you can customize that here.
*/
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
|--------------------------------------------------------------------------
| Timing Constants
|--------------------------------------------------------------------------
|
| Provide simple ways to work with the myriad of PHP functions that
| require information to be in seconds.
*/
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// App
defined('X_AUTH_TOKEN')        or define('X_AUTH_TOKEN', 'X-Auth-Token');
defined('APPNAME')             or define('APPNAME', 'Allpayment');
defined('APPCODE')             or define('APPCODE', 'ALLPAYMENT');
defined('SESSIONCODE')         or define('SESSIONCODE', 'SESSIONCIMASTER');
defined('AUTHOR')              or define('AUTHOR', 'Charisma Persada Nusantara');
defined('APPDETAILNAME')       or define('APPDETAILNAME', 'Dashboard');
defined('ASSETSPATH')          or define('ASSETSPATH', 'assets');
defined('VENDORPATH')          or define('VENDORPATH', 'vendor');
defined('DOCSPATH')            or define('DOCSPATH', str_replace("application", "public", APPPATH));
defined('UPLOADPATH')          or define('UPLOADPATH', str_replace("application", "public", APPPATH));


// Response Message
defined('ERROR_TOKEN')           or define("ERROR_TOKEN", "Unauthorized");
defined('SUCCESS')               or define("SUCCESS", "Proses selesai");
defined('E_1001')                or define("E_1001", "Dokumen tidak valid");
defined('E_1002')                or define("E_1002", "Dokumen kadaluarsa");
defined('E_1003')                or define("E_1003", "Dokumen tidak dapat diakses");
defined('E_1004')                or define("E_1004", "Dokumen tidak ditemukan");
defined('E_1005')                or define("E_1005", "Dokumen sudah ada");
defined('E_1006')                or define("E_1006", "Dokumen tidak dapat diproses");
defined('E_2001')                or define("E_2001", "Masalah pada server");
defined('E_3001')                or define("E_3001", "Pengiriman data korup");
defined('E_3002')                or define("E_3002", "Permintaan data belum lengkap");

defined('TIMEOUT_GUZZLE')        or define("TIMEOUT_GUZZLE", 60);

$protocol = (isset( $_SERVER['HTTPS'] ) AND $_SERVER['HTTPS'] == 'on') ? 'https' : 'http';

$base = $protocol."://".$_SERVER['SERVER_NAME'].str_replace("/index.php","", $_SERVER['SCRIPT_NAME']);
defined('BASE_URL')        or define("BASE_URL", $base);
