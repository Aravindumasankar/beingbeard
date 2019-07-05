<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views
| when calling MY_Controller's render() function.
|
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
		'site_name' => 'Being Beard',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> 'Beard Yogi',
		'description'	=> 'Beard School',
		'keywords'		=> 'Being Beard School Inner Peace Beards Men World'
	),

	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
            'assets/dist/frontend/jquery.min.js'
		),
		'foot'	=> array(
			'assets/dist/frontend/popper.min.js',
			'assets/dist/frontend/bootstrap.min.js',
			'assets/dist/frontend/jquery.easing.min.js',
			'assets/dist/frontend/custom.js',
		),
	),


	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'assets/dist/frontend/bootstrap.min.css',
			'assets/dist/frontend/bootstrap-grid.min.css',
			'assets/dist/frontend/bootstrap-reboot.min.css',
			'assets/dist/frontend/font-awesome.min.css',
			'assets/dist/frontend/styles.css'

		),
	),

	// Default CSS class for <body> tag
	'body_class' => 'page-top',


	// Google Analytics User ID
	'ga_id' => 'UA-108466252-1',

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
		),
	),

	// Login page
	'login_url' => 'auth/login',

	// Restricted pages
	'page_auth' => array(
		// Example: Frontend Website pages for registered users
		'dashboard'					=> array('members'),
		'account'					=> array('members'),
	),

	// Email config
	'email' => array(
		'from_email'		=> '',
		'from_name'			=> '',
		'subject_prefix'	=> '',

		// Mailgun HTTP API
		'mailgun_api'		=> array(
			'domain'			=> '',
			'private_api_key'	=> ''
		),
	),

	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);
/*
	| -------------------------------------------------------------------------
	| Configuration for API Site only
	| -------------------------------------------------------------------------
	*/

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ci_session_frontend';
