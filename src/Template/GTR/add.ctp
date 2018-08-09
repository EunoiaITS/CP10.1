<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <div class="all-list-item clearfix">
                <div class="list-item-title clearfix">
                    <div class="col-sm-6 padding-zero br-border text-center">
                        <h2 class="text-cl bg-cl">Indkom engineering Sdn Bhd</h2>
                    </div>
                    <div class="col-sm-6 padding-zero text-center">
                        <h2 class="text-cl bg-cl">Goods transferred/return</h2>
                    </div>
                </div>
                <form id="form-data" method="post" action="<?php echo $this->Url->build(['controller' => 'GTR', 'action' => 'addItems']); ?>">
                    <div class="product-details clearfix">
                        <div class="col-sm-12  col-md-6 col-xs-12 col-lg-5 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="from-goods">From <span class="fright">:</span></label>
                                <textarea name="gtr_from" class="goods-textarea input-bill" id="from-goods" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="to-goods">To<span class="fright">:</span></label>
                                <textarea name="gtr_to" class="goods-textarea input-bill" id="to-goods" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="date-goods">Date<span class="fright">:</span></label>
                                <input name="date" type="text" class="form-control fright-input input-bill" id="date-goods" value="<?php echo date('Y/m/d'); ?>" data-validation="required">
                            </div>
                        </div>
                        <div class="col-sm-12  col-md-5 col-xs-12 col-lg-5 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport" for="transporter-goods">Transporter<span class="fright">:</span></label>
                                <input name="transporter" type="text" class="form-control input-bill fright-input" id="transporter-goods" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport" for="vehicle-goods">Vehicle No<span class="fright">:</span></label>
                                <input name="veh_no" type="text" class="form-control input-bill fright-input " id="vehicle-goods" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="ref-goods">Ref No <span class="fright">:</span></label>
                                <input name="ref_no" type="text" class="form-control input-bill  fright-input" id="ref-goods" value="<?php echo $gtr_no; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="goods-cost-label fleft-label  fleft-label-transport" for="quantity-os">Purpose of </br> transferred/returned<span class="fright">:</span></label>
                                <div class="checkbox-goods">
                                    <label class="checkbox-inline"><input name="purpose_transfarred" type="checkbox" value="investigation">Investigation</label>
                                    <label class="checkbox-inline"><input name="purpose_transfarred" type="checkbox" value="repair">Repair</label>
                                    <label class="checkbox-inline" style="padding-left: 11px;"><input name="purpose_transfarred" type="checkbox" value="replacement">Replacement</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="req-goods">Requested by <span class="fright">:</span></label>
                                <input name="req_by" type="text" class="form-control input-bill  fright-input" id="req-goods" value="<?php echo $pic; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="product-details clearfix">
                        <div class="col-sm-12  col-md-5 col-xs-12 col-lg-5 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="model-goods">Model<span class="fright">:</span></label>
                                <select class="form-control input-bill " id="model-goods" name="model_no">
                                    <option>Select Model...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="version-goods">Version<span class="fright">:</span></label>
                                <select class="form-control input-bill " id="version-goods" name="version">
                                    <option>Select Version...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="type-goods">Type<span class="fright">:</span></label>
                                <select class="form-control input-bill " id="type-goods" name="type">
                                    <option>Select Type...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport" for="quantity-goods">Quantity<span class="fright">:</span></label>
                                <input name="qty" type="text" class="form-control input-bill  fright-input" id="quantity-goods" data-validation="required"/>
                            </div>
                        </div>
                        <div class="col-sm-12  col-md-5 col-xs-12 col-lg-5 clearfix">
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport" for="fg-code-goods">FG Code<span class="fright">:</span></label>
                                <input name="fg_code" type="text" class="form-control input-bill  fright-input " id="fg-code-goods" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="seriel-goods">Serial No <span class="fright">:</span></label>
                                <input name="ser_no" type="text" class="form-control input-bill  fright-input" id="seriel-goods" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="desc-goods">Desc<span class="fright">:</span></label>
                                <input name="description" type="text" class="form-control input-bill  fright-input" id="desc-goods" data-validation="required"/>
                            </div>
                            <div class="form-group">
                                <label class="fleft-label fleft-label-transport " for="remarks-goods">Remarks<span class="fright">:</span></label>
                                <input name="remarks" type="text" class="form-control input-bill  fright-input" id="remarks-goods" data-validation="required"/>
                            </div>
                            <button class="btn btn-info btn-bill btn-vendor btn-bill-info">Add Item</button>
                        </div>
                    </div>
                    <div class="product-list-table clearfix">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Quantity</th>
                                <th>Product</th>
                                <th>FG Code</th>
                                <th>Serial Number</th>
                                <th>Description</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="customer-remarks-table clearfix">
                        <div class="col-sm-8">
                            <div class="customer-remarks">
                                <h4>Customer Remarks(If Any)</h4>
                                <textarea name="cust_remarks" id="customer-remarks-textarea" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="prepared-by-item item-pre-goods">
                                <h2>Approved by(Customer)</h2>
                                <h3 class="author-name">name</h3>
                                <div class="date-lo">date</div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="prepared_by" value="<?php echo $pic; ?>">
                    <input type="hidden" name="stat" value="pending">
                </form>
                <div class="indcom-used clearfix"><h2>for indkom used</h2></div>
                <div class="checked-by-item">
                    <div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6 col-xs-12">
                        <div class="prepared-table">
                            <div class="prepared-by-item item-pre-simple">
                                <h2>Returned by(Transporter)</h2>
                                <h3 class="author-name">name</h3>
                                <div class="date-lo">date</div>
                            </div
                                >
                            <div class="prepared-by-item item-pre-simple">
                                <h2>Received by</h2>
                                <div class="info-button-item clearfix">
                                    <button class="btn btn-info btn-rt-ver" style="margin-right:10px;font-size:13px;">Recevied</button>
                                    <button class="btn btn-danger btn-rt-ver" style="font-size:13px;">Reject</button>
                                </div>
                                <div class="date-lo">date</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>