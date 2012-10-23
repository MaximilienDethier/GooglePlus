<?php 

class Error extends CI_Controller
{

public function index()
{

$data['titre'] = 'Google Plus - Erreur !';

if(!$this->session->userdata('logged_in'))
{
	$data['boolConnect']=false;
}
else
{
	$data['boolConnect']=true;
}

$data['vue'] = $this->load->view('member', $data, TRUE);

$this->load->view('layout', $data);

}

public function mauvais_identifiant()
{
	$data['titre'] = 'Google Plus - Mauvais Identifiants !';

	if(!$this->session->userdata('logged_in'))
	{
		$data['boolConnect']=false;
	}
	else
	{
		$data['boolConnect']=true;
	}

	$data['vue'] = $this->load->view('mauvaisID', $data, TRUE);

	$this->load->view('layout', $data);

}

public function pas_de_lien()
{
	$data['titre'] = 'Google Plus - Pas de Lien!';

	if(!$this->session->userdata('logged_in'))
	{
		$data['boolConnect']=false;
	}
	else
	{
		$data['boolConnect']=true;
	}

	$data['vue'] = $this->load->view('pasLien', $data, TRUE);

	$this->load->view('layout', $data);

}



}