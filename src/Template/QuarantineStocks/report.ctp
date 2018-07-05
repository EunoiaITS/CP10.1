<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>Quarantine Inventory</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date Received</th>
                            <th>Tender No</th>
                            <th>PRN No</th>
                            <th>TRS Code</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Quantity</th>
                            <th>PIC Store</th>
                            <th>PIC Section</th>
                            <th>Rack No</th>
                            <th>Bin No</th>
                            <th>Level</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0; foreach ($quarantineStocks as $qs): $count ++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($qs->date) ?></td>
                                <td><?= h($qs->tender_no) ?></td>
                                <td><?= h($qs->prn_no) ?></td>
                                <td><?= h($qs->trs_code) ?></td>
                                <td><?= h($qs->part_no) ?></td>
                                <td><?= h($qs->part_name) ?></td>
                                <td><?= h($qs->quantity) ?></td>
                                <td><?= h($qs->pic_store) ?></td>
                                <td><?= h($qs->pic_section) ?></td>
                                <td><?= h($qs->rack) ?></td>
                                <td><?= h($qs->bin) ?></td>
                                <td><?= h($qs->level) ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $qs->id], ['class' => 'btn btn-info']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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