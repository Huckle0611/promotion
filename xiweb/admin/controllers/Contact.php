<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Contact_model', '', true);
    }
    
    public function index()
    {        
        $aGet=$this->input->get(); 
        
        $aDataList=array();
        $aPage=array();
        $iCurrent=(empty($aGet['page']))?0:$aGet['page'];
        $this->Contact_model->getDataLists($aDataList, $iCurrent, $aPage);
        $data['lists']=$aDataList;
        $data['page']=$aPage;
        unset($aDataList);  
        unset($aPage);
                
        $this->load->view('contact/contact_lists', $data);
    }
    
    public function look(){
        $aGet=$this->input->get();
        
        $aData=array();
        $this->Contact_model->getDataInfo($aGet, $aData);
        $data['data']=$aData;
        
        $this->load->view('contact/contact_look', $data);
    }
    
    public function clearnoreadnum(){
        $sNoReadFilePath='./data/temp/adminhome/noreadct.json';
        $sNoReadJsonwrite=json_encode(array('noread'=>0));
        $noReadjsonwrite=fopen($sNoReadFilePath, "w");
        fwrite($noReadjsonwrite, $sNoReadJsonwrite);
        fclose($noReadjsonwrite);
        echo json_encode(array("status"=>1));
    }
    
    
}