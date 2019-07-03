<?php
require 'model/user-form.php';

$message = isset($_GET['message'])? "L'adresse mail renseigné est déjà utilisé" : false;
$user = $_GET['action'] === 'edit'? $result = infoFinder('user', $_GET['elem']) : false ;
isset($_POST['save'])? $result = insertTable(): false;
isset($_POST['update'])? $result = modifiedTable(): false;

require 'view/user-form.php';
