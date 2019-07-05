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
class Homepage extends API_Controller {

	/**
	 * @SWG\Get(
	 * 	path="/homepage/",
	 * 	tags={"Home Page"},
	 * 	summary="Home Page Api",
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Homepage Json",
	 * 	)
	 * )
	 */
	public function index_get()
	{
        header('Access-Control-Allow-Origin: *');
		$this->load->model('Campaigns_model');
        $data['quote'] = $this->Campaigns_model->getQuote();
        $data['did_you_know'] = $this->Campaigns_model->didyouknow();
		$data['trending_campaigns'] = $this->Campaigns_model->getTrendingCampaigns();
        $data['month_campaign'] = $this->Campaigns_model->getMonthlyContest();
        $data['feeds'] = $this->Campaigns_model->getFeeds(12);
		$this->response($data);
	}






}
