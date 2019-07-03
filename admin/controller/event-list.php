<?php
require 'model/list.php';

isset($_GET['delete'])? $result = deleteElem($_GET['option']) : '';
$events = getTable('event');
$message = isset($_GET['message'])? 'Enregistrement effectué' : false ;
isset($_GET['delete']) AND file_exists($events[0]['pics']) ? $result = unlink($events[0]['pics']) : '';


require 'view/event-list.php';