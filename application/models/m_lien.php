<?php 

class M_Lien extends CI_Model
{

public function lister($id)
{
	$this->db->select('liens.*');
	$this->db->from('liens');
	$this->db->join('membres', 'liens.membre_id = membres.membre_id');
	$this->db->where('liens.membre_id', $id );

	$query = $this->db->get();
	return $query->result();
}

public function ajouter($data)
{
	$sql = 'INSERT INTO liens (membre_id, url, title, meta, images)
    	    VALUES ("'.$data["id_member"].'", "'.$data["contenu"].'", "'.$data["titre"].'", "'.$data["description"].'", "'.$data["images"].'")';

	$this->db->query($sql);
}

public function supprimer($id)
{
	$sql = "DELETE FROM liens
			WHERE lien_id=".$id."";

	$this->db->query($sql);
}


}