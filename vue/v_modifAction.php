<h2>Modification de l'action : <?php echo $nomAc; ?></h2>

<table>
    <tr>
        <td>Ami :</td>
        <td>
            <select name = "idAmis" size = "1">
                <option selected><?php echo $nomAmisAction; ?></option>
                <?php
                    foreach ($listeAmis as $la){
                        $numAmis = $la['num_amis'];
                        $nomAmis = $la['nom_amis'];
                        $prenomAmis = $la['prenom_amis'];
                ?>
                <option value="<?php echo $numAmis; ?>">
                    <?php echo $nomAmis.' '.$prenomAmis; ?>
                </option>
                <?php
                    }
                ?>
        </td>
    </tr>
    <tr>
        <td>Commission :</td>
        <td><?php //liste déroulante ?></td>
    </tr>
    <tr>
        <td>Nom :</td>
        <td><input  type='text' name='nomaction'  size='30' maxlength='32'></td>
    </tr>
    <tr>
        <td>Durée :</td>
        <td><input  type='number' name='dureeaction'  size='30' maxlength='3'></td>
    </tr>
    <tr>
        <td>Date début :</td>
        <td><input  type='date' name='dateaction'  size='30'></td>
    </tr>
    <tr>
        <td>Fonds collectés :</td>
        <td><input  type='number' name='fondsaction'  size='30' maxlength='&0'></td>
    </tr>
</table>