<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="all-list-item clearfix">
                <div class="barcode clearfix">
                    <h2 class="text-cl tfrom"><b>Barcode- Stock In</b></h2>
                    <div style="height:20px"></div>
                    <div class="col-sm-8 clearfix">
                        <form id="form-data">
                            <input type="hidden" name="pm_id" id="pm_id" value="">
                            <div class="form-group">
                                <label class="fleft-label" for="date" >Date<span class="fright">:</span></label>
                                <input name="date" type="text" class="form-control fright-input" id="date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="part_no">Part No <span class="fright">:</span></label>
                                <input name="part_no" type="text" class="form-control fright-input search-data" id="part_no">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="part_name">Part Name <span class="fright">:</span></label>
                                <input name="part_name" type="text" class="form-control fright-input search-data" id="part_name">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="zon">Zon <span class="fright">:</span></label>
                                <input name="zon" type="text" class="form-control fright-input search-data" id="zon" >
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="rack">Rack <span class="fright">:</span></label>
                                <input name="rack" type="text" class="form-control fright-input search-data" id="rack" >
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="bn">Bn <span class="fright">:</span></label>
                                <input name="bn" type="text" class="form-control fright-input search-data" id="bn" >
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="p_level">Product level <span class="fright">:</span></label>
                                <input name="p_level" type="text" class="form-control fright-input search-data" id="p_level" disabled>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="uom">Uom <span class="fright">:</span></label>
                                <input name="uom" type="text" class="form-control fright-input search-data" id="uom" disabled>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="max_stock">Max stock <span class="fright">:</span></label>
                                <input name="max_stock" type="text" class="form-control fright-input search-data" id="max_stock" disabled>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="min_stock">Min stock <span class="fright">:</span></label>
                                <input name="min_stock" type="text" class="form-control fright-input search-data" id="min_stock" disabled>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="quatity">Quantity <span class="fright">:</span></label>
                                <input name="quantity" type="number" class="form-control fright-input" id="quatity">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label" for="pstore">PIC Store <span class="fright">:</span></label>
                                <input name="pic_store" type="text" class="form-control fright-input" id="pstore" value="<?php echo $pic_store; ?>" readonly>
                            </div>
                        </form>
                        <button id="save-table" class="btn btn-succsss button-pic button-trans">Add Item</button>
                    </div>
                    <div class="barcode-tabe clearfix">
                        <div class="col-sm-10">
                            <div class="table-part">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Pm Id</th>
                                        <th>Date</th>
                                        <th>Part No</th>
                                        <th>Part Name</th>
                                        <th>Zon</th>
                                        <th>Rack</th>
                                        <th>Bin</th>
                                        <th>Quantity</th>
                                        <th>PIC Store</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table-data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-2 col-xs-12">
                            <button id="generate-code" class="btn btn-succsss btn-code">Generate code</button>
                        </div>
                    </div>
                    <div style="display: none;" class="col-sm-5 col-sm-offset-3 col-xs-5 col-xs-offset-3 col-md-5 col-md-offset-4">
                        <div class="bar-code-preview clearfix" id="popup">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>TENDER NO</td>
                                    <td>TNB377/2013-404487055</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>IN STOCK CODE</td>
                                    <td>201605140001</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>DATE</td>
                                    <td>04/05/15</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>PART NO</td>
                                    <td>001</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>PART NAME</td>
                                    <td>SIDE WALL LEFT</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>QUANTITY</td>
                                    <td>1500</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>PIC STORE</td>
                                    <td>AMIR</td>
                                </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-succsss btn-oky">Okay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="all-modalsasfa"></div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">BARCODE- STOCK IN</h4>
                </div>
            <div class="modal-body" id="modal-data">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var formObj = [];
        var finalData = [];
        var id_no = 1;
        $('#save-table').click(function(){
            var multData = [];
            var html_form = '<tr>';
            formObj['id'] = id_no;
            var inputs = $('#form-data').serializeArray();
            html_form+='<td>'+formObj['id']+'</td>';
            $.each(inputs, function(i, input){
                formObj[input.name] = input.value;
                html_form+='<td>'+input.value+'</td>';
                Cookies.set(input.name+id_no, input.value);
            });
            html_form+='</tr>';
            $('#table-data').append(html_form);
            multData[multData.length] = formObj;
            finalData.push(multData);
            var htmlPopup = '<div class="clearfix" id="form-data'+formObj['id']+'">'+
                '<table class="table table-bordered">'+
                '<tbody>'+
                '<tr>'+
                '<td>1</td>'+
                '<td>IN STOCK CODE</td>'+
                '<td>201605140001</td>'+
                '</tr>'+
                '<tr>'+
                '<td>2</td>'+
                '<td>DATE</td>'+
                '<td>'+formObj['date']+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>3</td>'+
                '<td>PART NO</td>'+
                '<td>'+formObj['part_no']+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>4</td>'+
                '<td>PART NAME</td>'+
                '<td>'+formObj['part_name']+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>5</td>'+
                '<td>QUANTITY</td>'+
                '<td>'+formObj['quantity']+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>6</td>'+
                '<td>PIC STORE</td>'+
                '<td>'+formObj['pic_store']+'</td>'+
                '</tr>'+
                '</tbody>'+
                '</table>'+
                '<form id="final-form'+formObj['id']+'">'+
                '<input name="date" type="hidden" value="'+formObj['date']+'">'+
                '<input name="part_no" type="hidden" value="'+formObj['part_no']+'">'+
                '<input name="part_name" type="hidden" value="'+formObj['part_name']+'">'+
                '<input name="pic_store" type="hidden" value="'+formObj['pic_store']+'">'+
                '<input name="quantity" type="hidden" value="'+formObj['quantity']+'">'+
                '<input name="pm_id" type="hidden" value="'+formObj['pm_id']+'">'+
                '<input name="stock_code" type="hidden" value="<?php echo date('Ymd'); ?>">'+
                '<input type="submit" class="btn btn-default pull-right" value="Submit"></form>'+
                '</div><br>';
            $('#modal-data').append(htmlPopup);
            id_no+=1;
        });

        $('#generate-code').on('click', function(e){
            $('.modal').modal('hide');
            $('#myModal').modal('show');
            e.preventDefault();
            for(var k = 1; k < id_no; k++){
                $('#final-form'+k).on('submit', function(a){
                    a.preventDefault();
                    var formData = $(this).serialize();
                    var formUrl = $(this).attr('action');
                    var modalId = $(this).parent().attr('id');

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $this->Url->build(['Controller' => 'InStockCode', 'action' => 'addItems']); ?>',
                        data: formData,
                        dataType: 'text',
                        success: function(data, textStatus, xhr){
                            //alert(data);
                            $('#'+modalId).html(data);
                        },
                        error: function(xhr, textStatus, error){
                            //alert(textStatus);
                            $('#'+modalId).html(textStatus);
                        }
                    });
                    return false;
                });
            }
        });

    });
</script>