<h2>Modification de l'action : <?php echo $infosAction['nom_action']; ?></h2>
<form method='POST' action='index.php?controleur=c_action&action=a_submitAction'>
<table>
    <tr>
        <td>Ami :</td>
        <td>
            <select name = "idAmis" size = "1">
                <?php
                    $numAmisA = $infosAction['num_amis'];
                    foreach ($listeAmis as $la){
                        $numAmis = $la['num_amis'];
                        $nomAmis = $la['nom_amis'];
                        $prenomAmis = $la['prenom_amis'];
                        $selected = '';
                        if($numAmis == $numAmisA){
                            $selected = "selected=";
                        }
                ?>
                <option <?php echo $selected; ?> value="<?php echo $numAmis; ?>">
                    <?php echo $nomAmis.' '.$prenomAmis; ?>
                </option>
                <?php
                    }
                ?>
        </td>
    </tr>
    <tr>
        <td>Commission :</td>
        <td>
             <select name = "idCommission" size = "1">
                <?php
                    $numCommissionA = $infosAction['num_commission'];
                    foreach ($listeCommission as $lc){
                        $numCommission = $lc['num_commission'];
                        $nomCommission = $lc['nom_commission'];
                        $selected = '';
                        if($numCommission == $numCommissionA){
                            $selected = "selected=";
                        }
                ?>
                <option <?php echo $selected; ?> value="<?php echo $numCommission; ?>">
                    <?php echo $nomCommission; ?>
                </option>
                <?php
                    }
                ?>
        </td>
    </tr>
    <?php
        $numAction = $infosAction['num_action'];
        $nomAction = $infosAction['nom_action'];
        $dureeAction = $infosAction['duree_action'];
        $datedebAction = $infosAction['datedebut_action'];
        $fondscollectesAction = $infosAction['fondscollectes_action'];
    ?>
    <input type='hidden' name='numaction' value='<?php echo $numAction; ?>'/>
    <tr>
        <td>Nom :</td>
        <td><input  type='text' name='nomaction' value='<?php echo $nomAction; ?>' size='30' maxlength='32' required="required"/></td>
    </tr>
    <tr>
        <td>Durée :</td>
        <td><input  type='number' name='dureeaction' value='<?php echo $dureeAction; ?>' size='30' maxlength='3' required="required"/></td>
    </tr>
    <tr>
        <td>Date début :</td>
        <td><input  type='date' name='dateaction' value='<?php echo $datedebAction; ?>' size='30' required="required"/></td>
    </tr>
    <tr>
        <td>Fonds collectés :</td>
        <td><input  type='number' name='fondsaction' value='<?php echo $fondscollectesAction; ?>' size='30' maxlength='2' required="required"/></td>
    </tr>
    <tr>
        <td><input type='reset' value='Annuler' name='annuler'/></td>
        <td><input type='submit' value='Valider' name='valider'/></td>
    </tr>
</table>
</form>