<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
	
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Products_model', '', true);
    }
 
    public function index()
    {                                
        $aGet=$this->input->get(); 
        
        $aDataList=array();
        $aPage=array();
        $iCurrent=(empty($aGet['page']))?0:$aGet['page'];
        $this->Products_model->getDataList($aDataList, $iCurrent, $aPage);
        $data['aDataList']=$aDataList;
        $data['page']=$aPage;
        unset($aDataList);  
        unset($aPage);
        
        $this->load->view('products/products_index', $data);
    }
    
    public function info()
    {
        $aGet=$this->input->get();
        
        $aData=array();
        $aImgs=array();
        $this->Products_model->getData($aGet, $aData, $aImgs);
        $data['aData']=$aData;
        $data['aImgs']=$aImgs;
        unset($aData);
        unset($aImgs);
        
        $this->load->view('products/products_info', $data);
    }
    
    
}