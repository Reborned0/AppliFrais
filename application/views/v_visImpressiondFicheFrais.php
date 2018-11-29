<?php
$this->load->helper('url');
?>
<div id="contenu">
  <h2>Imprimer ma fiche de frais du mois <?php echo $numMois."-".$numAnnee; ?></h2>
  <?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>
  <div class="corpsForm">
    <h1 style="color:grey"><u><?= $this->session->userdata('prenom')."   ". $this->session->userdata('nom')." : " ?></u></h1>
    <h2> Element forfaitisés </h2>
    <table style="text-align:center; width : 90%;">
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
      ".$libelle."</td><td> <span style='align:right;'> ".$montantFrais * $quantite."</span></tr>";
      $montant+= $montantFrais * $quantite;
    }

     ?>
     <tr>
       <td>
         Montant Global :
       </td>
       <td>
         <?= $montant ?>
       </td>
     </tr>
   </table>
    <h2> Element hors forfais </h2>
  </div>
  <div class="piedForm">
  </div>
</div>
