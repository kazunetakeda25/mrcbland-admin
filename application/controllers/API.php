<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();

        $this->load->library(array('session'));
        $this->load->model('lead_model');
        $this->load->model('vip_model');
        $this->load->model('reward_model');
	}
	
	public function vip_submit() {
        $name = $this->input->post('name');
        $ic    = $this->input->post('ic_number');
        $phone = $this->input->post('phone_number');
        $email = $this->input->post('email_address');
        $tria_seputeh = $this->input->post('tria_seputeh');
        $vivo = $this->input->post('vivo');
        $the_sentral_residences = $this->input->post('the_sentral_residences');
        $kalista = $this->input->post('kalista');
        $alstonia = $this->input->post('alstonia');
        $sentral_suites = $this->input->post('sentral_suites');
        $sidec = $this->input->post('sidec');
        $q_sentral = $this->input->post('q_sentral');

        $this->load->config('email');
        $this->load->library('email');

        $from = $this->config->item('smtp_user');
        $to = $email;
        $subject = "MRCB Land - Thank you for your interest.";
        $message = "Thank you for your registration on MRCB Land’s development. Our sales personnel will contact you within three (3) working days. For other enquiries: email us at mrcbland@mrcb.com";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        // if ($this->email->send()) {
        //     echo 'Your Email has successfully been sent.';
        // } else {
        //     show_error($this->email->print_debugger());
        // }

        $data = array(
            'name' => $name, 
            'ic' => $ic, 
            'phone' => $phone, 
            'email' => $email, 
            'tria_seputeh' => $tria_seputeh, 
            'vivo' => $vivo, 
            'the_sentral_residences' => $the_sentral_residences, 
            'kalista' => $kalista, 
            'alstonia' => $alstonia, 
            'sentral_suites' => $sentral_suites, 
            'sidec' => $sidec, 
            'q_sentral' => $q_sentral, 
            'submitted_at' => date('Y-m-d H:i:s'), 
            'is_deleted' => 0
        );

        $result = $this->vip_model->insert_vip($data);
        return $result;
    }

    public function isNullOrEmpty($data) {
        return (!isset($data) || trim($data) === '');
    }

    public function lead_submit() {
        $title = $this->input->post('title');
        $name    = $this->input->post('name1');
        $contact_no = $this->input->post('contact_no');
        $email = $this->input->post('email');
        $area = $this->input->post('area');
        $project = $this->input->post('project');
        $size_range = $this->input->post('size_range');
        $starting_price = $this->input->post('starting_price');
        $pic = $this->input->post('pic');

        if ($this->isNullOrEmpty($title) 
        || $this->isNullOrEmpty($name)
        || $this->isNullOrEmpty($contact_no)
        || $this->isNullOrEmpty($email)
        || $this->isNullOrEmpty($area)
        || $this->isNullOrEmpty($project)
        || $this->isNullOrEmpty($size_range)
        || $this->isNullOrEmpty($starting_price)
        || $this->isNullOrEmpty($pic))
            return 0;

        $this->load->config('email');
        $this->load->library('email');

        $from = $pic;
        $to = $email;
        $subject = "MRCB Land - Thank you for your interest.";
        $message = "Thank you for your registration on MRCB Land’s development.\nOur sales personnel will contact you within three (3) working days. For other inquiries: email us at mrcbland@mrcb.com\n--\nThis e-mail was sent from a contact form on MRCB Land (https://www.mrcbland.com.my)";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        $data = array(
            'title' => $title, 
            'name' => $name, 
            'contact_no' => $contact_no, 
            'email' => $email, 
            'area' => $area, 
            'project' => $project, 
            'size_range' => $size_range, 
            'starting_price' => $starting_price, 
            'pic' => $pic, 
            'submitted_at' => date('Y-m-d H:i:s'), 
            'is_deleted' => 0
        );

        $result = $this->lead_model->insert_lead($data);
        
        redirect('https://mrcbland.com.my/', 'refresh');
        
        return $result;
    }

    public function rewards_submit() {

        $name    = $this->input->post('name');
        $contact_no = $this->input->post('contact_no');
        $email = $this->input->post('email');

        $this->load->config('email');
        $this->load->library('email');

        $from = $this->config->item('smtp_user');
        $to = $email;
        $subject = "MRCB Land - Thank you for your interest.";
        $message = "Thank you for your registration on MRCB Land’s development. Our sales personnel will contact you within three (3) working days. For other enquiries: email us at mrcbland@mrcb.com";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        // if ($this->email->send()) {
        //     echo 'Your Email has successfully been sent.';
        // } else {
        //     show_error($this->email->print_debugger());
        // }
        
        $what_is_tod = '';
        $is_correct = 1;

        if (!isset($_POST['transportation1']) 
        || !isset($_POST['transportation2']) 
        || !isset($_POST['transportation3']) 
        || !isset($_POST['transportation4']) 
        || !isset($_POST['transportation5']) 
        || !isset($_POST['transportation6']) 
        || !isset($_POST['transportation7'])
        || !isset($_POST['what_is_tod'])
        || !isset($_POST['benefit1'])
        || !isset($_POST['benefit2'])
        || !isset($_POST['benefit3'])
        || !isset($_POST['benefit4']))
            $is_correct = 0;

        $what_is_tod = $this->input->post('what_is_tod');
        
        if (strtolower($what_is_tod) != "transit oriented development")
            $is_correct = 0;

        $data = array(
            'name' => $name, 
            'contact_no' => $contact_no, 
            'email' => $email, 
            'is_correct' => $is_correct, 
            'submitted_at' => date('Y-m-d H:i:s'), 
            'is_deleted' => 0
        );

        $result = $this->reward_model->insert_reward($data);
        
        redirect('https://mrcbland.com.my/', 'refresh');
        
        return $result;
    }
}
