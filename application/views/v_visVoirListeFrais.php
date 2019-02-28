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
					<button style="display: inline;" id="bt1" type="button" onclick="afficher()">Modifier</button>
					<button style="display: none;" id="bt2" type="button" onclick="cache()">Modifier</button>
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

</div>
