<?php
session_start();
require_once('db.conf.php');

$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$_SESSION['id'] = $id ;
echo $id;