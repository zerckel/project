<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-3">

                <h4><?php if($bills !== false): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> une facture</h4>
            </header>

            <?php if($message !== false):?>
                <div class="btn bg-danger text-white">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Intitulé :</label>
                    <input class="form-control" required="required" <?php if($bills !== false): ?>value="<?= htmlentities($bills[0]['title']); ?>"<?php endif; ?> type="text" placeholder="Nom" name="title" id="title" />
                </div>
                <div class="form-group">
                    <label for="amount">Montant : </label>
                    <input class="form-control" required="required" <?php if($bills !== false): ?>value="<?= htmlentities($bills[0]['amount']); ?>"<?php endif; ?> type="number" placeholder="Montant" name="amount" id="amount" />
                </div>
                <div class="form-group">
                    <label for="date">Date : </label>
                    <input class="form-control" required="required" <?php if($bills !== false): ?>value="<?= htmlentities($bills[0]['date']); ?>"<?php endif; ?> type="date" placeholder="Date de naissance" name="date" id="date" />
                </div>
                <label for="user">Utilisateur à qui attribué la facture</label>
                <select class="form-control" required="required" name="user" id="user">
                    <?php foreach ($users as $user ) : ?>
                            <option value="<?= $user['id'] ?>"><?= $user['lastname'] ?>  <?= $user['firstname'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="text-right">
                    <?php if($bills !== false ): ?>
                        <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
                    <?php else: ?>
                        <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                    <?php endif; ?>
                </div>

                <?php if(isset($bills)): ?>
                    <input type="hidden" name="id" value="<?= $bills[0]['id']?>" />
                <?php endif; ?>

            </form>
        </section>
    </div>

</div>
</body>
</html>