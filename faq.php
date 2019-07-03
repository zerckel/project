<?php
require 'partials/tools.php';

$db = db();

$query = $db->query('SELECT * FROM g_faq');
$gFaqs = $query->fetchAll();
$faqs = array();
foreach ($gFaqs as $key => $value){
    $query = $db->prepare('SELECT * FROM faq WHERE category = :id');
    $query->execute(
        [
            'id' => $value['faq_id']
        ]
    );
    $faqs[$key] = $query->fetchAll();
}

?>

<html lang="fr">
<?php require 'partials/head-asset.html' ; ?>
<body>
<?php require 'partials/header.php'; ?>
<div data-name="faq" id="title" class="zIndex-4">
    <h1>
        Ville de Saint-gratien
    </h1>
</div>
<div id="faq">
    <div class="pics url-2 zIndex-1"></div>
    <div class="bgc grey"></div>
        <section>
            <div class="hoofdband zIndex-1">
                Foire aux questions
            </div>
                <article class="grey border">
                    <div class="article">
                    <?php foreach ($faqs as $keys => $faq): ?>
                    <div class="title"><?= $gFaqs[$keys]['Name'] ?></div>
                    <?php foreach ($faq as $Q_A):?>
                            <div class="question"><?php echo $Q_A['question']?></div>
                            <div class="answer"><?php echo $Q_A['answer']?></div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </div>

                </article>
        </section>
</div>
<?php require 'partials/Gmaps.html' ; ?>
<?php require 'partials/footer.html' ; ?>
</body>
<script type="text/javascript">
    <?php require 'assets/script/script.js'; ?>
</script>
</html>
