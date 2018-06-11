<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->model('Home_model', '', true);
        
        $aDataList=array();
        $this->Home_model->getDataList($aDataList);
        $data['aDataList'] = $aDataList;
        unset($aDataList);
        
        $this->load->view('home/home_index', $data);
    }

        
}
