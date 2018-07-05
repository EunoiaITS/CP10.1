<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>MATERIAL REQUISITION Reporting</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date Issued</th>
                            <th>Meterial Requisition No</th>
                            <th>CCAR No</th>
                            <th>Section</th>
                            <th>Department</th>
                            <th>Approval</th>
                            <th>Status</th>
                            <th>Job</th>
                            <th>Document</th>
                            <th>Remarks</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($dbData as $data): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($data->date_issue) ?></td>
                                <td><?= $this->Number->format($data->id) ?></td>
                                <td><?= h($data->ccar_no) ?></td>
                                <td><?= h($data->sect) ?></td>
                                <td><?= h($data->dept) ?></td>
                                <td><?= h($data->approve) ?></td>
                                <td><?= h($data->stat) ?></td>
                                <td><?= h($data->job) ?></td>
                                <td><?= h($data->docs) ?></td>
                                <td><?= h($data->remarks) ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $data->id], ['class' => 'btn btn-info']) ?></td>
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