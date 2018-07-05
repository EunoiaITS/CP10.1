<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>Non Billing Delivery order REPORTING</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Do No</th>
                            <th>Part No</th>
                            <th>Part Name</th>
                            <th>Quantity</th>
                            <th>Deliver To</th>
                            <th>Remarks</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($nbdoReport as $nr): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($nr->date) ?></td>
                                <td><?= h($nr->do_no) ?></td>
                                <td><?= h($nr->part_no) ?></td>
                                <td><?= h($nr->part_name) ?></td>
                                <td><?= h($nr->qty) ?></td>
                                <td><?= h($nr->del_to) ?></td>
                                <td><?= h($nr->remarks) ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $nr->id], ['class' => 'btn btn-info']) ?></td>
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