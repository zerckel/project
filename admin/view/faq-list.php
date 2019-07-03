<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des Questions / Reponses</h4>
                <a class="btn btn-primary" href="?action=add&option=faq&cat">Ajouter une categorie</a>
                <a class="btn btn-primary" href="?action=add&option=faq">Ajouter une Q/R</a>
            </header>

            <?php if($message !==false): //si un message a été généré plus haut, l'afficher ?>
                <div class=" btn bg-success text-white p-2 mb-4">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Questions</th>
                    <th>Reponses</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($faq): ?>
                    <?php foreach($faq as $Q_A): ?>
                        <tr>
                            <th><?= htmlentities($Q_A['id']); ?></th>
                            <td><?= $Q_A['question']; ?></td>
                            <td><?= $Q_A['answer']; ?></td>
                            <td><?= htmlentities($Q_A['name']); ?></td>
                            <td>
                                <a href="?action=edit&option=faq&elem=<?= $Q_A['id']; ?>" class="btn btn-warning">Modifier</a>
                                <a onclick="return confirm('Toute suppression est definitive')" href="?option=faq&delete=<?= $Q_A['id']; ?>" class="btn btn-danger">Supprimer</a>
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