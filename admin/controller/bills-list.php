<?php

require 'model/list.php';

isset($_GET['delete'])? $result = deleteElem($_GET['option']) : '';
$message = isset($_GET['message'])? "Enregistrement effectué" : false;
$bills = getMultipleTable('bill', 'user', 'a.Id_bill = b.id', ', b.email as mail');
isset($_GET['delete']) AND file_exists($bills[0]['files']) ? $result = unlink($bills[0]['files']) : '';

require 'view/bills-list.php';