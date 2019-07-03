<?php
require 'partials/tools.php';
?>
<html lang="fr">
<?php require 'partials/head-asset.html' ; ?>
<body>
<?php require 'partials/header.php'; ?>

<div data-name="error" id="title" class="zIndex-4">
    <h1>
        404 ERROR
    </h1>
</div>
<div id="core" class="zIndex-1">
    <div class="pics url-1 zIndex-1"></div>
    <div class="bgc grey"></div>
    <section>
        <div class="hoofdband zIndex-1">
            > PAGE INTROUVABLE
        </div>
        <article style="font-size: 2em;" class="grey">
            <b>OUPS ! LA PAGE DEMANDE EST INTROUVABLE ¯\_(ツ)_/¯</b>
        </article>
    </section>



<?php require 'partials/Gmaps.html' ; ?>
<?php require 'partials/footer.html' ; ?>
</body>
<script type="text/javascript">
    <?php require 'assets/script/script.js'; ?>
</script>
</html>
