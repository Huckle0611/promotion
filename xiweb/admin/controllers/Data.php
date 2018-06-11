<?php

class Data extends MY_Controller
{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Data_model', '', true);
    }
    
    public function lists()
    {        
        $aGet=$this->input->get();      
        $data['tname']=$aGet['tname'];
        
        $aDataList=array();
        $aPage=array();
        $iCurrent=(empty($aGet['page']))?0:$aGet['page'];
        $this->Data_model->getDataLists($aGet, $aDataList, $iCurrent, $aPage);
        $data['lists']=$aDataList;
        $data['page']=$aPage;
        unset($aDataList);  
        unset($aPage);
        
        $this->load->view('data/data_lists', $data);
    }
    
    public function look()
    {
        $aGet=$this->input->get();
        
        $aData=array();
        $this->Data_model->getDataById($aGet, $aData);
        $data['data']=$aData;
        unset($aData);
        unset($aGet);
        
        $this->load->view('data/data_look', $data);
    }
    
    public function edit()
    {        
        $aGet=$this->input->get();
        
        $aData=array();
        $this->Data_model->getDataById($aGet, $aData);
        $data['data']=$aData;
        unset($aData);
        unset($aGet);
        
        $this->load->view('data/data_edit', $data);
    }
    
    public function uploadfile()
    {
        if(!empty($_FILES))
        {                       
            $filetype=substr(strrchr($_FILES["files"]["name"][0], "."), 1);
        
            $image = $_FILES["files"]["tmp_name"][0];
            $fp = fopen($image, "r");
            $file = fread($fp, $_FILES["files"]["size"][0]);  //二进制数据流

            $imgDir = './data/temp/imgs/';    
            if(!file_exists($imgDir)){
                mkdir($imgDir);
            }    
            $sMd5=md5($this->session->uinfo['uname'].time());
            $filename = substr($sMd5, 0, 2).mt_rand(100, 999).substr($sMd5, 5, 5).mt_rand(100, 999).substr($sMd5, 10, 5).mt_rand(100, 999).".".$filetype;
            $newFilePath = $imgDir.$filename;

            $newFile = fopen($newFilePath, "w"); //打开文件准备写入
            fwrite($newFile, $file); //二进制流写入文件
            fclose($newFile); //关闭文件
            
            $imgdst="./data/temp/imgs/thumb/";
            if(!file_exists($imgdst)){
                mkdir($imgdst);
            }  
            $imgnewdst=$imgdst.$filename;
            $this->setimgsize($newFilePath, 80, $imgnewdst);
            
            $aRes=array(
                "files"=>array(
                    array(
                        "url"=>"/data/temp/imgs/".$filename,
                        "thumbnail_url"=>"/data/temp/imgs/thumb/".$filename,
                        "name"=>$filename,
                        "type"=>$_FILES["files"]["type"][0],
                        "size"=>$_FILES["files"]["size"][0],
                        "delete_url"=>"/admin.php/data/deloneimg?imgname=".$filename,
                        "delete_type"=>"DELETE"
                    )
                )
            );            
            echo json_encode($aRes, JSON_UNESCAPED_SLASHES);
        }                
    }
    
    /**
     * 
     * @param type $imgpath 原图路径
     * @param type $newsetwidth 新图宽
     * @param type $imgdst 新图路径
     */
    public function setimgsize($imgpath, $newsetwidth, $imgdst)
    {
        $imginfo=getimagesize($imgpath);
        $width=$imginfo[0];
        $height=$imginfo[1];
        $type=$imginfo[2];
        
        $new_width=$width>$newsetwidth?$newsetwidth:$width; 
        $new_height=$height*$new_width/$width;
          
        switch($type){ 
            case 1: 
                $giftype=check_gifcartoon($imgpath); 
                if($giftype){ 
                    header('Content-Type:image/gif'); 
                    $image_wp=imagecreatetruecolor($new_width, $new_height); 
                    $image = imagecreatefromgif($imgpath); 
                    imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
                    imagejpeg($image_wp, $imgdst, 75); 
                    imagedestroy($image_wp); 
                } 
                break; 
            case 2: 
                header('Content-Type:image/jpeg'); 
                $image_wp=imagecreatetruecolor($new_width, $new_height); 
                $image = imagecreatefromjpeg($imgpath); 
                imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
                imagejpeg($image_wp, $imgdst, 75); 
                imagedestroy($image_wp); 
                break; 
            case 3: 
                header('Content-Type:image/png'); 
                $image_wp=imagecreatetruecolor($new_width, $new_height); 
                $image = imagecreatefrompng($imgpath); 
                imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
                imagejpeg($image_wp, $imgdst, 75); 
                imagedestroy($image_wp); 
                break; 
        }         
    }
    
    public function deloneimg()
    {
        $aGet=$this->input->get();
        if(!empty($aGet['imgid']))
        {
            $delImgPath="./data/upload/".$aGet['tname']."/".$aGet['createdate']."/".$aGet['imgname'];
            if(file_exists($delImgPath))
            {
                if(unlink($delImgPath))
                {
                    unlink("./data/upload/".$aGet['tname']."/".$aGet['createdate']."/thumb/".$aGet['imgname']);
                    $this->Data_model->deloneimgdata($aGet['imgid'], $aGet['tname']);
                }                                
            }
        }else{
            $delImgPath="./data/temp/imgs/".$aGet['imgname'];
            $delImgThumbPath="./data/temp/imgs/thumb/".$aGet['imgname'];
            if(file_exists($delImgPath))
            {
                unlink($delImgPath);
            }
            if(file_exists($delImgThumbPath))
            {
                unlink($delImgThumbPath);
            }
        }        
    }
    
    public function geteditimgs()
    {
        $aPost=$this->input->post();
        
        $this->Data_model->editimgsdata($aPost);
        
        if(!empty($aPost['imgs']))
        {
            foreach($aPost['imgs'] as $k => $v)
            {
                $sFilePath="./data/temp/imgs/".$v;
                $imgdst="./data/upload/".$aPost['tname'];
                if(!file_exists($imgdst))
                {                    
                    mkdir($imgdst);
                }
                $imgdst.="/".$aPost['createdate']."/";
                if(!file_exists($imgdst))
                {                    
                    mkdir($imgdst);
                }
                $imgdst.=$v;
                $this->setimgsize($sFilePath, 800, $imgdst);
                
                $sTempThumbPath="./data/temp/imgs/thumb/".$v;
                $sUpThumbPath="./data/upload/".$aPost['tname'];
                if(!file_exists($sUpThumbPath))
                {                    
                    mkdir($sUpThumbPath);
                }
                $sUpThumbPath.="/".$aPost['createdate']."/thumb/";
                if(!file_exists($sUpThumbPath))
                {                    
                    mkdir($sUpThumbPath);
                }
                $sUpThumbPath.=$v;
                copy($sTempThumbPath, $sUpThumbPath);
                
                unlink($sTempThumbPath);
                unlink($sFilePath);
            }
        }
        $aRes=array('status'=>1);
        echo json_encode($aRes);
    }
    
    public function add()
    {
        $aGet=$this->input->get();
        
        $data['tname']=$aGet['tname'];
        
        $this->load->view('data/data_add', $data);
    }
    
    public function getaddimgs()
    {
        $aPost=$this->input->post();
        
        $this->Data_model->addimgsdata($aPost, $this->session->uinfo['uname']);
        
        if(!empty($aPost['imgs']))
        {
            foreach($aPost['imgs'] as $v)
            {
                $sFilePath="./data/temp/imgs/".$v;
                $imgdst="./data/upload/".$aPost['tname'];
                if(!file_exists($imgdst))
                {                    
                    mkdir($imgdst);
                }
                $imgdst.="/".date('Ymd')."/";
                if(!file_exists($imgdst))
                {                    
                    mkdir($imgdst);
                }
                $imgnewdst=$imgdst.$v;
                $this->setimgsize($sFilePath, 800, $imgnewdst);
                
                $sTempThumbPath="./data/temp/imgs/thumb/".$v;
                $sUpThumbPath="./data/upload/".$aPost['tname'];
                if(!file_exists($sUpThumbPath))
                {                    
                    mkdir($sUpThumbPath);
                }
                $sUpThumbPath.="/".date('Ymd')."/thumb/";
                if(!file_exists($sUpThumbPath))
                {                    
                    mkdir($sUpThumbPath);
                }
                $sUpThumbPath.=$v;
                copy($sTempThumbPath, $sUpThumbPath);
                
                unlink($sTempThumbPath);
                unlink($sFilePath);
            }
        }
        $aRes=array('status'=>1);
        echo json_encode($aRes);
    }
    
    public function delalldata()
    {
        $aPost=$this->input->post();
        $aImgs=explode(',', $aPost['imgs']);
        $tname=$aPost['tname'];
        unset($aPost);
        
        $sRes=$this->Data_model->delDataById($aImgs, $tname);
        if($sRes==true){
            $aResult=array('status'=>1);
        }else
        {
            $aResult=array('status'=>0, 'msg'=>'由于服务器原因，删除失败，请稍后再试！');
        }
        echo json_encode($aResult);           
    }
    
    
}