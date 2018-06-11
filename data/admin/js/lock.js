var Lock = function () {

    return {
        //main function to initiate the module
        init: function () {

             $.backstretch([
		        "/data/admin/imgs/bg/1.jpg",
		        "/data/admin/imgs/bg/2.jpg",
		        "/data/admin/imgs/bg/3.jpg",
		        "/data/admin/imgs/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		      });
        }

    };

}();