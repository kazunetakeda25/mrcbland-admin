<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vip_model extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();

		$this->load->database();
	}
	
	public function get_vips() 
	{
		$this->db->select('*');
		$this->db->from('tbl_vips');
		$this->db->where('is_deleted', 0);

		return $this->db->get()->result();
	}

	public function insert_vip($data) {
		$this->db->insert('tbl_vips', $data);
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
