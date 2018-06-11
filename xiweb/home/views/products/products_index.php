
<?php $this->load->view('pub/header'); ?>

<!-- PORTFOLIO Section -->
<section id="portfolio" class="section-current">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <header>
                        <h3>产品展示<small>Portfolio</small></h3>
                        <h5>我的网站是国内最大的模板分享平台</h5>
                    </header>

                    <!-- portfolio-colum -->
                    <div class="portfolio-colum row"> 
                        <?php foreach($aDataList as $k => $v){ ?> 
                        <figure class="col-md-4 col-sm-6"> 
                            <a class="ajax-loader page-sublink" href="/index.php/products/info?id=<?php echo $v['id']; ?>">
                                <img src="/data/upload/products/<?php echo $v['ymd']; ?>/<?php echo $v['imgname']; ?>" alt="" style="height:230px !important;" height="230" />
                                <div>
                                    <h5 class="name"><?php echo $v['title']; ?></h5>
                                    <small><?php echo $v['title']; ?></small> <i class="fa fa-link"></i> 
                                </div>
                            </a> 
                        </figure>
                        <?php } ?>                                                                    
                    </div>
                    <!-- end: portfolio-colum --> 

                    <div class="blog-loadmore"> 
                        <?php foreach($page as $v){ ?>
                            <?php echo $v; ?>
                        <?php } ?>
                    </div>

                </div>
                <!-- .col-lg-10 --> 
            </div>
            <!-- .row --> 
        </div>
        <!-- .container-fluid --> 
    </div>
    <!-- .content --> 
</section>
<!-- end: PORTFOLIO Section --> 

<?php $this->load->view('pub/footer'); ?>