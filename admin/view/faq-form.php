<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-3">

                <h4><?php if($faq !== false): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> une Q/R</h4>
            </header>

            <?php if($message !== false):?>
                <div class="btn bg-danger text-white">
                    <?= $message; ?>
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="question">Question :</label>
                    <input class="form-control" required="required" <?php if($faq !== false): ?>value="<?= htmlentities($faq[0]['question']); ?>"<?php endif; ?> type="text" placeholder="Question" name="question" id="question" />
                </div>
                <div class="form-group">
                    <label for="answer">Réponse : </label>
                    <textarea class="form-control" placeholder="Reponse.." name="answer" id="answer" ><?php if($faq !== false){ echo htmlentities($event[0]['content']); } ?></textarea>
                </div>
                <label for="group">Groupe Q/R</label>
                <select class="form-control" required="required" name="group" id="group">
                    <?php foreach ($g_faq as $g ) : ?>
                            <option value="<?= $g['id'] ?>"><?= $g['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="text-right">
                    <?php if($faq !== false ): ?>
                        <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
                    <?php else: ?>
                        <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                    <?php endif; ?>
                </div>

                <?php if(isset($faq)): ?>
                    <input type="hidden" name="id" value="<?= $faq[0]['id']?>" />
                <?php endif; ?>

            </form>
        </section>
    </div>

</div>
</body>
</html>