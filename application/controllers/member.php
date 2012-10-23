<?php 

class Member extends CI_Controller
{

public function index()
{

if($this->session->userdata('logged_in'))
{
	redirect('lien/lister');
}

$this->load->helper('form');
$data['titre'] = 'Google Plus - Connexion';

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

public function login()
{
	$this->load->model('M_Member');

	$data['mdp'] = $this->input->post('mdp');
	$data['email'] = $this->input->post('email');

	if($this->M_Member->verifier($data)){

		$id_member= $this->M_Member->getIdMember($data);
		$name_member= $this->M_Member->getNameMember($data);

		$this->session->set_userdata('id_member', $id_member->membre_id);
		$this->session->set_userdata('name_member', $name_member->nom);
		$this->session->set_userdata('logged_in', true);

		redirect('lien/lister');

	}
	else{
		redirect('error/mauvais_identifiant');
	}
}

public function signUp()
{
	$this->load->model('M_Member');

	$data['titre'] = 'Google Plus - Inscrivez-vous !';

	if(!$this->session->userdata('logged_in'))
	{
		$data['boolConnect']=false;
	}
	else
	{
		$data['boolConnect']=true;
	}

	$data['vue'] = $this->load->view('sign', $data, TRUE);

	$this->load->view('layout', $data);
}

public function signUpProcess(){
	$this->load->model('M_Member');

	$data['nom'] = $this->input->post('nom');
	$data['mdp'] = $this->input->post('mdp');
	$data['email'] = $this->input->post('email');

	$this->M_Member->ajouter($data);
	
	$id_member= $this->M_Member->getIdMember($data);
	$name_member= $this->M_Member->getNameMember($data);

	$this->session->set_userdata('logged_in', true);

	$this->session->set_userdata('id_member', $id_member->membre_id);
	$this->session->set_userdata('name_member', $name_member->nom);
	


	redirect('lien/lister');


}

public function unlog()
{
	$this->session->unset_userdata('logged_in');
	$this->session->unset_userdata('id_member');
	$this->session->unset_userdata('name_member');

	if(!$this->session->userdata('logged_in'))
	{
		$data['boolConnect']=false;
	}
	else
	{
		$data['boolConnect']=true;
	}
	
	$data['titre'] = 'Google Plus - Déconnection Réussie !';
	$data['vue'] = $this->load->view('unlogSuccess', $data, TRUE);

	$this->load->view('layout', $data);
}


}