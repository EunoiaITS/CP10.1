<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <div class="product-masterlist all-list-item clearfix">
                <h2 class="text-cl tfrom"><b>Store Inventory Record</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Item image</th>
                            <th>Drawing No</th>
                            <th>UOM</th>
                            <th>Zon</th>
                            <th>Rack No</th>
                            <th>Bin No</th>
                            <th>Level</th>
                            <th>Min Stock Level</th>
                            <th>Max Stock Level</th>
                            <th>Stock In</th>
                            <th>Stock Out</th>
                            <th>Current Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0;foreach ($pm as $p): $count++;?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $p->part_no ?></td>
                            <td><?= $p->part_name ?></td>
                            <td><?php if(isset($p->eng->pm->picture)){?><a class="btn btn-primary" target="_blank" alt="Show Image" href="<?= $p->eng->sitelink . $p->eng->pm->picture ?>">Show Image</a><?php }?></td>
                            <td><?= $p->eng->pm->drawingNo ?></td>
                            <td><?= $p->uom ?></td>
                            <td><?= $p->zon ?></td>
                            <td><?= $p->rack ?></td>
                            <td><?= $p->bn ?></td>
                            <td><?= $p->product_level ?></td>
                            <td><?= $p->min_stock ?></td>
                            <td><?= $p->max_stock ?></td>
                            <td><?= $p->in ?></td>
                            <td><?= $p->out ?></td>
                            <td><?= ($p->in - $p->out) < 0 ? 0 : ($p->in - $p->out) ?></td>
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
