<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
	
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Contact_model', '', true);
    }
    
    public function index()
    {
        $this->load->view('contact/contact_index');
    }
    
    public function getaddcont(){
        
        $aPost = $this->input->post();
        
        $aResult = $this->Contact_model->addCont($aPost);
        if($aResult['status'] > 0){
            $sFilePath=FCPATH."data/temp/adminhome/noreadct.json";
            $jsondatafile = fopen($sFilePath, "r");
            $sJsonData=fread($jsondatafile, filesize($sFilePath));  
            $aNoRead=json_decode($sJsonData, true); 
            $aNoRead['noread']++;
            fclose($jsondatafile);
            
            $sNoReadJsonwrite=json_encode($aNoRead);
            $noReadjsonwrite=fopen($sFilePath, "w");
            fwrite($noReadjsonwrite, $sNoReadJsonwrite);
            fclose($noReadjsonwrite);            
        }
        echo json_encode($aResult);
    }
    
    
}