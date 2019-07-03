<?php

function getAll(){
    $db = db();
    $query = $db->query('SELECT * FROM user');
    $result = $query->fetchAll();
    return $result;
}

function sendMail(){
    $db = db();
    $query = $db->prepare('SELECT * FROM user WHERE id = ? ');
    $query->execute( array( $_POST['user']));
    $user = $query->fetch();
    print_r($user) ;
    $message = "<html><head></head><body> Bonjour ".$user['lastname']." ".$user['firstname']." <br/> Une nouvelle facture vous est adressé consultez la dès maintenant dans votre espace personnel. <br/> Cordialement.</body></html>";
    $header ="MIME-Version: 1.0\r\n";
    $header.='From:"Mairie de Saint-gratien"<support@STG.fr>'."\n";
    $header.= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $header.='Content-Transfer-Encoding: 8bit';
    mail($user['email'], 'Facture Mairie de Saint-Gratien', $message, $header );
}

function bill(){
    require('partials/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',16);
    $pdf->Cell(40,10,' FACTURE ');
    $pdf->Ln(20);
    $pdf->Cell(40,10,' Intitule:'.$_POST['title'] );
    $pdf->Ln(20);
    $pdf->Cell(40,10,' Date :'.$_POST['date'] );
    $pdf->Ln(20);
    $pdf->Cell(40,10,' Montant :' . $_POST['amount'].' EURO');
    $name = rand();
    $destination = 'files\ '.$name.'.pdf';
    $pdf->Output('f',$destination , true);

    sendMail();

    if (isset($_GET['edit'])){
        $bills = $_GET['action'] === 'edit'? $result = infoFinder('bill', $_GET['elem']) : false ;
        unlink($bills[0]['files']);
    }
    return $destination;
}

function insertTable(){
    $db = db();

    $destination = bill();
    sendMail();

    $query = $db->prepare('INSERT INTO bill (title, amount, date, files, Id_bill) VALUES (?, ?, ?, ?, ?)');
    $result = $query->execute([
        htmlentities($_POST['title']),
        htmlentities($_POST['amount']),
        htmlentities($_POST['date']),
        htmlentities($destination),
        htmlentities($_POST['user'])
    ]);
    if ($result){
        header('location:?option=bill&message');

    }

    header('location:?option=bill&elem='.$_GET['elem'].'&message=1');
}

function modifiedtable(){
    $db = db();

    $destination = bill();

    $query = $db->prepare('UPDATE bill SET title = :title, amount = :amount, date = :date, files = :files WHERE id = :id');
    $result = $query->execute([
        'title' => htmlentities($_POST['title']),
        'amount' => htmlentities($_POST['amount']),
        'date' => htmlentities($_POST['date']),
        $destination,
        htmlentities($_POST['user']),
        'id' => $_POST['id']
    ]);
    if ($result){
        header('location:?option=bill&message');
    }
    return $result;

}