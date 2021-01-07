<?php

require('./authen.php');

//get partner or product 
$models = ripcord::client($exec_url);
// var_dump($uid);
$company=$models->execute_kw($db, $uid, $password,'product.template', 'search_read',
array(array(array('type', '=', 'product'))),
array('fields'=>array('name', 'list_price', 'id'), 'limit'=>50));

$item=array();

foreach ($company as $p => $value) {

    $a= array(
        "name"=>$value['name'],
        "list_price"=>$value['list_price'],
        "id"=>$value['id']
    );
    array_push($item,$a);
}

echo json_encode($item);

?>
