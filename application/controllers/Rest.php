<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Rest extends MY_Controller {
  public function index()
	{

	}
  public function addUser(){
      header('Access-Control-Allow-Origin: *');
      $data = array();
      $data = $this->input->post();
      $this->load->helper('date');
      $data['created_on'] = now('Asia/Calcutta');
      $this->load->model('user_model');
      $result = $this->user_model->loginUser($data);
      if($result['status'] == 'true'){
          $result['logged_in'] = 'true';
          $this->session->set_userdata($result);
      }
      $this->output
      ->set_content_type('application/json') //set Json header
      ->set_output(json_encode($result));
  }

  public function tryCampaign(){
    header('Access-Control-Allow-Origin: *');
    $data = array();
    $data = $this->input->post();
    $this->load->helper('date');
    $data['added_on'] = now('Asia/Calcutta');
    $this->load->model('campaign_model');
    $result = $this->campaign_model->tryCampaign($data);
    $this->output
    ->set_content_type('application/json') //set Json header
    ->set_output(json_encode($result));
}   

  public function getFeeds(){
    header('Access-Control-Allow-Origin: *');
    $this->load->model('feeds_model');
    $result = $this->feeds_model->getFeeds();
    $this->output
    ->set_content_type('application/json') //set Json header
    ->set_output(json_encode($result));

  }

  public function logoutUser(){
      header('Access-Control-Allow-Origin: *');
      $data = array();
      $this->load->helper('date');
      $data['social_id'] = $this->session->userdata['social_id'];
      $data['last_login'] = now('Asia/Calcutta');
       $this->load->model('user_model');
      $result = $this->user_model->logoutUser($data);
      if($result['status'] == 'true'){
      $this->session->sess_destroy();
      $result = $this->user_model->logoutUser($data);
      }
      $this->output
      ->set_content_type('application/json') //set Json header
      ->set_output(json_encode($result));
  }

  public function getProfile(){
      header('Access-Control-Allow-Origin: *');
      $social_id = $this->input->get('social_id', TRUE);
      $this->load->model('user_model');
      $data = $this->user_model->getProfile($social_id);
      $this->output
      ->set_content_type('application/json') //set Json header
      ->set_output(json_encode($data));
  }


  public function random_string($length) {
      $key = '';
      $keys = array_merge(range(0, 9), range('a', 'z'));

      for ($i = 0; $i < $length; $i++) {
          $key .= $keys[array_rand($keys)];
      }

      return $key;
  }

  





}
