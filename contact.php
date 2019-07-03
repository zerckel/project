<?php

?>
<html lang="fr">
<?php require 'partials/head-asset.html' ; ?>
<body>
<?php require 'partials/header.php'; ?>

<div data-name="contact" id="title" class="zIndex-4">
    <h1>
        Formulaire de Contact
    </h1>
</div>
<div id="contact">
    <article class="grey border">
            <div class="choices">
                <div data-icon="contact" class="choice">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" class="svg-inline--fa fa-comments fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="black" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg>
                    <span class="word">Contact</span>
                </div>
                <div data-icon="exclamation" class="choice">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas"  class="svg-inline--fa fa-exclamation-triangle fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="red" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>
                    <span class="word">Signalement</span>
                </div>
            </div>
            <div class="contact">
                <form id="register">
                    <label for="email">Veuillez indiquez votre adresse mail :</label>
                    <input required="required" placeholder="Email" id="email" name="email" type="email">
                    <label for="sujet">Indiquez le sujet de votre message :</label>
                    <input required="required" placeholder="Sujet" id="sujet" name="sujet" type="text">
                    <label for="content">Ecrivez votre message : </label>
                    <textarea required="required" name="content" id="content"></textarea>
                    <button type="submit">Envoi</button>
                    <span id="alert"></span>
                </form>
            </div>
            <div class="exclamation">
                <form id="report">
                    <label for="cat">Selectionner une catégorie :</label>
                    <select id="cat">
                        <option></option>
                        <option>Voirie</option>
                        <option>Signalisation</option>
                        <option value="Espaces">Espaces verts</option>
                        <option>Propreté</option>
                        <option>Autres</option>
                    </select>
                    <label id="Voirie" class="displayNone" for="Voirie">Selectionner une sous-catégorie de voirie</label>
                    <select id="Voirie" class="displayNone">
                        <option></option>
                        <option>Mobiliers</option>
                        <option>Revêtements</option>
                        <option>Signalisations au sol</option>
                        <option>Autres</option>
                    </select>
                    <label id="Signalisation" class="displayNone" for="Signalisation">Selectionner une sous-catégorie de Signalisation</label>
                    <select id="Signalisation" class="displayNone">
                        <option></option>
                        <option>Feux tricolores</option>
                        <option>Panneaux sectorisations</option>
                        <option>Panneaux directionnels</option>
                        <option>Panneaux sectorisations</option>
                        <option>Autres</option>
                    </select>
                    <label id="Espaces" class="displayNone" for="Espaces">Selectionner une sous-catégorie de espaces verts</label>
                    <select id="Espaces" class="displayNone">
                        <option></option>
                        <option>Parcs</option>
                        <option>Squares</option>
                        <option>Aires de jeu</option>
                        <option>Espaces ornementaux</option>
                        <option>Autres</option>
                    </select>
                    <label id="Propreté" class="displayNone" for="Propreté">Selectionner une sous-catégorie de propreté</label>
                    <select id="Propreté" class="displayNone">
                        <option></option>
                        <option>Poubelles</option>
                        <option>Ramassages</option>
                        <option>Dégradations</option>
                        <option>Propreté de la voirie</option>
                        <option>Autre</option>
                    </select>
                    <br/>
                    <label id="labMsg" class="displayNone" for="msg">Indiquez les raisons de ce signalement</label>
                    <input class="displayNone" type="text" placeholder="Votre message.." id="msg">
                    <button id="button" class="displayNone" type="submit">Envoi</button>
                    <span id="info"></span>
                </form>
            </div>
    </article>
</div>

<?php require 'partials/Gmaps.html' ; ?>
<?php require 'partials/footer.html' ; ?>
</body>
<script type="text/javascript">
    <?php require 'assets/script/script.js'; ?>
</script>
</html>