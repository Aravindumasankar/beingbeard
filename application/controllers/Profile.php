<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Profile extends MY_Controller {
  public function index()
	{
      $login_status = $this->session->userdata['logged_in'];
        if($login_status == 'true'){
            $this->mPageTitle = "profile";
		    $this->render('profile', 'full_width');
        }else{
             redirect('home');
        }
        
	}
}