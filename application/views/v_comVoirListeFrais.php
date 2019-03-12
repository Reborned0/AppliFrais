<?php
$this->load->helper('url');
?>

<div id="contenu">
  <h2>Renseigner ma fiche de frais du mois <?php echo $numMois."-".$numAnnee; ?></h2>


  <div class="corpsForm">

    <fieldset>
      <legend>Eléments forfaitisés</legend>
      <table style="text-align: left; width : 90%; ">
        <script type="text/javascript">
        var TableaudesMontants = new Array();
        </script>
        <form method="post"  action="<?php echo base_url("c_comptable/majForfait?idVisi=".$_GET['idVisi']);?>">
          <?php
          $i=0;

          foreach ($lesFraisForfait as $unFrais)
          {
            ?>
            <tr>
              <td> <?php
              $idFrais = $unFrais['idfrais'];
              $libelle = $unFrais['libelle'];
              $quantite = $unFrais['quantite'];

              echo "<script type='text/javascript'>
              TableaudesMontants['$idFrais']='$unFrais[montantFrais]';
              </script>";

              echo
              '<p>
              <label for="'.$idFrais.'">'.$libelle.'</label>
              <input disabled type="text"  class="SearchAlpha" id="'.$idFrais.'" name="lesFrais['.$idFrais.']" size="10" maxlength="5" value="'.$quantite.'" />
              </p>
              ';
              ?>
            </td>
            <td> <?php
            echo '
            <p>
            <label>Résultat </label>
            <input disabled type="text" class="ApplicationCalcul" id="Resul'.$idFrais.'" size="10" maxlength="5" value="">
            ';
            $i++;
            ?></td>
          </tr><?php
        }
        ?>
        <tr>
          <td>
            <?php
            echo
            '<p>
            <label>Total </label>
            <input disabled type="text" name="Total" id="Total" size="10" maxlength="5" value="" />
            </p>
            ';
            ?>
            <td><?php
            echo
            '<p>
            <label>Total </label>
            <input disabled type="text" name="TotalFrais" id="TotalFrais" size="10" maxlength="5" value="" />
            </p>
            ';
            ?>
          </td>
          <td>

            <input style="display: none" type="submit" id="validerModif" name="validerModif" value="Enregistrer"></form>
            <button onclick="deverouille()" id="modifModif">Modifier</button>
          </td>
        </tr>

      </table>
    </fieldset>
    <p></p>
  </div>


  <table class="listeLegere">
    <caption>Descriptif des éléments hors forfait</caption>
    <tr>
      <th >Date</th>
      <th >Libellé</th>
      <th >Montant</th>
      <!-- <th >&nbsp;</th> -->
    </tr>

    <?php
    $total=0;
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
      <td class="montant">'.$montant.' €</td>'/*
      <td class="action">'.
      anchor(	"c_visiteur/supprFrais/$id",
      "Supprimer ce frais",
      'title="Suppression d\'une ligne de frais" onclick="return confirm(\'Voulez-vous vraiment supprimer ce frais ?\');"'
      ).
      '</td>*/
      .'</tr>';
      $total+=$montant;
    }
    ?>
    <tr>
      <td class="date"></td>
      <td class="libelle"><b>Montant Total</b></td>
      <td class="montant"><b><?= number_format($total,2)." €" ?></b></td>
    </tr>
  </table>

  <div id="finPage">
    <form method="post"  action="<?php echo base_url("c_comptable/majForfait");?>">
      <input type="submit" id="validerFiche" name="validerFiche" value="Valider">
      <input type="submit" id="refuserFiche" name="refuserFiche" value="Refuser">
  </div>

</div>
