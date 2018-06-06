      $(document).ready(function(){
        $('.icon-menu').click(function(){
          $('#sidebar').toggleClass('visible');
           $("#button-swip").toggleClass("arrow");
        });
    /*--=======================
    table 2 execel sheet
    ========================--*/
    
     $(".image-to-excel").click(function(){
	      $(".table2excel").table2excel({
	          exclude: ".noExl",
	          name: "Excel Document Name",
	          filename: "Report" + new Date(),
	          fileext: ".xls",
	          exclude_img: true,
	          exclude_links: true,
	          exclude_inputs: true
	        });
	      });
	    
  });




     /*=======================================
        Datepicker init
      =========================================*/

      $('.datepicker-f').datepicker({
            format: 'yyyy-dd-mm',
            todayHighlight: true,
            icons: {
              up: 'fa fa-angle-up',
              down: 'fa fa-angle-down',
              previous: 'fa fa-angle-left',
              next: 'fa fa-angle-right',
            }
        });

      /*=======================================
        Timepicker init 
      =========================================*/

        $('.timepicker-f').datepicker({
            format: 'yyyy-dd-mm',
            todayHighlight: true,
            icons: {
              up: 'fa fa-angle-up',
              down: 'fa fa-angle-down',
              previous: 'fa fa-angle-left',
              next: 'fa fa-angle-right',
            }
        });
