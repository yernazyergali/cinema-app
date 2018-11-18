<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('test2', function() {
    $host = 'm-lombard.kz';
    $username = 'auditftp';
    $password = 'mou2miesu0fai4oJus';


//    $curl = curl_init();
//    $file = fopen(storage_path('test.json'), 'w');
//    curl_setopt($curl, CURLOPT_URL, "ftp://m-lombard.kz/UserFTP/NSIKUFIB/feedback.json");
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($curl, CURLOPT_FILE, $file); #output
//    curl_setopt($curl, CURLOPT_USERPWD, "auditftp:mou2miesu0fai4oJus");
//    curl_exec($curl);
//    curl_close($curl);
//    fclose($file);

    $host = 'm-lombard.kz';
    $username = 'auditftp';
    $password = 'mou2miesu0fai4oJus';

    $conn_id = ftp_connect($host);

    $login_result = ftp_login($conn_id, $username, $password);

    ftp_pasv($conn_id, true);

    ftp_get($conn_id, public_path('storage/test.json'), 'UserFTP/NSIKUFIB/feedback.json', FTP_ASCII);

    if (!$login_result) {
        die("can't login");
    }

    echo ftp_pwd($conn_id);

    ftp_close($conn_id);
});
