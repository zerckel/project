<?php
require 'partials/tools.php';

$db = db();

$query = $db->query('SELECT * FROM event ORDER BY id DESC');
$events = $query->fetchAll();

?>
<html lang="fr">
<?php require 'partials/head-asset.html' ; ?>
<body>
<?php require 'partials/header.php'; ?>

<div data-name="event" id="title" class="zIndex-4">
    <h1>
        Ville de saint-gratien
    </h1>
</div>
<div id="event" class="zIndex-1">
    <div class="pics zIndex-1" style="background-image: url('https://www.optionfinance.fr/fileadmin/_processed_/csm_img-event_54745635d1.jpg')"></div>
    <div class="bgc grey"></div>
    <div id="title" class="zIndex-5">
        <h1>
            Chercher un événements ↴
        </h1>
    </div>
    <div class="datePick zIndex-5"><input id="datePick" type="date"></div>
        <section>
            <div class="hoofdband zIndex-1">
                Liste des évenements
            </div>
            <?php foreach ($events as $event) : ?>
                <article id="scroll" data-date="<?= $event['date'] ?>" class="grey border">
                    <div class="article event">
                        <div class="title"><?php echo $event['title'] ?></div>
                        <div class="place"><b>Lieux : </b><?php echo $event['place'] ?></div>
                        <div class="date"><b>Date : </b><?php echo $event['date'] ?></div>
                        <div class="summary"><b>Résumé : </b><?php echo $event['summary'] ?></div>
                        <div class="button">
                            <svg aria-hidden="true" focusable="false" height="5vh" width="20vw" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1500 1200"><path fill="black" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg>
                        </div>
                        <div class="content">
                            <?php echo $event['content'] ?>
                            <?php if (!empty($event['ytb'])){
                                echo $event['ytb'];
                            } ?>
                        </div>

                    </div>
                </article>
            <?php endforeach;?>
        </section>
</div>


<?php require 'partials/Gmaps.html' ; ?>
<?php require 'partials/footer.html' ; ?>
</body>
<script type="text/javascript">
    <?php require 'assets/script/script.js'; ?>
</script>
</html>