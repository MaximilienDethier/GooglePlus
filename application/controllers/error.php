<?php 

class Error extends CI_Controller
{

public function index()
{

$data['titre'] = 'Google Plus - Erreur !';

$data['vue'] = $this->load->view('member', $data, TRUE);

$this->load->view('layout', $data);

}

public function mauvais_identifiant()
{
	$data['titre'] = 'Google Plus - Mauvais Identifiants !';

	$data['vue'] = $this->load->view('mauvaisID', $data, TRUE);

	$this->load->view('layout', $data);

}

public function pas_de_lien()
{
	$data['titre'] = 'Google Plus - Pas de Lien!';

	$data['vue'] = $this->load->view('pasLien', $data, TRUE);

	$this->load->view('layout', $data);

}

public function pasChamps()
{
	$data['titre'] = 'Google Plus - Remplissez les champs !';

	$data['vue'] = $this->load->view('pasChamps', $data, TRUE);

	$this->load->view('layout', $data);

}

public function mauvais_lien()
{
	$data['titre'] = 'Google Plus - Mauvais lien?';

	$data['vue'] = $this->load->view('mauvaisLien', $data, TRUE);

	$this->load->view('layout', $data);

}


}