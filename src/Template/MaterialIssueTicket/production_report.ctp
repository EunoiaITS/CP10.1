<!--=========
Production Planner page
==============-->
<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Issue Ticket Report</b></div>
                <div class="clearfix"></div>

                <!--============== Add drawing table area ===================-->

                <div class="planner-table table-responsive clearfix">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th rowspan="2">NO.</th>
                                <th rowspan="2">So No</th>
                                <th rowspan="2">Customer Name</th>
                                <th rowspan="2">MIT Date</th>
                                <th rowspan="2">MIT No</th>
                                <th rowspan="2">Model</th>
                                <th rowspan="2">Version</th>
                                <th rowspan="2">Type 1</th>
                                <th rowspan="2">Type 2</th>
                                <th rowspan="2">Qty</th>
                                <th rowspan="2">Create By</th>
                                <th rowspan="2">Department</th>
                                <th rowspan="2">Section</th>
                                <th rowspan="2">Location</th>
                                <th colspan="4">Store</th>
                                <th rowspan="2">Ack Status</th>
                                <th rowspan="2">Ack By</th>
                                <th rowspan="2">Document</th>
                                <th rowspan="2">Remark</th>
                                <th rowspan="2">Update</th>
                            </tr>
                            <tr class="table-cell">
                                <th>Ack Status</th>
                                <th>Recive By</th>
                                <th>Delivery Date</th>
                                <th>Delivery Status</th>
                            </tr>
                            </thead>
                            <tbody class="csn-text-up">
                            <?php $i=0; foreach ($mit as $m): ?>
                                <?php $i++;?>
                            <form method="post" action="<?php echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'productionReport']); ?>">
                                <tr>
                                    <td><?= $i ?><input type="hidden" name="prod_mit_id" value="<?= $m->id ?>"></td>
                                    <td><?= $m->sales->salesorder_no ?></td>
                                    <td><?= $m->cus->name ?></td>
                                    <td><?= $m->date ?></td>
                                    <td>MIT <?= $m->id ?></td>
                                    <td><?= $m->items->model ?></td>
                                    <td><?= $m->items->version ?></td>
                                    <td>INDOOR</td>
                                    <td>Motorized</td>
                                    <td><?= $m->items->quantity ?></td>
                                    <td><?= $m->created_by ?></td>
                                    <td>Production</td>
                                    <td>Welding</td>
                                    <td><?= $m->location ?></td>
                                    <td class="colored-red">
                                        <select name="ack_status" class="form-control" style="min-width: 100px">
                                            <option value="">Please select...</option>
                                            <option value="ack" <?php if(isset($m->inStore)){if($m->inStore->ack_status == 'ack'){echo 'selected';}} ?>>Acknowledge</option>
                                            <option value="rej" <?php if(isset($m->inStore)){if($m->inStore->ack_status == 'rej'){echo 'selected';}} ?>>Reject</option>
                                        </select>
                                    </td>
                                    <td><?= $pic ?><input type="hidden" name="received_by" value="<?= $pic ?>"></td>
                                    <td><input type="text" name="date" class="form-control datepicker-f" value="<?php if(isset($m->inStore)){echo date('Y-m-d', strtotime($m->inStore->date));}else{echo date('Y-m-d');} ?>"  style="min-width: 100px"></td>
                                    <td  class="colored-csn">
                                        <select name="del_status" class="form-control"  style="min-width: 100px">
                                            <option value="">Please select...</option>
                                            <option value="pending" <?php if(isset($m->inStore)){if($m->inStore->del_status == 'pending'){echo 'selected';}} ?>>Pending</option>
                                            <option value="received" <?php if(isset($m->inStore)){if($m->inStore->del_status == 'received'){echo 'selected';}} ?>>Received</option>
                                        </select>
                                    </td>
                                    <td  class="colored-csn">Ack</td>
                                    <td>Joned</td>
                                    <td></td>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-info" value="Update"></td>
                                </tr>
                                <?php if(isset($m->inStore)){echo '<input type="hidden" name="store-id" value="'.$m->inStore->id.'"><input type="hidden" name="action" value="edit">';}else{echo '<input type="hidden" name="action" value="add">';} ?>
                            </form>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                            <input type="hidden" name="total" value="<?= $i ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
