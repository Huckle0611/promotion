<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
	
    public function __construct() {
        parent::__construct();
        
        $this->load->model('News_model', '', true);
    }
    
    public function index()
    {
        $aGet=$this->input->get(); 
        
        $aDataList=array();
        $aPage=array();
        $iCurrent=(empty($aGet['page']))?0:$aGet['page'];
        $this->News_model->getDataList($aDataList, $iCurrent, $aPage);
        $data['aDataList']=$aDataList;
        $data['page']=$aPage;
        unset($aDataList);  
        unset($aPage);
        
        $this->load->view('news/news_index', $data);
    }
    
    public function info()
    {
        $aGet=$this->input->get();
        
        $aData=array();
        $aImgs=array();
        $this->News_model->getData($aGet, $aData, $aImgs);
        $data['aData']=$aData;
        $data['aImgs']=$aImgs;
        unset($aData);
        unset($aImgs);
        
        $this->load->view('news/news_info', $data);
    }
 
    
}