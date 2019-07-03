<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des factures</h4>
                <a class="btn btn-primary" href="?action=add&option=bill">Ajouter une facture</a>
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
                    <th>Intitulé</th>
                    <th>Montant</th>
                    <th>date</th>
                    <th>Identifiant facture</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($bills): ?>
                    <?php foreach($bills as $bill): ?>

                        <tr>
                            <th><?= htmlentities($bill['id']); ?></th>
                            <td><?= htmlentities($bill['title']); ?></td>
                            <td><?= htmlentities($bill['amount']); ?></td>
                            <td><?= htmlentities($bill['date']); ?></td>
                            <td><?= htmlentities($bill['mail']); ?></td>
                            <td><?= htmlentities($bill['files']); ?></td>
                            <td>
                                <a href="?action=edit&option=bill&elem=<?= $bill['id']; ?>" class="btn btn-warning">Modifier</a>
                                <a onclick="return confirm('Toute suppression est definitive')" href="?option=bill&delete=<?= $bill['id']; ?>" class="btn btn-danger">Supprimer</a>
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