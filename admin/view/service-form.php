<html lang="fr">
<?php require 'partials/adminHeadAsset.html'; ?>
<body class="index-body">
<div class="container-fluid">

    <div class="row my-3 index-content">

        <?php require 'partials/nav.php'; ?>

        <section class="col-9">
            <header class="pb-3">

                <h4><?php if($service !== false): ?>Modifier<?php else: ?>Ajouter<?php endif; ?> un service</h4>
            </header>

            <?php if($message !== false):?>
                <div class="btn bg-danger text-white">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input class="form-control" required="required" <?php if($service !== false): ?>value="<?= htmlentities($service[0]['name']); ?>"<?php endif; ?> type="text" placeholder="Nom" name="name" id="name" />
                </div>
                <div class="form-group">
                    <label for="address">Adresse : </label>
                    <input class="form-control" required="required" <?php if($service !== false): ?>value="<?= $service[0]['address']; ?>"<?php endif; ?> type="text" placeholder="Localisation" name="address" id="address" />
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input class="form-control" <?php if($service !== false): ?>value="<?= htmlentities($service[0]['email']); ?>"<?php endif; ?> type="email" placeholder="Adresse mail" name="email" id="email" />
                </div>
                <div class="form-group">
                    <label for="phone">Tel : </label>
                    <input class="form-control" required="required" <?php if($service !== false): ?>value="<?= htmlentities($service[0]['phone']); ?>"<?php endif; ?> type="tel" placeholder="+33" name="phone" id="phone" />
                </div>
                <div class="form-group">
                    <label for="group"> Choisir la catégorie</label>
                    <select class="form-control" required="required" name="group" id="group">
                        <?php foreach ($g_service as $g ) : ?>
                            <option value="<?= $g['1'] ?>"><?= $g['1'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Télécharger</span>
                    </div>
                    <div class="custom-file">
                        <input  <?php if($service === false ): ?>
                                    required="required"
                                <?php endif; ?>
                                type="file" class="custom-file-input" id="my_file" name="my_file"
                                aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="my_files">Choisir son image</label>
                    </div>
                </div>

                <br/>
                <div class="text-right">
                    <?php if($service !== false ): ?>
                        <input class="btn btn-success" type="submit" name="update" value="Mettre à jour" />
                    <?php else: ?>
                        <input class="btn btn-success" type="submit" name="save" value="Enregistrer" />
                    <?php endif; ?>
                </div>

                <?php if(isset($service)): ?>
                    <input type="hidden" id="id" name="id" value="<?= $service[0]['id']?>" />
                    <input type="hidden" id="pics" name="pics" value="<?= $service[0]['pics']?>" />
                <?php endif; ?>

            </form>
        </section>
    </div>

</div>

</body>
</html>