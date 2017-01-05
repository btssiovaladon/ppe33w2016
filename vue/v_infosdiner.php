<html>
<body>

  <?php
$nouveau=ajouterNewDiner();

foreach ($nouveau as $repas) {

$_LieuDiner=$_POST[$repas->'LIEU_DINER'];
$_DateDîner=$_POST[$repas->'DATE_DINER'];
$_DateDîner=$_POST[$repas->'PRIXDINER_DINER'];

}
?>
</body>

</html>
