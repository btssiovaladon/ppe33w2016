<!DOCTYPE html>
<html lang="fr">
<!-- <html lang="en"> -->
<head>
  <title>C.D.A ✭✭✭✭✭</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/entete.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/footer.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="./js/sweetalert-master/dist/sweetalert.min.js"></script>
	<link href="./js/sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css" />
 
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="btn btn-danger navbar-btn">C.D.A ✭✭✭✭✭</button>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Accueil</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Amis<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?controleur=c_amis&action=a_ajoutAmis">Ajouter un(e) ami(e)</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Modifier un(e) ami(e)</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Supprimer un(e) ami(e)</a></li>
        </ul>
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Comissions <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Consulter les membres</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Ajouter une comission</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Modifier une comission</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Supprimer une comission</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Inscrire un(e) ami(e)</a></li>
        </ul>
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Actions<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?controleur=c_action&action=a_choix_action">Saisir une action</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Modifier une action</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Supprimer une action</a></li>
          <li><a href="#">Inscrire un(e) ami(e) à une action </a></li>
          <li><a href="index.php?controleur=c_&action=a_">Edition de la liste des participants par action</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Consulter les membres de l'action</a></li>
        </ul>
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Finances <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?controleur=c_Cotisation&action=a_Cotisation">Saisie de la cotisation annuelle</a></li>
          <li><a href="index.php?controleur=c_releve_annuel&action=a_impression">Edition du relevé annuel</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Saisie du règlement d'un ami</a></li>
        </ul>
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Diners <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Edition de la liste des participants à un diner</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Consulter les participants</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Création d'un diner</a></li>
          <li><a href="index.php?controleur=c_diner&action=a_modifDiner">Modification d'un diner</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Suppression d'un diner</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Inscription à un diner</a></li>
        </ul>
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Bureaux<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?controleur=c_comission&action=a_choixComission">Saisir un bureau</a></li>
          <li><a href="index.php?controleur=c_&action=a_">Modifier un bureau</a></li>
        </ul>
      </li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
    </ul>
  </div>
</nav>
