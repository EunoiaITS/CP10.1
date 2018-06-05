<!--=========
      Production Planner page
      ==============-->

<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>Material Request Report</b></div>
            </div><!-- end mit title -->
        </div>

        <div class="clearfix"></div>

        <!--============== Add drawing table area ===================-->

        <div class="planner-table table-responsive clearfix">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">MR No</th>
                        <th rowspan="2">Part No</th>
                        <th rowspan="2">Description</th>
                        <th rowspan="2">Uom</th>
                        <th rowspan="2">QTY</th>
                        <th rowspan="2">Document</th>
                        <th rowspan="2">Create By</th>
                        <th rowspan="2">Department</th>
                        <th rowspan="2">Section</th>
                        <th colspan="5">Store Department</th>
                        <th rowspan="2">Ack Status</th>
                        <th rowspan="2">Ack By</th>
                        <th rowspan="2">Remark</th>
                        <th rowspan="2">Update</th>
                    </tr>
                    <tr class="table-cell">
                        <th>Ack Status</th>
                        <th>Recevied By</th>
                        <th>Delivery Date</th>
                        <th>Delivery Qty</th>
                        <th>Delivery Status</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php foreach($mr as $m): ?>
                        <?php $count = 0; foreach($m->items as $item): $count++; ?>
                    <form method="post" action="<?php echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'productionReport']); ?>">
                            <tr>
                                <td><?= $count ?><input type="hidden" name="prod_mr_id" value="<?= $item->id ?>"></td>
                                <td><?= $m->date ?></td>
                                <td>MR<?= $m->id ?></td>
                                <td><?= $item->part_no ?></td>
                                <td><?= $item->part_desc ?></td>
                                <td>N/A</td>
                                <td>N/A</td>
                                <td><a href="#">View</a></td>
                                <td><?= $m->created_by ?></td>
                                <td>Production</td>
                                <td>13/10/2017</td>
                                <td class="colored-csn">
                                    <select name="ack_status" class="form-control" style="min-width: 100px">
                                        <option value="">Please select...</option>
                                        <option value="ack" <?php if(isset($item->inStore)){if($item->inStore->ack_status == 'ack'){echo 'selected';}} ?>>Acknowledge</option>
                                        <option value="rej" <?php if(isset($item->inStore)){if($item->inStore->ack_status == 'rej'){echo 'selected';}} ?>>Reject</option>
                                    </select>
                                </td>
                                <td><?= $pic ?><input type="hidden" name="received_by" value="<?= $pic ?>"></td>
                                <td><input type="text" name="date" class="form-control" value="<?php if(isset($item->inStore)){echo date('Y-m-d', strtotime($item->inStore->date));}else{echo date('Y-m-d');} ?>"  style="min-width: 100px"></td>
                                <td><input type="number" class="form-control" name="del_qty" min="1" value="<?php if(isset($item->inStore)){echo $item->inStore->del_qty;} ?>" style="min-width: 50px"></td>
                                <td>
                                    <select name="del_status" class="form-control"  style="min-width: 100px">
                                        <option value="">Please select...</option>
                                        <option value="pending" <?php if(isset($item->inStore)){if($item->inStore->del_status == 'pending'){echo 'selected';}} ?>>Pending</option>
                                        <option value="received" <?php if(isset($item->inStore)){if($item->inStore->del_status == 'received'){echo 'selected';}} ?>>Received</option>
                                    </select>
                                </td>
                                <td  class="colored-csn">Ack</td>
                                <td><?= $m->approved_by ?></td>
                                <td></td>
                                <td><input type="submit" class="btn btn-info" value="Update"></td>
                            </tr>
                            <?php if(isset($item->inStore)){echo '<input type="hidden" name="store-id" value="'.$item->inStore->id.'"><input type="hidden" name="action" value="edit">';}else{echo '<input type="hidden" name="action" value="add">';} ?>
                        </form>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>