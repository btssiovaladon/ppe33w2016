<!DOCTYPE html>
<html>
<header>
  <title>Insert tittle</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"></script>
  <script src="js/ajoutAmis.js"></script>
</header>
<body>
  <?php
    if(isset($_GET['amis']))
    {
      $numAmis = substr($_GET['amis'],0,1);
      $pdo->pdo_add_amis_action($numAmis,0);
    }
    $liste = $pdo->pdo_get_participation(0);
    $leader = $pdo->pdo_get_leader_action(0);
   ?>
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
    <input type="hidden" name="action" value="addF">
    <input type="text" class="form-control searchAmis" id="usr" name="amis">
    <input type="submit" name="ajout" value="Ajouter">
  </fieldset>
  </form>
</body>
</html>
