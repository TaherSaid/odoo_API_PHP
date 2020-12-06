<?php

require('./authen.php');

//get partner or product 
$models = ripcord::client($exec_url);

$user=$models->execute_kw($db, $uid, $password,
    'res.users', 'search_read',
    array(), array('fields' => array('id', 'login')));

$item=array();

foreach ($user as $p => $value) {

    $a= array(
        "id"=>$value['id'],
        "login"=>$value['login']
    );
    array_push($item,$a);
}

echo json_encode($item);

?>
