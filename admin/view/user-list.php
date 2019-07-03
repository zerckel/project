<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des Utilisateurs</h4>
                <a class="btn btn-primary" href="?action=add&option=user">Ajouter un utilisateur</a>
            </header>

            <?php if($message !== false): ?>
                <div class="btn bg-success text-white p-2 mb-4">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Admin ?</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($users): ?>
                    <?php foreach($users as $user): ?>

                        <tr>
                            <!-- htmlentities sert à écrire les balises html sans les interpréter -->
                            <th><?= htmlentities($user['id']); ?></th>
                            <td><?= htmlentities($user['lastname']); ?></td>
                            <td><?= htmlentities($user['firstname']); ?></td>
                            <td><?= htmlentities($user['email']); ?></td>
                            <td><?= htmlentities($user['phone']); ?></td>
                            <td><?= htmlentities($user['address']); ?></td>
                            <td>
                                <?php if($user['is_admin'] == 1): ?>
                                    Oui
                                <?php else: ?>
                                    Non
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?action=edit&option=user&elem=<?= $user['id']; ?>" class="btn btn-warning">Modifier</a>
                                <a onclick="return confirm('Toute suppression est definitive')" href="?option=user&delete=<?= $user['id']; ?>" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php else: ?>
                    Aucun article enregistré.
                <?php endif; ?>

                </tbody>
            </table>

        </section>

    </div>

</div>

</body>
<script type="text/javascript">
    <?php require '../assets/script/script.js'; ?>
</script>
</html>