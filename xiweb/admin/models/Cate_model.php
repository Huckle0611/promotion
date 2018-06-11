<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cate_model extends MY_model
{
    
    public function addfirstcate($sCatename, $sTname)
    {
        $aInsert=array('catename'=>$sCatename, 'tname'=>$sTname);
        $res=$this->db->insert('big_category', $aInsert);
        if(!empty($res))
        {
            $id=$this->db->insert_id();
            
            $sCreateSql = "CREATE TABLE `p_".$sTname."` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `title` varchar(200) NOT NULL COMMENT '标题',
                `createtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
                `updatetime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
                `content` text NOT NULL COMMENT '内容',
                `author` VARCHAR(50) NOT NULL COMMENT '作者',
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='".$sCatename."'";
            $this->db->query($sCreateSql);
            
            $sCreateSql = "CREATE TABLE `p_".$sTname."_imgs` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
                `imgname` varchar(100) NOT NULL COMMENT '图片名称',
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='".$sCatename."图片表'";
            $this->db->query($sCreateSql);
                        
            $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
            $jsondatafile = fopen($sFilePath, "r");
            $sJsonData=fread($jsondatafile, filesize($sFilePath));            
            fclose($jsondatafile);
            
            $aCateData=json_decode($sJsonData, true);  
            unset($sJsonData);
            
            $aCateData[$id]=$aInsert;
            $sJsonwrite=json_encode($aCateData);
            $jsonwrite=fopen($sFilePath, "w");
            fwrite($jsonwrite, $sJsonwrite);
            fclose($jsonwrite);            
        }
        return empty($res)?0:1;
    }
    
    public function addsecondcate(&$aPost)
    {
        $aInsert=array(
            'big_cate_id'=>$aPost['bigcateid'],
            'catename'=>$aPost['catename'],
            'descri'=>$aPost['descr'],
            'tablename'=>$aPost['tablename']
        );
        unset($aPost);
        $res=$this->db->insert('small_category', $aInsert);
        if(!empty($res))
        {
            $id=$this->db->insert_id();
            $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
            $jsondatafile = fopen($sFilePath, "r");
            $sJsonData=fread($jsondatafile, filesize($sFilePath));            
            fclose($jsondatafile);
            
            $aCateData=json_decode($sJsonData, true);  
            unset($sJsonData);
            
            $aCateData[$aInsert['big_cate_id']]['son'][$id]=array(
                'tname'=>$aInsert['tablename'],
                'catename'=>$aInsert['catename'],
                'descri'=>$aInsert['descri']
            );
            $sJsonwrite=json_encode($aCateData);
            $jsonwrite=fopen($sFilePath, "w");
            fwrite($jsonwrite, $sJsonwrite);
            fclose($jsonwrite);            
        }
        return empty($res)?0:1;
    }
    
    public function editfirstcate(&$aPost)
    {        
        $this->db->where('id', $aPost['firstid']);
        $res=$this->db->update('big_category', array('catename'=>$aPost['catename']));        
        if(!empty($res))
        {
            $id=$aPost['firstid'];
            $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
            $jsondatafile = fopen($sFilePath, "r");
            $sJsonData=fread($jsondatafile, filesize($sFilePath));            
            fclose($jsondatafile);
            
            $aCateData=json_decode($sJsonData, true);  
            unset($sJsonData);
            
            $aCateData[$id]['catename']=$aPost['catename'];
            $sJsonwrite=json_encode($aCateData);
            $jsonwrite=fopen($sFilePath, "w");
            fwrite($jsonwrite, $sJsonwrite);
            fclose($jsonwrite);            
        }
        return empty($res)?0:1;
    }
    
    public function editsecondcate(&$aPost)
    {
        $this->db->where('id', $aPost['secondid']);
        $res=$this->db->update('small_category', 
                array(
                    'big_cate_id'=>$aPost['bigcateid'],
                    'catename'=>$aPost['catename'],
                    'descri'=>$aPost['descr'],
                    'tablename'=>$aPost['tablename']));  
        if(!empty($res))
        {
            $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
            $jsondatafile = fopen($sFilePath, "r");
            $sJsonData=fread($jsondatafile, filesize($sFilePath));            
            fclose($jsondatafile);
            
            $aCateData=json_decode($sJsonData, true);  
            unset($sJsonData);
            
            $aCateData[$aPost['bigcateid']]['son'][$aPost['secondid']]=array(
                'tname'=>$aPost['tablename'],
                'catename'=>$aPost['catename'],
                'descri'=>$aPost['descr']
            );
            $sJsonwrite=json_encode($aCateData);
            $jsonwrite=fopen($sFilePath, "w");
            fwrite($jsonwrite, $sJsonwrite);
            fclose($jsonwrite);             
        }
        return empty($res)?0:1;
    }
    
    
}
