<?php $sStatUrl=substr($_SERVER['PHP_SELF'], 10); ?>

<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->        
    <ul class="page-sidebar-menu">
        <li class="start <?php echo ($sStatUrl=='/home/index')?'active':''; ?>">
            <a href="/admin.php/home/index">
            <i class="icon-home"></i> 
            <span class="title">首页</span>
            <span class="selected"></span>
            </a>
        </li>
        <li class="<?php echo ($sStatUrl=='/admin/look' || $sStatUrl=='/admin/editinfo' || $sStatUrl=='/admin/editpwd')?'active':''; ?>">
            <a href="javascript:;">
            <i class="icon-user"></i> 
            <span class="title">管理员</span>
            <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo ($sStatUrl=='/admin/look')?'active':''; ?>">
                    <a href="/admin.php/admin/look">
                    查看帐号</a>
                </li>
                <li class="<?php echo ($sStatUrl=='/admin/editinfo')?'active':''; ?>">
                    <a href="/admin.php/admin/editinfo">
                    修改帐号</a>
                </li>
                <li class="<?php echo ($sStatUrl=='/admin/editpwd')?'active':''; ?>">
                    <a href="/admin.php/admin/editpwd">
                    修改密码</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($sStatUrl=='/cate/lists' || $sStatUrl=='/cate/add' || $sStatUrl=='/cate/edit')?'active':''; ?>">
            <a href="javascript:;">
                <i class="icon-bookmark-empty"></i> 
                <span class="title">分类管理</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="<?php echo ($sStatUrl=='/cate/lists')?'active':''; ?>">
                    <a href="/admin.php/cate/lists">
                    分类列表</a>
                </li>
                <li class="<?php echo ($sStatUrl=='/cate/add')?'active':''; ?>">
                    <a href="/admin.php/cate/add">
                    添加分类</a>
                </li>
                <li class="<?php echo ($sStatUrl=='/cate/edit')?'active':''; ?>">
                    <a href="/admin.php/cate/edit">
                    修改分类</a>
                </li>
            </ul>
        </li>
        <li class="<?php echo ($sStatUrl=='/data/lists' || $sStatUrl=='/data/add' || $sStatUrl=='/data/edit' || $sStatUrl=='/data/look')?'active':''; ?>">
            <a href="javascript:;">
            <i class="icon-table"></i> 
            <span class="title">数据列表</span>
            <span class="arrow "></span>
            </a>
            <ul class="sub-menu">                   
                <?php foreach($this->aCateData as $v){ ?>
                <li <?php if($this->input->get('tname')==$v['tname']){ echo 'class="active"';} ?>>
                    <a href="/admin.php/data/lists?tname=<?php echo $v['tname']; ?>">
                        <?php echo $v['catename']; ?></a>
                </li>
                <?php } ?>
            </ul>
        </li>        
        <li class="<?php echo ($sStatUrl=='/contact/index'||$sStatUrl=='/contact/look')?'active':''; ?>">
            <?php if($this->noread > 0){ ?>
            <a href="javascript:;" class="clearnoread" isnoread="1">
            <?php }else{ ?>
            <a href="/admin.php/contact/index">
            <?php } ?>              
            <i class="icon-cogs"></i> 
            <span class="title">联系我们</span>
            <span class="selected"></span>
            </a>
        </li>
        <li class="<?php echo ($sStatUrl=='/website/index')?'active':''; ?>">
            <a href="/admin.php/website/index">
            <i class="icon-cogs"></i> 
            <span class="title">网站设置</span>
            <span class="selected"></span>
            </a>
        </li>
        <li class="<?php echo ($sStatUrl=='/cleartemp/index')?'active':''; ?>">
            <a href="/admin.php/cleartemp/index">
            <i class="icon-repeat"></i> 
            <span class="title">更新缓存</span>
            <span class="selected"></span>
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>