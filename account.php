
<?php
require 'partials/tools.php';

if(isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1){
    header('location:admin/');
    exit;
}
?>
<html lang="fr">
<?php require 'partials/head-asset.html' ; ?>
<body>
<?php require 'partials/header.php'; ?>
<div data-name="connexion" id="title" class="zIndex-4">
    <h1>
        Mon compte
    </h1>
</div>
<div id="account">
    <div class="pics url-3 zIndex-1"></div>
    <div class="bgc grey"></div>
    <section>
        <div class="hoofdband zIndex-1">
            Connexion
        </div>
        <article class="grey border">
            <div class="connexion">
                <form id="register" class="form" method="post">
                    <span id="alert"></span>
                    <label for="id">Identifiant :</label>
                    <input required="required" placeholder="identifiant" id="id" name="id" type="text">
                    <label for="password">Mot de passe :</label>
                    <input required="required" placeholder="Entrez votre mot de passe" id="password" name="password" type="password">
                    <button type="submit">Connexion</button>
                </form>
                <form id="confirm"  method="post">
                    <span id="issu"></span>
                    <label for="lastname">Nom de famille</label>
                    <input required="required" placeholder="Nom" id="lastname" name="lastname" type="text">
                    <label for="firstname">Prénom :</label>
                    <input required="required" placeholder="Votre prénom" id="firstname" name="firstname" type="text">
                    <label for="email">Mail :</label>
                    <input required="required" placeholder="Adresse email" id="email" name="email" type="email">
                    <label for="mdp">Changez votre mot de passe :</label>
                    <input required="required" placeholder="Mot de passe.." id="mdp" name="mdp" type="password">
                    <label for="confMdp">Confirmer votre mot de passe :</label>
                    <input required="required" placeholder="Mot de passe.." id="confMdp" name="confMdp" type="password">
                    <input class="displayNone" id="user">
                    <button type="submit">Connexion</button>
                </form>
                <div class="bills">
                    <table>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Fichier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </article>
    </section>
</div>
<?php require 'partials/Gmaps.html' ; ?>
<?php require 'partials/footer.html' ; ?>
</body>
<script type="text/javascript">
    <?php require 'assets/script/script.js'; ?>
</script>
</html>
