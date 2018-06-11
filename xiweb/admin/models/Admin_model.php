<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends MY_model
{
    
    public function getUinfoList(&$aUinfo)
    {
        $sql="SELECT id,uname,createtime,lastlogintime FROM `p_admin` ";
        $query = $this->db->query($sql);
        $aUinfo = $query->result_array();
        
        foreach($aUinfo as $k => $v)
        {
            $aUinfo[$k]['createtime']=date('Y-m-d H:i:s', $v['createtime']);
            $aUinfo[$k]['lastlogintime']=date('Y-m-d H:i:s', $v['lastlogintime']);
        }        
    }
    
    public function edituinfo(&$aPost)
    {
        
        $this->db->where('id', $this->session->uinfo['id']);
        $res=$this->db->update('admin', array('uname'=>$aPost['username']));
        if(!empty($res))
        {
            $_SESSION['uinfo']['uname']=$aPost['username'];
        }
        return empty($res)?0:1;
    }
    
    public function editpwd(&$aPost)
    {
        $this->db->where('id', $this->session->uinfo['id']);
        $res=$this->db->update('admin', array('pword'=>md5($aPost['password'])));
        return empty($res)?0:1;        
    }
    
    
}