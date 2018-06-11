<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends MY_Controller
{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Website_model', '', true);
    }
    
    public function index()
    {
        $sFilePath="./data/temp/website/website.json";
        $jsondatafile = fopen($sFilePath, "r");
        $sJsonWebsite=fread($jsondatafile, filesize($sFilePath));            
        fclose($jsondatafile);
                
        $data['website']=json_decode($sJsonWebsite, true);
        unset($sJsonWebsite);
        
        $this->load->view('website/website_index', $data);
    }
    
    public function getdata()
    {
        $aPost=$this->input->post();
        
        $isSuc=$this->Website_model->saveWebsite($aPost);
        if($isSuc==true)
        {
            $aRes=array('status'=>1);
        }else
        {
            $aRes=array('status'=>0, 'msg'=>'由于服务器原因，提交失败，请稍后再试！');
        }
        echo json_encode($aRes);        
    }
    
    
}