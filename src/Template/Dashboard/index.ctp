<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>Store Module Dashboard</b></h2>
                <div class="product-list-table clearfix">
                    <?php if($role == 'admin' || $role == 'store-manager'): ?>
                    <table class="table table-bordered table2excel" style="overflow: hidden">
                        <thead class="stock-th">
                        <tr>
                        <tr>
                            <th>Serial</th>
                            <th>Section</th>
                            <th>Requests</th>
                            <th>PIC</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody class="stock-td">
                        <tr>
                            <td>1</td>
                            <td>Logistic Finish Goods</td>
                            <td><?= $lfgReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'LogisticFinishGood', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Material Issue Ticket</td>
                            <td><?= $mitReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Material Requisition</td>
                            <td><?= $mrReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Non Billing Delivery Order</td>
                            <td><?= $nbdoReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'NonBillingDeliveryOrder', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Billing Delivery Order</td>
                            <td><?= $bdoReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'BillingDeliveryOrder', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>RTVN</td>
                            <td><?= $rtvnReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'RTVN', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Store Credit Note</td>
                            <td><?= $scnReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'StoreCreditNote', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Gate Pass</td>
                            <td><?= $gpReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'GatePass', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>GTR</td>
                            <td><?= $gtrReqCount ?></td>
                            <td><?= $pic ?></td>
                            <td><?= date('Y-m-d') ?></td>
                            <td>Pending</td>
                            <td><a target="_blank" href="<?php if($role == 'store-manager'){ echo $this->Url->build(['controller' => 'GTR', 'action' => 'requested']);}else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><?php if($role == 'store-manager'){echo "<span class='btn btn-primary'>VIEW</span>";};?></a></td>
                        </tr>
                        </tbody>
                    </table>
                    <?php endif;?>
                    <?php if($role == 'verifier' || $role == 'approver'): ?>
                        <table class="table table-bordered table2excel" style="overflow: hidden">
                            <thead class="stock-th">
                            <tr>
                            <tr>
                                <th>Serial</th>
                                <th>Section</th>
                                <th>Requests</th>
                                <th>PIC</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody class="stock-td">
                                <tr>
                                    <td>1</td>
                                    <td>Manual Stock</td>
                                    <td><?php if($role == 'verifier'){echo $msReqCount;}else{ echo $msVerCount;} ?></td>
                                    <td><?= $pic ?></td>
                                    <td><?= date('Y-m-d') ?></td>
                                    <td><?php if($role == 'verifier'){echo "Pending";}else{ echo "Verified";} ?></td>
                                    <td><a target="_blank" href="<?php if($role == 'verifier' || $role == 'approver'){ echo $this->Url->build(['controller' => 'Inventory', 'action' => 'requested']); }else{echo $this->Url->build(['controller' => '', 'action' => '']);} ?>"><span class="btn btn-primary"> VIEW </span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>