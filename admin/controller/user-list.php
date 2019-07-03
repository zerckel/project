<?php
require 'model/list.php';

isset($_GET['delete'])? $result = deleteElem($_GET['option']) : '';
$message = isset($_GET['message'])? 'Enregistrement effectué' : false ;
$users = getTable('user');

require 'view/user-list.php';
