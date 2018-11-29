<?php
$this->load->helper('url');
?>
<div id="contenu">
  <h2>Imprimer ma fiche de frais du mois <?php echo $numMois."-".$numAnnee; ?></h2>
  <?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>
  <div class="corpsForm">
    <h1 style="color:grey"><u><?= $this->session->userdata('prenom')."   ". $this->session->userdata('nom')." : " ?></u></h1>


    <h2> Element(s) forfaitisé(s) </h2>
    <table class="listeLegere" style="align:center; width : 90%;">
      <?php
      $montant=0;
      foreach ($lesFraisForfait as $unFrais) {
        $idFrais = $unFrais['idfrais'];
        $libelle = $unFrais['libelle'];
        $quantite = $unFrais['quantite'];
        $montantFrais = $unFrais['montantFrais'];
        echo "
        <tr>
        <td>
        ".$libelle."</td><td style='text-align:right'> <span style='align:right;'> ".$montantFrais * $quantite." € </span></tr>";
        $montant+= $montantFrais * $quantite;
      }

      ?>
      <tr>
        <td>
          Montant Global :
        </td>
        <td style='text-align:right'>
          <?= $montant." €" ?>
        </td>
      </tr>
    </table>
    <h2> Element(s) hors forfais </h2>
    <table class="listeLegere">
      <tr>
    		<th >Date</th>
    		<th >Libellé</th>
    		<th >Montant</th>
    	</tr>
    <?php $total2=0;
    foreach( $lesFraisHorsForfait as $unFraisHorsForfait)
    {
      $libelle = $unFraisHorsForfait['libelle'];
      $date = $unFraisHorsForfait['date'];
      $montant=$unFraisHorsForfait['montant'];
      $id = $unFraisHorsForfait['id'];

      echo
  		'<tr>
  		<td class="date">'.$date.'</td>
  		<td class="libelle">'.$libelle.'</td>
  		<td class="montant">'.$montant.' €</td>

  		</tr>';
  		$total2+=$montant;
  	}
  	?>
  	<tr>
  		<td class="date"></td>
  		<td class="libelle"><b>Montant Total</b></td>
  		<td class="montant"><b><?= number_format($total2,2)." €" ?></b></td>
  	</tr>
  </table>
  <output onload="Calcul()" name="result"></output>
  </div>
  <div class="piedForm">
  </div>
</div>
