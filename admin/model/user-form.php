<?php


function insertTable(){
    $db = db();

    $query = $db->prepare ('SELECT * FROM user WHERE email = ? ');
    $query->execute([
        $_POST['mail']
    ]);
    $mail = $query->fetch();

    if (empty($mail)){

        $query = $db->prepare('INSERT INTO user (lastname, firstname, email, birthday, password, address, phone, is_admin, confirm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $result = $query->execute([
            htmlentities($_POST['lastname']),
            htmlentities($_POST['firstname']),
            htmlentities($_POST['mail']),
            htmlentities($_POST['birthday']),
            md5($mdp = randomPassword()),
            htmlentities($_POST['address']),
            htmlentities($_POST['phone']),
            $_POST['confirm'],
            $_POST['is_admin']
        ]);
        if ($result){

            $message = "<html><head></head><body> Nom: ".$_POST['lastname']."<br/> Prénom: ".$_POST['firstname']."<br/> Mail: ".$_POST['mail']."<br/> Date de naissance: ".$_POST['birthday']."<br/> Mot de passe: ".$mdp."<br/> Adresse: ".$_POST['address']."<br/> N°tel: ".$_POST['phone']."</body></html>";
            $header ="MIME-Version: 1.0\r\n";
            $header.='From:"Mairie de Saint-gratien"<support@STG.fr>'."\n";
            $header.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $header.='Content-Transfer-Encoding: 8bit';
            mail($_POST['mail'], 'Identifiant Mairie de Saint-Gratien', $message, $header );
            header('location:?option=user&message');

        }
        return $result;

    }
    header('location:?action=add&option=user&elem='.$_GET['elem'].'&message=1');
}

function modifiedtable(){
    $db = db();
    $query = $db->prepare('UPDATE user SET lastname = :lastname, firstname = :firstname, email = :email, birthday = :birthday, address = :address, phone = :phone, is_admin = :is_admin WHERE id = :id');

    $result = $query->execute([
        'lastname' => htmlentities($_POST['lastname']),
        'firstname' => htmlentities($_POST['firstname']),
        'email' => htmlentities($_POST['mail']),
        'birthday' => htmlentities($_POST['birthday']),
        'address' =>  htmlentities($_POST['address']),
        'phone' =>  htmlentities($_POST['phone']),
        'is_admin' =>  $_POST['is_admin'],
        'id' => $_POST['id']
    ]);
    if ($result){
        header('location:?option=user&message');
    }
    return $result;

}