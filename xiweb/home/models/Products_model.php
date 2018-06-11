<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
    
    public function getDataList(&$aDataList, $iCurrent, &$aPage)
    {
        $sNumSql="SELECT COUNT(*) as num FROM `p_products`";
        $numquery = $this->db->query($sNumSql);
        $aNum = $numquery->row_array();
        $iAllPageNum = ceil($aNum['num']/12);
        $iLimit = ($iCurrent==0)?$iCurrent:($iCurrent-1)*12;
        
        $sSelectSql = "SELECT p.id,p.title,p.createtime,pi.imgname "
                . "FROM `p_products` AS p LEFT JOIN `p_products_imgs` AS pi ON p.id=pi.pid "
                . "ORDER BY p.id DESC LIMIT ".$iLimit.", 12";
        $bigquery = $this->db->query($sSelectSql);
        $aDataList = $bigquery->result_array();       
        foreach($aDataList as $k => $v){
            $aDataList[$k]["ymd"] = date("Ymd", $v['createtime']);
        }      
        
        $this->load->model('Page_model');
        $this->Page_model->getPage($aPage, $iCurrent, $iAllPageNum, '/index.php/products/index', 5);
                
    }
    
    public function getData($aGet, &$aData, &$aImgs){
        $sDataSql = "SELECT id,title,createtime,content,author "
                . "FROM `p_products` WHERE id=".$aGet['id'];
        $sDataQuery = $this->db->query($sDataSql);
        $aData = $sDataQuery->row_array();
        $aData['ymd'] = date('Ymd', $aData['createtime']);
        $aData['datetime'] = date('Y-m-d H:i', $aData['createtime']);
        
        $sImgsSql = "SELECT imgname FROM `p_products_imgs` WHERE pid=".$aGet['id'];
        $sImgsQuery = $this->db->query($sImgsSql);
        $aImgs = $sImgsQuery->result_array();
    }
    
    
}