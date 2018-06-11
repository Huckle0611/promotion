<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends MY_model
{
    
    public function getDataLists(&$aDataList, $iCurrent, &$aPage)
    {
        $sNumSql="SELECT COUNT(*) as num FROM `p_contact`";
        $numquery = $this->db->query($sNumSql);
        $aNum = $numquery->row_array();
        $iAllPageNum = ceil($aNum['num']/20);
        $iLimit = ($iCurrent==0)?$iCurrent:($iCurrent-1)*20;
        
        $sListSql="SELECT * FROM `p_contact` ORDER BY id DESC LIMIT ".$iLimit.", 20";
        $listquery = $this->db->query($sListSql);
        $aDataList = $listquery->result_array();
        
        $this->load->model('Page_model');
        $this->Page_model->getPage($aPage, $iCurrent, $iAllPageNum, '', 5);
    }
    
    public function getDataInfo($aGet, &$aData)
    {
        $sSql = "SELECT * FROM `p_contact` WHERE id=".$aGet['infoid'];
        $sQuery = $this->db->query($sSql);
        $aData = $sQuery->row_array();
    }
    
}