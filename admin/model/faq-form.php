<?php

function getAll(){
    $db = db();
    $query = $db->query('SELECT * FROM g_faq');
    $result = $query->fetchAll();
    return $result;
}

function insertTable(){
    $db = db();


    $query = $db->prepare('INSERT INTO faq (question, answer, category) VALUES (?, ?, ?)');
    $result = $query->execute([
        htmlentities($_POST['question']),
        htmlentities($_POST['answer']),
        htmlentities($_POST['group'])
    ]);
    if ($result){
        header('location:?option=faq&message');

    }

    header('location:?option=faq&elem='.$_GET['elem'].'&message=1');
}

function modifiedtable(){
    $db = db();

    $destination = bill();

    $query = $db->prepare('UPDATE bill SET question = :question, answer = :answer, group = :group WHERE id = :id');
    $result = $query->execute([
        'question' => htmlentities($_POST['question']),
        'answer' => $_POST['answer'],
        'group' => htmlentities($_POST['group']),
        'id' => $_POST['id']
    ]);
    if ($result){
        header('location:?option=faq&message');
    }
    return $result;

}