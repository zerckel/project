<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des Services</h4>
                <a class="btn btn-primary" href="?action=add&option=service">Ajouter un service</a>
            </header>

            <?php if($message !== false): //si un message a été généré plus haut, l'afficher ?>
                <div class="btn bg-success text-white p-2 mb-4">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>N°Téléphone</th>
                    <th>Categorie</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($services): ?>
                    <?php foreach($services as $service): ?>

                        <tr>
                            <th><?= htmlentities($service['id']); ?></th>
                            <td><?= htmlentities($service['name']); ?></td>
                            <td><?= $service['address']; ?></td>
                            <td><?= htmlentities($service['email']); ?></td>
                            <td><?= htmlentities($service['phone']); ?></td>
                            <td><?= htmlentities($service['category']); ?></td>
                            <td>
                                <a href="?action=edit&option=service&elem=<?= $service['id']; ?>" class="btn btn-warning">Modifier</a>
                                <a onclick="return confirm('Toute suppression est definitive')" href="?option=service&delete=<?= $service['id']; ?>" class="btn btn-danger">Supprimer</a>
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