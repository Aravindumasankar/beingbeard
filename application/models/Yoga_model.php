<?php

class Yoga_model extends MY_Model {

  public function getYoga() {
    $sql = "select * from `yoga` where image_url != '' and status=1  ORDER BY RAND()";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
       {
        return $query->result_array();
       }
       else {
         return NULL;
       }

  }

  public function detail($campaign_id){
    $id = $campaign_id;
    $sql = "select * from `beard_campaigns` where id='$id' ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0)
       {
        return $query->row_array();
       }
       else {
         return NULL;
       }

  }

  public function try_campaign($campaign_id,$user_id) {
    $user_id = $user_id;
    $campaign_id = $campaign_id;
    $current_timestamp = date('Y-m-d h:i:s');
    $sql = "INSERT INTO `user_campaigns` (`id`, `user_id`, `campaign_id`, `status`, `added_on`) VALUES (NULL, '$user_id', '$campaign_id', '1', '$current_timestamp');";
    $query = $this->db->query($sql);
    print_r($query);
    die();
    /*if ($query->num_rows() > 0)
       {
        return $query->result_array();
       }
       else {
         return NULL;
       }*/

  }
}
