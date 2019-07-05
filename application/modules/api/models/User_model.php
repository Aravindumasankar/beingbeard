<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

    function checkUser($data,$source){
    if($source == 'social'){
        $social_id = $data['social_id'];
        $sql = "SELECT * FROM `users` where social_id='$social_id' ";
    }
    if($source == 'website'){
	    $email = $data['email'];
        $sql = "SELECT * FROM `users` where email='$email'";
    }
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     $message = "user_exists";
     return $message ;
    }

    }
    
    function SocialCheckUser($data){
    $username = $data['social_id'];
	$email = $data['email'];
    $provider = $data['provider'];
    $sql = "SELECT * FROM `users` where  social_id='$social_id' or email='$email' and provider='$provider'";
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     $message = "user_exists";
     return $message ;
    }

    }





}
