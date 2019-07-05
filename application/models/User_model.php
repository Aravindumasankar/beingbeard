<?php

class User_model extends MY_Model {
  public function generateToken() {

    $chars = array(
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    );

    shuffle($chars);

    $num_chars = count($chars)-40;
    $token = '';

    for ($i = 0; $i < $num_chars; $i++){ // <-- $num_chars instead of $len
        $token .= $chars[mt_rand(0, $num_chars)];
    }

    return $token;
}
  public function checkToken($user_id,$token,$now){
      $check =  $this->db->query("select expires_on from user_token where user_id = '$user_id' and token = '$token'")->row()->$expires_on;
      if($check < $now){
        return true;
      }else{
        return false;
    }
  }
  public function loginUser($data){
      $now = $data['created_on'];
      $social_id = $data['social_id'];
      $provider = $data['provider'];
      if(empty($data['email'])){
        $email = '';
      }else{
        $email = $data['email'];
      }
      if(empty($data['first_name'])){
        $first_name = '';
      }else{
        $first_name = $data['first_name'];
      }
      if(empty($data['last_name'])){
        $last_name = '';
      }else{
        $last_name = $data['last_name'];
      }

      if(!empty($first_name) && !empty($last_name)){
        $full_name = $first_name.' '.$last_name;
      }else{
        $full_name = $data['full_name'];
      }
      if(empty($data['phone'])){
        $phone = '';
      }else{
          $phone = $data['phone'];
      }
      $now = $data['created_on'];
      $exist_sql ="select id from users where social_id = '$social_id'";
      $query = $this->db->query($exist_sql);
      if ( $query->num_rows() > 0 ){
        $user_id = $query->row_array();
        $user_id = $user_id['id'];
        $update_sql = "UPDATE `users` SET `last_login` = '$now', `active`= 1 WHERE `users`.`social_id` = '$social_id'";
        $query = $this->db->query($update_sql);
        if($query == 1 ){
          $result['user_id'] = $user_id;
          $result['social_id'] = $social_id;
          $result['status']='true';
          $result['msg'] = "user logged in successfully";
        }else{
          $result['status']='false';
          $result['msg'] = "user login query failed";
        }

      }else{
        $insert_sql = "INSERT INTO `users` ( `social_id`, `provider`, `first_name`, `last_name`,`full_name`,`phone`,`active`,`last_login`,`created_on`) VALUES ( '$social_id', '$provider', '$first_name','$last_name', '$full_name','$phone','1','$now','$now')";
        $query = $this->db->query($insert_sql);
        if($query == 1){
          $user_id = $this->db->insert_id();
          $update_sql = "UPDATE `users` SET `last_login` = '$now', `active`= 1 WHERE `users`.`social_id` = '$social_id'";
          $query = $this->db->query($update_sql);
          if($query == 1){
            $result['user_id'] = $user_id;
            $result['social_id'] = $social_id;
            $result['status']='true';
            $result['msg'] = "user adeed  successfully";
          }else{
            $result['status']='false';
            $result['msg'] = "user login query failed";
          }
          $result['status']='true';
          $result['msg'] = "user added in successfully";
      }else{
        $result['status']='false';
        $result['msg'] = "user insert query failed";
      }

  }
  return $result;
}

public function getProfile($social_id){
      $id = $social_id;
      $profile_sql = "select social_id,first_name,last_name,email,phone,full_name,created_on,last_login from users where social_id = '$id'";
      $query = $this->db->query($profile_sql);
      if ( $query->num_rows() > 0 )
      {
       $result['data'] = $query->result();
       $result['status']='true';
       $result['msg'] = "user profile exists";
      }
      else{
       $result['status']='false';
       $result['msg'] = "user profile does not exists";
      }
      return $result;
  }

    public function logoutUser($data){
      $social_id = $data['social_id'];
      $now = $data['last_login'];
      $profile_sql = "select * from users where social_id = '$social_id'";
      $query = $this->db->query($profile_sql);
      if ( $query->num_rows() > 0 )
      {
        $update_sql = "UPDATE `users` SET `last_logout` = '$now', `active`= 0 WHERE `users`.`social_id` = '$social_id'";
        $query = $this->db->query($update_sql);
        if($query == 1){
          $result['status']='true';
          $result['msg'] = "user logged out successfully";
        }else{
          $result['status']='false';
          $result['msg'] = "user logout query failed";
        }
      }
      else{
          $result['status']='false';
          $result['msg'] = "user logout query failed";

      }
       return $result;
  }

}
