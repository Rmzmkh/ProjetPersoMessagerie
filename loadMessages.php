<?php
$bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'root', '');
$recupMessages = $bdd->query('SELECT * FROM messages');
while($message = $recupMessages->fetch()){
    ?>
    <div class="message">
        <div class="messagerie">
            <div id="pseudo-couleur">
                <h4><?= $message['pseudo']; ?></h4>
            </div>
                <p><?= $message['message']; ?></p>
        </div>
    </div>
    <?php
}
?>