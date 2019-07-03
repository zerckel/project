<?php
require 'partials/tools.php';

if(isset($_GET['logout']) && isset($_SESSION['user'])){
    unset($_SESSION["user"]);
}

$db = db();

$query = $db->query("SELECT * FROM event WHERE published_at <= NOW() AND is_published = '1' ORDER BY published_at DESC LIMIT 3");
$event = $query->fetchAll();


?>
<html lang="fr">
<?php require 'partials/head-asset.html' ; ?>
<body>
    <?php require 'partials/header.php'; ?>
    <div data-name="accueil" id="title" class="zIndex-4">
        <h1>
            Ville de Saint-gratien
        </h1>
    </div>
    <div class=" url-4" id="core">
        <div class="grey home">

        <div class="modal zIndex-9">
            <div class="content border">

                <div class="title padding">
                </div>
                <div class="date padding"><b><u>Date :</u></b></div>
                <div class="place padding"><b><u>Lieux :</u></b><br/></div>
                <div class="description padding"><b><u>Description :</u></b><br/></div>
            </div>
        </div>
        <div class=" swiper-container">
            <div class="hoofdband zIndex-3">
                > Evenements
            </div>
            <div class="swiper-wrapper">
                <?php foreach($event as $key => $value ): ?>
                <div class="swiper-slide" data-hash="event1" style="background-repeat: no-repeat; background-size: cover; background-image: url('assets/img/<?php echo $value['pics']?>');">
                    <article>
                        <div data-place="<?php echo $value['place'] ?>" data-content="<?php echo $value['content'] ?>" data-date="<?php echo $value['date'] ?>" class="slider">
                            <h1>
                                <?php echo $value['title'] ?>
                            </h1>
                            <section>
                                <?php echo $value['summary'] ?>
                            </section>
                            <a><u>+ D'Infos</u></a>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"  y="45px"
                    viewBox="0 0 473.654 400" xml:space="preserve">
                    <circle style="fill:#49A0AE;" cx="236.827" cy="236.827" r="236.827"/>
                    <path style="fill:#FFFFFF;" d="M333.577,219.408c-35.885-35.885-71.77-71.766-107.659-107.651 c-25.564-25.56-65.084,14.259-39.456,39.883c29.236,29.236,58.479,58.476,87.719,87.712c-29.315,29.307-58.625,58.618-87.929,87.925 c-25.564,25.56,14.255,65.08,39.879,39.456c35.889-35.885,71.774-71.77,107.659-107.655 C344.635,248.237,344.34,230.171,333.577,219.408z"/>

                </svg>
            </div>
            <div class="swiper-button-prev">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                  viewBox="0 0 475.558 800" xml:space="preserve">
                <circle style="fill:#49A0AE;" cx="237.779" cy="237.779" r="237.779"/>
                    <path style="fill:#FFFFFF;" d="M214.181,240.332c29.429-29.425,58.857-58.853,88.278-88.278
	c25.666-25.663-14.316-65.341-40.039-39.615c-36.029,36.029-72.055,72.055-108.084,108.084
	c-10.888,10.885-10.588,29.023,0.214,39.829c36.029,36.029,72.055,72.058,108.084,108.087
	c25.666,25.666,65.345-14.316,39.615-40.043C272.888,299.039,243.535,269.686,214.181,240.332z"/>
                </svg>
            </div>
        </div>
        </div>
    </div>



    <?php require 'partials/Gmaps.html' ; ?>
    <?php require 'partials/footer.html' ; ?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.js"></script>
<script type="text/javascript">
    <?php require 'assets/script/script.js'; ?>
</script>
</html>