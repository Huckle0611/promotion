<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        
        $this->load->model('Login_model', '', true);
    }

    public function index()
    {
                
        $this->load->view('login/login_index');
    }
    
    public function enterAdmin()
    {
                
        $aPost=$this->input->post();
        
        $iRes=$this->Login_model->isWebAdmin($aPost);
        if($iRes)
        {
            header("Location: /admin.php/home/index");
        }else
        {
            header("Location: /admin.php/login/loginJumpPage");            
        }
        exit;
    }
    
    public function loginJumpPage()
    {
        
        $this->load->view('login/login_jump');
    }
    
    public function loginout()
    {        
        $this->session->unset_userdata('uinfo');
        header("Location: /admin.php/login/index");
        exit;
    }
    
    public function lockuser()
    {
        $sUser=$this->input->get('user');
                   
        $this->session->unset_userdata('uinfo');
        
        $data['uname']=$sUser;
        
        $this->load->view('login/login_lockuser', $data);
    }
    
    public function unlocked()
    {
        $aPost=$this->input->post();
        
        $iRes=$this->Login_model->isWebAdmin($aPost);
        
        if($iRes)
        {
            $aRes=array('status'=>1, 'msg'=>'解锁成功');
        }else
        {
            $aRes=array('status'=>0);
        }
        echo json_encode($aRes, true);
    }
    
    
}