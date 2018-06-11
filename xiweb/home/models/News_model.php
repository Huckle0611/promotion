<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {
    
    public function getDataList(&$aDataList, $iCurrent, &$aPage)
    {
        $sNumSql="SELECT COUNT(*) as num FROM `p_news`";
        $numquery = $this->db->query($sNumSql);
        $aNum = $numquery->row_array();
        $iAllPageNum = ceil($aNum['num']/12);
        $iLimit = ($iCurrent==0)?$iCurrent:($iCurrent-1)*12;
        
        $sSelectSql = "SELECT p.id,p.title,p.createtime,p.content,p.author,pi.imgname "
                . "FROM `p_news` AS p LEFT JOIN `p_news_imgs` AS pi ON p.id=pi.pid "
                . "ORDER BY p.id DESC LIMIT ".$iLimit.", 12";
        $bigquery = $this->db->query($sSelectSql);
        $aDataList = $bigquery->result_array();       
        foreach($aDataList as $k => $v){
            $aDataList[$k]["ymd"] = date("Ymd", $v['createtime']);
            $aDataList[$k]["date"] = date("Y-m-d", $v['createtime']);
        }      
        
        $this->load->model('Page_model');
        $this->Page_model->getPage($aPage, $iCurrent, $iAllPageNum, '/index.php/news/index', 5);                
    }
    
    public function getData($aGet, &$aData, &$aImgs){
        $sDataSql = "SELECT id,title,createtime,content,author "
                . "FROM `p_news` WHERE id=".$aGet['id'];
        $sDataQuery = $this->db->query($sDataSql);
        $aData = $sDataQuery->row_array();
        $aData['ymd'] = date('Ymd', $aData['createtime']);
        $aData['datetime'] = date('Y-m-d H:i', $aData['createtime']);
        
        $sImgsSql = "SELECT imgname FROM `p_news_imgs` WHERE pid=".$aGet['id'];
        $sImgsQuery = $this->db->query($sImgsSql);
        $aImgs = $sImgsQuery->result_array();
    }
    
    
}