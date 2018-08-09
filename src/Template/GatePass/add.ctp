<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="all-list-item clearfix">
                <div class="list-item-title clearfix">
                    <div class="col-sm-6 padding-zero br-border text-center">
                        <h2 class="text-cl bg-cl">Indkom engineering Sdn Bhd</h2>
                    </div>
                    <div class="col-sm-6 padding-zero text-center">
                        <h2 class="text-cl bg-cl">GATE PASS</h2>
                    </div>
                </div>
                <div class="col-sm-offset-1 col-sm-6 col-md-offset-1 col-md-6 col-xs-offset-0 col-xs-12 selection-padding ">
                    <form id="form-data">
                        <div class="form-group clearfix">
                            <label class="fleft-label" for="date-auto"><b>Date</b><span class="fright">:</span></label>
                            <input name="date" type="text" class="form-control fright-input" id="date-auto" data-validation="required" value="<?php echo date('Y/m/d'); ?>">
                        </div>
                        <div class="form-group clearfix">
                            <label class="fleft-label" for="do-no"><b>Do No</b><span class="fright">:</span></label>
                            <input name="do_no" type="text" class="form-control fright-input" id="do-no" data-validation="required">
                        </div>
                    </form>
                    <button id="add-items" class="btn btn-info btn-add-item add-item-gatepass-new">Add Item</button>
                </div>
                <div class="col-sm-offset-3 col-sm-2 col-md-offset-3 col-md-2  col-xs-offset-3 col-xs-9">
                    <div class="no-genareted genareted-offset"><h3>No : <span><?php echo $gp_no; ?></span></h3></div>
                </div>
                <div class="col-xs-12  col-md-12 col-lg-12">
                <div class="product-list-table clearfix">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Do No</th>
                            <th>Product Name</th>
                            <th>Gate Pass No</th>
                            <th>Quantity</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody id="table-data">
                        </tbody>
                    </table>
                </div>
                </div>
                <div id="final-form">
                    <form id="form-submit" method="post" action="<?php echo $this->Url->build(['controller' => 'GatePass', 'action' => 'addItems']); ?>"></form>
                </div>
                <div class="col-sm-4 col-sm-offset-8 padding-gate-pass">
                    <div class="prepared-by clearfix">
                        <h2>Prepared by</h2>
                        <button class="btn btn-info create-gate-pass create-item clearfix">Create</button>
                        <div class="logistic-office">
                            <p>( Logistic officer )</p>
                        </div>
                    </div>
                </div>
                <form id="form-submit" method="post" action="<?php echo $this->Url->build(['Controller' => 'GatePass', 'action' => 'addItems']); ?>">
                    <input type="hidden" name="prepared_by" value="<?php echo $pic ?>">
                    <input type="hidden" name="stat" value="pending">
                </form>
                <button type="submit" form="form-submit" class="btn btn-tues btn-submit-o clearfix">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        var html_data = '';
        var html_form = '';
        var sn_no = 0;
        var gp_no = <?php echo $gp_no-1; ?>;

        $('#do-no').autocomplete({
            source: [<?php echo $do_no; ?>],
            minLength: 0
        });

        $('#add-items').click(function(){
            var do_no = $('#do-no').val();
            var date = $('#date-auto').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->build(['Controller' => 'GatePass', 'action' => 'search']); ?>',
                data: {del_order_no:do_no},
                dataType: 'json',
                success: function(response){
                    if(Object.keys(response) == 'message'){
                        alert(response['message']);
                    }else{
                        html_data+='<tr>' +
                        '<td>'+sn_no+'</td>' +
                        '<td>'+date+'</td>' +
                        '<td>'+response['del_order_no']+'</td>' +
                        '<td>'+response['part_name']+'</td>' +
                        '<td>'+gp_no+'</td>' +
                        '<td>'+response['quantity']+'</td>' +
                        '<td><input class="form-control" type="text" id="remarks_prep'+sn_no+'"></td>' +
                        '</tr>';
                        $('#table-data').append(html_data);

                        var remark = $('#remarks_prep'+sn_no);
                        remark.on('change', function(e){
                            e.preventDefault();
                            if(remark.val() == ''){
                                alert('Please, fill in the required field!');
                            }else{
                                html_form = '<input type="hidden" name="do_no'+sn_no+'" value="'+response['del_order_no']+'">'+
                                '<input type="hidden" name="date'+sn_no+'" value="'+date+'">'+
                                '<input type="hidden" name="total" value="'+sn_no+'">'+
                                '<input type="hidden" name="remarks_prep'+sn_no+'" value="'+remark.val()+'">';
                                $('#form-submit').append(html_form);
                            }
                        });
                    }
                }
            });
            html_data = '';
            sn_no++;
            gp_no++;
        });

    });
</script>