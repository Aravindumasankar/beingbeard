<?php

class Campaign_model extends MY_Model {

  public function getCampaigns() {
    $sql = "select * from `beard_campaigns` where image_url != '' and status=1  ORDER BY RAND() limit 9";
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

  public function tryCampaign($data) {
    $user_id = $data['user_id'];
    $campaign_id = $data['campaign_id'];
    $current_timestamp = date('Y-m-d h:i:s');
    $sql = "INSERT INTO `beard_user_campaigns` (`id`, `user_id`, `campaign_id`, `status`, `added_on`) VALUES (NULL, '$user_id', '$campaign_id', '1', '$current_timestamp');";
    $query = $this->db->query($sql);
    if($query == 1){
      $result['status'] = 'true';
      $result['message'] = 'Campaign Log Success';
    }else{
      $result['status'] = 'false';
      $result['message'] = 'Campaign Log failed';
    }
    return $result;

  }
}
