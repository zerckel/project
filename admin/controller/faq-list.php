<?php
require 'model/list.php';

$faq = getMultipleTable('faq', 'g_faq', 'a.category = b.faq_id', ', b.Name as name');
$message = isset($_GET['message'])? 'Enregistrement effectué' : false ;
isset($_GET['delete'])? $result = deleteElem($_GET['option']) : '';

require 'view/faq-list.php';