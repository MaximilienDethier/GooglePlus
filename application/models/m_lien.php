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

public function infoModifier($id)
{
	$this->db->select('liens.*');
	$this->db->from('liens');
	$this->db->where('liens.lien_id', $id );

	$query = $this->db->get();
	return $query->row_array();
}

public function getLastId($url)
{
	$this->db->select('liens.lien_id');
	$this->db->from('liens');
	$this->db->where('liens.url', $url );
	$this->db->order_by('lien_id', DESC);

	$query = $this->db->get();
	return $query->row();	
}

public function modifier($data)
{
	$updateData = array(
               'title' => $data['titre'],
               'url' => $data['contenu'],
               'meta' => $data["description"]
            );

	$this->db->where('lien_id', $data['idpost']);
	$this->db->update('liens', $updateData); 
}


public function supprimer($id)
{
	$sql = "DELETE FROM liens
			WHERE lien_id=".$id."";

	$this->db->query($sql);
}


}