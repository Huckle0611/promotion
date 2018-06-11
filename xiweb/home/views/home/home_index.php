
<?php $this->load->view('pub/header'); ?>

<!-- HOME Section -->
<section id="home" class="page-activ section-current">
    <div class="content table home-bg" style="position: relative; z-index: 0; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;">
        <div class="table-middle">
            <div class="intro-text">
                <h1><span class="color-default"><?php echo $this->aWebsite['webshorturl']; ?></span></h1>
                <div class="owl-carousel rotate-text owl-theme owl-loaded">
                    <?php foreach($aDataList as $k => $v){ ?>
                    <div class="item">
                        <?php echo $v['content']; ?>
                    </div>    
                    <?php } ?>
                </div>
            </div>
            <!-- .intro-text --> 

        </div>
        <!-- .table-middle --> 
    <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 603px; width: 1102px; z-index: -999998; position: absolute;"><img style="position: absolute; margin: 0px; padding: 0px; border: medium none; width: 1102px; height: 688.75px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -42.875px;" src="/data/imgs/bg/1.jpg"></div></div>
    <!-- .content --> 
</section>
<!-- end: HOME Section --> 

<?php $this->load->view('pub/footer'); ?>