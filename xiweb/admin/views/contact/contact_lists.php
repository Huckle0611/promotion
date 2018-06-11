<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>Home of Rest - 后台管理系统 - 留言</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php $this->load->view('pub/public_css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <!-- BEGIN HEADER -->
    <?php $this->load->view('pub/header'); ?>
    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->   
    <div class="page-container row-fluid" >
        <!-- BEGIN SIDEBAR -->
        <?php $this->load->view('pub/left_nav'); ?>
        <!-- END SIDEBAR -->
        <!-- BEGIN PAGE -->
        <div class="page-content">                    
            <!-- BEGIN PAGE CONTAINER-->
            <div class="container-fluid">
                <!-- BEGIN PAGE HEADER-->
                <?php $this->load->view('pub/right_top'); ?>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->				
                <div class="row-fluid">
                    <div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><i class="icon-table"></i>留言列表</div>
                                <div class="actions">
                                    <a href="javascript:;" class="btn red delallbtn">
                                        <i class="icon-remove"></i> 批量删除</a>                                    
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                        <tr>
                                            <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes" /></th>
                                            <th>姓名</th>
                                            <th>邮箱</th>
                                            <th>电话</th>
                                            <th class="hidden-480">创建时间</th>
                                            <th class="hidden-480">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($lists as $k => $v){ ?>
                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" name="imgs" class="checkboxes imgsval" value="<?php echo $v['id']; ?>" /></td>
                                            <td><?php echo $v['name']; ?></td>
                                            <td><?php echo $v['email']; ?></td>
                                            <td><?php echo $v['telephone']; ?></td>
                                            <td class="hidden-480"><a><?php echo $v['createtime']; ?></a></td>
                                            <td>
                                                <a href="/admin.php/contact/look?infoid=<?php echo $v['id']; ?>" class="label btn green">查看</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="dataTables_paginate paging_bootstrap pagination">
                                            <ul>
                                                <?php foreach($page as $v){ ?>
                                                    <?php echo $v; ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
                <!-- END PAGE CONTENT-->
            </div>
            <!-- END PAGE CONTAINER--> 
        </div>
        <!-- END PAGE -->    
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <?php $this->load->view('pub/footer'); ?>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <?php $this->load->view('pub/public_js'); ?>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="/data/admin/js/select2.min.js"></script>
    <script type="text/javascript" src="/data/admin/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/data/admin/js/DT_bootstrap.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="/data/admin/js/app.js"></script>     
    <script src="/data/admin/js/table-managed.js"></script>
    <script>
    jQuery(document).ready(function() {    
        App.init();
        TableManaged.init();
    });
    </script>
    <script type="text/javascript">
    $(function(){
        $('a.delallbtn').click(function(){            
            var spCodesTemp = "";
            $('input:checkbox[name=imgs]:checked').each(function(i){
                if(0==i){
                    spCodesTemp = $(this).val();
                }else{
                    spCodesTemp += (","+$(this).val());
                }
            });
            
            $.ajax({
                type: "POST",
                url: "/admin.php/contact/delalldata",
                data: "imgs="+spCodesTemp,
                dataType: "json",
                success: function(data){
                    if(data.status===1)
                    {
                        window.location.reload();
                    }
                    if(data.status===0)
                    {
                        alert(data.msg);
                    }
                }
            });              
        });
    });
    </script>
    <!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = '/data/admin/js/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>

</body>
<!-- END BODY -->
</html>