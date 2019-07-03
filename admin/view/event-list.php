<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-4 d-flex justify-content-between">
                <h4>Liste des Actualités</h4>
                <a class="btn btn-primary" href="?action=add&option=event">Ajouter une Actualité</a>
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
                    <th>Title</th>
                    <th>Date de publication</th>
                    <th>Date</th>
                    <th>Place</th>
                    <th>Content</th>
                    <th>Summary</th>
                    <th>is_published</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if($events): ?>
                    <?php foreach($events as $event): ?>

                        <tr>
                            <th><?= htmlentities($event['id']); ?></th>
                            <td><?= $event['title']; ?></td>
                            <td><?= htmlentities($event['published_at']); ?></td>
                            <td><?= htmlentities($event['date']); ?></td>
                            <td><?= htmlentities($event['place']); ?></td>
                            <td><?= $event['content']; ?></td>
                            <td><?= $event['summary']; ?></td>
                            <td><?= htmlentities($event['is_published']); ?></td>
                            <td>
                                <a href="?action=edit&option=event&elem=<?= $event['id']; ?>" class="btn btn-warning">Modifier</a>
                                <a onclick="return confirm('Toute suppression est definitive')" href="?option=event&delete=<?= $event['id']; ?>" class="btn btn-danger">Supprimer</a>
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