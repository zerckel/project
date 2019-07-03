<?php
header("Access-Control-Allow-Origin: *");

require 'partials/tools.php';

$data = file_get_contents('php://input');
$json = json_decode($data);

class res{
    public $type;
    public $msg;
}


if (isset($json->{'subject'})){

    $mail = $json->{'mail'};
    $subject = $json->{'subject'};
    $content = $json->{'content'};

    $db = db();

    $message = "<html><head></head><body>Un utilisateur vous envoie un message <br/> $content </body></html>";
    $header ="MIME-Version: 1.0\r\n";
    $header.='From:'.$mail.'<support@STG.fr>'."\n";
    $header.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $header.='Content-Transfer-Encoding: 8bit';

    $query = $db->query('SELECT * FROM user WHERE is_admin = 1');
    $admins = $query->fetchAll();

    foreach ($admins as $admin){
        mail($admin['email'], $subject, $message, $header );
    }
    $result = mail($mail, $subject, $message, $header );


    $type = isset($result)? 1 : 0;
    $res = new res();
    $res->type = $type;

    if ($type === 1){
        $res->msg = 'Votre message a été envoyé à un admin !';
    }else{
        $res->msg = "echec de l'envoie veuillez réessayer";
    }

    echo json_encode($res);
}elseif (isset($json->{'content'})){

    $value = $json->{'sCat'};
    $subject = $json->{'cat'};
    $content = $json->{'content'};
    $db = db();

    $message = "<html><head></head><body>Signalement d un utilisateur pour $value <br/> $content </body></html>";
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:User report <support@STG.fr>' . "\n";
    $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $header .= 'Content-Transfer-Encoding: 8bit';

    $query = $db->query('SELECT * FROM user WHERE is_admin = 1');
    $admins = $query->fetchAll();

    foreach ($admins as $admin) {
        mail($admin['email'], $subject, $message, $header);
    }

    $type = 1;
    $res = new res();
    $res->type = $type;

    if ($type === 1) {
        $res->msg = 'Votre Signalement a été envoyé à un admin !';
    } else {
        $res->msg = 'echec de l\'envoie veuillez réessayer';
    }

    echo json_encode($res);

}elseif (isset($json->{'id'})){
    $id = $json->{'id'};
    $mdp = $json->{'mdp'};

    $db = db();

    $query = $db->prepare('SELECT * FROM user	WHERE email = ? AND password = ? ');

    $query->execute( array($id, md5($mdp)) );
    $user = $query->fetch();
    $res = new res();
    if ($user){
        if ($user['is_admin'] == 1){
            $_SESSION['user']['is_admin'] = $user['is_admin'];
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['confirm'] = $user['confirm'];
            $type = 2;
        }else if ($user['is_admin'] == 0 && $user['confirm'] == 0){
            $type = 3;
            $res->msg = $user;
        }else{
            $type = 5;
            $bill = bills($user['id']);
            $res->msg = $bill;
            $res->type = $type;
        }
    }else{
        $type = 0;
    }

    $res->type = $type;

    if ($type == 0) {
        $res->msg = 'Mauvais identifiant';
    }
    echo json_encode($res);
}elseif (isset($json->{'lastname'})){

    $lastName = $json->{'lastname'};
    $firstName = $json->{'firstname'};
    $mail = $json->{'mail'};
    $mdp = $json->{'mdp'};
    $user = $json->{'user'};

    $db = db();
    $query = $db->prepare('UPDATE user SET lastname = :lastname, firstname = :firstname, email = :mail, password = :mdp, confirm = :confirm WHERE id = :id');
    $result = $query->execute([
        'lastname' => $lastName,
        'firstname' => $firstName,
        'mail' => $mail,
        'mdp' => md5($mdp),
        'confirm' => '1',
        'id' => $user
    ]);
    $res = new res();

    if ($result) {
        $res->type = 4;
        $bill = bills($user);
        $res->msg = $bill;

    }else{
        $res->msg = 'ERROR';
    }
    echo json_encode($res);
}

function bills($user){
    $db = db();
    $query = $db->query('SELECT * FROM bill WHERE Id_bill = '.$user);
    $result = $query->fetchAll();

    return $result;

}


