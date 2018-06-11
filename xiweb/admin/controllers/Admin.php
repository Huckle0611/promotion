<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Admin_model', '', true);
    }

    public function look()
    {
        
        $aUinfo=array();
        $this->Admin_model->getUinfoList($aUinfo);
        
        $data['uinfo']=$aUinfo;
        
        $this->load->view('admin/admin_look', $data);
    }
    
    public function editinfo()
    {
        $this->load->view('admin/admin_editinfo');        
    }
    
    public function geteditinfo()
    {
        $aPost=$this->input->post();
        $res=$this->Admin_model->edituinfo($aPost);
        if(!empty($res))
        {
            echo json_encode(array('status'=>1, 'username'=>$aPost['username'], 'msg'=>'修改成功，请重新登录！'));
        }else
        {
            echo json_encode(array('status'=>0, 'msg'=>'由于服务器原因，修改失败，请稍后再试！'));
        }        
    }
    
    public function editpwd()
    {
        $this->load->view('admin/admin_editpwd');
    }
    
    public function geteditpwd()
    {
        $aPost=$this->input->post();
        $res=$this->Admin_model->editpwd($aPost);
        if(!empty($res))
        {
            $this->session->unset_userdata('uinfo');
            echo json_encode(array('status'=>1, 'msg'=>'修改成功，请重新登录！'));
        }else
        {
            echo json_encode(array('status'=>0, 'msg'=>'由于服务器原因，修改失败，请稍后再试！'));
        }        
    }
    
    
}