<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>Store Report</b></h2>
                <div class="clearfix">
                    <div class="col-sm-offset-1 col-sm-8 col-md-offset-1 col-md-8 col-xs-offset-1 col-xs-8 selection-padding ">
                        <form action="#">
                            <div class="form-group clearfix">
                                <label class="new-flevel" for="view-sto-report">View by<span class="fright">:</span></label>
                                <input type="text" class="fleft-label" placeholder="Part Name" id="view-sto-report">
                                <button type="submit" class="btn btn-default">
                                    View
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <hr/>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date Received</th>
                            <th>Aging</th>
                            <th>Tender No</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>UOM</th>
                            <th>Quantity</th>
                            <th>PIC Store</th>
                            <th>Zon</th>
                            <th>Rack No</th>
                            <th>Bin No</th>
                            <th>Level</th>
                            <th>Min  Stock Level</th>
                            <th>Max Stock Level</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($inventory as $inventory): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?= h($inventory->part_no) ?></td>
                                <td><?= h($inventory->part_name) ?></td>
                                <td><?= h($inventory->uom) ?></td>
                                <td></td>
                                <td></td>
                                <td><?= h($inventory->zon) ?></td>
                                <td><?= h($inventory->rack) ?></td>
                                <td><?= h($inventory->bn) ?></td>
                                <td><?= h($inventory->product_level) ?></td>
                                <td><?= h($inventory->min_stock) ?></td>
                                <td><?= h($inventory->max_stock) ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div class="pagination-indkom pull-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            echo $this->Paginator->prev(__('<<'), array('tag' => 'li', 'class' => 'page-item'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'page-link active','tag' => 'li','first' => 1));
                            echo $this->Paginator->next(__('>>'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>s