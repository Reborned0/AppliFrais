<?php
$this->load->helper('url');
?>
<div id="contenu">
  <h2>Synthèse de la fiche du mois <?php echo $numMois."-".$numAnnee; ?> de <b><u><?= $this->session->userdata('nom')." ".$this->session->userdata('prenom') ?></u></b></h2>
  <?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>
  <div class="corpsForm">
    <!--startprint-->

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
  <div id="finPage">
  <?php
  if ($_GET['idEtat'] == 'VA') {?>
    <form method="post"  action="<?= base_url("c_comptable").'/misePaiement/'.$this->session->userdata('mois')."?idVisi=".$_GET['idVisi'];?>">
      <input onclick="return confirm('Voulez-vous vraiment mettre en paiement ?')" type="submit" id="misePaiement" name="misePaiement" value="Mettre en paiement">
    </form>
    <?php
  }
  else {?>
    <form method="post"  action="<?= base_url("c_comptable").'/rembourserFicheVisi/'.$this->session->userdata('mois')."?idVisi=".$_GET['idVisi'];?>">
      <input onclick="return confirm('Voulez-vous vraiment rembourser ?')" type="submit" id="misePaiement" name="misePaiement" value="Rembourser">
    </form>
    <?php
  }
  ?>
</div>
</div>
