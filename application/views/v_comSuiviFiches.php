<?php
	$this->load->helper('url');
?>
<div id="contenu">
	<h2>Liste de suivi des fiches Validées et Mise en paiement</h2>

	<?php if(!empty($notify)){ echo '<p id="notify" >'.$notify.'</p>';}?>

	<table class="listeLegere">
    <tr>
      <td>
	       <table class="listeLegere">

            <tr>
              <th >Mois</th>
              <th >Etat</th>
              <th >Montant</th>
            </tr>


            <?php
              foreach($fichesVaMp as $uneFiche)
              {
                echo//MODIFIER ICI
                '<tr>
                  <td class="date">'.$uneFiche['mois'].'</td>
                  <td class="libelle">'.$uneFiche['idEtat'].'</td>
                  <td class="montant">'.$uneFiche['montantValide'].'</td>

                </tr>';

              }
            ?>

        </table>
      </td>
      <td>
	       <table class="listeLegere">
          <tr>
            <th >Mois</th>
            <th >Etat</th>
            <th >Montant</th>

          </tr>
        </table>
      </td>
    </tr>
  </table>


</div>
