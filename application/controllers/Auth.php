<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Auth extends MY_Controller {

	public function index()  
	{   

        if(!empty($this->session->userdata('logged_in'))){
        $login_status = $this->session->userdata['logged_in'];
        if($login_status == 'true'){
            redirect('home');
        }else{
            $this->mPageTitle = "login";
		    $this->render('login', 'login');
        }
        
    }else{
            $this->mPageTitle = "login";
		    $this->render('login', 'login');
        }
        
        
	}

}
