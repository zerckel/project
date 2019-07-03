<?php
require '../partials/tools.php';

if(!isset($_SESSION['user']) OR $_SESSION['user']['is_admin'] == 0){
    header('location:../index.php');
    exit;
}

if (isset($_GET['action'])){
    if ($_GET['action'] == 'edit') {
        choices_form($_GET['option']);
    }elseif ($_GET['action'] == 'add') {
        choices_form($_GET['option']);
    }else {
        require 'controller/user-list.php';
    };
}

if (isset($_GET['option'])) {
        if (!isset($_GET['action'])){
        choices_list($_GET['option']);
    }
}
else {
    require 'controller/user-list.php';
}


