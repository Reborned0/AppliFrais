<?php
	$this->load->helper('url');
?>
<div id="contenu">
	<h2>Liste des fiches de frais signées à valider</h2>

	<?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>

	<table class="listeLegere">
		<thead>
			<tr>
        <th> IdVisiteur </th>
				<th >Mois</th>
				<th >Etat</th>
				<th >Montant</th>
				<th >Date modif.</th>
			</tr>
		</thead>
		<tbody>

		<?php
			foreach($mesFiches as $uneFiche)
			{

        if($uneFiche['id'] == "CL"){
				echo//MODIFIER ICI
				'<tr>
          <td class="libelle">'.$uneFiche['idVisiteur'].'</td>
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
