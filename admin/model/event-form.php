<?php

function files()
{
    $allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
    $my_file_extension = pathinfo($_FILES['my_file']['name'], PATHINFO_EXTENSION);
        if (in_array($my_file_extension, $allowed_extensions)) {

                $new_file_name = rand();
                $destination = '../assets/img/' . $new_file_name . '.' . $my_file_extension;

            move_uploaded_file($_FILES['my_file']['tmp_name'], $destination);
            if (isset($_POST['update'])) {
                if (!empty($destination)) {
                    $new_file_name = $_POST['pics'];
                }
                return $new_file_name;
            } else {
                return $new_file_name;
            }
        } else {
            echo "mauvaise extension";
        }
}


function insertTable(){
    $db = db();

    $destination = isset($_FILES['my_file'])? $destination = files() : '';

    $query = $db->prepare('INSERT INTO event (title, place, date, published_at, content, summary, is_published, pics, Ytb) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $result = $query->execute([
        htmlentities($_POST['title']),
        htmlentities($_POST['place']),
        htmlentities($_POST['date']),
        htmlentities($_POST['published_at']),
        htmlentities($_POST['content']),
        $_POST['summary'],
        ctype_digit($_POST['is_published']),
        $destination,
        htmlentities($_POST['ytb'])

    ]);
    if ($result){
        header('location:?option=event&message');

    }else{
        header('location:?action=add&option=event&elem='.$_GET['elem'].'&message=1');
    }

}

function modifiedTable(){
    $db = db();
if (!empty($_POST['is_published'])){
    $destination = files();

    $query = $db->prepare('UPDATE event SET title = :title, place = :place, date = :date, published_at = :published_at, content = :content, summary = :summary, is_published = :is_published, ytb = :ytb, pics = :pics WHERE id = :id');
    $result = $query->execute([
        'title' => htmlentities($_POST['title']),
        'place' => htmlentities($_POST['place']),
        'date' => htmlentities($_POST['date']),
        'published_at' => htmlentities($_POST['published_at']),
        'content' => $_POST['content'],
        'summary' => $_POST['summary'],
        'is_published' => htmlentities($_POST['is_published']),
        'ytb' => htmlentities($_POST['ytb']),
        'pics' => $destination,
        'id' => $_POST['id']
    ]);
    if ($result){
        header('location:?option=event&message');
    }else{
        echo'echec';
    }
    return $result;
}


}