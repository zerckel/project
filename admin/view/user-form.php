<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-3">

                <h4><?php if($user !== false): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un utilisateur</h4>
            </header>

            <?php if($message !== false):?>
                <div class="btn bg-danger text-white">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="lastname">Nom :</label>
                    <input class="form-control" required="required" <?php if($user !== false): ?>value="<?= htmlentities($user[0]['lastname']); ?>"<?php endif; ?> type="text" placeholder="Nom" name="lastname" id="lastname" />
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom : </label>
                    <input class="form-control" required="required" <?php if($user !== false): ?>value="<?= htmlentities($user[0]['firstname']); ?>"<?php endif; ?> type="text" placeholder="Prénom" name="firstname" id="firstname" />
                </div>
                <div class="form-group">
                    <label for="birthday">Date de naissance : </label>
                    <input class="form-control" required="required" <?php if($user !== false): ?>value="<?= htmlentities($user[0]['birthday']); ?>"<?php endif; ?> type="date" placeholder="Date de naissance" name="birthday" id="birthday" />
                </div>
                <div class="form-group">
                    <label for="address">Adresse : </label>
                    <input class="form-control" required="required" <?php if($user !== false): ?>value="<?= htmlentities($user[0]['address']); ?>"<?php endif; ?> type="text" placeholder="adresse" name="address" id="address" />
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone : </label>
                    <input class="form-control" <?php if($user !== false): ?>value="<?= htmlentities($user[0]['phone']); ?>"<?php endif; ?> type="tel" placeholder="Tel :" name="phone" id="phone" />
                    <small id="emailHelp" class="form-text text-muted">Nous ne partageons pas cette information avec des tierces personnes</small>
                </div>
                <div class="form-group">
                    <label for="mail">Email : </label>
                    <input class="form-control" required="required" <?php if($user !== false): ?>value="<?= htmlentities($user[0]['email']); ?>"<?php endif; ?> type="email" placeholder="Mail" name="mail" id="mail" />
                    <small id="emailHelp" class="form-text text-muted">Nous ne partageons pas cette information avec des tierces personnes</small>
                </div>
                <div class="form-group">
                    <label for="is_admin"> Admin ?</label>
                    <select class="form-control" name="is_admin" id="is_admin">
                        <?php if ($user !== false ):  ?>
                        <?php if ($user[0]['is_admin'] === '1'): ?>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        <?php else: ?>
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        <?php endif; ?>
                        <?php else: ?>
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        <?php endif; ?>
                    </select>
                    <?php if(isset($_GET['action']) AND $_GET['action'] == 'add'): ?>
                    <input style="display: none;" id="confirm" name="confirm" value="0" type="text">
                    <?php endif; ?>
                </div>


                <div class="text-right">
                    <!-- Si $category existe, on affiche un lien de mise à jour -->
                    <?php if($user !== false ): ?>
                        <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
                        <!-- Sinon on afficher un lien d'enregistrement d'une nouvelle catégorie -->
                    <?php else: ?>
                        <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                    <?php endif; ?>
                </div>

                <!-- Si $category existe, on ajoute un champ caché contenant l'id de la catégorie à modifier pour la requête UPDATE -->
                <?php if(isset($user)): ?>
                    <input type="hidden" name="id" value="<?= $user[0]['id']?>" />
                <?php endif; ?>

            </form>
        </section>
    </div>

</div>
</body>
</html>