<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Trending extends MY_Controller {

	public function index()
	{
		$data = array();
		$this->load->model('campaign_model');
		$this->mPageTitle = "Beard Campaigns";
		$data['campaigns'] = $this->campaign_model->getCampaigns();
		$this->mViewData['content'] = $data;
		$this->render('trending', 'full_width');
	}

	public function getCampaignDetail(){
		$data = array();
		$this->load->model('campaign_model');
		$this->mPageTitle = "Beard Campaigns";

	}


}
