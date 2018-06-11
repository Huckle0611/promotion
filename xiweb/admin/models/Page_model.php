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
        $aPage[]=($iCurrent==0 || $iCurrent==1)?'':'<li class="prev"><a href="'.$sUrl.'"><span>首页</span></a></li>';
        $aPage[]=($iCurrent==0 || $iCurrent==1)?'':'<li class="prev"><a href="'.$sUrl.'&page='.($iCurrent-1).'"><span>上一页</span></a></li>';
        
        $iAdd=1;
        if($iCurrent==0 || $iCurrent<$iShowNum)
        {
            $aPage[]=($iCurrent==0 || $iCurrent==1)?'<li class="active"><a>1</a></li>':'<li><a href="'.$sUrl.'&page=1">1</a></li>';
            for($i=2;$i<=$iShowNum;$i++)
            {
                if($i<=$iAllPageNum)
                {
                    $aPage[]=($i==$iCurrent)?'<li class="active"><a>'.$i.'</a></li>':'<li><a href="'.$sUrl.'&page='.$i.'">'.$i.'</a></li>';            
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
                    $aPage[]=($i==$iCurrent)?'<li class="active"><a>'.$i.'</a></li>':'<li><a href="'.$sUrl.'&page='.$i.'">'.$i.'</a></li>';            
                }            
            }
        }
        if($iAdd*$iShowNum<$iAllPageNum){
            $aPage[]='<span>...</span>';
            $aPage[]=($iAllPageNum==$iCurrent)?'<li class="active"><a>'.$iAllPageNum.'</a></li>':'<li><a href="'.$sUrl.'&page='.$iAllPageNum.'">'.$iAllPageNum.'</a></li>';            
        }
       
        $iNext=($iCurrent==0)?($iCurrent+2):($iCurrent+1);
        $aPage[]=($iAllPageNum==1 || $iCurrent==$iAllPageNum)?'':'<li class="next"><a href="'.$sUrl.'&page='.$iNext.'"><span">下一页</span></a></li>';
        $aPage[]=($iAllPageNum==1 || $iCurrent==$iAllPageNum)?'':'<li class="next"><a href="'.$sUrl.'&page='.$iAllPageNum.'"><span">尾页</span></a></li>';        
    }
    
    
}