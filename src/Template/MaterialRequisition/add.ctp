<div class="product-list">
    <div class="container-fluid  sm-fluid">
        <div class="row">
            <div class="all-list-item clearfix">
                <div class="list-item-title clearfix">
                    <div class="col-sm-6 padding-zero br-border text-center">
                        <h2 class="text-cl bg-cl">Indkom engineering Sdn Bhd</h2>
                    </div>
                    <div class="col-sm-6 padding-zero text-center">
                        <h2 class="text-cl bg-cl">Material Requisition</h2>
                    </div>
                </div>
                <form id="form-data">
                <div class="metarial-requisition clearfix">
                    <div class="col-sm-offset-1 col-sm-8 col-md-offset-1 col-md-7 selection-padding clearfix">
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Date <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><?php echo date('Y/m/d'); ?></p>
                                <input name="date_issue" type="hidden" value="<?php echo date('Y/m/d'); ?>">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>MR No <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><?php echo $mr_no; ?></p>
                                <input name="mr_no" type="hidden" value="<?php echo $mr_no; ?>">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>CCAR No <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control control-issue-ticket" type="text" name="ccar_no">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Job <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control control-issue-ticket" type="text" name="job">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Section <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control control-issue-ticket" type="text" name="sect">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Department <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control control-issue-ticket" type="text" name="dept">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Part No <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control search-data control-issue-ticket" type="text" name="part_no" id="part_no">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Part Name <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control search-data control-issue-ticket" type="text" name="part_name" id="part_name">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Quantity Requested <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control control-issue-ticket" type="text" name="qty_req" id="qty_req">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Quantity Issued <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <input class="form-control control-issue-ticket" type="text" name="qty_issued" id="qty_issued">
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Remarks <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <textarea class="form-control control-issue-ticket" name="remarks" id="remarks"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="stat" value="pending">
                        <input type="hidden" name="prepared_by" value="<?php echo $pic; ?>">
                </form>
                <button id="btn-add" class="btn btn-add-item btn-lex pull-left">Add item</button>
                    </div>
                    <div class="col-sm-6 col-sm-offset-6 metarial-re clearfix">
                        <div class="prepared-by-item pull-right">
                            <h2>Requested by</h2>
                            <h3 class="author-name"><b><?php echo $pic; ?></b></h3>
                            <div class="logistic-office">
                                <p>( Requestor )</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Quantity Requested</th>
                            <th>Quantity Issued</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody id="table-data">
                        </tbody>
                    </table>
                </div>
        <form id="final-form" method="post" action="<?php echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'addItems']); ?>">

        </form>
                <button type="submit" form="final-form" class="btn btn-info btn-sub-ticket">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var item_added = 1;
        var html_table = '';
        var html_form = '';
        $('#btn-add').on('click', function(e){
            e.preventDefault();
            var inputs = $('#form-data').serializeArray();
            $.each(inputs, function(i, input){
                html_form+='<input type="hidden" name="'+input.name+item_added+'" value="'+input.value+'">';
            });
            html_form+='<input type="hidden" name="total" value="'+item_added+'">';
            html_table+='<tr>'+
            '<td>'+item_added+'</td>'+
            '<td>'+$('#part_no').val()+'</td>'+
            '<td>'+$('#part_name').val()+'</td>'+
            '<td>'+$('#qty_req').val()+'</td>'+
            '<td>'+$('#qty_issued').val()+'</td>'+
            '<td>'+$('#remarks').val()+'</td>'+
            '</tr>';
            $('#table-data').append(html_table);
            $('#final-form').append(html_form);
            html_form = '';
            html_table = '';
            item_added++;
        });
    });
</script>