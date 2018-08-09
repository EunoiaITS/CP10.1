<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <h3 class="text-cl">CREATE RETURN TO VENDOR NOTICE</h3>
            <div class="all-list-item clearfix">
                <div class="list-item-title clearfix">
                    <div class="col-sm-6 padding-zero br-border text-center">
                        <h2 class="text-cl bg-cl">Indkom engineering Sdn Bhd</h2>
                    </div>
                    <div class="col-sm-6 padding-zero text-center">
                        <h2 class="text-cl bg-cl">Non Billing delivery order</h2>
                    </div>
                </div>
                <div class="product-details clearfix">
                    <div class="col-sm-8 col-md-6 col-xs-12 clearfix">
                        <form id="form-data">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="date-bill">Date <span class="fright">:</span></label>
                                <input name="date" type="text" class="form-control fright-input input-bill datepicker-f" id="date-bill" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="mdr-no">MDR No<span class="fright">:</span></label>
                                <input name="mdr_no" type="text" class="form-control fright-input input-bill" id="mdr-no" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="vendor-date">Vendor<span class="fright">:</span></label>
                                <input name="vendor" type="text" class="form-control fright-input input-bill" id="vendor-date" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="quantity-bill">Quantity <span class="fright">:</span></label>
                                <input name="qty" type="text" class="form-control fright-input input-bill" id="quantity-bill" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="do-date">RTVN No<span class="fright">:</span></label>
                                <input name="rtvn_no" type="text" class="form-control fright-input input-bill" id="do-date" data-validation="required">
                            </div>
                    </div>
                    <div class="col-sm-8 col-md-5 col-xs-12 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport" for="part-no-bill">Part No <span class="fright">:</span></label>
                                <input name="part_no" type="text" class="form-control fright-input input-bill  search-data" id="part_no" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport" for="part-name-bill">Part Name <span class="fright">:</span></label>
                                <input name="part_name" type="text" class="form-control fright-input search-data input-bill" id="part_name" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="quantity-rec">Quantity Rec <span class="fright">:</span></label>
                                <input name="qty_rec" type="text" class="form-control fright-input input-bill" id="quantity-rec" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="quantity-os">Quantity O/S <span class="fright">:</span></label>
                                <input name="qty_os" type="text" class="form-control fright-input input-bill" id="quantity-os" data-validation="required"/>
                            </div>

                        </form>
                        <button id="add-items" class="btn btn-info btn-bill btn-vendor">Add Item</button>
                    </div>
                </div>
                <div class="hr-main hr-main-bill clearfix"></div>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>MDR No</th>
                            <th>Vendor</th>
                            <th>Quantity</th>
                            <th>RTVN No</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Quantity Rec</th>
                            <th>Quantity O/S</th>
                        </tr>
                        </thead>
                        <tbody id="table-data">

                        </tbody>
                    </table>
                </div>
                <div id="final-form">
                    <form id="form-submit" method="post" action="<?php echo $this->Url->build(['controller' => 'RTVN', 'action' => 'addItems']); ?>"></form>
                </div>
                <div class="checked-by-item">
                    <div class="col-md-5 col-md-offset-7 col-lg-5 col-lg-offset-7 col-sm-8 col-sm-offset-4 col-xs-12">
                        <div class="prepared-table">
                            <div class="prepared-by-item">
                                <h2>Date</h2>
                                <h3 class="author-name">10/5/2016</h3>
                            </div
                                >
                            <div class="prepared-by-item">
                                <h2>Prepared by</h2>
                                <button type="submit" form="form-submit" class="btn btn-danger btn-rtvn">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function(){
        var formObj = [];
        var id_no = 1;
        var html_form = '';
        $('#add-items').click(function(){
            var html_table = '<tr>';
            formObj['id'] = id_no;
            var inputs = $('#form-data').serializeArray();
            html_table+='<td>'+formObj['id']+'</td>';
            $.each(inputs, function(i, input){
                formObj[input.name] = input.value;
                html_table+='<td>'+input.value+'</td>';
                html_form+='<input type="hidden" name="'+input.name+id_no+'" value="'+input.value+'">';
                Cookies.set(input.name+id_no, input.value);
            });
            html_table+='</tr>';
            html_form+='<input type="hidden" name="prepared_by'+id_no+'" value="<?php echo $pic; ?>">'+
            '<input type="hidden" name="stat'+id_no+'" value="pending">'+
            '<input type="hidden" name="total" value="'+id_no+'">';
            $('#table-data').append(html_table);
            $('#form-submit').html(html_form);
            id_no+=1;
        });

    });
</script>