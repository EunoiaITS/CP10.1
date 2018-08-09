<form method="post" action="<?php echo $this->Url->build(['controller' => 'LogisticFinishGood', 'action' => 'add']); ?>">
    <div class="product-list">
        <div class="container-fluid sm-fluid">
            <div class="row">
                <div class="all-list-item clearfix">
                    <div class="list-item-title clearfix">
                        <div class="col-sm-6 padding-zero br-border text-center">
                            <h2 class="text-cl bg-cl">Indkom engineering Sdn Bhd</h2>
                        </div>
                        <div class="col-sm-6 padding-zero text-center">
                            <h2 class="text-cl bg-cl">Transport Requisition Form</h2>
                        </div>
                    </div>
                    <div class="no-genareted"><h3>No : <span><?php echo $trf_no; ?></span></h3></div>
                    <div class="product-details clearfix">
                        <h2 class="text-cl tfrom transport"><b>Shipment Details</b></h2>
                        <div class="col-sm-6 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="customer">Customer <span class="fright">:</span></label>
                                <input name="customer" type="text" class="form-control  input-bill fright-input" id="customer" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="pic-contact">PIC Contact <span class="fright">:</span></label>
                                <input name="pic_contact" type="text" class="form-control input-bill  fright-input" id="pic-contact" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="destination">Destination <span class="fright">:</span></label>
                                <input name="dest" type="text" class="form-control  input-bill fright-input" id="destination" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="address">Address <span class="fright">:</span></label>
                                <textarea name="address" class="form-control input-bill  fright-input" id="address" cols="20" rows="6" data-validation="required"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-offset-1 col-sm-5 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="d-date">Delivery Date <span class="fright">:</span></label>
                                <input type="text" class="datepicker-f form-control input-bill  fright-input" id="d-date" name="del_date" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="de-order">Delivery Order No <span class="fright">:</span></label>
                                <input name="del_order_no" type="text" class="form-control input-bill fright-input" id="de-order" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="col-date">Collection Date <span class="fright">:</span></label>
                                <input type="text" class="datepicker-f form-control input-bill fright-input" id="d-date" name="coll_date" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="col-time">Collection Time <span class="fright">:</span></label>
                                <input type="text" class="timepicker-f form-control input-bill fright-input" id="col-time" name="coll_time" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="col-form">Collection From <span class="fright">:</span></label>
                                <input name="coll_form" type="text" class="form-control input-bill fright-input" id="col-form" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="col-po-no">PO No <span class="fright">:</span></label>
                                <input name="po_no" type="text" class="form-control input-bill fright-input" id="col-po-no" data-validation="required">
                            </div>
                        </div>
                    </div>
                    <div class="product-details clearfix">
                        <h2 class="text-cl tfrom transport"><b>Products Details</b></h2>
                        <div class="col-sm-6">
                            <div class="form-group clearfix" id="model-options">
                                <label class="fleft-label fleft-label-transport " for="col-form">Model<span class="fright">:</span></label>
                                <select name="model" class="form-control input-bill" id="model-select">
                                    <option disabled>Select Model...</option>
                                    <option value="csu 500kv">CSU 500Kv</option>
                                    <option value="csu 100kv">CSU 1000Kv</option>
                                    <option value="rmu">RMU</option>
                                    <option value="rmu cb">RMU CB</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="form-group clearfix">
                                <label class="fleft-label fleft-label-transport " for="part-name">Part name <span class="fright">:</span></label>
                                <input name="part_name" type="text" class="form-control input-bill fright-input search-data" id="part_name" data-validation="required">
                            </div>
                            <div class="form-group clearfix">
                                <label class="fleft-label fleft-label-transport " for="quan-form">Quantity <span class="fright">:</span></label>
                                <input name="quantity" type="text" class="form-control  input-bill fright-input" id="quan-form" data-validation="required">
                            </div>
                        </div>
                    </div>
                    <div class="product-details clearfix">
                        <h2 class="text-cl tfrom transport"><b>Requisition Details</b></h2>
                        <div class="col-sm-6 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="d-name">Driver's Name <span class="fright">:</span></label>
                                <input name="driver_name" type="text" class="form-control input-bill  fright-input" id="d-name" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="dr-contact">Driver's Contact No<span class="fright">:</span></label>
                                <input name="driver_contact_no" type="text" class="form-control input-bill  fright-input" id="dr-contact" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="plat-no">Plat No <span class="fright">:</span></label>
                                <input name="plat_no" type="text" class="form-control input-bill  fright-input" id="plat-no" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="cos-no"> Consignment No <span class="fright">:</span></label>
                                <input name="consaignment_no" type="text" class="form-control input-bill  fright-input" id="cos-no" data-validation="required">
                            </div>
                        </div>
                        <div class="col-sm-offset-0 col-sm-6 col-md-offset-1 col-md-5 clearfix">
                            <div class="col-sm-6 col-xs-12 lorry">
                                <div class="checkbox-lory">
                                    <label><input name="vehicle" type="checkbox" value="1 MTLorry"> 1 MTLorry</label>
                                </div>
                                <div class="checkbox-lory">
                                    <label><input name="vehicle" type="checkbox" value="3 MTLorry"> 3 MTLorry</label>
                                </div>
                                <div class="checkbox-lory">
                                    <label><input name="vehicle" type="checkbox" value="6 MTLorry"> 6 MTLorry</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 lorry sm-padding">
                                <div class="checkbox-lory">
                                    <label><input name="vehicle" type="checkbox" value="10 MT(20'-24')Trailer"> 10 MT(20'-24')Trailer</label>
                                </div>
                                <div class="checkbox-lory">
                                    <label><input name="vehicle" type="checkbox" value="20 MT(40') Trailer"> 20 MT(40') Trailer</label>
                                </div>
                                <div class="checkbox-lory">
                                    <label><input name="vehicle" type="checkbox" value=""> Others <span class="fright-sm clearfix">: <input name="vehicle" type="text" class="form-control fright-others" id="cos-no" data-validation="required"></label>
                                </div>
                                
                            </div>
                            <div class="col-sm-6 lorry">
                            	<div class="checkbox-lory">
                                	<label class="fleft-label fleft-label-transport " for="cos-no">Crane :</label>
                                </div>
                            </div>
                            <div class="col-sm-6 lorry" style="padding-left:0px;">
                            	<div class="checkbox-lory">
                                	<label><input name="crane" type="checkbox" value="yes"> Yes</label>
                               	 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label><input name="crane" type="checkbox" value="no"> No</label>
                           	 </div>
                           </div>
                            
                            
                        </div>
                        <div class="col-sm-4 col-sm-offset-8">
                            <div class="prepared-by clearfix">
                                <h2>Prepared by</h2>
                                <button class="btn btn-info create-item clearfix">Create</button>
                                <div class="logistic-office">
                                    <p>( Logistic officer )</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="stat" value="pending">
                        <input type="hidden" name="prepared_by" value="<?php echo $pic; ?>">
                        <button type="submit" class="btn btn-tues btn-submit-o clearfix">Submit</button>
                    </div>
                </div>
            </div>
</form>
</div>
</div>

<script>
    $(document).ready(function(){
        var selected = $('#model-select');
        var divTag = $('#model-options');
        selected.change(function(){
            var value = selected.find(":selected").val();
            //alert(value);
            if(value == 'others'){
                selected.attr('name', '');
                divTag.append('<br><input name="model" type="text" class="form-control fright-input input-offset-padding" id="model-name" placeholder="Type the others value" data-validation="required">');
            }else{
                selected.attr('name', 'model');
                $("#model-options #model-name").remove();
            }
        });
    });
</script>