<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Home_model', '', true);
    }
    
    public function index()
    {
                
        $sFilePath=FCPATH."data/temp/adminhome/number.json";
        $jsondatafile = fopen($sFilePath, "r");
        $sJsonData=fread($jsondatafile, filesize($sFilePath));            
        fclose($jsondatafile);
        
        $data['num']=json_decode($sJsonData, true);  
        unset($sJsonData);
        
        $this->load->view('home/home_index', $data);
    }

            
        
}
