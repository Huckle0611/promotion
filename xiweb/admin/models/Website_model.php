<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_model extends MY_model
{
    
    public function saveWebsite(&$aPost)
    {
        $this->db->trans_start();
        
        foreach($aPost as $k => $v)
        {
            $sSql="SELECT id FROM `p_website` WHERE keyname='".$k."'";
            $query = $this->db->query($sSql);
            $aWebsite = $query->row_array();
            if(empty($aWebsite))
            {
                $aInsert=array(
                    'keyname'=>$k,
                    'value'=>$v
                );
                $this->db->insert('website', $aInsert);
            }else
            {
                $aUpdate=array(
                    'value'=>$v
                );
                $this->db->where('id', $aWebsite['id'])->update('website', $aUpdate);
            }
        }
        
        $sDataSql="SELECT * FROM `p_website`";
        $dataquery = $this->db->query($sDataSql);
        $aWebsiteData = $dataquery->result_array();
        
        $this->db->trans_complete();
        
        if($this->db->trans_status()===FALSE)
        {
            return false;
        }else
        {
            $aChangeWebsiteData=array();
            foreach($aWebsiteData as $v)
            {
                $aChangeWebsiteData[$v['keyname']]=$v['value'];
            }
            unset($aWebsiteData);

            $sJsonWebsite=json_encode($aChangeWebsiteData);
            unset($aChangeWebsiteData);

            $sFilePath="./data/temp/website/";
            if(!file_exists($sFilePath))
            {
                mkdir($sFilePath);
            }
            $sFilePath.="website.json";
            $jsondatafile = fopen($sFilePath, "w");
            fwrite($jsondatafile, $sJsonWebsite);            
            fclose($jsondatafile);
            unset($sJsonWebsite);

            return true;
        }        
    }
    
    
}