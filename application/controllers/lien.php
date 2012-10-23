<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lien extends CI_Controller {

public function __construct(){

	parent::__construct();

	if(!$this->session->userdata('logged_in'))
	{
		redirect('member');
	}
	$this->load->model('M_Lien');

}

	public function index()
	{
		$this->lister();
	}

	public function lister(){

		$id=$this->session->userdata('id_member'); //on récupère l'id de l'utilisateur pour lister *ses* liens
		$dataList['liens'] = $this->M_Lien->lister($id);

		$data['vue'] = $this->load->view('lister', $dataList, true);
		$data['titre'] = 'Mes liens intéressants';
		
		$this->load->view('layout', $data);
	}

	public function verifier()
	{
		$dataList['contenu'] = $this->input->post('contenu');

		//lister
		$id=$this->session->userdata('id_member');
		$dataList['liens'] = $this->M_Lien->lister($id);

		
		if($dataList['contenu']=="")
		{
			redirect('error/pas_de_lien');
		}

		if(preg_match('#http://www.#', $dataList['contenu']))
		{
			
			$url= $dataList['contenu'];
		}
		else
		{
			$url= "http://".$dataList['contenu'];
			$dataList['contenu']=$url;
		}

		//Curl
		
		$html='';
							
		$ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false ); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $html = curl_exec($ch);
        curl_close($ch);

		$dom = new DomDocument();
		@$dom -> loadHtml($html);

		//defaults values

		$titre = "Titre du site";
		$description = "Désolé, le site ne possède pas de description !";
		$images = "";

		//end defaults

		$titre = $dom->getElementsByTagName('title')->item(0)->nodeValue;
		
		$nodes = $dom ->getElementsByTagName('meta');

		foreach($nodes as $node)
		{
			if(strtolower($node->getAttribute("name"))=="description")
			{
				$description = $node->getAttribute('content');
			}
		}

		$nodes = $dom -> getElementsByTagName('img');

		foreach($nodes as $node)
		{
				if(preg_match('#http#', $node->getAttribute('src')))
				{
					$images[] = $node->getAttribute('src');
				}
				else
				{
					$images[] = $url.$node->getAttribute('src');
				}
		}

		$dataList['titre'] = $titre;
		$dataList['description'] = $description;
		$dataList['images'] = $images;
		$dataList['choix'] = 0;

		//Stocker les infos dans session conserver entre les deux pages

		$this->session->set_userdata('arrayPic', $images);
		$this->session->set_userdata('titre', $titre);
		$this->session->set_userdata('contenu', $dataList['contenu']);
		$this->session->set_userdata('description', $description);
		$this->session->set_userdata('liens', $dataList['liens']);

		$data['vue'] = $this->load->view('verifier', $dataList, true);
		$data['titre'] = 'Mes liens intéressants - Envoyer ?';

		$this->load->view('layout', $data);
	}

	public function choisir()
	{
		$imageChoisie =  $this->uri->segment(3);

		//lister

		$dataList['contenu'] =   $this->session->userdata('contenu');
		$dataList['titre'] =   $this->session->userdata('titre');
		$dataList['description'] =  $this->session->userdata('description');
		$dataList['images'] = $this->session->userdata('arrayPic');
		$dataList['liens'] = $this->session->userdata('liens');
		$dataList['choix'] = $imageChoisie;

		$data['vue'] = $this->load->view('verifier', $dataList, true);
		$data['titre'] = 'Mes liens intéressants - Envoyer ?';

		$this->load->view('layout', $data);		

	}

	public function ajouter()
	{

		$data['id_member'] = $this->session->userdata('id_member');
		
		$data['contenu'] = $this->input->post('contenu');
		$data['titre'] = $this->input->post('hiddenTitre');
		$data['description'] = $this->input->post('hiddenDescription');
		$data['images'] = $this->input->post('hiddenImages');
		
		$this->M_Lien->ajouter($data);

		redirect('lien/successAdd');
	}

	public function successAdd(){

		$dataList="";
		$data['boolConnect']=false;

		$data['vue'] = $this->load->view('successAdd', $dataList, true);

		$data['titre'] = 'Envoi réussi !';

		$this->load->view('layout', $data);
	}

	public function supprimer(){

		$id =  $this->uri->segment(3);		
		$this->M_Lien->supprimer($id);

		if($this->input->is_ajax_request())
		{
			echo "Lien supprimé !";
		}
		else
		{
			redirect('lien/lister');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */