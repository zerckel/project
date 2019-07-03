<?php

function getTable($table){
    $db = db();
    $query = $db->query('SELECT * FROM ' .$table.' ORDER BY id DESC');

    $result = $query->fetchAll();
    return $result;
}

function getMultipleTable($table1, $table2, $jointure, $name){
    $db = db();
    $query = $db->query('SELECT a.*' .$name. '
                                    FROM ' .$table1. ' a
                                    JOIN ' .$table2. ' b
                                    ON ' .$jointure.' ORDER BY id DESC');
    $result = $query->fetchAll();
    return $result;
}

function deleteElem($table){
    $db = db();
    $query = $db->prepare('DELETE FROM '.$table.' WHERE id = ?');
    $result = $query->execute([
            $_GET['delete']
    ]);
    if ($result){
        $message = 'suppression effectué';
        return $message;

    }
    return $message = 'echec';
}