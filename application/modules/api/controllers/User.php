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
class User extends API_Controller {

    /**
	 * @SWG\Post(
	 * 	path="/user/create",
	 * 	tags={"User"},
	 * 	summary="Create User",
	 * @SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="User info",
     * 		required=false,
	 * 		@SWG\Schema(ref="#/definitions/UserSignUp")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Create User",
	 * 	)
	 * )
	 */
	public function create_post()
	{
        header('Access-Control-Allow-Origin: *');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
            $data = array();
			$data = json_decode(file_get_contents('php://input'), true);
            $this->load->model('User_model');
			$email = $data['email'];
			$password = $data['password'];
			$identity = $email;
			$additional_data = array(
            'full_name'	    => $data['full_name'],
            'source'       => $data['source'],
            'gender'       => $data['gender']
			);
			$check_user = $this->User_model->checkUser($data,$data['source']);
			if($check_user == 'user_exists'){
				$msg = "Account Already Exists";
				$this->error($msg);
			}
			else{
                $user_id = $this->ion_auth->register($identity, $password, $email, $additional_data, $groups = array());
                $msg = "account created successfully";
                $this->created($msg);
			}
        }



	}


	/**
	 * @SWG\Post(
	 * 	path="/user/verify",
	 * 	tags={"User"},
	 * 	summary="Verify Token",
	 * @SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Verify Token",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/VerifyUser")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Verify Token",
	 * 	)
	 * )
	 */
    public function verify_post()
	{
        header('Access-Control-Allow-Origin: *');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
            $data = array();
			$data = json_decode(file_get_contents('php://input'), true);
            $token = $data['token'];
            $id = $data['user_id'];
                if($this->ion_auth->verify_user_token($id,$token)){
                    $msg = 'token verified';
                    $this->success($msg);
                }else{
                    $msg = 'token mismatch';
                    $this->error($msg);
                }
        }
    }


    /**
	 * @SWG\Post(
	 * 	path="/user/changepwd",
	 * 	tags={"User"},
	 * 	summary="Change Password",
	 * @SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Change Password",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/ChangePassword")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Change Password",
	 * 	)
	 * )
	 */
    public function changepwd_post()
	{
        header('Access-Control-Allow-Origin: *');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
            $data = array();
			$data = json_decode(file_get_contents('php://input'), true);
			$source = $data['source'];
			if($source == 'website'){
				$identity = $data['email'];
				$old = $data['old_pwd'];
				$new = $data['new_pwd'];
				if($this->ion_auth->change_password($identity, $old, $new)){
                     $response['status'] = true;
                    $response['msg'] = $this->ion_auth->messages();
                    $this->response($response);
                }else{
                        // login failed
                        $response['status'] = false;
                        $response['msg'] = $this->ion_auth->errors();
                        $this->response($response);
                    }


			}



        }
    }



	/**
	 * @SWG\Post(
	 * 	path="/user/login",
	 * 	tags={"User"},
	 * 	summary="Register/Login User",
	 * @SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="User Credentials",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/UserLogin")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Login User",
	 * 	)
	 * )
	 */
	public function login_post(){
        header('Access-Control-Allow-Origin: *');
         $this->load->model('User_model');
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
			$data = json_decode(file_get_contents('php://input'), true);
			$identity = $data['identity'];
            $source = $data['source'];
		     }
            if($source == 'website'){
                $password = $data['password'];
                if ($this->ion_auth->login($identity, $password, $remember=FALSE))
			{
				// login succeed
				$response['id']=$this->ion_auth->user()->row()->id;
                $response['email']=$this->ion_auth->user()->row()->provider;
				$response['email']=$this->ion_auth->user()->row()->email;
				$response['username']=$this->ion_auth->user()->row()->username;
                $response['full_name']=$this->ion_auth->user()->row()->full_name;
				$response['last_login']=$this->ion_auth->user()->row()->last_login;
                $response['token'] =$this->ion_auth->user()->row()->token;
				$response['status'] = true;
				$response['msg'] = $this->ion_auth->messages();
                $response['logged_in'] = true;
                $this->response($response);
			}else{
                    // login failed
                    $response['status'] = false;
                    $response['msg'] = $this->ion_auth->errors();
                    $this->response($response);
                }
            }
            if($source == 'social'){
                $data['email'] = '';
                $data['password'] = '';
                $email = $data['email'];
                $password = $data['password'];
			   // $identity = $email;
                $additional_data = array(
                'full_name'	    => $data['full_name'],
                'social_id'     => $identity,
                'provider'      => $data['provider'],
                'source'        => $data['source'],
                'gender'        => $data['gender'],
                'token'         => $this->ion_auth->getToken(10)
                );
                $data['social_id'] = $identity;
                $check_user = $this->User_model->checkUser($data,$source);
                if($check_user != 'user_exists'){
                    $this->ion_auth->register($identity, $password, $email, $additional_data, $groups = array());
                }

                if ($this->ion_auth->socialLogin($data['social_id']) == TRUE){
                // login succeed
                $response['id']=$this->ion_auth->user()->row()->id;
                $response['email']=$this->ion_auth->user()->row()->email;
                $response['full_name']=$this->ion_auth->user()->row()->full_name;
                $response['last_login']=$this->ion_auth->user()->row()->last_login;
                $response['token'] =$this->ion_auth->user()->row()->token;
                $response['status'] = true;
                $response['logged_in'] = true;
                $this->response($response);
             }else{ 
                    //login failed 
                    $response['status'] = false;
                    $response['msg'] = $this->ion_auth->errors(); 
                    $this->response($response);
                }
                }
            if($source != 'social' || $source == 'website'){
                    $response['status'] = false;
                    $response['msg'] = 'Invalid Source';
                    $this->response($response);
                }
            }

    
    /**
	 * @SWG\Post(
	 * 	path="/user/forgotpwd",
	 * 	tags={"User"},
	 * 	summary="Forgot Password",
	 * @SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="Forgot Password",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/ForgotPassword")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Forgot Password",
	 * 	)
	 * )
	 */
    public function forgotpwd_post()
	{
        header('Access-Control-Allow-Origin: *');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
            $data = array();
			$data = json_decode(file_get_contents('php://input'), true);
			$source = $data['source'];
			if($source == 'website'){
				$identity = $data['email'];
				if($this->ion_auth->forgotten_password($identity)){
                     $response['status'] = true;
                     $response['msg'] = $this->ion_auth->messages();
                     $this->response($response);
                }else{
                        // login failed
                        $response['status'] = false;
                        $response['msg'] = $this->ion_auth->errors();
                        $this->response($response);
                    }


			}



        }
    }

    
    /**
	 * @SWG\Post(
	 * 	path="/user/resetpwd",
	 * 	tags={"User"},
	 * 	summary="Reset Password",
	 * @SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="reset Password",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/ReserPassword")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Reset Password",
	 * 	)
	 * )
	 */
    public function resetpwd_post()
	{
        header('Access-Control-Allow-Origin: *');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)){
            $data = array();
			$data = json_decode(file_get_contents('php://input'), true);
			$source = $data['source'];
			if($source == 'website'){
				$identity = $data['email'];
                $new_pwd = $data['new_password'];
                $code = $data['code'];
				if($this->ion_auth->forgotten_password_check($code)){
                     if($this->ion_auth->reset_password($identity, $new_pwd)){
                         $response['status'] = true;
                         $response['msg'] = $this->ion_auth->messages();
                         $this->response($response);
                     }
                else{
                    $response['status'] = false;
                         $response['msg'] = $this->ion_auth->errors();
                         $this->response($response);
                }

                }else{
                        // login failed
                        $response['status'] = false;
                        $response['msg'] = 'Invalid OTP';
                        $this->response($response);
                    }


			}



        }
    }



    }
