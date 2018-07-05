<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>GOODS TRANSFERRED/RETURN REPORTING</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Ref No</th>
                            <th>PIC Customer</th>
                            <th>Transporter</th>
                            <th>Vehicle No</th>
                            <th>FG Code</th>
                            <th>Seriel No</th>
                            <th>Qty</th>
                            <th>Purpose of Transferred</th>
                            <th>Remarks</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($gtrData as $gd): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($gd->date) ?></td>
                                <td><?= h($gd->ref_no) ?></td>
                                <td><?= h($gd->prepared_by) ?></td>
                                <td><?= h($gd->transporter) ?></td>
                                <td><?= h($gd->veh_no) ?></td>
                                <td><?= h($gd->fg_code) ?></td>
                                <td><?= h($gd->ser_no) ?></td>
                                <td><?= h($gd->qty) ?></td>
                                <td><?= h($gd->purpose_transfarred) ?></td>
                                <td><?= h($gd->remarks) ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $gd->id], ['class' => 'btn btn-info']) ?></td>
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