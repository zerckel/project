<?php
require 'model/bills-form.php';

$users = getAll();
$message = isset($_GET['message'])? "L'adresse mail renseigné est déjà utilisé" : false;
$bills = $_GET['action'] === 'edit'? $result = infoFinder('bill', $_GET['elem']) : false ;
isset($_POST['save'])? $result = insertTable(): false;
isset($_POST['update'])? $result = modifiedTable(): false;

require 'view/bills-form.php';
