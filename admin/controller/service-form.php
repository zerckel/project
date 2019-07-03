<?php
require 'model/service-form.php';

$g_service = getAll();
$message = isset($_GET['message'])? "L'enregistrement n'as pas fonctionné" : false;
$service = $_GET['action'] === 'edit'? $result = infoFinder('service', $_GET['elem']) : false ;
isset($_POST['save'])? $result = insertTable(): false;
isset($_POST['update'])? $result = modifiedTable(): false;

require 'view/service-form.php';
