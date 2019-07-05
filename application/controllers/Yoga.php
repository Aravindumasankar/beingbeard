<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Yoga page
 */
class Yoga extends MY_Controller {

	public function index()
	{   
        $data = array();
		$this->load->model('yoga_model');
		$this->mPageTitle = "Yoga";
        $data['yoga'] = $this->yoga_model->getYoga();
        $this->mViewData['content'] = $data;
		$this->render('yoga', 'full_width');
	}
}
