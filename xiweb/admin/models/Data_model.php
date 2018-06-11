<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends MY_model
{
    
    public function getDataLists(&$aGet, &$aDataList, $iCurrent, &$aPage)
    {
        $sNumSql="SELECT COUNT(*) as num FROM `p_".$aGet['tname']."`";
        $numquery = $this->db->query($sNumSql);
        $aNum = $numquery->row_array();
        $iAllPageNum = ceil($aNum['num']/20);
        $iLimit = ($iCurrent==0)?$iCurrent:($iCurrent-1)*20;
        
        $sListSql="SELECT * FROM `p_".$aGet['tname']."` ORDER BY id DESC LIMIT ".$iLimit.", 20";
        $listquery = $this->db->query($sListSql);
        $aDataList = $listquery->result_array();
        foreach($aDataList as $k => $v)
        {
            $aDataList[$k]['createtime']=date('Y-m-d H:i:s', $v['createtime']);
        }        
        
        $this->load->model('Page_model');
        $this->Page_model->getPage($aPage, $iCurrent, $iAllPageNum, '?tname='.$aGet['tname'], 5);
    }
    
    public function getDataById(&$aGet, &$aData)
    {
        $infosql="SELECT * FROM `p_".$aGet['tname']."` WHERE id=".$aGet['infoid'];
        $infoquery = $this->db->query($infosql);
        $aData = $infoquery->row_array();
        $aData['createdate'] = date('Ymd', $aData['createtime']);
        $aData['createtime'] = date('Y-m-d H:i:s', $aData['createtime']);
        $aData['updatetime'] = date('Y-m-d H:i:s', $aData['updatetime']);        
        $aData['tname'] = $aGet['tname'];
        
        $imgsql="SELECT * FROM `p_".$aGet['tname']."_imgs` WHERE pid=".$aData['id'];
        $imgquery = $this->db->query($imgsql);
        $aData['imgs'] = $imgquery->result_array();        
    }
    
    public function deloneimgdata($imgid, $tname)
    {
        $this->db->where('id', $imgid);
        $this->db->delete($tname.'_imgs');        
    }
    
    public function editimgsdata(&$aPost)
    {
        $aUpData = array(
            'content' => $aPost['cont'],
            'updatetime' => time()
        );
        if(!empty($aPost['title']))
        {
            $aUpData['title'] = $aPost['title'];
        }
        $this->db->where('id', $aPost['pid']);
        
        $this->db->update($aPost['tname'], $aUpData);

        if(!empty($aPost['imgs']))
        {
            $aInImgs=array();
            foreach($aPost['imgs'] as $k => $v)
            {
                $aInImgs[$k]=array(
                    'pid'=>$aPost['pid'],
                    'imgname'=>$v
                );
            }
            $this->db->insert_batch($aPost['tname'].'_imgs', $aInImgs); 
            unset($aInImgs);
        }        
    }
    
    public function addimgsdata(&$aPost, $sUname)
    {
        if(!empty($aPost['title']))
        {
            $aUpData = array(
                'title' => $aPost['title'],
                'content' => $aPost['cont'],
                'createtime' => time(),
                'updatetime' => time(),
                'author' => $sUname
            );
            $this->db->insert($aPost['tname'], $aUpData);
            $pid=$this->db->insert_id();
        }
        if(!empty($aPost['imgs']))
        {
            $aInImgs=array();
            foreach($aPost['imgs'] as $k => $v)
            {
                $aInImgs[$k]=array(
                    'pid'=>$pid,
                    'imgname'=>$v
                );
            }
            $this->db->insert_batch($aPost['tname'].'_imgs', $aInImgs); 
            unset($aInImgs);
        }
    }
    
    public function delDataById(&$aImgs, $tname)
    {
        $aDel=array();
        foreach($aImgs as $v)
        {
            $sql="SELECT createtime FROM `p_".$tname."` WHERE id=".$v;
            $query = $this->db->query($sql);
            $aPer = $query->row_array();
            $aDel[$v]['createdate']=date('Ymd', $aPer['createtime']);
                        
            $sonsql="SELECT imgname FROM `p_".$tname."_imgs` WHERE pid=".$v;
            $sonquery = $this->db->query($sonsql);
            $aSon = $sonquery->result_array();
            foreach($aSon as $key => $val)
            {
                $aDel[$v]['son'][$key]=$val['imgname'];
            }
        }
        unset($aPer);
        unset($aSon);
        
        $this->db->trans_start();
        
        foreach($aImgs as $v)
        {
            $this->db->where('id', $v)->delete($tname);
            
            $this->db->where('pid', $v)->delete($tname.'_imgs');
        }
        
        $this->db->trans_complete();
        
        if($this->db->trans_status() === FALSE)
        {
            return false;            
        }else
        {
            foreach($aDel as $v)
            {
                if(!empty($v['son']))
                {
                    foreach($v['son'] as $val)
                    {
                        unlink('./data/upload/'.$tname.'/'.$v['createdate'].'/thumb/'.$val);
                        unlink('./data/upload/'.$tname.'/'.$v['createdate'].'/'.$val);
                    }
                }
            }   
            unset($aDel);
            return true;
        }        
    }
    
    
}