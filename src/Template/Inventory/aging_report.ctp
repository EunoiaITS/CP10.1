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
                            <th>Aging</th>
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
                        <?php $count = 0;foreach ($data as $d): foreach ($d->pm as $p): $count++;?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?php foreach ($d->ins as $i){echo date('Y-m-d',strtotime($i->date)) . '<br/>';} ?></td>
                            <td></td>
                            <td></td>
                            <td><?= $d->partNo ?></td>
                            <td><?= $d->partName ?></td>
                            <td><?= $p->uom ?></td>
                            <td></td>
                            <td><?= $p->zon ?></td>
                            <td><?= $p->rack ?></td>
                            <td><?= $p->bn ?></td>
                            <td><?= $p->product_level ?></td>
                            <td><?= $p->min_stock ?></td>
                            <td><?= $p->max_stock ?></td>
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