<?php

require('ripcord-master/ripcord.php');
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods");

$data = json_decode(file_get_contents("php://input"));


$url = "http://localhost:8069";
$db ="odoo_db";
// var_dump($data);
$username = $data->username;
$password = $data->password;
$auth_url=$url."/xmlrpc/2/common";
$exec_url=$url."/xmlrpc/2/object";

$common = ripcord::client($auth_url);
$uid = $common->authenticate($db, $username, $password, array());
echo json_encode($uid);