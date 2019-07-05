<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set('Asia/Calcutta');

/**
 * Home page
 */
class Campaigns extends MY_Controller {

	public function try_campaign()
	{
		$campaign_id = $this->input->get('campaign_id',TRUE);
		$user_id = $this->input->get('user_id',TRUE);
		$this->load->model('campaign_model');
		$data['campaigns'] = $this->campaign_model->try($campaign_id,$user_id);
		$this->mPageTitle = "Beard Campaigns";
		$this->mViewData['content'] = $data;
		$this->render('trending', 'full_width');
	}

	public function detail()
	{
		$campaign_id = $this->input->get('campaign_id',TRUE);
		$this->load->model('campaign_model');
		$data['detail'] = $this->campaign_model->detail($campaign_id);
		$title = $data['detail']['campaign_name'];
		$this->mPageTitle = "$title Campaign ";
		$this->mViewData['content'] = $data;
		$this->render('campaign_detail', 'full_width');
	}
}
