<div class="product-list">
    <div class="container-fluid sm-fluid">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>Transport Requisition form REPORTING</b></h2>
                <div class="product-list-table clearfix" style="overflow-x: auto;">
                    <table class="table table-bordered table2excel">
                        <thead class="stock-th-transport">
                        <tr>
                            <th>No</th>
                            <th>Delivery date</th>
                            <th>Transport Requisition form No</th>
                            <th>DO No</th>
                            <th>Customer</th>
                            <th>PIC</th>
                            <th>Destination</th>
                            <th>Address</th>
                            <th>Collection date</th>
                            <th>Collection Time</th>
                            <th>Collection From</th>
                            <th>Qty</th>
                            <th>Product Name</th>
                            <th>Driver's Name</th>
                            <th>Driver's Contact No</th>
                            <th>Plat No</th>
                            <th>Consignment No</th>
                            <th>Transport Type</th>
                            <th>Crane</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody class="stock-td">
                        <?php $count=0; foreach($logisticFinishGood as $data): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= h($data->del_date); ?></td>
                                <td><?= $this->Number->Format($data->id); ?></td>
                                <td><?= h($data->del_order_no); ?></td>
                                <td><?= h($data->customer); ?></td>
                                <td><?= h($data->pic_store); ?></td>
                                <td><?= h($data->dest); ?></td>
                                <td><?= h($data->address); ?></td>
                                <td><?= h($data->coll_date); ?></td>
                                <td><?= h($data->coll_time); ?></td>
                                <td><?= h($data->coll_form); ?></td>
                                <td><?= h($data->quantity); ?></td>
                                <td><?= h($data->part_name); ?></td>
                                <td><?= h($data->driver_name); ?></td>
                                <td><?= h($data->driver_contact_no); ?></td>
                                <td><?= h($data->plat_no); ?></td>
                                <td><?= h($data->consaignment_no); ?></td>
                                <td><?= h($data->vehicle); ?></td>
                                <td><?= h($data->crane); ?></td>
                                <td><?= $this->Html->link(__('View'), ['action' => 'view', $data->id], ['class' => 'btn btn-info']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
</div>