<?php 

class M_Member extends CI_Model
{

public function verifier($data)
{
	$query = $this->db->get_where('membres', array('email'=> $data['email'], 'mdp' => $data['mdp']));

	return $query->num_rows();
}

public function getIdMember($data){
	$this->db->select('membres.membre_id');
	$this->db->from('membres');
	$this->db->where('email', $data['email'] );

	$query = $this->db->get();

	return $query->row();
}

public function getNameMember($data){
	$this->db->select('membres.nom');
	$this->db->from('membres');
	$this->db->where('email', $data['email'] );

	$query = $this->db->get();

	return $query->row();
}

public function ajouter($data)
{

	$sql = "INSERT INTO membres (nom, mdp, email)
    	    VALUES ('".$data['nom']."','".$data['mdp']."','".$data['email']."')";

	$this->db->query($sql);
}

}