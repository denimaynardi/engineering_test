<?php
require_once("data.php");

$ArrayURL = split('/', $_SERVER[REQUEST_URI]);
$id = isset($_GET["id"]) ? $_GET["id"] : 0; //$ArrayURL[1];
$data = new baseObj();

if (is_object($data) == true) $status = '200 OK';
$status_header = 'HTTP/1.1 $status';

header($status_header);
return json_encode( $data->getAll($id) );

?>