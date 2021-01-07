<?php

require('./authen.php');

//get partner or product 
$models = ripcord::client($exec_url);
// var_dump($uid);
$company=$models->execute_kw($db, $uid, $password,'stock.picking', 'search_read',
array(array(array('move_type','=','direct'))),
array('fields'=>array('id','name', 'scheduled_date', 'backorder_id'), 'limit'=>50));

$item=array();

foreach ($company as $p => $value) {

    $a= array(
        "id"=>$value['id'],
        "name"=>$value['name'],
        "scheduled_date"=>$value['scheduled_date'],
        "backorder_id"=>$value['backorder_id']
    );
    array_push($item,$a);
}

echo json_encode($item);

?>
