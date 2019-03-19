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
						if ($uneFiche['idEtat'] == "VA") {
							$mois = $uneFiche['mois'];
							$etat = $uneFiche['idEtat'];
							$montant = $uneFiche['montantValide'];

							echo//MODIFIER ICI
							'<tr>
							<td class="date">'.$mois.'</td>
							<td class="libelle">'.$etat.'</td>
							<td class="montant">'.$montant.' €</td>'

							.'</tr>';

						}
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

					<?php
					foreach($fichesVaMp as $uneFiche)
					{
						if ($uneFiche['idEtat'] == "MP") {
							$mois = $uneFiche['mois'];
							$etat = $uneFiche['idEtat'];
							$montant = $uneFiche['montantValide'];

							echo//MODIFIER ICI
							'<tr>
							<td class="date">'.$mois.'</td>
							<td class="libelle">'.$etat.'</td>
							<td class="montant">'.$montant.' €</td>'

							.'</tr>';
						}
					}
					?>

				</table>
			</td>
		</tr>
	</table>


</div>
