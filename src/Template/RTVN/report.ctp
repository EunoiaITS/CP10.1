<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>CREATE RETURN TO VENDOR NOTICE REPORTING</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Return To Vender Notice No</th>
                            <th>MDR No</th>
                            <th>Vendor</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Qty</th>
                            <th>Qty Rec</th>
                            <th>Qty O/S</th>
                            <th>DO Date</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($allData as $ad): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($ad->date) ?></td>
                                <td><?= h($ad->rtvn_no) ?></td>
                                <td><?= h($ad->mdr_no) ?></td>
                                <td><?= h($ad->vendor) ?></td>
                                <td><?= h($ad->part_no) ?></td>
                                <td><?= h($ad->part_name) ?></td>
                                <td><?= h($ad->qty) ?></td>
                                <td><?= h($ad->qty_rec) ?></td>
                                <td><?= h($ad->qty_os) ?></td>
                                <td><?= h($ad->date) ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $ad->id], ['class' => 'btn btn-info']) ?></td>
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