<?php
	$this->load->helper('url');
?>
<div id="contenu">
	<h2>Liste de mes fiches de frais</h2>
	<script src="<?= base_url().'Application/JavaScript/JavaS.js'?>" type="text/javascript" ></script>
	<?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>

	<table class="listeLegere">
		<thead>
			<tr>
				<th >Mois</th>
				<th >Etat</th>
				<th >Montant</th>
				<th >Date modif.</th>
					<th  colspan="4">Actions</th>
			</tr>
		</thead>
		<tbody>

		<?php
			foreach( $mesFiches as $uneFiche)
			{
				$modLink = '';
				$signeLink = '';

				if ($uneFiche['id'] == 'CR') {
					$modLink = anchor('c_visiteur/modFiche/'.$uneFiche['mois'], 'modifier',  'title="Modifier la fiche"');
					$signeLink = anchor('c_visiteur/signeFiche/'.$uneFiche['mois'], 'signer',  'title="Signer la fiche"  onclick="return confirm(\'Voulez-vous vraiment signer cette fiche ?\');Expiration('.$uneFiche['mois'].')"');


					echo
					'<tr>
						<td class="date">'.anchor('c_visiteur/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
						<td class="libelle">'.$uneFiche['libelle'].'</td>
						<td class="montant">'.$uneFiche['montantValide'].'</td>
						<td class="date">'.$uneFiche['dateModif'].'</td>
						<td class="action">'.$modLink.'</td>
						<td class="action">'.$signeLink.'</td>
					</tr>';
				}
				elseif ($uneFiche['id'] == 'CL') {
					$modLink= anchor('c_visiteur/imprimeFiche/'.$uneFiche['mois'], 'Impression', 'Imprimer une fiche de frais');
					echo
					'<tr>
						<td class="date">'.anchor('c_visiteur/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
						<td class="libelle">'.$uneFiche['libelle'].'</td>
						<td class="montant">'.$uneFiche['montantValide'].'</td>
						<td class="date">'.$uneFiche['dateModif'].'</td>
						<td colspan="4" class="action">'.$modLink.'</td>
					</tr>';
				}elseif ($uneFiche['id']== 'RB') {
					echo
					'<tr>
						<td class="date">'.anchor('c_visiteur/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
						<td class="libelle">'.$uneFiche['libelle'].'</td>
						<td class="montant">'.$uneFiche['montantValide'].'</td>
						<td class="date">'.$uneFiche['dateModif'].'</td>
					</tr>';
				}elseif ($uneFiche['id'] == 'EX') {
					echo '<tr>
						<td class="date">'.anchor('c_visiteur/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
						<td class="libelle">'.$uneFiche['libelle'].'</td>
						<td class="montant">'.$uneFiche['montantValide'].'</td>
						<td class="date">'.$uneFiche['dateModif'].'</td>
					</tr>';
				}elseif ($uneFiche['id'] == 'RF') {
					echo '<tr>
						<td class="date">'.anchor('c_visiteur/voirFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
						<td class="libelle">'.$uneFiche['libelle'].'</td>
						<td class="montant">'.$uneFiche['montantValide'].'</td>
						<td class="date">'.$uneFiche['dateModif'].'</td>
					</tr>';
				}



			}
		?>
		</tbody>
    </table>

</div>
