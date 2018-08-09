<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                <div class="icon-menu">
                    <div id="sidebar-btn">
                        <button type="button" class="btn btn-link btn-sm" id="button-swip"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <p class="menu-i">menu</p>
                </div>
                <div class="home-icon">
                   <a href="#"><img src="<?php echo $this->request->webroot.'assets/img/logo.png'; ?>" alt=""></a>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-md-offset-1 col-sm-offset-1 col-lg-offset-2 col-lg-5 col-xs-12">
                <div class="print-icon-right">
                    <ul>
                        <li><a href="#"><i class="fa fa-arrow-circle-left fa-2x"></i></a></li>
                        <li><a href="#"><i class="fa fa-arrow-circle-right fa-2x"></i></a></li>
                        <li><a href="#"><img class="img-icon" src="<?php echo $this->request->webroot.'assets/img/search.png'; ?>" alt=""></a></li>
                        <li><a href="#"><i class="fa fa-pencil-square-o fa-2x"></i></a></li>
                        <li><a href="#"><img class="img-icon" src="<?php echo $this->request->webroot.'assets/img/file-1.png'; ?>" alt=""></a></li>
                        <li><a href="#"><img class="img-icon image-to-excel" src="<?php echo $this->request->webroot.'assets/img/file-2.png'; ?>" alt=""></a></li>
                        <li><a href="#" onclick="jQuery.print('#ele3')"><i class="fa fa-print fa-2x"></i></a></li>
                        <li><a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="sidebar">
    <ul>
        <li class="div-userid">
            <div class="col-sm-3 padding-zero">
                <div class="user-image">
                    <img src="<?php echo $this->request->webroot.'assets/img/user-png.png'; ?>" alt="">
                </div>
            </div>
            <div class="col-sm-9 padding-zero">
                <div class="user-details text-uppercase">
                    <div class="user-name">
                        <span class="user-label"><b>User Name</b> :</span>
                        <span class="user-label-no"><?php echo $userName; ?></span>
                    </div>
                    <div class="user-name">
                        <span class="user-label"><b>User Role</b> :</span>
                        <span class="user-label-no"><?php echo $role; ?></span>
                    </div>
                    <div class="user-name">
                        <span class="user-label"><b>Department</b> :</span>
                        <span class="user-label-no">Store</span>
                    </div>
                </div>
            </div>
        </li>
        <li><a href="<?php echo $this->Url->build(['controller'=>'Dashboard','action'=>'index'])?>" class="active">Home ( Dashboard )</a></li>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Master List Product &nbsp;
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'ProductMasterlist', 'action' => 'index']); ?>">Product-MasterList</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'ProductMasterlist', 'action' => 'add']); ?>">Add</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'ProductMasterlist', 'action' => 'index']); ?>">Product-MasterList</a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Finish Goods
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller'=>FinishGoodAck]) ?>">Acknowledgement</a></li>
            </ul>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Stock
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'InStockCode', 'action' => 'add']); ?>">Stock In</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'InStockCode', 'action' => 'stockOut']); ?>">Stock Out</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li>Not authorized</li>
                </ul>
            <?php } ?>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Inventory
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'index']); ?>">Report</a></li>
                <?php if($role == 'admin'): ?>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'add']); ?>">Manual Stock</a></li>
                <?php endif;?>
                <?php if($role == 'admin' || $role == 'store-manager'): ?>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'view']); ?>">Manual Stock List</a></li>
                <?php endif;?>
                <?php if ($role == 'verifier' || $role == 'approver'): ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'requested']); ?>">Manual Stock List</a></li>
                <?php endif;?>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'invRecord']); ?>">Store Inventory Record</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'stockInRecord']); ?>">Store Stock In Item Inventory Record</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'stockOutRecord']); ?>">Store Stock Out Inventory Record</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'Inventory', 'action' => 'agingReport']); ?>">Store Inventory Aging Report</a></li>
            </ul>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Logistic Finish Good <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $lfgReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'LogisticFinishGood', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'LogisticFinishGood', 'action' => 'report']); ?>">Report</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'LogisticFinishGood', 'action' => 'report']); ?>">Report</a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'LogisticFinishGood', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $lfgReqCount; ?></span></a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Material Issue Ticket <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $mitReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <?php if($role == 'admin'){ ?>
                <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'report']); ?>">Report</a></li>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $mitReqCount; ?></span></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'report']); ?>">Report</a></li>
            <?php } ?>
                <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialIssueTicket', 'action' => 'productionReport']); ?>">Report from Production Module</a></li>
            </ul>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Material Requisition <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $mrReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <?php if($role == 'admin'){ ?>
                <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'report']); ?>">Report</a></li>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'report']); ?>">Report</a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $mrReqCount; ?></span></a></li>
            <?php } ?>
            <li><a href="<?php echo $this->Url->build(['controller' => 'MaterialRequisition', 'action' => 'productionReport']); ?>">Report from Production Module</a></li>
            </ul>
        </div>
        
        
        <!-- changes are appear here -->
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Delivery Order <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $nbdoReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><span class="disabled color-disable">Non Biling Delivery order <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $nbdoReqCount; ?></span><?php } ?></span></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'NonBillingDeliveryOrder', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'NonBillingDeliveryOrder', 'action' => 'report']); ?>">Report</a></li>
                <li><span class="disabled color-disable">Biling Delivery order <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $bdoReqCount; ?></span><?php } ?> </span></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'BillingDeliveryOrder', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'BillingDeliveryOrder', 'action' => 'report']); ?>">Report</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'NonBillingDeliveryOrder', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $nbdoReqCount; ?></span></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'NonBillingDeliveryOrder', 'action' => 'report']); ?>">Report</a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'BillingDeliveryOrder', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $bdoReqCount; ?></span></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'BillingDeliveryOrder', 'action' => 'report']); ?>">Report</a></li>
                    
                </ul>
            <?php } ?>
        </div>
        <!-- changes end here -->
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Quarantine Stocks
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'QuarantineStocks', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'QuarantineStocks', 'action' => 'report']); ?>">Report</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'QuarantineStocks', 'action' => 'report']); ?>">Report</a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                RTVN <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $rtvnReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'RTVN', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'RTVN', 'action' => 'report']); ?>">Report</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'RTVN', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $rtvnReqCount; ?></span></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'RTVN', 'action' => 'report']); ?>">Report</a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Store Credit Note <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $scnReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'StoreCreditNote', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'StoreCreditNote', 'action' => 'report']); ?>">Report</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'StoreCreditNote', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $scnReqCount; ?></span></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'StoreCreditNote', 'action' => 'report']); ?>">Report</a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Gate Pass <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $gpReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'GatePass', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'GatePass', 'action' => 'report']); ?>">Report</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'GatePass', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $gpReqCount; ?></span></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'GatePass', 'action' => 'report']); ?>">Report</a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="btn-group-vertical" role="group" class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                GTR <?php if($role == 'store-manager'){ ?><span class="badge"><?php echo $gtrReqCount; ?></span><?php } ?>
                <span class="caret"></span>
            </button>
            <?php if($role == 'admin'){ ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo $this->Url->build(['controller' => 'GTR', 'action' => 'add']); ?>">Add</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'GTR', 'action' => 'report']); ?>">Report</a></li>
            </ul>
            <?php } ?>
            <?php if($role == 'store-manager'){ ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?php echo $this->Url->build(['controller' => 'GTR', 'action' => 'requested']); ?>">Requested <span class="badge"><?php echo $gtrReqCount; ?></span></a></li>
                    <li><a href="<?php echo $this->Url->build(['controller' => 'GTR', 'action' => 'report']); ?>">Report</a></li>
                </ul>
            <?php } ?>
        </div>
    </ul>
</div>
<!--end sidebarmenu-->