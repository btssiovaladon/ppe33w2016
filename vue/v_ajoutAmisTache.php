<!DOCTYPE html>
<html>
<?php
$message = " ";
$numAction = $_GET['num_action'];

if(isset($_GET['amis']))
{
  $count = 0;

  for ($i=0; $i < strlen($_GET['amis']); $i++)
  {
    $carac = substr($_GET['amis'],$i,1);

    if(is_numeric($carac))
    {
      $count++;
    }
    else
    {
      break;
    }
  }

  $numAmis = substr($_GET['amis'],0,$count);

  if(is_numeric($numAmis))
  {
      $existe = $pdo->pdo_check_existence_ami_action($numAmis,$numAction);

      if($existe['nbOccurence'] == 0)
      {
        $leader = $pdo->pdo_get_leader_action($numAction);

        if($numAmis != $leader['num_amis'])
        {
          $pdo->pdo_add_amis_action($numAmis,$numAction);
          $message = "L'amis a été ajouté avec succès! ";
        }
        else
        {
          $message = "L'amis est le chef de l'Action !";
        }
      }
      else
      {
        $message = "L'amis a déjà été ajouté a l'Action !";
      }
  }
  else
  {
    $message = "Veuillez entrer un numéro d'AMI valide ou utiliser l'auto-completion !";
  }
}

$action_details = $pdo->pdo_get_actionSelect($numAction);
$actionName = $action_details['nom_action'];

$liste = $pdo->pdo_get_participation($numAction);
$leader = $pdo->pdo_get_leader_action($numAction);
?>

<header>
  <title><?php echo  $actionName; ?> - Ajout AMIS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"></script>
  <script src="js/ajoutAmis.js"></script>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</header>

<body>

   <h2><?php echo  $actionName; ?></h2>

   <h3><?php echo $message; ?></h3>

  <table border="1">
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Role</th>
    </tr>
    <?php
      $amis = $pdo->pdo_get_name_amis($leader['num_amis']);
     ?>
    <tr>
      <td><?php echo $amis['nom_amis']; ?></td>
      <td><?php echo $amis['prenom_amis']; ?></td>
      <td>Chef</td>
    </tr>
    <?php
    for ($i=0; $i < sizeof($liste); $i++) {
      $amis = $pdo->pdo_get_name_amis($liste[$i]['num_amis']);
    ?>
    <tr>
      <td><?php echo $amis['nom_amis']; ?></td>
      <td><?php echo $amis['prenom_amis']; ?></td>
      <td>Participant</td>
    </tr>
    <?php
    }
    ?>
  </table>

  <form action="index.php?controleur=c_action&action=addF&add=1" method="get">
    <fieldset>
      <legend>Ajout</legend>

      <input type="hidden" name="controleur" value="c_action">
      <input type="hidden" name="action" value="a_addAmi_action">
      <input type="hidden" name="num_action" value="<?php echo $numAction; ?>">
      <input type="text" class="form-control searchAmis" id="usr" name="amis">
      <input type="submit" name="ajout" value="Ajouter">

    </fieldset>
  </form>
</body>

</html>
