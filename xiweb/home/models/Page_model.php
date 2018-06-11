<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model
{
    
    /**
     * 设置分页格式与数据
     * @param type $aPage 分页数据
     * @param type $iCurrent 当前页数
     * @param type $iAllPageNum 总页数
     * @param type $sUrl url路径
     * @param type $iShowNum 当前页显示页数
     */
    public function getPage(&$aPage, $iCurrent, $iAllPageNum, $sUrl, $iShowNum)
    {        
        $aPage[]=($iCurrent==0 || $iCurrent==1)?'':'<a class="btn btn-default" href="'.$sUrl.'">首页</a>';
        $aPage[]=($iCurrent==0 || $iCurrent==1)?'':'<a class="btn btn-default" href="'.$sUrl.'?page='.($iCurrent-1).'">上一页</a>';
        
        $iAdd=1;
        if($iCurrent==0 || $iCurrent<$iShowNum)
        {
            $aPage[]=($iCurrent==0 || $iCurrent==1)?'<span class="btn btn-default">1</span>':'<a class="btn btn-default" href="'.$sUrl.'?page=1">1</a>';
            for($i=2;$i<=$iShowNum;$i++)
            {
                if($i<=$iAllPageNum)
                {
                    $aPage[]=($i==$iCurrent)?'<span class="btn btn-default">'.$i.'</span>':'<a class="btn btn-default" href="'.$sUrl.'?page='.$i.'">'.$i.'</a>';                                          
                }            
            }
        }else
        {
            if($iCurrent!=0 && $iCurrent%$iShowNum!=0)
            {
                $iAdd=ceil($iCurrent/$iShowNum);
            }        
            if($iCurrent!=0 && $iCurrent%$iShowNum==0)
            {
                $iAdd=$iCurrent/$iShowNum+1;
            }
            for($i=$iShowNum*($iAdd-1);$i<=$iShowNum*$iAdd;$i++)
            {
                if($i<=$iAllPageNum)
                {
                    $aPage[]=($i==$iCurrent)?'<span class="btn btn-default">'.$i.'</span>':'<a class="btn btn-default" href="'.$sUrl.'?page='.$i.'">'.$i.'</a>';                                          
                }            
            }
        }
        if($iAdd*$iShowNum<$iAllPageNum){
            $aPage[]='<a class="btn btn-default">...</a>';
            $aPage[]=($iAllPageNum==$iCurrent)?'<span class="btn btn-default">'.$iAllPageNum.'</span>':'<a class="btn btn-default" href="'.$sUrl.'?page='.$iAllPageNum.'">'.$iAllPageNum.'</a>';                                  
        }
       
        $iNext=($iCurrent==0)?($iCurrent+2):($iCurrent+1);
        $aPage[]=($iAllPageNum==1 || $iCurrent==$iAllPageNum)?'':'<a class="btn btn-default" href="'.$sUrl.'?page='.$iNext.'">下一页</a>';
        $aPage[]=($iAllPageNum==1 || $iCurrent==$iAllPageNum)?'':'<a class="btn btn-default" href="'.$sUrl.'?page='.$iAllPageNum.'">尾页</a>';        
    }
    
    
}