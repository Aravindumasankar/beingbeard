<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yoga extends Admin_Controller {

	public function index()
	{
		$crud = $this->generate_crud('yoga'); 
        $crud->columns('id','asana','bg_color','status','added_on');
        $this->config->set_item('grocery_crud_file_upload_allow_file_types',
		'gif|jpeg|jpg|png');
        $crud->set_field_upload('image_url', 'assets/uploads/being_beard/yoga');
        $crud->callback_column('bg_color',array($this,'renderColor'));
        $crud->callback_add_field('path',array($this,'YogaPath'));
		$crud->callback_edit_field('path',array($this,'YogaPath'));
		$crud->order_by('id','desc');
        $this->mPageTitle = 'Beard Yoga';
		$this->render_crud();
    }
    function YogaPath($value){
            $value = 'assets/uploads/being_beard/yoga/';
            $return = '<input type="text" name="path" value="'.$value.'" /> ';
            return $return;
        }
    public function showImage($value, $row) {
        return "<img src='$row->path$row->image_url' width=100 >";
        }
    function renderColor($value,$row){
        $color_code = $row->bg_color;
        $site_url = $this->config->site_url();
        $value = $site_url.'assets/uploads/being_beard/yoga/';
        return "<div style='background-color:$color_code;margin:auto;text-align:center;'><img src=$value$row->image_url width=50;height:50 style='margin:auto'; ></div>";
        }

	
}
