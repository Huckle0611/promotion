<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
    
    public function addCont($aPost){
        
        switch(true){
            case (strlen($aPost['name'])<1 || strlen($aPost['name']) > 20):
                $sStat = 2;
                break;
            case (strlen($aPost['email'])<1 || strlen($aPost['email']) > 100):
                $sStat = 3;
                break;
            case (strlen($aPost['contact_number'])<2 || strlen($aPost['contact_number']) > 20):
                $sStat = 4;
                break;
            case (strlen($aPost['con'])<2 || strlen($aPost['con']) > 500):
                $sStat = 5;
                break;
            default :
                $aInData = array(
                    'name' => $aPost['name'],
                    'email' => $aPost['email'],
                    'telephone' => $aPost['contact_number'],
                    'content' => $aPost['con'],
                    'ip' => $this->getIp(),
                    'createtime' => date('Y-m-d H:i:s')
                );
                $this->db->insert('p_contact', $aInData);
                $insertid=$this->db->insert_id();
                $sStat = !empty($insertid) ? 1 : 0;
        }
        
        return array('status' => $sStat);
    }
        
    public function getIp(){
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")){
            $ip = getenv("HTTP_CLIENT_IP");
        }
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){
            $ip = getenv("HTTP_X_FORWARDED_FOR");        
        }
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")){
            $ip = getenv("REMOTE_ADDR");
        }
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")){
            $ip = $_SERVER['REMOTE_ADDR'];
        }else{
            $ip = "unknown";
        }
        return($ip);    
    }
    
    
}