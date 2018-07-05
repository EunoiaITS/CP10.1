<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>MATERIAL ISSUE TICKET Reporting</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Section</th>
                            <th>Material Issue Ticket No</th>
                            <th>Ref</th>
                            <th>Tender No/SO No</th>
                            <th>Approval</th>
                            <th>Status</th>
                            <th>Document</th>
                            <th>Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($materialIssueTicket as $mit): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($mit->date) ?></td>
                                <td><?= h($mit->section) ?></td>
                                <td><?= h($mit->mit_no) ?></td>
                                <td><?= h($mit->ref) ?></td>
                                <td><?= h($mit->so_no) ?></td>
                                <td><?= h($mit->approve) ?></td>
                                <td><?= h($mit->stat) ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $mit->id], ['class' => 'btn btn-info']) ?></td>
                                <td><?= h($mit->remarks) ?></td>
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