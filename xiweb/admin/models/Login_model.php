<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model
{
    
    public function isWebAdmin(&$aPost)
    {
        $sPword=md5($aPost['password']);
        
        $sql="SELECT id FROM `p_admin` "
                . "WHERE uname='".$aPost['username']."' AND pword='".$sPword."'";
        $query = $this->db->query($sql);
        $aAdmin = $query->row_array();
        if(empty($aAdmin))
        {
            return 0;
        }else
        {
            $lastlogintime=time();
            $identifiers=md5(substr($aPost['username'], 2).substr($lastlogintime, -5));
            $this->db->where('id', $aAdmin['id']);
            $this->db->update('admin', array('identifiers'=>$identifiers, 'lastlogintime'=>$lastlogintime));
            
            $this->session->uinfo=array('id'=>$aAdmin['id'], 'uname'=>$aPost['username'], 'identifiers'=>$identifiers);
            
            $sUinfoJson=json_encode(array($aAdmin['id']=>$identifiers));
            $sFilePath=FCPATH."data/temp/admin/".$aPost['username'].".json";
            $jsondatafile = fopen($sFilePath, "w");
            fwrite($jsondatafile, $sUinfoJson);
            fclose($jsondatafile);
            
            return 1;
        }
        
        
    }
    
    
}