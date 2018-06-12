<!-- SCRIPT -->

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- bootstrap js -->
<script src="<?php echo $this->request->webroot.'assets/js/bootstrap.min.js'; ?>"></script>
<!-- date-time js -->
<script src="<?php echo $this->request->webroot.'assets/js/bootstrap-datepicker.min.js'; ?>"></script>
<!-- Print js -->
<script src="<?php echo $this->request->webroot.'assets/js/jQuery.print.js'; ?>"></script>
<!-- Print js -->
<script src="<?php echo $this->request->webroot.'assets/js/jquery.table2excel.js'; ?>"></script>
<!-- main js -->
<script src="<?php echo $this->request->webroot.'assets/js/main.js'; ?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
<script>
    $(document).ready(function(){
        var tagClass = $('.search-data');
        var targetId;
        var tagId;
        var data;
        tagClass.on('click', function(e){
            e.preventDefault();
            var tagName = $(this).attr('id');
            tagId = $('#'+tagName);
            if(tagName == 'part_no'){
                targetId = 'part_name';
                data = [<?php echo $part_no; ?>];
            }else{
                targetId = 'part_no';
                data = [<?php echo $part_name; ?>];
            }
            tagId.autocomplete({
                source: data,
                minLength: 0
            });
            tagId.on('autocompleteselect', function(e, ui){
                $('#'+targetId).val(ui.item.idx);
                $('#zon').val(ui.item.zon);
                $('#rack').val(ui.item.rack);
                $('#bn').val(ui.item.bn);
                $('#p_level').val(ui.item.p_level);
                $('#uom').val(ui.item.uom);
                $('#min_stock').val(ui.item.min_stock);
                $('#max_stock').val(ui.item.max_stock);
                $('#pm_id').val(ui.item.pmId);
            });
        });
    });
</script>
</html>
