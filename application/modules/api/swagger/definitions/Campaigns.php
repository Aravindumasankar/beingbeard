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
class Campaigns {

	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $id;


	/**
	 * @var string
	 * @SWG\Property()
	 */
	public $identifier;

    /**
	 * @var string
	 * @SWG\Property()
	 */
	public $cat_identifier;
}

/**
 * @SWG\Definition()
 */
class CategoryContest {
    /**
	 * @var int
	 * @SWG\Property()
	 */
	public $cat_id;
}

/**
 * @SWG\Definition()
 */
class get_monthly_contest {
    /**
	 * @var int
	 * @SWG\Property()
	 */
	public $month;
    
    /**
	 * @var int
	 * @SWG\Property()
	 */
	public $year;
}
