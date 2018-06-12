<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <div class="product-masterlist all-list-item clearfix">
                <h2 class="text-cl tfrom"><b>Store Inventory Aging Report</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>STOCK-IN Date</th>
                            <th>STOCK-OUT Date</th>
                            <th>Aging (Days)</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>UOM</th>
                            <th>Quantity</th>
                            <th>Zon</th>
                            <th>Rack No</th>
                            <th>Bin No</th>
                            <th>Level</th>
                            <th>Min Stock Level</th>
                            <th>Max Stock Level</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0;foreach ($pm as $p): $count++;?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= date('Y-m-d',strtotime($p->in_date)) ?></td>
                            <td><?= date('Y-m-d',strtotime($p->out_date)) ?></td>
                            <td><?php echo $diff = (strtotime($p->out_date) - strtotime($p->in_date)) / (60 * 60 * 24); ?></td>
                            <td><?= $p->eng->partNo ?></td>
                            <td><?= $p->eng->partName ?></td>
                            <td><?= $p->uom ?></td>
                            <td><?= $p->in ?></td>
                            <td><?= $p->zon ?></td>
                            <td><?= $p->rack ?></td>
                            <td><?= $p->bn ?></td>
                            <td><?= $p->product_level ?></td>
                            <td><?= $p->min_stock ?></td>
                            <td><?= $p->max_stock ?></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>