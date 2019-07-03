<?php
require 'model/event-form.php';

$message = isset($_GET['message'])? "L'enregistrement à echoué" : false;
$event = $_GET['action'] === 'edit' && isset($_GET['elem']) ? $result = infoFinder('event', $_GET['elem']) : false ;
isset($_POST['save'])? $result = insertTable(): false;
isset($_POST['update'])? $result = modifiedTable(): false;

require 'view/event-form.php';
