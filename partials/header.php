<div class="fog zIndex-6"></div>
<div class="burger zIndex-7">
    <svg aria-hidden="true" color="white" class="svg" id="svg"viewBox="0 0 448 512"><path fill="white" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
    <div class="menu">
        <div class="tab"><a href="index.php">Accueil</a></div>
        <div class="tab"><a href="town.php">La Ville</a></div>
        <div class="tab"><a href="event.php">Evenements</a></div>
        <div class="tab"><a href="faq.php">FAQ</a></div>
        <div class="tab"><a href="contact.php">Contact</a></div>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1): ?>
            <div class="tab"><a href="account.php">Admin</a></div>
        <?php else: ?>
            <div class="tab"><a href="account.php">Mon Compte</a></div>
        <?php endif; ?>
        <a href="index.php?logout">Deconnexion</a>
    </div>
</div>

<header>
    <div class="logo zIndex-5"></div>
    <div class="header">
    </div>
</header>
