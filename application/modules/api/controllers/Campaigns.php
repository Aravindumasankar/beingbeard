<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Demo Controller with Swagger annotations
 * Reference: https://github.com/zircote/swagger-php/
 */

/**
 * [IMPORTANT]
 * 	To allow API access without API Key ("X-API-KEY" from HTTP Header),
 * 	remember to add routes from /application/modules/api/config/rest.php like this:
 * 		$config['auth_override_class_method']['dummy']['*'] = 'none';
 */
class Campaigns extends API_Controller {
    /**
	 * @SWG\Get(
	 * 	path="/campaigns/feeds/",
	 * 	tags={"Campaigns"},
	 * 	summary="List out Feeds",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Feeds Json",
	 * 	)
	 * )
	 */
	public function feeds_get()
	{
        header('Access-Control-Allow-Origin: *');
		$this->load->model('Campaigns_model');
		$data['trending_campaigns'] = $this->Campaigns_model->getFeeds();
		$this->success($data);
	}

	/**
	 * @SWG\Get(
	 * 	path="/campaigns/",
	 * 	tags={"Campaigns"},
	 * 	summary="List out Campaigns",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Campaigns Json",
	 * 	)
	 * )
	 */
	public function index_get()
	{
        header('Access-Control-Allow-Origin: *');
		$this->load->model('Campaigns_model');
		$data['trending_campaigns'] = $this->Campaigns_model->getCampaigns();
		$this->success($data);
	}

	/**
	 * @SWG\Get(
	 * 	path="/campaigns/{id}",
	 * 	tags={"Campaigns"},
	 * 	summary="Look up a Category",
	 * 	@SWG\Parameter(
	 * 		in="path",
	 * 		name="id",
	 * 		description="Campaign id",
	 * 		required=true,
	 * 		type="integer"
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Campaign object",
	 * 	),
	 * 	@SWG\Response(
	 * 		response="404",
	 * 		description="Invalid Campaign ID"
	 * 	)
	 * )
	 */
	public function id_get($id)
	{
        header('Access-Control-Allow-Origin: *');
		$cat_id = $id;
		$this->load->model('Campaigns_model');
		$data['campaigns_detail'] = $this->Campaigns_model->getCampaign($cat_id);
		$this->success($data);
	}


	/**
	 * @SWG\Get(
	 * 	path="/campaigns/monthly_campaign/",
	 * 	tags={"Campaigns"},
	 * 	summary="Monthly Campaign List",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Monthly Campaign Json",
	 * 	)
	 * )
	 */
	public function monthly_campaign_get()
	{
        header('Access-Control-Allow-Origin: *');
		$this->load->model('Campaigns_model');
		$data = $this->Campaigns_model->getMonthlyContest();
		$this->response($data);
	}





}
