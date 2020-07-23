<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();

		$this->load->library(array('session'));
		$this->load->model('lead_model');
		$this->load->model('vip_model');
		$this->load->model('reward_model');
	}

	public function index()
	{
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$res['data_leads'] = $this->lead_model->get_leads();
			$res['data_vips'] = $this->vip_model->get_vips();
			$res['data_rewards'] = $this->reward_model->get_rewards();
			$this->load->view('dashboard', $res);
		} else {
			redirect('/login');
		}
	}
}
