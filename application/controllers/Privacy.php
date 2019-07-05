<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Privacy extends MY_Controller {

	public function index()
	{
		$this->mPageTitle = "Privacy policy";
		$this->render('privacy','default');
	}
}
