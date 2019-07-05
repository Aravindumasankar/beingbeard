<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Swagger Definitions
|--------------------------------------------------------------------------
| Example: https://github.com/zircote/swagger-php/tree/master/Examples/petstore.swagger.io/models
*/

// To avoid class naming conflicts when defining Swagger Definitions
namespace MySwaggerDefinitions;

/**
 * @SWG\Definition()
 */
class UserSignUp {
    
    /**
	 * @var string
	 * @SWG\Property()
	 */
	public $social_id;
    
    /**
	 * @var string
	 * @SWG\Property()
	 */
	public $source;
    
    /**
	 * @var string
	 * @SWG\Property()
	 */
	public $provider;

    /**
	 * @var string
	 * @SWG\Property()
	 */
	public $username;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $email;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $password;
    
    /**
	 * @var string
	 * @SWG\Property()
	 */
	public $full_name;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $first_name;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $last_name;

	/**
	 * @var int
	 * @SWG\Property()
	 */
	public $phone;
}

/**
 * @SWG\Definition()
 */
class UserActivate {

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $id;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $code;
}

/**
 * @SWG\Definition()
 */
class UserLogin {

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $identity;


	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $password;
    
    /**
	 * @var string
	 * @SWG\Property()
	 */
	public $source;
}

/**
 * @SWG\Definition()
 */
class UserForgotPassword {

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $email;
}

/**
 * @SWG\Definition()
 */
class UserResetPassword {

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $code;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $password;

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $password_confirm;
}
