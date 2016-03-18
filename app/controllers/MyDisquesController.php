<?php

class MyDisquesController extends \ControllerBase {
	/**
	 * Affiches les disques de l'utilisateur
	 */
	public function indexAction(){
		//TODO 4.2
		$bootstrap=$this->jquery->bootstrap();
		//$bootstrap->HtmlGlyphButton("glButton1","btn-primary glyphicon-plus ","Créer un disque");


		$bootstrap->htmlButton("glButton1","Créer un disque","btn-primary glyphicon glyphicon-plus-sign");


		$bootstrap->htmlButton("Open","Ouvrir","btn-primary");



		$user = $this->session->get("activeUser");

		$userinfo = $user->getLogin() . "(".$user->getPrenom()." ".$user->getNom().")";


		$userid = $user->getId();

		$disques = disque::find("idUtilisateur=".$userid);


		$historique = historique::find();


		$quota = array();
		foreach($disques as $disque){


			array_push($quota,tarif::find("id=".$disque->getId()));
		}

		$occupation = array();
		foreach($historique as $histo){
		array_push($occupation,$histo->getOccupation());
		}




		$pb1=$this->jquery->bootstrap()->htmlProgressbar("pb1","success",95.23/200*100);
		$pb2=$this->jquery->bootstrap()->htmlProgressbar("pb2","danger",12.11 /15*100);

		$pb1->setStriped(true);
		$pb1->setActive(true);
		$pb1->showCaption(true);

		$pb2->setStriped(true);
		$pb2->setActive(true);
		$pb2->showCaption(true);


		$this->view->disques = $disques;
		$this->view->histo = $historique;
		$this->view->userinfo = $userinfo;
		$this->jquery->compile($this->view);




	}
}