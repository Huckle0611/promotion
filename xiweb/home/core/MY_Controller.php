<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        
        $aWebsiteData=array();
        $this->getWebsite($aWebsiteData);
        $this->aWebsite=$aWebsiteData;
        unset($aWebsiteData);
        
        $this->contro_name=$this->router->fetch_class();
        $this->func_name=$this->router->fetch_method();
        
    }
    
    public function getWebsite(&$aWebsiteData)
    {
        $sFilePath="./data/temp/website/website.json";
        $jsondatafile = fopen($sFilePath, "r");
        $sJsonWebsite=fread($jsondatafile, filesize($sFilePath));            
        fclose($jsondatafile);
                
        $aWebsiteData=json_decode($sJsonWebsite, true);
        unset($sJsonWebsite);
    }
    
   
    
}