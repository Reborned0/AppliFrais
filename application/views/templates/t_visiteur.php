<?php
	$this->load->helper('url');
	$v_path = base_url('application/views');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="<?php echo $v_path.'/templates/css/styles.css' ?>" rel="stylesheet" type="text/css" />

		<script type="text/javascript">
			function hideNotify() {
				document.getElementById("notify").style.display = "none";
			}
		</script>
<script src="<?= base_url().'Application/JavaScript/JavaS.js'?>" type="text/javascript" ></script>
	</head>

	<body onload="setTimeout(hideNotify,7000);TotalFraisParFrais();calculForfait();CalculOnLoad(TableaudesMontants);">

		<div id="page">
			<div id="entete">
				<img src="<?php echo $v_path.'/templates/images/logo.jpg'?>" id="logoGSB" alt="Laboratoire Galasxy-Swiss Bourdin" title="Laboratoire Galaxy-Swiss Bourdin" />
				<h1>Gestion des frais de déplacements</h1>
			</div>

			<!-- Division pour le menu -->
			<div id="menuGauche">
				<div id="infosUtil">
					<h2></h2>
				</div>

				<ul id="menuList">
					<li>
						<?php
						if($this->session->userdata('etat') == "visiteur"){
								echo "Visiteur :<br/>";
						}

					else{
						echo "Comptable :<br/>";
					}
						 echo $this->session->userdata('prenom')."  ".$this->session->userdata('nom');  ?>

					</li>
					<li class="smenu">
						<?php echo anchor('c_visiteur/', 'Accueil', 'title="Page d\'accueil"'); ?>
					</li>
					<li class="smenu">
						<?php echo anchor('c_visiteur/mesFiches', 'Mes fiches de frais', 'title="Consultation de mes fiches de frais"'); ?>
					</li>
					<li class="smenu">
						<?php echo anchor('c_visiteur/deconnecter', 'Se déconnecter', 'title="Déconnexion"'); ?>
					</li>
				</ul>

			</div>

			<?php echo $body; ?>

			<div id="pied">
				<br/>
			</div>

		</div>

	</body>
</html>
