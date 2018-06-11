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
<title>Home of Rest - 后台管理系统 - 数据编辑</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php $this->load->view('pub/public_css'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/data/admin/css/jquery.fancybox.css" rel="stylesheet" />
<link href="/data/admin/css/jquery.fileupload-ui.css" rel="stylesheet" />
<!-- END PAGE LEVEL STYLES -->
<script type="text/javascript" src="/data/admin/ckeditor/ckeditor.js"></script>
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
                    <div class="span12">
                        <div class="portlet box blue tabbable">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-table"></i>
                                    <span class="hidden-480">数据编辑</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div class="tabbable portlet-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a onclick="javascript:history.back(-1);" data-toggle="tab">返回</a></li>
                                    </ul>                                    
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                        <form action="" class="form-horizontal">
                                            <div class="control-group">
                                                <label class="control-label">标题</label>
                                                <div class="controls">
                                                    <textarea name="title" class="large m-wrap datatitle" rows="2" placeholder="<?php echo $data['title']; ?>"></textarea>
                                                    <span class="help-inline titleerror"></span>                                                    
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">创建时间</label>
                                                <div class="controls">
                                                    <span class="help-inline"><?php echo $data['createtime']; ?></span>
                                                </div>
                                            </div>  
                                            <div class="control-group">
                                                <label class="control-label">更新时间</label>
                                                <div class="controls">
                                                    <span class="help-inline"><?php echo $data['updatetime']; ?></span>
                                                </div>
                                            </div>  
                                            <div class="control-group">
                                                <label class="control-label">上传图片</label>
                                                <div class="controls">
                                                    <!-- 上传图片 开始 -->
                                                    <div id="fileupload" action="">
                                                        <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                                        <noscript><input type="hidden" name="redirect" value=""></noscript>
                                                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                        <div class="row-fluid fileupload-buttonbar">
                                                            <div class="span7">
                                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                                                <span class="btn green fileinput-button">
                                                                <i class="icon-plus icon-white"></i>
                                                                <span>选择图片</span>
                                                                <input type="file" name="files[]" multiple>
                                                                </span>
                                                                <button type="submit" class="btn blue start">
                                                                <i class="icon-upload icon-white"></i>
                                                                <span>开始上传</span>
                                                                </button>
                                                                <button type="reset" class="btn yellow cancel">
                                                                <i class="icon-ban-circle icon-white"></i>
                                                                <span>取消上传</span>
                                                                </button>
                                                                <button type="button" class="btn red delete">
                                                                <i class="icon-trash icon-white"></i>
                                                                <span>删除</span>
                                                                </button>
                                                                <input type="checkbox" class="toggle fileupload-toggle-checkbox">
                                                            </div>
                                                            <!-- The global progress information -->
                                                            <div class="span5 fileupload-progress fade">
                                                                <!-- The global progress bar -->
                                                                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                    <div class="bar" style="width:0%;"></div>
                                                                </div>
                                                                <!-- The extended global progress information -->
                                                                <div class="progress-extended">&nbsp;</div>
                                                            </div>
                                                        </div>
                                                        <!-- The loading indicator is shown during file processing -->
                                                        <div class="fileupload-loading"></div>
                                                        <br>
                                                        <!-- The table listing the files available for upload/download -->
                                                        <table role="presentation" class="table table-striped">
                                                            <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
                                                                <?php foreach($data['imgs'] as $v){ ?>
                                                                <tr class="template-download fade in">
                                                                    <td class="preview">
                                                                        <a class="fancybox-button" 
                                                                           data-rel="fancybox-button" 
                                                                           href="/data/upload/<?php echo $data['tname']; ?>/<?php echo $data['createdate']; ?>/<?php echo $v['imgname']; ?>" 
                                                                           title="<?php echo $v['imgname']; ?>">
                                                                            <img width="80" src="/data/upload/<?php echo $data['tname']; ?>/<?php echo $data['createdate']; ?>/thumb/<?php echo $v['imgname']; ?>" />
                                                                        </a>
                                                                    </td>
                                                                    <td class="name">
                                                                        <a href="/data/upload/<?php echo $data['tname']; ?>/<?php echo $data['createdate']; ?>/<?php echo $v['imgname']; ?>" 
                                                                           title="<?php echo $v['imgname']; ?>" data-gallery="gallery" download="<?php echo $v['imgname']; ?>"><?php echo $v['imgname']; ?></a>
                                                                    </td>
                                                                    <td class="size"><span></span></td>
                                                                    <td colspan="2"></td>
                                                                    <td class="delete">
                                                                        <button class="btn red" data-type="DELETE" 
                                                                                data-url="/admin.php/data/deloneimg?tname=<?php echo $data['tname']; ?>&createdate=<?php echo $data['createdate']; ?>&imgname=<?php echo $v['imgname']; ?>&imgid=<?php echo $v['id']?$v['id']:0; ?>">
                                                                            <i class="icon-trash icon-white"></i>
                                                                            <span>删除</span>
                                                                        </button>
                                                                        <div class="checker">
                                                                            <span class="">
                                                                                <input class="fileupload-checkbox" name="delete" value="1" type="checkbox">
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="row-fluid">
                                                        <div class="span12">
                                                            <script id="template-upload" type="text/x-tmpl">
                                                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                                                                <tr class="template-upload fade">
                                                                    <td class="preview"><span class="fade"></span></td>
                                                                    <td class="name"><span>{%=file.name%}</span></td>
                                                                    <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                                                                    {% if (file.error) { %}
                                                                        <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
                                                                    {% } else if (o.files.valid && !i) { %}
                                                                        <td>
                                                                            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
                                                                        </td>
                                                                        <td class="start">{% if (!o.options.autoUpload) { %}
                                                                            <button class="btn">
                                                                                <i class="icon-upload icon-white"></i>
                                                                                <span>开始</span>
                                                                            </button>
                                                                        {% } %}</td>
                                                                    {% } else { %}
                                                                        <td colspan="2"></td>
                                                                    {% } %}
                                                                    <td class="cancel">{% if (!i) { %}
                                                                        <button class="btn red">
                                                                            <i class="icon-ban-circle icon-white"></i>
                                                                            <span>取消</span>
                                                                        </button>
                                                                    {% } %}</td>
                                                                </tr>
                                                            {% } %}
                                                            </script>
                                                            <!-- The template to display files available for download -->
                                                            <script id="template-download" type="text/x-tmpl">
                                                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                                                                <tr class="template-download fade">
                                                                    {% if (file.error) { %}
                                                                        <td></td>
                                                                        <td class="name"><span>{%=file.name%}</span></td>
                                                                        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                                                                        <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
                                                                    {% } else { %}
                                                                        <td class="preview">
                                                                        {% if (file.thumbnail_url) { %}
                                                                            <a class="fancybox-button" data-rel="fancybox-button" href="{%=file.url%}" title="{%=file.name%}">
                                                                            <img src="{%=file.thumbnail_url%}">
                                                                            </a>
                                                                        {% } %}</td>
                                                                        <td class="name">
                                                                            <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                                                                        </td>
                                                                        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                                                                        <td colspan="2"><input type="hidden" name="imgs[]" value="{%=file.name%}" /></td>
                                                                    {% } %}
                                                                    <td class="delete">
                                                                        <button class="btn red" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                                                            <i class="icon-trash icon-white"></i>
                                                                            <span>删除</span>
                                                                        </button>
                                                                        <input type="checkbox" class="fileupload-checkbox hide" name="delete" value="1">
                                                                    </td>
                                                                </tr>
                                                            {% } %}
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <!-- 上传图片 结束 -->                                            
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">修改正文</label>                                                
                                                <div class="controls">
                                                    <textarea name="content" id="content" rows="12" cols="80"></textarea>
                                                    <script>CKEDITOR.replace('content', {});</script>                                                    
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <input type="hidden" name="pid" value="<?php echo $data['id']; ?>" />
                                                <input type="hidden" name="tname" value="<?php echo $data['tname']; ?>" />
                                                <input type="hidden" name="createdate" value="<?php echo $data['createdate']; ?>" />
                                                <input type="hidden" class="editcont" name="cont" value="<?php echo $data['content']; ?>" />                                                
                                                <button type="button" class="btn blue editbtn"><i class="icon-ok"></i> 保存</button>                                                                    
                                            </div>
                                        </form>    
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
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
    <script src="/data/admin/js/jquery.fancybox.pack.js"></script>
    <!-- BEGIN:File Upload Plugin JS files-->
    <script src="/data/admin/js/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="/data/admin/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="/data/admin/js/load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="/data/admin/js/canvas-to-blob.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/data/admin/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/data/admin/js/jquery.fileupload.js"></script>
    <!-- The File Upload file processing plugin -->
    <script src="/data/admin/js/jquery.fileupload-fp.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="/data/admin/js/jquery.fileupload-ui.js"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
    <!--[if gte IE 8]><script src="/data/admin/js/jquery.xdr-transport.js"></script><![endif]-->
    <!-- END:File Upload Plugin JS files-->
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="/data/admin/js/app.js"></script>
    <script src="/data/admin/js/form-fileupload.js"></script>    
    <script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
        FormFileUpload.init();
        
        var editcont = $('.editcont').val();  
        CKEDITOR.instances['content'].setData(editcont);
    });
    </script>
    <script type="text/javascript">
    $(function(){
        $('input.fileupload-checkbox').click(function(){
            var him=$(this);
            if(him.parent('span').hasClass('checked')){
                him.parent('span').removeClass('checked');                                                                
            }else{
                him.parent('span').addClass('checked');
            }
        });
        
        $('input.fileupload-toggle-checkbox').click(function(){
            var him=$(this);
            var children=$('input.fileupload-checkbox');
            if(him.parent('span').hasClass('checked')){
                children.parent('span').addClass('checked');                                                               
            }else{
                children.parent('span').removeClass('checked');                 
            }            
        });
        
        $('.editbtn').click(function(){
            var title=$(this).parents('form').find('.datatitle').val();
            if(title!="" && (title.length<2 || title.length>200))
            {
                $(this).parents('form').find('.titleerror').text('标题长度不可小于2位或大于20位！');
                return false;
            }
            
            var data = CKEDITOR.instances['content'].getData();
            $(this).parent().find('.editcont').val(data);
            
            var formdata=$(this).parents('form').serialize();
            $.ajax({
                type: "POST",
                url: "/admin.php/data/geteditimgs",
                data: formdata,
                dataType: "json",
                success: function(data){
                    if(data.status===1)
                    {
                        window.location.href="javascript:history.back(-1);";
                    }
                    if(data.status===0)
                    {
                        alert(data.msg);
                    }
                    if(data.status===2)
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