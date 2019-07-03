<?php
require 'model/faq-form.php';

$g_faq = getAll();
$message = isset($_GET['message'])? "L'enregistrement n'as pas fonctionné" : false;
$faq = $_GET['action'] === 'edit'? $result = infoFinder('faq', $_GET['elem']) : false ;
isset($_POST['save'])? $result = insertTable(): false;
isset($_POST['update'])? $result = modifiedTable(): false;

require 'view/faq-form.php';
