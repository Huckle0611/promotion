<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    
    public $aCateData=array();

    public function __construct(){
        parent::__construct();
        
        $this->load->library('session');
        
        $this->isAdmin();
        
        $this->getCateData($this->aCateData);       
        
        $this->contro_name=$this->router->fetch_class();
        $this->func_name=$this->router->fetch_method();
        $this->tname=$this->input->get('tname');
        $this->firstid=$this->input->get('firstid');
        $this->secondid=$this->input->get('secondid');
            
        $this->noread = $this->getNoRead();
    }
    
    public function __destruct() {
        
        unset($this->aCateData);      
    }

    public function isAdmin()
    {
        if(!empty($this->session->uinfo))
        {
            $aSessUinfo=$this->session->uinfo;
            $sFilePath=FCPATH."data/temp/admin/".$aSessUinfo['uname'].".json";
            $fp=fopen($sFilePath, "r");
            $sJsonData=fread($fp, filesize($sFilePath));            
            fclose($fp);
            
            $aUinfo=json_decode($sJsonData, true);  
            unset($sJsonData);
            
            if($aSessUinfo['identifiers']!=$aUinfo[$aSessUinfo['id']])
            {
                $this->session->unset_userdata('uinfo');
                header("Location: /admin.php/login/index"); 
                exit;
            }
            
        }else{
            header("Location: /admin.php/login/index"); 
            exit;
        }        
    }
    
    public function getCateData(&$aCateData)
    {        
        $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
        $fp=fopen($sFilePath, "r");
        $sJsonData=fread($fp, filesize($sFilePath));            
        fclose($fp);

        $aCateData=json_decode($sJsonData, true);  
        unset($sJsonData);
    }
    
    public function getNoRead()
    {
        $sFilePath=FCPATH."data/temp/adminhome/noreadct.json";
        $fp=fopen($sFilePath, "r");
        $sJsonData=fread($fp, filesize($sFilePath));            
        fclose($fp);
        $aNoReadData=json_decode($sJsonData, true);  
        return $aNoReadData['noread'];
    }
    
    
}
