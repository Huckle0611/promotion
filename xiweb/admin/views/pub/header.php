<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="/admin.php/home/index">
            <img src="/data/admin/imgs/logo.png" alt="logo"/>
            </a>
            <!-- END LOGO -->        
            <!-- BEGIN TOP NAVIGATION MENU -->              
            <ul class="nav pull-right">                
                <!-- BEGIN INBOX DROPDOWN -->
                <li class="dropdown" id="header_inbox_bar">
                    <?php if($this->noread > 0){ ?>
                    <a href="javascript:;" class="dropdown-toggle clearnoread" isnoread="1">
                    <?php }else{ ?>
                    <a href="/admin.php/contact/index" class="dropdown-toggle">
                    <?php } ?>    
                    <i class="icon-envelope"></i>
                    <?php if($this->noread > 0){ ?>
                    <span class="badge"><?php echo $this->noread; ?></span>    
                    <?php } ?>
                    </a>
                    <ul class="dropdown-menu extended inbox"></ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <li class="dropdown" id="header_task_bar">
                    <a href="/index.php" target="_blank" class="dropdown-toggle">
                    <i class="icon-home"></i>
                    </a>
                    <ul class="dropdown-menu extended tasks"></ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown user">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="/data/admin/imgs/avatar1_small.jpg" />
                    <span class="username"><?php echo $this->session->uinfo['uname']; ?></span>
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/admin.php/admin/look"><i class="icon-user"></i> 查看帐号</a></li>
                        <li><a href="/admin.php/admin/editinfo"><i class="icon-cogs"></i> 修改帐号</a></li>
                        <li><a href="/admin.php/admin/editpwd"><i class="icon-briefcase"></i> 修改密码</a></li>
                        <li><a href="/admin.php/login/lockuser?user=<?php echo $this->session->uinfo['uname']; ?>"><i class="icon-lock"></i> 锁屏</a></li>
                        <li><a href="/admin.php/login/loginout"><i class="icon-key"></i> 退出</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU --> 
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>