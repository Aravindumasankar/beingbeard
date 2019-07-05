<?php

class Campaigns_model extends MY_Model {
    
    function getFeeds($limit){
    if($limit){
        $sql = "SELECT * FROM `feeds` order by feed_date desc limit $limit";
    }else{
        $sql = "SELECT * FROM `feeds` order by feed_date desc";
    }
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     return $query->result_array();
    }
}

    function getTrendingCampaigns(){
    $sql = "SELECT * FROM `beard_campaigns` where  label='trending' and status = 1 order by added_on desc";
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     return $query->result_array();
    }
}

    function getQuote(){
    $sql = "SELECT quote,author FROM quotes ORDER BY RAND() LIMIT 1";
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     return $query->row();
    }
}
    function didyouknow(){
    $sql = "SELECT * FROM did_you_know ORDER BY RAND() LIMIT 1";
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     return $query->row();
    }
}

    function getCampaigns(){
    $sql = "SELECT * FROM `beard_campaigns` where status = 1";
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     return $query->result_array();
    }
}

    function getCampaign($id){
    $campaign_id = $id;
    $sql = "SELECT * FROM `beard_campaigns` where  id='$campaign_id' and status = 1";
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     return $query->result_array();
    }
}


    function getMonthlyContest(){
    $year = date("Y"); // 2011
    $month = date("m");
    $sql = "SELECT * FROM `beard_month_campaigns` where campaign_month = '$month' and campaign_year = '$year' and status = 1 ";
    $query = $this->db->query($sql);
    if ( $query->num_rows() > 0 )
    {
     $result['data'] = $query->row();
    }
    else{
     $reslut['msg'] = "No Campaigns Found!";
    }
     return $result;
    }

}
