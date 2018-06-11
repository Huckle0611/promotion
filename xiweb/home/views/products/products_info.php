
<?php $this->load->view('pub/header'); ?>

<!-- PAGE-AJAX Section -->
<section id="page-ajax" class=" section-current">
    <a href="javascript:history.back(-1);" class="page-sublink btn btn-default btn-prev page-link"> 
        <i class="fa fa-long-arrow-left"></i></a>
    <div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="space40"></div>
            <div class="page-header">
                <h3><span class="color-black"><?php echo $aData['title']; ?></span></h3>
            </div>
            <div class="space20"></div>
            <div class="row">
                <div class="col-sm-9 no-padding" style="padding:20px;"> 
                    <?php echo $aData['content']; ?><br />
                    <?php if(!empty($aImgs)){ ?> 
                    <?php foreach($aImgs as $k => $v){ ?> 
                        <img src="/data/upload/products/<?php echo $aData['ymd']; ?>/<?php echo $v['imgname']; ?>" style="width: 635px;" />
                    <?php } ?>      
                    <?php } ?>
                </div>
                <div class="col-sm-3 col-box bg-white">
                    <p><i class="fa fa-fw fa-user color-default"></i><?php echo $aData['author']; ?></p>
                    <p><i class="fa fa-fw fa-calendar color-default"></i><?php echo $aData['datetime']; ?></p>                
                </div>
            </div>
            <!-- .row --> 

        </div>
        <!-- .col-lg-10 --> 
    </div>
    <!-- .row --> 
    </div>
    <!-- .container-fluid -->

    <div class="space30"></div>        
    </div>
</section>
<!-- end: PAGE-AJAX Section --> 
  
<?php $this->load->view('pub/footer'); ?>