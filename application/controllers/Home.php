<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{   
        // $login_status = $this->session->userdata['logged_in'];
        // if($login_status == 'true'){
        //     $this->mPageTitle = "Being Beard!";
		//     $this->render('home','home_page');
        // }else{
        //     redirect('auth');
        // }
        $data = array();
		$this->load->model('campaign_model');
		$this->mPageTitle = "Beard Campaigns";
        $data['campaigns'] = $this->campaign_model->getCampaigns();
        $this->mViewData['content'] = $data;
        $this->mPageTitle = "Being Beard! Welcome to world's first Beard School.";
        $this->render('home','home_page');
	}
}
