<?php
$nb = nb();
?>
<nav class="col-3 py-2 categories-nav">
    <a class="d-block btn btn-warning mb-4 mt-2" href="../index.php">Site</a>
    <ul>
        <li><a href="?option=user">Gestion des Utilisateurs (<?= $nb[0]; ?>)</a></li>
        <li><a href="?option=bill">Gestion des Factures (<?= $nb[4]; ?>)</a></li>
        <li><a href="?option=event">Gestion des Evenements (<?= $nb[1]; ?>)</a></li>
        <li><a href="?option=service">Gestion des Services (<?= $nb[2]; ?>)</a></li>
        <li><a href="?option=faq">Gestion de la FAQ (<?= $nb[3]; ?>)</a></li>
    </ul>
</nav>