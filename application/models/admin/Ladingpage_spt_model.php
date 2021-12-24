<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ladingpage_spt_model extends CI_Model
{
    protected $table = 'ladingpage_simphongthuy';
    public function __construct()
	    {
	        $this->load->database();
	    }
	public function Db_item()
	    {
	    	$query = $this->db->get($this->table);
	    	return $query->row_array();
	    }  
    
    public function Db_article()
	    {
	    	$this->db->select('id,name');
	    	$query = $this->db->get('article');
	    	return $query->result_array();
	    } 
	public function Db_update($data)
	    {
           $this->db->where('id',1);
           $this->db->update($this->table,$data);
	    }     

	      
}    