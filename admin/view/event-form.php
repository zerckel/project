<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-3">

                <h4><?php if($event !== false): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un Article</h4>
            </header>

            <?php if($message !== false):?>
                <div class="btn bg-danger text-white">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input class="form-control" required="required" <?php if($event !== false): ?>value="<?= htmlentities($event[0]['title']); ?>"<?php endif; ?> type="text" placeholder="Nom" name="title" id="title" />
                </div>
                <div class="form-group">
                    <label for="place">Lieux : </label>
                    <input class="form-control" required="required" <?php if($event !== false): ?>value="<?= htmlentities($event[0]['place']); ?>"<?php endif; ?> type="text" placeholder="Localisation" name="place" id="place" />
                </div>
                <div class="form-group">
                    <label for="summary">Résumé : </label>
                    <input class="form-control" required="required" <?php if($event !== false): ?>value="<?= htmlentities($event[0]['summary']); ?>"<?php endif; ?> type="text" placeholder="Résumé" name="summary" id="summary" />
                </div>
                <div class="form-group">
                    <label for="content">Contenu : </label>
                    <textarea class="form-control" placeholder="Contenu" name="content" id="content" ><?php if($event !== false){ echo htmlentities($event[0]['content']); } ?></textarea>
                </div>
                <div class="form-group">
                    <label for="published_at">Date de publication: </label>
                    <input class="form-control" required="required" <?php if($event !== false): ?>value="<?= htmlentities($event[0]['date']); ?>"<?php endif; ?> type="date" placeholder="Date de publication" name="published_at" id="published_at" >
                </div>
                <div class="form-group">
                    <label for="date">Date : </label>
                    <input class="form-control" required="required" <?php if($event !== false): ?>value="<?= htmlentities($event[0]['date']); ?>"<?php endif; ?> type="date" placeholder="Date" name="date" id="date" >
                </div>
                <div class="form-group">
                    <label for="is_published">Publié : </label> <br/>
                    <input type="radio" name="is_published" value="1"> Oui<br>
                    <input type="radio" name="is_published" value="0"> Non<br>
                </div>
                <div class="form-group">
                    <label for="ytb">Lien YouTube : </label>
                    <input class="form-control" <?php if($event !== false): ?>value="<?= htmlentities($event[0]['ytb']); ?>"<?php endif; ?> type="url" placeholder="www.exemple.com" name="ytb" id="ytb" />
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Télécharger</span>
                    </div>
                    <div class="custom-file">
                        <input <?php if($event === false ): ?>
                                required="required"
                                <?php endif; ?>
                                type="file" class="custom-file-input" id="my_file" name="my_file"
                               aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="my_file">Choisir son image</label>
                    </div>
                </div>
                <br/>
                <div class="text-right">
                    <?php if($event !== false ): ?>
                        <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
                    <?php else: ?>
                        <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                    <?php endif; ?>
                </div>

                <?php if(isset($event)): ?>
                    <input type="hidden" id="id" name="id" value="<?= $event[0]['id']?>" />
                    <input type="hidden" id="pics" name="pics" value="<?= $event[0]['pics']?>" />
                <?php endif; ?>

            </form>
        </section>
    </div>

</div>

</body>
</html>