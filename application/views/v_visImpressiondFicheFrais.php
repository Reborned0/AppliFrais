<?php
$this->load->helper('url');
?>
<div id="contenu">
  <h2>Imprimer ma fiche de frais du mois <?php echo $numMois."-".$numAnnee; ?></h2>
  <?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>
  <div class="corpsForm">
    <!--startprint-->
    <h1 style="color:grey"><u><?= $this->session->userdata('prenom')."   ". $this->session->userdata('nom')." : " ?></u></h1>


    <h2> Element(s) forfaitisé(s) </h2>
    <table class="listeLegere" style="align:center; width : 90%;">
      <tr>
        <th> Forfais </th>
        <th> Montant </th>
      </tr>
      <?php
      $montantFraisForfait=0;
      foreach ($lesFraisForfait as $unFrais) {
        $idFrais = $unFrais['idfrais'];
        $libelle = $unFrais['libelle'];
        $quantite = $unFrais['quantite'];
        $montantFrais = $unFrais['montantFrais'];
        echo "
        <tr>
        <td>
        ".$libelle."</td><td style='text-align:right'> <span style='align:right;'> ".number_format($montantFrais * $quantite,2)." € </span></tr>";
        $montantFraisForfait+= $montantFrais * $quantite;
      }

      ?>
      <tr>
        <td>
          <b>
            Montant Global :
          </b>
        </td>
        <td style='text-align:right'>
          <b>
            <?= number_format($montantFraisForfait,2)." €" ?>
          </b>
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
      <?php
      $MontantHorsForfait=0;
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
        $MontantHorsForfait+=$montant;
      }
      ?>
      <tr>
        <td class="date"></td>
        <td class="libelle"><b>Montant Total</b></td>
        <td class="montant"><b><?= number_format($MontantHorsForfait,2)." €" ?></b></td>
      </tr>
    </table>

    <h3 align="center"> <output name="result">Le montant total est de : <?= number_format($montantFraisForfait+$MontantHorsForfait,2)?> €</output> </h3>
  </div>
  <!--endprint-->
  <div class="piedForm">
    <input type="button" onclick="doPrint()" value="Imprimer" />
  </div>
</div>
