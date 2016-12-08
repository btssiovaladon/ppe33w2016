<?php
require('../FPDF/fpdf.php');
require("../include/inc_pdo_amis.php");

class PDF extends FPDF
{

  function Header()
  {
      $pdo = new Pdo_amis();

      $action_details = $pdo->pdo_get_actionSelect(0);
      $actionName = $action_details['nom_action'];
      // Police Arial gras 15
      $this->SetFont('Arial','B',15);
      // Décalage à droite
      $this->Cell(85);
      // Titre
      $this->Cell(30,10,$actionName,1,0,'C');
      // Saut de ligne
      $this->Ln(20);
  }

  // Tableau amélioré
  function ImprovedTable($header)
  {
      $pdo = new Pdo_amis();

      $liste = $pdo->pdo_get_participation(0);
      $leader = $pdo->pdo_get_leader_action(0);

      $this->Cell(0,4,"Liste des participants a l'activite",0,0,'C');

      $this->Ln(15);

      // Largeurs des colonnes
      $w = array(22, 22, 16, 30, 25, 23, 23, 44);
      // En-tête
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C');
      $this->Ln();
      // Données du leader
          $InfosLeader = $pdo->pdo_get_amis_one($leader['num_amis']);

          $this->Cell($w[0],6,$InfosLeader[0]['nom_amis'],'LR');
          $this->Cell($w[1],6,$InfosLeader[0]['prenom_amis'],'LR');
          $this->Cell($w[2],6,'Leader','LR');
          $this->Cell($w[3],6,$InfosLeader[0]['numadresse_amis'].' '.$InfosLeader[0]['adresserue_amis'],'LR');
          $this->Cell($w[4],6,$InfosLeader[0]['adresseville_amis'],'LR');
          $this->Cell($w[5],6,$InfosLeader[0]['telephonefixe_amis'],'LR');
          $this->Cell($w[6],6,$InfosLeader[0]['telephoneportable_amis'],'LR');
          $this->Cell($w[7],6,$InfosLeader[0]['email_amis'],'LR');

          $this->Ln();

          for ($i=0; $i < sizeof($liste); $i++)
          {
            $InfosLeader = $pdo->pdo_get_amis_one($liste[$i]['num_amis']);

            $this->Cell($w[0],6,$InfosLeader[0]['nom_amis'],'LR');
            $this->Cell($w[1],6,$InfosLeader[0]['prenom_amis'],'LR');
            $this->Cell($w[2],6,'Particip.','LR');
            $this->Cell($w[3],6,$InfosLeader[0]['numadresse_amis'].' '.$InfosLeader[0]['adresserue_amis'],'LR');
            $this->Cell($w[4],6,$InfosLeader[0]['adresseville_amis'],'LR');
            $this->Cell($w[5],6,$InfosLeader[0]['telephonefixe_amis'],'LR');
            $this->Cell($w[6],6,$InfosLeader[0]['telephoneportable_amis'],'LR');
            $this->Cell($w[7],6,$InfosLeader[0]['email_amis'],'LR');

            $this->Ln();
          }
      // Trait de terminaison
      $this->Cell(array_sum($w),0,'','T');
  }

}

$pdf = new PDF();

// Titres des colonnes
$header = array('Nom', 'Prenom', 'Role', 'Adresse', 'Ville', 'Fixe', 'Portable', 'adresse mail');
$pdf->SetFont('Arial','',10);
$pdf->SetMargins(2,10,0);
$pdf->AddPage();
$pdf->ImprovedTable($header);

$pdf->Output();
?>
