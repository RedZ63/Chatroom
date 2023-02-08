<?php
    session_start();
    //Création d'une session
    if(isset($_POST['username'])){
      $_SESSION['username']=$_POST['username'];


    }

    //Déconnexion de l'utilisateur
    if(isset($_GET['logout'])){
         unset($_SESSION['username']);

        header('Location:index.php');
    }
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

   <title>Chat GPT 2.0 page de chat</title>
</head>
<body>
<header class="header">
        <h1 class="h1">Chat GPT 2.0</h1>
        <?php if(isset($_SESSION['username'])) { ?>
          <a class='deconnexion' href="?logout">Déconnexion</a>
<?php } ?>
    </header>

<div class="container2">

<?php


if(isset($_POST['message'])){
$_SESSION['message'][] = array($_SESSION['username'],$_POST['message']);



foreach($_SESSION['message'] as $message) {
    echo $message[0], " : ", $message[1], '<br>';
}


}

 ?>
</div>
<div class="container3">

<form method="POST" action="chatPage.php">
            <input type="text" placeholder="Entrez votre message ici" name="message" class="input2">
            <button type="submit" class="btn2">Envoyer</button>
</form>
</div>

</div>

</body>
</html>