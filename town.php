<?php
require 'partials/tools.php';

$db = db();

$query = $db->query('SELECT * FROM g_service');
$gService = $query->fetchAll();
$service = array();
foreach ($gService as $key => $value){
    $query = $db->prepare('SELECT * FROM service WHERE category = :category');
    $query->execute(
            [
                    'category' => $value['name']
            ]
    );
    $service[$key] = $query->fetchAll();
}
?>
<html lang="fr">
<?php require 'partials/head-asset.html' ; ?>
<body>
    <?php require 'partials/header.php'; ?>

        <div data-name="town" id="title" class="zIndex-4">
            <h1>
                Présentation de la ville
            </h1>
        </div>
        <div id="town" class="zIndex-1">
            <div class="pics url-1 zIndex-1"></div>
            <div class="bgc grey"></div>
            <section>
                <div class="hoofdband zIndex-1">
                    > Saint-Gratien
                </div>
                <article class="grey">
                    Saint-Gratien est une commune française située dans le département du Val-d'Oise en région d'Île-de-France.
                    Ses habitants sont appelés les Gratiennois.
                    <br/>
                    Le centre de Saint-Gratien est constitué par un îlot très dense d'immeubles de grande hauteur datant des années 1970, entourant une place centrale nommée le « forum ». Celui-ci constitue un centre culturel et commercial, avec la présence de divers commerces ainsi, notamment, que du cinéma et de la médiathèque de la ville.
                    <br/>
                    En 2007, ce quartier regroupe 7000 habitants, soit près du tiers de la population de la commune2.
                    Au nord, l'environnement est nettement plus privilégié en limite d'Enghien-les-Bains, avec un quartier résidentiel aux alentours du lac de la princesse Mathilde, modeste extension du lac d'Enghien. Ce secteur est pour l'essentiel constitué de pavillons, avec la présence de petits collectifs, en particulier autour de l'avenue Mathilde, en limite de Soisy-sous-Montmorency.
                </article>
            </section>
            <div id="title" class="zIndex-6">
                <h1>
                    Présentation des services
                </h1>
            </div>
            <?php foreach ($service as $services) : ?>

            <div class="pics zIndex-1" style='background-image:url("assets/img/<?php echo $services[0][6] ?>") '></div>
            <div class="bgc grey"></div>
            <section>
                <div class="hoofdband zIndex-1">
                    > <?php echo $services[0][5]; ?>
                </div>
                <?php foreach ($services as $values) : ?>
                <article class="grey border">
                    <div class="article">
                        <div class="title"><?php echo $values['name'] ?></div>
                        <div><u>Adresse:</u> <?php echo $values['address'] ?></div>
                        <?php if (!empty($values['email'])) : ?>
                        <div><u>Mail:</u><a style="color:blue;" href="mailto: <?php echo $values['email'] ?>"> <?php echo $values['email'] ?></a></div>
                        <?php endif; ?>
                        <div><u>N°téléphone:</u><a style="color:blue;" href="tel: <?php echo $values['phone'] ?>"> <?php echo $values['phone'] ?></a></div>
                        <div class="showMe"><a style="color: blue" href="#gmap_canvas" id="maps" data-name="<?php echo $values['name'] ?>">-> Me montrer <-</a></div>
                    </div>
                </article>
                <?php endforeach;?>
            </section>
            <?php endforeach;?>
        </div>


    <?php require 'partials/Gmaps.html' ; ?>
<?php require 'partials/footer.html' ; ?>
</body>
<script type="text/javascript">
    <?php require 'assets/script/script.js'; ?>
</script>
</html>