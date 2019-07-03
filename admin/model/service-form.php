<?php

function getAll(){
    $db = db();
    $query = $db->query('SELECT * FROM g_service');
    $result = $query->fetchAll();
    return $result;
}

function files(){
    $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif' , 'png'  );
    $my_file_extension = pathinfo( $_FILES['my_file']['name'] , PATHINFO_EXTENSION);

    if ( in_array($my_file_extension , $allowed_extensions) ){

        do {
            $new_file_name = rand();
            $destination = '../assets/img/' . $new_file_name . '.' . $my_file_extension;
        } while (file_exists($destination));

        move_uploaded_file( $_FILES['my_file']['tmp_name'], $destination);
        if (isset($_POST['update'])) {
            unlink($_POST['pics']);
            if (!empty($destination)) {
                $new_file_name = $_POST['pics'];
            }
            return $new_file_name.'.'.$my_file_extension;
        }else{
            return $new_file_name.'.'.$my_file_extension;
        }
    }
    else{
        echo "mauvaise extension";
    }
}

function insertTable(){
    $db = db();

    $destination = isset($_FILES['my_file'])? $destination = files() : '';

    $query = $db->prepare('INSERT INTO service (name, address, email, phone, category, pics) VALUES (?, ?, ?, ?, ?, ?)');
    $result = $query->execute([
        htmlentities($_POST['name']),
        htmlentities($_POST['address']),
        htmlentities($_POST['email']),
        htmlentities($_POST['phone']),
        htmlentities($_POST['group']),
        $destination

    ]);
    if ($result){
        header('location:?option=service&message');

    }else{
        header('location:?action=add&option=service&elem='.$_GET['elem'].'&message=1');
    }

}

function modifiedtable(){
    $db = db();

    $destination = files();

    $query = $db->prepare('UPDATE service SET name = :name, address = :address, email = :email, phone = :phone, category = :cat, pics = :pics WHERE id = :id');
    $result = $query->execute([
        'name' => htmlentities($_POST['name']),
        'address' => htmlentities($_POST['address']),
        'email' => htmlentities($_POST['email']),
        'phone' => htmlentities($_POST['phone']),
        'cat' => htmlentities($_POST['group']),
        'pics' => $destination,
        'id' => $_POST['id']
    ]);
    if ($result){
        header('location:?option=service&message');
    }
    return $result;

}