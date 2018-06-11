<script src="/data/admin/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="/data/admin/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/data/admin/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
<script src="/data/admin/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="/data/admin/js/excanvas.min.js"></script>
<script src="/data/admin/js/respond.min.js"></script>  
<![endif]-->   
<script src="/data/admin/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/data/admin/js/jquery.blockui.min.js" type="text/javascript"></script>  
<script src="/data/admin/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/data/admin/js/jquery.uniform.min.js" type="text/javascript" ></script>

<script>
$(function(){
    
    $("a.clearnoread").click(function(){
        var isnoread = $(this).attr("isnoread");
        $.ajax({
            type: "POST",
            url: "/admin.php/contact/clearnoreadnum",
            data: "isnoread="+isnoread,
            dataType: "json",
            success: function(data){
                if(data.status===1)
                {
                    window.location.href="/admin.php/contact/index";
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