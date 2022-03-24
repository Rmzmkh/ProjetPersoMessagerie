<?php
    $bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'root', '');
    if(isset($_POST['valider'])){
        if(!empty($_POST['pseudo']) AND !empty($_POST['message'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $message = nl2br(htmlspecialchars($_POST['message']));


            $insertMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
            $insertMessage->execute(array($pseudo, $message));
        }else {
            ?><div class="alert alert-danger" role="alert">
            Veuillez remplir tous les champs :)
          </div><?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie Instantanée</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel ="stylesheet">
</head>

<body>
<div class="tout">
    <div class="form">
        <form method="POST" action="">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <br><br>

            <div class="textarea">
                <textarea class="areatext" name="message" cols="50" rows="10" placeholder="Chat en ligne"></textarea>
            </div>

            <br>

            <div class="col-12">
                <button class="btn btn-danger" type="submit" name="valider">Envoyer</button>
            </div>    
        </form>
    </div>  
    
    <section id="messages"></section>

    <div class="messagerie">
        <script>
            setInterval('load_messages()', 500);
            function load_messages() {
                $('#messages').load('loadMessages.php');
            }
        </script>
    </div>
</div>
</body>
</html>