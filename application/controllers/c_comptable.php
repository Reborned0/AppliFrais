<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Contrôleur du module VISITEUR de l'application
*/
class C_comptable extends CI_Controller {

	/**
	* Aiguillage des demandes faites au contrôleur
	* La fonction _remap est une fonctionnalité offerte par CI destinée à remplacer
	* le comportement habituel de la fonction index. Grâce à _remap, on dispose
	* d'une fonction unique capable d'accepter un nombre variable de paramètres.
	*
	* @param $action : l'action demandée par le visiteur
	* @param $params : les éventuels paramètres transmis pour la réalisation de cette action
	*/
	public function _remap($action, $params = array())
	{
		// chargement du modèle d'authentification
		$this->load->model('authentif');

		// contrôle de la bonne authentification de l'utilisateur
		if (!$this->authentif->estConnecte())
		{
			// l'utilisateur n'est pas authentifié, on envoie la vue de connexion
			$data = array();
			$this->templates->load('t_connexion', 'v_connexion', $data);
		}
		else
		{
			// Aiguillage selon l'action demandée
			// CI a traité l'URL au préalable de sorte à toujours renvoyer l'action "index"
			// même lorsqu'aucune action n'est exprimée
			if ($action == 'index')				// index demandé : on active la fonction accueil du modèle visiteur
			{

				$this->load->model('a_comptable');

				// on n'est pas en mode "modification d'une fiche"
				$this->session->unset_userdata('mois');

				$this->a_comptable->accueil();
			}
			elseif ($action == 'mesFiches')		// mesFiches demandé : on active la fonction mesFiches du modèle visiteur
			{
				$this->load->model('a_comptable');

				// on n'est pas en mode "modification d'une fiche"
				$this->session->unset_userdata('mois');

				$idVisiteur = $this->session->userdata('idUser');

				$this->a_comptable->mesFiches($idVisiteur);
			}
			elseif ($action == 'suiviFiches') {

				$this->load->model('a_comptable');

				$this->a_comptable->suiviFiches();

			}
			elseif ($action == 'voirFicheSuivi') {
				$this->load->model('a_comptable');
				$this->load->model('dataaccess');

				$mois = $params[0];

				$this->session->set_userdata('mois', $mois);

				$idVisiteur = $_GET['idVisi'];
				$this->dataaccess->getMontantFrais($idVisiteur,$mois);
				$this->a_comptable->voirFicheSuivi($idVisiteur, $mois);
			}
			elseif ($action == 'synthese') {
				$this->load->model('a_comptable');

				$idVisiteur = $_GET['idVisi'];

				$mois = $this->session->userdata('mois');

				$this->a_comptable->synthese($idVisiteur, $mois);
			}
			elseif ($action == 'misePaiement') {
				$this->load->model('a_comptable');

				$idVisiteur = $_GET['idVisi'];

				$mois = $this->session->userdata('mois');

				$this->a_comptable->mpFicheVisi($idVisiteur, $mois);
			}
			elseif ($action == 'rembourserFicheVisi') {
				$this->load->model('a_comptable');

				$idVisiteur = $_GET['idVisi'];

				$mois = $this->session->userdata('mois');

				$this->a_comptable->rembourserFicheVisi($idVisiteur, $mois);
			}
			elseif ($action == 'deconnecter')	// deconnecter demandé : on active la fonction deconnecter du modèle authentif
			{
				$this->load->model('authentif');
				$this->authentif->deconnecter();
			}
			elseif ($action == 'voirFiche')		// voirFiche demandé : on active la fonction voirFiche du modèle authentif
			{	// TODO : contrôler la validité du second paramètre (mois de la fiche à consulter)

				$this->load->model('a_comptable');
				$this->load->model('dataaccess');


				// obtention du mois de	 la fiche à modifier qui doit avoir été transmis
				// en second paramètre
				$mois = $params[0];
				// mémorisation du mode modification en cours
				// on mémorise le mois de la fiche en cours de modification
				$this->session->set_userdata('mois', $mois);

				// obtention de l'id de l'utilisateur de la fiche
				$idVisiteur = $_GET['idVisi'];
				$this->dataaccess->getMontantFrais($idVisiteur,$mois);
				$this->a_comptable->voirFiche($idVisiteur, $mois);
			}
			elseif ($action == 'modFiche')		// modFiche demandé : on active la fonction modFiche du modèle authentif
			{	// TODO : contrôler la validité du second paramètre (mois de la fiche à modifier)

				$this->load->model('a_comptable');

				// obtention du mois de la fiche à modifier qui doit avoir été transmis
				// en second paramètre
				$mois = $params[0];
				// mémorisation du mode modification en cours
				// on mémorise le mois de la fiche en cours de modification
				$this->session->set_userdata('mois', $mois);
				// obtention de l'id utilisateur courant
				$idVisiteur = $this->session->userdata('idUser');

				$this->a_comptable->modFiche($idVisiteur, $mois);
			}
			elseif ($action == 'signeFiche') 	// signeFiche demandé : on active la fonction signeFiche du modèle visiteur ...
			{	// TODO : contrôler la validité du second paramètre (mois de la fiche à modifier)
				$this->load->model('a_comptable');

				// obtention du mois de la fiche à signer qui doit avoir été transmis
				// en second paramètre
				$mois = $params[0];
				// obtention de l'id utilisateur courant et du mois concerné
				$idVisiteur = $this->session->userdata('idUser');
				$this->a_comptable->signeFiche($idVisiteur, $mois);

				// ... et on revient à mesFiches
				$this->a_comptable->mesFiches($idVisiteur, "La fiche $mois a été signée. <br/>Pensez à envoyer vos justificatifs afin qu'elle soit traitée par le service comptable rapidement.");
			}
			elseif ($action == 'majForfait') // majFraisForfait demandé : on active la fonction majFraisForfait du modèle visiteur ...
			{	// TODO : conrôler que l'obtention des données postées ne rend pas d'erreurs
				// TODO : dans la dynamique de l'application, contrôler que l'on vient bien de modFiche

				$this->load->model('a_comptable');

				// obtention de l'id du visiteur et du mois concerné
				$idVisiteur = $_GET['idVisi'];

				$mois = $this->session->userdata('mois');

				// obtention des données postées
				$lesFrais = $this->input->post('lesFrais');

				$this->a_comptable->majForfait($idVisiteur, $mois, $lesFrais);

				// ... et on revient en modification de la fiche
				$this->a_comptable->modFiche($idVisiteur, $mois, 'Modification(s) des éléments forfaitisés enregistrée(s) ...');
			}
			elseif ($action == 'validerFicheVisi') {

				$this->load->model('a_comptable');

				$idVisiteur = $_GET['idVisi'];

				$mois = $this->session->userdata('mois');

				$this->a_comptable->validerFicheVisi($idVisiteur, $mois);

			}
			elseif ($action == 'refuserFicheVisi') {

				$this->load->model('a_comptable');

				$idVisiteur = $_GET['idVisi'];

				$mois = $this->session->userdata('mois');

				$this->a_comptable->refuserFicheVisi($idVisiteur, $mois);
			}
			elseif ($action == 'ajouteFrais') // ajouteLigneFrais demandé : on active la fonction ajouteLigneFrais du modèle visiteur ...
			{	// TODO : conrôler que l'obtention des données postées ne rend pas d'erreurs
				// TODO : dans la dynamique de l'application, contrôler que l'on vient bien de modFiche

				$this->load->model('a_comptable');

				// obtention de l'id du visiteur et du mois concerné
				$idVisiteur = $this->session->userdata('idUser');
				$mois = $this->session->userdata('mois');

				// obtention des données postées
				$uneLigne = array(
					'dateFrais' => $this->input->post('dateFrais'),
					'libelle' => $this->input->post('libelle'),
					'montant' => $this->input->post('montant')
				);

				$this->a_comptable->ajouteFrais($idVisiteur, $mois, $uneLigne);

				// ... et on revient en modification de la fiche
				$this->a_comptable->modFiche($idVisiteur, $mois, 'Ligne "Hors forfait" ajoutée ...');
			}
			elseif ($action == 'supprFrais') // suppprLigneFrais demandé : on active la fonction suppprLigneFrais du modèle visiteur ...
			{	// TODO : contrôler la validité du second paramètre (mois de la fiche à modifier)
				// TODO : dans la dynamique de l'application, contrôler que l'on vient bien de modFiche

				$this->load->model('a_comptable');

				// obtention de l'id du visiteur et du mois concerné
				$idVisiteur = $this->session->userdata('idUser');
				$mois = $this->session->userdata('mois');

				// Quel est l'id de la ligne à supprimer : doit avoir été transmis en second paramètre
				$idLigneFrais = $params[0];
				$this->a_comptable->supprLigneFrais($idVisiteur, $mois, $idLigneFrais);

				// ... et on revient en modification de la fiche
				$this->a_comptable->modFiche($idVisiteur, $mois, 'Ligne "Hors forfait" supprimée ...');
			}
			elseif ($action == 'majMontantFrais') {
				// majFraisForfait demandé : on active la fonction majFraisForfait du modèle visiteur ...
				// TODO : conrôler que l'obtention des données postées ne rend pas d'erreurs
				// TODO : dans la dynamique de l'application, contrôler que l'on vient bien de modFiche

				$this->load->model('a_comptable');

				// obtention de l'id du visiteur et du mois concerné
				$idVisiteur = $_GET['idVisi'];

				$mois = $this->session->userdata('mois');

				// obtention des données postées
				$lesFrais = $this->input->post('Resul');

				 $this->a_comptable->majMontantFrais($idVisiteur, $mois, $lesFrais);

				// ... et on revient en modification de la fiche
				$this->a_comptable->modFiche($_GET['idVisi'], $mois, 'Modification(s) des éléments forfaitisés enregistrée(s) ...');
			}
			else								// dans tous les autres cas, on envoie la vue par défaut pour l'erreur 404
			{
				show_404();
			}
		}
	}
}
