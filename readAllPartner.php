<?php

require('./authen.php');

//get partner or product 
$models = ripcord::client($exec_url);

$company=$models->execute_kw($db, $uid, $password,'res.partner', 'search_read',
array(array(array('is_company', '=', true))),
array('fields'=>array('name', 'country_id', 'comment'), 'limit'=>5));

$item=array();

foreach ($company as $p => $value) {

    $a= array(
        "name"=>$value['name'],
        "country_id"=>$value['country_id'],
        "comment"=>$value['comment']
    );
    array_push($item,$a);
}

echo json_encode($item);

?>
