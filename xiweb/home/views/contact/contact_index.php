
<?php $this->load->view('pub/header'); ?>

<!-- CONTACT Section -->
<section id="contact" class=" section-current">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <header>
                    <h3>联系我们<small>Contact Me</small></h3>
                    <h5>我们致力于打造一个优秀的学习平台</h5>
                </header>
                <div class="row"> 
                    <!-- contact-details -->
                    <div class="col-sm-6 contact-details">
                        <div class="page-header">
                            <h4 class="color-black">联系方式</h4>
                        </div>
                        <p><?php echo $this->aWebsite['descrip']; ?></p>
                        <address>
                            <p> <i class="fa fa-fw fa-home pull-left"></i> <span style="height: 29px;"> <strong class="small">ADDRESS:</strong> <br>
                              <?php echo $this->aWebsite['address']; ?> </span> </p>
                            <p> <i class="fa fa-fw fa-phone pull-left"></i> <span style="height: 29px;"> <strong class="small">PHONE:</strong> <br>
                              <?php echo $this->aWebsite['phone']; ?> </span> </p>
                            <p> <i class="fa fa-fw fa-envelope-o pull-left"></i> <span style="height: 29px;"> <strong class="small">MAIL:</strong> <br>
                              <?php echo $this->aWebsite['email']; ?> </span> </p>
                        </address>
                        <div class="page-header">

                        </div>
                        <ul class="social-icons social-v3">

                        </ul>
                        <div class="space30"></div>
                    </div>
                    <!-- end: .contact details --> 

                    <!-- contact-form -->
                    <div class="col-sm-6 col-box bg-gray-light contact-form">
                        <div class="page-header">
                            <h4 class="color-black">在线留言</h4>
                        </div>

                        <form class="form-style" action="" method="POST" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="text-field form-control field-validation required name" data-validation-type="string" id="form-name" placeholder="姓名" name="name" type="text">
                                <i class="form-icon fa fa-user"></i> </div>
                            <div class="form-group">
                                <input class="text-field form-control field-validation required email" data-validation-type="email" id="form-email" placeholder="Email" name="email" type="email">
                                <i class="form-icon fa fa-envelope"></i> </div>
                            <div class="form-group">
                                <input class="text-field form-control field-validation telephone" data-validation-type="phone" id="form-contact-number" placeholder="电话" name="contact_number" type="tel">
                                <i class="form-icon fa fa-phone"></i> </div>
                            <div class="form-group">
                                <textarea placeholder="留言内容" class="form-control field-validation required con" name="con"></textarea>
                                <i class="form-icon fa fa-comment"></i> </div>
                            <div class="form-group submit"> <span class="form-loader"><i class="fa fa-spinner fa-spin"></i></span>
                                <input class="btn btn-default" value="提交留言" type="button" />
                            </div>
                            <div class="alert-validate-form"></div>                                
                        </form>
                    </div>
                    <!-- end: .contact-form --> 
                </div>
                <!-- .row --> 

            </div>
            <!-- .col-lg-10 --> 
        </div>
        <!-- .row --> 
    </div>
    <!-- .container-fluid --> 
</div>
<!-- .content --> 
</section>
<!-- end: CONTACT Section --> 

<script>
$(function(){
    $('.btn').click(function(){
        var name = $('form.form-style .name').val();
        var email = $('form.form-style .email').val();
        var telephone = $('form.form-style .telephone').val();
        var content = $('form.form-style .con').val();
        
        if(!name.match(/^[a-zA-Z\u4e00-\u9fa5]{1,20}$/)){
            alert("姓名只能由中英文组成");
            return false;
        }
        if(!email.match(/^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/)){
            alert("邮箱格式不正确");
            return false;
        }
        if(email.length>100){
            alert("邮箱长度过长");
            return false;
        }
        if(!telephone.match(/^[0-9\+]{2,20}$/)){
            alert("电话号码格式不正确");
            return false;
        }
        if(content.length<2 || content.length>500){
            alert("留言内容过短或过长");
            return false;
        }
        
        var formdata=$(this).parents('form.form-style').serialize();
        $.ajax({
            type: "POST",
            url: "/index.php/contact/getaddcont",
            data: formdata,
            dataType: "json",
            success: function(data){
                switch(true){
                    case (data.status===1):
                        alert("提交成功");
                        window.location.href="index";
                        break;
                    case (data.status===0):
                        alert("服务器忙，请稍后再试");
                        break;
                    case (data.status===2):
                        alert("姓名过短或过长");
                        break;
                    case (data.status===3):
                        alert("邮箱过短或过长");
                        break;
                    case (data.status===4):
                        alert("电话号码过短或过长");
                        break;
                    case (data.status===5):
                        alert("留言内容过短或过长");
                        break;
                }                
            }
        });
    });
});
</script>

<?php $this->load->view('pub/footer'); ?>