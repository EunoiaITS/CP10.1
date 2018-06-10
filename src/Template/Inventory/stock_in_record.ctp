<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <div class="product-masterlist all-list-item clearfix">
                <h2 class="text-cl tfrom"><b>Store Stock In Item Inventory Record</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th rowspan="2">Date</th>
                            <th rowspan="2">Part No</th>
                            <th rowspan="2">Part Name</th>
                            <th colspan="2">Stock-In Type</th>

                            <th rowspan="2">Current Balance</th>
                            <th rowspan="2">Total Qty</th>
                            <th rowspan="2">Create By</th>
                            <th colspan="4">Location</th>
                            <th rowspan="2">Document</th>
                            <th rowspan="2">Remark</th>
                        </tr>
                        <tr class="table-cells">
                            <th>DO/CRN No</th>
                            <th>QTY</th>
                            <th>Zon</th>
                            <th>Rack No</th>
                            <th>Bin No</th>
                            <th>Level</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0;foreach ($data as $d): foreach ($d->pm as $p): $count++;?>
                        <tr>
                            <td><?= $count ?></td>
                            <td></td>
                            <td><?= $d->partNo ?></td>
                            <td><?= $d->partName ?></td>
                            <td></td>
                            <td>pcs</td>
                            <td>A</td>
                            <td>1</td>
                            <td>1-2</td>
                            <td><?= $p->zon ?></td>
                            <td><?= $p->rack ?></td>
                            <td><?= $p->bn ?></td>
                            <td><?= $p->product_level ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php endforeach;endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>