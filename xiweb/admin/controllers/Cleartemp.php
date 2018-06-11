<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cleartemp extends MY_Controller
{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Cleartemp_model', '', true);
    }   

    public function index()
    {             
        $sCode=rand(1000, 9999);
        $this->session->randcode=$sCode;
        $data['code']=$sCode;
        
        $this->load->view('cleartemp/cleartemp_index', $data);
    }
    
    public function startclear()
    {
        $sCode=$this->input->post('code');
        $iStep=$this->input->post('step');
        if($sCode!=$this->session->randcode)
        {
            $aRes=array('status'=>0, 'msg'=>'更新失败，无权限');            
        }else
        {
            switch ($iStep)
            {
                case 1:
                    $this->Cleartemp_model->clearadmin();
                    $aRes=array('status'=>1, 'step'=>$iStep+1, 'msg'=>'<div class="controls">开始更新。。。</div><div class="controls">更新后台管理员数据。。。</div>');
                    break;
                case 2:
                    $this->Cleartemp_model->clearadminhome();
                    $aRes=array('status'=>1, 'step'=>$iStep+1, 'msg'=>'<div class="controls">更新后台首页数据。。。</div>');
                    break;
                case 3:
                    $this->Cleartemp_model->clearcate();
                    $aRes=array('status'=>1, 'step'=>$iStep+1, 'msg'=>'<div class="controls">更新分类数据。。。</div>');
                    break;
                case 4:
                    $this->Cleartemp_model->clearimgs();
                    $aRes=array('status'=>1, 'step'=>$iStep+1, 'msg'=>'<div class="controls">更新缓存图片。。。</div>');
                    break;
                case 5:
                    $this->Cleartemp_model->clearwebsite();
                    $aRes=array('status'=>2, 'step'=>$iStep+1, 'msg'=>'<div class="controls">更新网站设置。。。</div><div class="controls">完成更新。。。</div>');
                    break;
            }               
        }
        echo json_encode($aRes);        
    }
        
    
}