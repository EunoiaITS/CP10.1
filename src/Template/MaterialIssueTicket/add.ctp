<div class="product-list">
    <div class="container-fluid  sm-fluid">
        <div class="row">
            <div class="all-list-item clearfix">
                <div class="list-item-title clearfix">
                    <div class="col-sm-6 padding-zero br-border text-center">
                        <h2 class="text-cl bg-cl">Indkom engineering Sdn Bhd</h2>
                    </div>
                    <div class="col-sm-6 padding-zero text-center">
                        <h2 class="text-cl bg-cl">Material issue Ticket</h2>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-xs-12 selection-padding clearfix">
                    <form id="form-data" method="post" action="<?php echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'addItems']); ?>">
                    <div class="col-sm-6 ticket-padding">
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Date <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><input class="form-control control-issue-ticket" name="date" type="text" value="<?php echo date('Y/m/d'); ?>"></p>
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>REF <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><input class="form-control control-issue-ticket" name="ref" type="text"></p>
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>MIT No <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><input class="form-control control-issue-ticket" name="mit_no" type="text"></p>
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Section <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><input class="form-control control-issue-ticket" name="section" type="text"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12 ticket-padding">
                        <div class="ticket-item cleafix form-group">
                            <div class="label-date">
                                <p>So No <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p ><input class="form-control control-issue-ticket" name="so_no" type="text"></p>
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Customer <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><input class="form-control control-issue-ticket" name="costomer" type="text"></p>
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Revision <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><input class="form-control control-issue-ticket" name="revision" type="text"></p>
                            </div>
                        </div>
                        <div class="ticket-item form-group">
                            <div class="label-date">
                                <p>Quantity <span class="fright">:</span></p>
                            </div>
                            <div class="time-ticket">
                                <p><input class="form-control control-issue-ticket" name="qty" type="text"></p>
                            </div>
                        </div>
                    </div>
                        <input type="hidden" name="prepared_by" value="<?php echo $prepared_by; ?>">
                        <input type="hidden" name="stat" value="pending">
                    </form>
                </div>
                <div class="col-sm-12 col-md-5 ticket-padding">
                    <div class="col-sm-6 ticket-version">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th>Version</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>ZZT O/D</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>ZTTT I/D</td>
                                <td>10</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6" style="padding-right:0px">
                        <div class="prepared-by-at clearfix">
                            <h2>Prepared by</h2>
                            <h3 class="prepared-name"><?php echo $prepared_by; ?></h3>
                            <h2 style="border-top:1px solid #ddd">Approved by</h2>
                            <h3 class="prepared-name">En Hanif</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
        <div class="product-list-table clearfix">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th rowspan="3">No</th>
                    <th rowspan="3">Model</th>
                    <th rowspan="3">Version</th>
                    <th rowspan="3">Type</th>
                    <th rowspan="3">Part No</th>
                    <th rowspan="3">Part Descriptions</th>
                    <th rowspan="3">Usages</th>
                    <th rowspan="3">Request Quantity</th>
                    <th rowspan="3">Issued Quantity</th>
                    <th rowspan="3">Outstanding Quantity</th>
                    <th colspan="5">Issuing date</th>
                </tr>
                <tr class="table-cells">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td class="td-blank-row"></td>
                    <td class="td-blank-row"></td>
                    <td class="td-blank-row"></td>
                    <td class="td-blank-row"></td>
                    <td class="td-blank-row"></td>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <button type="submit" form="form-data" class="btn btn-info btn-sub-ticket">Submit</button></div>
        </div>
        
        <!-- Popup model -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body transmition-model clearfix">
                            <p>Please key in Remarks Here</p>
                            <div class="text-area-body">
                                <textarea name="" class="form-control fright-input" id="address" cols="20" rows="6" data-validation="required"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-info btn-text-tran" data-dismiss="modal">Okay</button>
                        </div>
                    </div>

                </div>
            </div>
    </div>
</div>