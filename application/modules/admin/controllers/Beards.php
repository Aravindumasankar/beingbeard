<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beards extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
	}

	// Frontend Campaigns CRUD
	public function index()
	{
		$crud = $this->generate_crud('beard_campaigns'); 
        $crud->columns('id','label','campaign_name','bg_color','status','added_on');
        $this->config->set_item('grocery_crud_file_upload_allow_file_types',
		'gif|jpeg|jpg|png');
        $crud->set_field_upload('image_url', 'assets/uploads/being_beard/campaigns');
        $crud->callback_column('bg_color',array($this,'renderColor'));
        $crud->callback_add_field('path',array($this,'CampaignPath'));
        $crud->callback_edit_field('path',array($this,'CampaignPath'));
        $this->mPageTitle = 'Beard Campaigns';
		$this->render_crud();
    }
    function CampaignPath($value){
            $value = 'assets/uploads/being_beard/campaigns/';
            $return = '<input type="text" name="path" value="'.$value.'" /> ';
            return $return;
        }
    public function showImage($value, $row) {
        return "<img src='$row->path$row->image_url' width=100 >";
        }
    public function renderColor($value,$row){
        $color_code = $row->bg_color;
        $site_url = $this->config->site_url();
        $value = $site_url.'assets/uploads/being_beard/campaigns/';
        return "<div style='background-color:$color_code;margin:auto;text-align:center;'><img src=$value$row->image_url width=50;height:50 style='margin:auto'; ></div>";
        }
    
    
    
    // Grocery CRUD - Beard - Month Campaigns 
	public function monthCampaigns()
	{
		$crud = $this->generate_crud('beard_month_campaigns');
		$this->config->set_item('grocery_crud_file_upload_allow_file_types',
		'gif|jpeg|jpg|png');
        $crud->callback_add_field('path',array($this,'addMonthCampaignPath'));
        $crud->callback_edit_field('path',array($this,'addMonthCampaignPath'));
        $crud->set_field_upload('campaign_thumbnail', 'assets/uploads/being_beard/month_campaigns');
        $crud->callback_column('campaign_thumbnail',array($this,'showImg'));
        $crud->set_field_upload('add_img_1', 'assets/uploads/being_beard/month_campaigns');
        $crud->callback_column('add_img_1',array($this,'showImage1'));
        $crud->set_field_upload('add_img_2', 'assets/uploads/being_beard/month_campaigns');
        $crud->callback_column('add_img_2',array($this,'showImage2'));
        $crud->set_field_upload('add_img_3', 'assets/uploads/being_beard/month_campaigns');
        $crud->callback_column('add_img_3',array($this,'showImage3'));
        $this->mPageTitle = 'Month Campaigns';
        $crud->order_by('id','desc');
        $this->render_crud();
	}
        
        function addMonthCampaignPath($value){
            $site_url = $this->config->base_url();
            $value = $site_url.'assets/uploads/being_beard/month_campaigns/';
            $return = '<input type="text" name="path" value="'.$value.'" /> ';
            return $return;   
        }
        public function showImg($value, $row) { 
        $site_url = $this->config->base_url();
        $value = $site_url.'assets/uploads/being_beard/month_campaigns/';
        return "<img src='$row->path$row->campaign_thumbnail' width=100 >";
        }
        public function showImage1($value, $row) { 
        $site_url = $this->config->base_url();
        $value = $site_url.'assets/uploads/being_beard/month_campaigns/';
        return "<img src='$row->path$row->add_img_1' width=100 >"; 
        }
         public function showImage2($value, $row) {  
        $site_url = $this->config->base_url();
        $value = $site_url.'assets/uploads/being_beard/month_campaigns/';
        return "<img src='$row->path$row->add_img_2' width=100 >"; 
        }
        public function showImage3($value, $row) {
        $site_url = $this->config->base_url();
        $value = $site_url.'assets/uploads/being_beard/month_campaigns/';
        return "<img src='$row->path$row->add_img_3' width=100 >"; 
            }
    
    public function quotes()
	{
		$crud = $this->generate_crud('beard_quotes');
        $crud->set_relation('beards_campaign_id','beard_campaigns','campaign_name');
        $this->config->set_item('grocery_crud_file_upload_allow_file_types',
		'gif|jpeg|jpg|png');
        $crud->callback_add_field('path',array($this,'addQuotePath'));
        $crud->callback_edit_field('path',array($this,'addQuotePath'));
        $crud->set_field_upload('image_url', 'assets/uploads/being_beard/quotes');
        $crud->callback_column('image_url',array($this,'showFactImg'));
        $this->mPageTitle = 'Beard Facts';
		$this->render_crud();
    }

    public function facts()
	{
		$crud = $this->generate_crud('beard_facts');
        $crud->set_relation('beards_campaign_id','beard_campaigns','campaign_name');
        $this->config->set_item('grocery_crud_file_upload_allow_file_types',
		'gif|jpeg|jpg|png');
        $crud->set_field_upload('image_url', 'assets/uploads/being_beard/facts');
        $crud->callback_column('bg_color',array($this,'showFactImg'));
        $crud->callback_add_field('path',array($this,'FactPath'));
        $crud->callback_edit_field('path',array($this,'FactPath'));
        $this->mPageTitle = 'Beard Facts';
		$this->render_crud();
    }

    function addQuotePath($value){
        $site_url = $this->config->base_url();
        $value = 'assets/uploads/being_beard/quotes/';
        $return = '<input type="text" name="path" value="'.$value.'" /> ';
        return $return;
    }
    public function showQuoteImg($value, $row) {
    $site_url = $this->config->base_url();
    $value = 'assets/uploads/being_beard/quotes/';
    return "<img src='$row->path$row->image_url' width=100 >";
    }

   
    function FactPath($value){
        $value = 'assets/uploads/being_beard/facts/';
        $return = '<input type="text" name="path" value="'.$value.'" /> ';
        return $return;
}



    function showFactImg($value,$row){
        $color_code = $row->bg_color;
        $site_url = $this->config->site_url();
        $value = $site_url.'assets/uploads/being_beard/facts/';
        return "<div><img src=$value$row->image_url width=50;height:50 style='margin:auto'; ></div>";
        }

    }
?>
