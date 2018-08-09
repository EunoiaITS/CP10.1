<div class="product-list">
    <div class="container">
        <div class="row">
            <div class="product-masterlist all-list-item finish-good-padding clearfix">
                <h2 class="text-cl tfrom"><b>Gate Pass Reporting</b></h2>
                <div class="product-list-table clearfix">
                    <table class="table table-bordered table2excel">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Do No</th>
                            <th>Gate Pass No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Remarks</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count=0; foreach ($gpData as $gd): $count++;?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $gd->date ?></td>
                                <td><?= $gd->del_order_no ?></td>
                                <td><?= $gd->id ?></td>
                                <td><?= $gd->part_name ?></td>
                                <td><?= $gd->quantity ?></td>
                                <td><?= $gd->remarks_prep ?></td>
                                <td><a class="btn btn-info" href="<?php echo $this->Url->build(['controller' => 'GatePass', 'action' => 'view', $gd->id]); ?>">View</a></td>
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
</div>