<?php

require('ripcord-master/ripcord.php');

$url = "http://localhost:8069";
$db ="ODOO01";
$username = "taher";
$password = "123456789";
$auth_url=$url."/xmlrpc/2/common";
$exec_url=$url."/xmlrpc/2/object";


//authentification 

$common = ripcord::client($auth_url);
$uid = $common->authenticate($db, $username, $password, array());
print("<p>your current id is :'$uid'</p>");

//get partner or product 
$models = ripcord::client($exec_url);

//to get partner
$ids = $models->execute_kw($db, $uid, $password,
    'res.partner', 'search',
    array(array(array('is_company', '=', true))),
    array('limit'=>1));
$records = $models->execute_kw($db, $uid, $password,
    'res.partner', 'read', array($ids));

// count the number of fields fetched by default
count($records[0]);

$user=$models->execute_kw($db, $uid, $password,
    'res.users', 'search_read',
    array(), array('fields' => array('id', 'login')));


// var_dump($prod['name']['type']);
// echo $prod['id'];
foreach ($user as $p => $value) {
    echo $value['id'],$value['login'],"<br>";

    // var_dump($value);
}

//listing Record field

// var_dump($models->execute_kw($db, $uid, $password,
// 'res.partner', 'search_read',
// array(array(array('is_company', '=', true))),
// array('fields'=>array('name', 'country_id', 'comment'), 'limit'=>5)));

?>
