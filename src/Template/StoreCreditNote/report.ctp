<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>Store Credit Note Reporting</b></h2>
                <div class="product-list-table clearfix table2excel">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Ref No</th>
                            <th>PIC</th>
                            <th>Approval</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($scnData as $sd): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($sd->date) ?></td>
                                <td><?= h($sd->ref_no) ?></td>
                                <td><?= h($sd->pic) ?></td>
                                <td><?= h($sd->approve) ?></td>
                                <td><?= h($sd->stat) ?></td>
                                <td><?= h($sd->remarks) ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $sd->id], ['class' => 'btn btn-info']) ?></td>
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