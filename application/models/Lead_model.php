<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_model extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();

		$this->load->database();
	}
	
	public function get_leads() 
	{
		$this->db->select('*');
		$this->db->from('tbl_leads');
		$this->db->where('is_deleted', 0);

		return $this->db->get()->result();
	}

	public function insert_lead($data) {
		$this->db->insert('tbl_leads', $data);
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
