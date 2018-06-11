<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cate extends MY_Controller
{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Cate_model', '', true);
    }
    
    public function lists()
    {        
        $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
        $jsondatafile = fopen($sFilePath, "r");
        $sJsonData=fread($jsondatafile, filesize($sFilePath));            
        fclose($jsondatafile);
        
        $data['cate']=json_decode($sJsonData, true);  
        unset($sJsonData);
        
        $this->load->view('cate/cate_lists', $data);
    }
    
    public function add()
    {
        $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
        $jsondatafile = fopen($sFilePath, "r");
        $sJsonData=fread($jsondatafile, filesize($sFilePath));            
        fclose($jsondatafile);
        
        $aCate=json_decode($sJsonData, true);          
        unset($sJsonData);
        
        $data=array();
        foreach($aCate as $k => $v)
        {
            $data['bigcate'][]=array(
                'bigcateid'=>$k,
                'bigcatename'=>$v['catename']
            );
        }
        unset($aCate);
        
        $this->load->view('cate/cate_add', $data);
    }
    
    public function getfirstadd()
    {
        $sCatename=$this->input->post('catename');
        $sTname=$this->input->post('tname');
        $res=$this->Cate_model->addfirstcate($sCatename, $sTname);
        if($res){
            $aResult=array('status'=>1);
        }else
        {
            $aResult=array('status'=>0, 'msg'=>'由于服务器原因，添加失败，请稍后再试！');
        }
        echo json_encode($aResult);        
    }
    
    public function edit()
    {
        $aGet=$this->input->get();
        
        $sFilePath=FCPATH."data/temp/cate/catecrumbs.json";
        $jsondatafile = fopen($sFilePath, "r");
        $sJsonData=fread($jsondatafile, filesize($sFilePath));            
        fclose($jsondatafile);
        
        $aCate=json_decode($sJsonData, true);          
        unset($sJsonData);
        
        $data=array();
        if(!empty($aGet['firstid']))
        {
            $data['first']['firstid']=$aGet['firstid'];
            $data['first']['catename']=$aCate[$aGet['firstid']]['catename'];            
        }
        
        if(!empty($aGet['secondid']))
        {
            $data['second']=array(
                'secondid'=>$aGet['secondid'],
                'pid'=>$aGet['pid'],
                'secondid'=>$aGet['secondid'],
                'catename'=>$aCate[$aGet['pid']]['son'][$aGet['secondid']]['catename'],
                'descri'=>$aCate[$aGet['pid']]['son'][$aGet['secondid']]['descri'],
                'tname'=>$aCate[$aGet['pid']]['son'][$aGet['secondid']]['tname']
            );
            
            foreach($aCate as $k => $v)
            {
                $data['bigcate'][]=array(
                    'bigcateid'=>$k,
                    'bigcatename'=>$v['catename']
                );
            }
        }
        unset($aCate);        
        
        
        $this->load->view('cate/cate_edit', $data);
    }
    
    public function getfirstedit()
    {
        $aPost=$this->input->post();
        $res=$this->Cate_model->editfirstcate($aPost);
        if($res){
            $aResult=array('status'=>1);
        }else
        {
            $aResult=array('status'=>0, 'msg'=>'由于服务器原因，修改失败，请稍后再试！');
        }
        echo json_encode($aResult);   
    }
       
    
}