<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward_model extends CI_Model 
{
	public function __construct() 
	{
		parent::__construct();

		$this->load->database();
	}
	
	public function get_rewards() 
	{
		$this->db->select('*');
		$this->db->from('tbl_rewards');
		$this->db->where('is_deleted', 0);

		return $this->db->get()->result();
	}

	public function insert_reward($data) {
		$this->db->insert('tbl_rewards', $data);
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
