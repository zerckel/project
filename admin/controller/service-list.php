<?php
require 'model/list.php';

$services = getTable('service');
$message = isset($_GET['message'])? 'Enregistrement effectué' : false ;

require 'view/service-list.php';