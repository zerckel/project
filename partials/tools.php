<?php

setlocale(LC_ALL, "fr_FR");

function db(){

try{
    $db = new PDO('mysql:host=localhost; dbname=endyear; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}
return $db;
}

function infoFinder($table, $get){
    $db = db();

    $query = $db->prepare('SELECT * FROM ' .$table. ' WHERE id = :id');
    $query->execute([
        'id' => $get
    ]);
    $result = $query->fetchAll();
    return $result;

}

function choices_list($switch){
    switch ($switch) {
        case 'user':
            require 'controller/user-list.php';
            break;
        case 'service':
            require 'controller/service-list.php';
            break;
        case 'event':
            require 'controller/event-list.php';
            break;
        case 'faq':
            require 'controller/faq-list.php';
            break;
        case 'bill':
            require 'controller/bills-list.php';
            break;
        default:
            require 'controller/user-list.php';
            break;
    }
}

function choices_form($switch){
    switch ($switch) {
        case 'user':
            require 'controller/user-form.php';
            break;
        case 'service':
            require 'controller/service-form.php';
            break;
        case 'event':
            require 'controller/event-form.php';
            break;
        case 'faq':
            require 'controller/faq-form.php';
            break;
        case 'bill':
            require 'controller/bills-form.php';
            break;
        default:
            require 'controller/user-list.php';
            break;
    }
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function nb (){
    $db = db();
    $nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();
    $nbEvent = $db->query("SELECT COUNT(*) FROM event")->fetchColumn();
    $nbServices = $db->query("SELECT COUNT(*) FROM service")->fetchColumn();
    $nbFaq = $db->query("SELECT COUNT(*) FROM faq")->fetchColumn();
    $nbBills = $db->query("SELECT COUNT(*) FROM bill")->fetchColumn();
    $nb = [$nbUsers, $nbServices, $nbEvent, $nbFaq, $nbBills];
    return $nb;
}

session_start();
