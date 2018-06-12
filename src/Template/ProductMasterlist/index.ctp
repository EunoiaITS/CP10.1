<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="all-list-item clearfix">
                <h2 class="text-cl tfrom"><b>Product MasterList</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('part_no') ?></th>
                            <th><?= $this->Paginator->sort('part_name') ?></th>
                            <th><?= $this->Paginator->sort('zon') ?></th>
                            <th><?= $this->Paginator->sort('rack') ?></th>
                            <th><?= $this->Paginator->sort('bn') ?></th>
                            <th><?= $this->Paginator->sort('product_level') ?></th>
                            <th><?= $this->Paginator->sort('uom') ?></th>
                            <th><?= $this->Paginator->sort('min_stock') ?></th>
                            <th><?= $this->Paginator->sort('max_stock') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($productMasterlist as $productMasterlist): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($productMasterlist->part_no) ?></td>
                                <td><?= h($productMasterlist->part_name) ?></td>
                                <td><?= h($productMasterlist->zon) ?></td>
                                <td><?= h($productMasterlist->rack) ?></td>
                                <td><?= h($productMasterlist->bn) ?></td>
                                <td><?= h($productMasterlist->product_level) ?></td>
                                <td><?= h($productMasterlist->uom) ?></td>
                                <td><?= h($productMasterlist->min_stock) ?></td>
                                <td><?= h($productMasterlist->max_stock) ?></td>
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