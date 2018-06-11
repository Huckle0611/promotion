<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cleartemp_model extends MY_model
{
    
    public function clearadmin()
    {        
        $sql="SELECT id,uname,identifiers FROM `p_admin` ";
        $query = $this->db->query($sql);
        $aUinfo = $query->result_array();
        
        $sFile=glob('./data/temp/admin/*');
        foreach($sFile as $v){
            if(is_file($v) && $v!=$this->session->uinfo['uname'].'.json'){
                unlink($v);
            }
        }
                
        foreach($aUinfo as $v)
        {
            $sFilePath='./data/temp/admin/'.$v['uname'].'.json';
            $sJsonwrite=json_encode(array($v['id']=>$v['identifiers']));
            $jsonwrite=fopen($sFilePath, "w");
            fwrite($jsonwrite, $sJsonwrite);
            fclose($jsonwrite);
        }   
        unset($aUinfo);
    }
    
    public function clearadminhome()
    {
        $sAdminSql = "SELECT COUNT(*) AS num FROM `p_admin`";
        $sAdminQuery = $this->db->query($sAdminSql);
        $aAdminNum = $sAdminQuery->row_array();
        
        $sCateSql = "SELECT COUNT(*) AS num FROM `p_big_category`";
        $sCateQuery = $this->db->query($sCateSql);
        $aCateNum = $sCateQuery->row_array();
        
        $sProductSql = "SELECT COUNT(*) AS num FROM `p_products`";
        $sProductQuery = $this->db->query($sProductSql);
        $aProductNum = $sProductQuery->row_array();
        
        $sContactSql = "SELECT COUNT(*) AS num FROM `p_contact`";
        $sContactQuery = $this->db->query($sContactSql);
        $aContactNum = $sContactQuery->row_array();
                
        $sFilePath='./data/temp/adminhome/number.json';
        $sJsonwrite=json_encode(array('adminnum'=>$aAdminNum['num'], 'catenum'=>$aCateNum['num'], 'productnum'=>$aProductNum['num'], 'contactnum'=>$aContactNum['num']));
        $jsonwrite=fopen($sFilePath, "w");
        fwrite($jsonwrite, $sJsonwrite);
        fclose($jsonwrite);
        
        $sNoReadFilePath='./data/temp/adminhome/noreadct.json';
        $sNoReadJsonwrite=json_encode(array('noread'=>0));
        $noReadjsonwrite=fopen($sNoReadFilePath, "w");
        fwrite($noReadjsonwrite, $sNoReadJsonwrite);
        fclose($noReadjsonwrite);        
    }    

    public function clearcate()
    {
        $sql="SELECT id,catename,tname FROM `p_big_category`";
        $query = $this->db->query($sql);
        $aBig = $query->result_array();        
        
        $aCate=array();
        foreach($aBig as $k => $v)
        {
            $aCate[$v['id']] = array(
                'catename'=>$v['catename'],
                'tname'=>$v['tname']
            );                    
        }
        unset($aBig);
        $sJsonCate=json_encode($aCate);
        unset($aCate);
        
        $sFilePath='./data/temp/cate/catecrumbs.json';
        $jsonwrite=fopen($sFilePath, "w");
        fwrite($jsonwrite, $sJsonCate);
        fclose($jsonwrite);
        unset($sJsonCate);
    }
    
    public function clearimgs()
    {
        $sThumbFile=glob('./data/temp/imgs/thumb/*');
        foreach($sThumbFile as $v){
            if(is_file($v)){
                unlink($v);
            }
        }
        $sFile=glob('./data/temp/imgs/*');
        foreach($sFile as $v){
            if(is_file($v)){
                unlink($v);
            }
        }
    }
            
    public function clearwebsite()
    {
        $sDataSql="SELECT * FROM `p_website`";
        $dataquery = $this->db->query($sDataSql);
        $aWebsiteData = $dataquery->result_array();
        
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
    }
    
    
}