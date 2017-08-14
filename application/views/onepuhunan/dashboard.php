<?php
$data['title'] = 'OnePuhunan';
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <br/>
                    <?php if($this->session->role_id != 'super' && $this->session->role_id != 'ssuper' && $this->session->role_id != 'usr' && $this->session->role_id != 'cpu') {?>
                        <?php if((array)$count || (array)$user_branch) {?>
                            <?php foreach ((array)$count as $total)
                                 if($this->session->role_id == 'qa'){
                                     if($total['destprocess'] == 'KYC'){ ?>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="widget widget-nopad">
                                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                                    <h3>TOTAL KYC</h3>
                                                </div>
                                                <div class="widget-content">
                                                    <div class="text-center default-margin row">
                                                        <div class="col-xs-12">
                                                            <h2><?=$total['destprocess'] ?></h2>
                                                            <h1 class="value"><?=$total['sum'] ?></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                     <?php } elseif($total['destprocess'] == 'ALAF') { ?>
                                         <div class="col-md-6 col-xs-12">
                                             <div class="widget widget-nopad">
                                                 <div class="widget-header"> <i class="icon-list-alt"></i>
                                                     <h3>TOTAL ALAF</h3>
                                                 </div>
                                                 <div class="widget-content">
                                                     <div class="text-center default-margin row">
                                                         <div class="col-xs-12">
                                                             <h2><?=$total['destprocess'] ?></h2>
                                                             <h1 class="value"><?=$total['sum'] ?></h1>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                     <?php } ?>
                                <?php } elseif ($this->session->role_id == 'ci'){ ?>
                                    <?php if($total['destprocess'] == 'BMV'){ ?>
                                         <div class="col-md-6 col-xs-12">
                                             <div class="widget widget-nopad">
                                                 <div class="widget-header"> <i class="icon-list-alt"></i>
                                                     <h3>TOTAL BMV</h3>
                                                 </div>
                                                 <div class="widget-content">
                                                     <div class="text-center default-margin row">
                                                         <div class="col-xs-12">
                                                             <h2><?=$total['destprocess'] ?></h2>
                                                             <h1 class="value"><?=$total['sum'] ?></h1>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                    <?php } ?>
                                <?php } elseif ($this->session->role_id == 'tc'){ ?>
                                    <?php if($total['destprocess'] == 'TC'){ ?>
                                         <div class="col-md-6 col-xs-12">
                                             <div class="widget widget-nopad">
                                                 <div class="widget-header"> <i class="icon-list-alt"></i>
                                                     <h3>TOTAL TC</h3>
                                                 </div>
                                                 <div class="widget-content">
                                                     <div class="text-center default-margin row">
                                                         <div class="col-xs-12">
                                                             <h2><?=$total['destprocess'] ?></h2>
                                                             <h1 class="value"><?=$total['sum'] ?></h1>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                    <?php } ?>
                            <?php } ?>
                            <?php foreach ((array)$user_branch as $id => $branchList){  ?>
                                <div class="col-md-6 col-xs-12">
                                    <!-- sanction counter -->
                                    <div class="widget widget-nopad">
                                        <div class="widget-header"> <i class="icon-list-alt"></i>
                                            <h3><?=$branchList['BranchName']?><?= $this->session->role_id ?></h3>
                                        </div>

                                        <div class="widget-content">
                                            <div class="text-center default-margin row">
                                                <?php if (count($count_branch_pending) == 0) { ?>
                                                    <div class="col-xs-12">
                                                        <h2>Total</h2>
                                                        <h1 class="value">0</h1>
                                                    </div>
                                                <?php } ?>
                                                <?php foreach ($count_branch_pending as $key => $pendingCount){ ?>
                                                    <?php if($pendingCount['ourbranchid'] == $branchList["BranchCode"] ){ ?>

                                                        <?php if($this->session->role_id == 'qa'){ ?>
                                                            <div class="col-md-6 col-xs-12">
                                                                <h2><?=$pendingCount['destprocess'] ?></h2>
                                                                <h1 class="value"><?=$pendingCount['sum'] ?></h1>
                                                            </div>
                                                        <?php } elseif ($this->session->role_id == 'bm' || $this->session->role_id == 'ci'){ ?>
                                                            <div class="col-xs-12">
                                                                <h2><?=$pendingCount['destprocess'] ?></h2>
                                                                <h1 class="value"><?=$pendingCount['sum'] ?></h1>
                                                            </div>
                                                        <?php } elseif ($this->session->role_id == 'tc'){ ?>
                                                            <div class="col-xs-12">
                                                                <h2><?=$pendingCount['destprocess'] ?></h2>
                                                                <h1 class="value"><?=$pendingCount['sum'] ?></h1>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($key == 0 && $key != $id  ) { ?>
                                                    <div class="col-xs-12">
                                                        <h2><?= $pendingCount['destprocess'] ?></h2>
                                                        <h1 class="value">0</h1>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-xs-12 text-center">
                                <h1>No data available</h1>
                            </div>
                        <?php } ?>

                    <?php } ?>
                </div>

                <?php
                if($this->session->role_id == 'super') { ?>
                    <div class="row">
                        <br>
                        <div class="col-md-6 col-xs-12">
                            <!--total update-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h2>New Records <br class="br-hide" /> (
                                            <span class="date"></span><span id="daymonth"></span> ,
                                            <span id="year"></span>)
                                        </h2>
                                        <h1 class="value"> <b><?=$dashboard['NewRecords']?></b></h1>
                                    </div>
                                </div>
                            </div>

                            <!--kyc counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>KYC COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['KYCNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['KYCRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!--bmv counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>BMV COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h2>Loan</h2><h1 class="value"><?=$dashboard['BMV']?></h1>
                                    </div>
                                </div>
                            </div>
                            <!--alaf counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>ALAF COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['ALAFNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['ALAFRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- tc counter -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TC COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['TCNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['TCRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- sanction counter -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>SANCTION COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['SanctionNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['SanctionRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'ssuper') { ?>
                    <div class="row">
                        <br>
                        <div class="col-md-6 col-xs-12">
                            <!--total update-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h2>New Records <br class="br-hide" /> (
                                            <span class="date"></span><span id="daymonth"></span> ,
                                            <span id="year"></span>)
                                        </h2>
                                        <h1 class="value"> <b><?=$dashboard['NewRecords']?></b></h1>
                                    </div>
                                </div>
                            </div>

                            <!--kyc counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>KYC COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['KYCNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['KYCRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!--bmv counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>BMV COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h2>Loan</h2><h1 class="value"><?=$dashboard['BMV']?></h1>
                                    </div>
                                </div>
                            </div>
                            <!--alaf counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>ALAF COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['ALAFNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['ALAFRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- tc counter -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TC COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['TCNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['TCRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- sanction counter -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>SANCTION COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['SanctionNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['SanctionRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'qa_sup') { ?>
                    <h1></h1>

                    <div class="row">
                        <br>
                        <div class="col-md-6 col-xs-12">
                            <!--total update-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h2>New Records <br class="br-hide" /> (
                                            <span class="date"></span><span id="daymonth"></span> ,
                                            <span id="year"></span>)
                                        </h2>
                                        <h1 class="value"> <b><?=$dashboard['NewRecords']?></b></h1>
                                    </div>
                                </div>
                            </div>

                            <!--kyc counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>KYC COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['KYCNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['KYCRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!--bmv counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>BMV COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h2>Loan</h2><h1 class="value"><?=$dashboard['BMV']?></h1>
                                    </div>
                                </div>
                            </div>
                            <!--alaf counter-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>ALAF COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['ALAFNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['ALAFRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- tc counter -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TC COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['TCNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['TCRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <!-- sanction counter -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>SANCTION COUNTER</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin row">
                                        <div class="col-md-6 col-xs-12"> <h2>New Loan</h2><h1 class="value"><?=$dashboard['SanctionNew']?></h1> </div>
                                        <div class="col-md-6 col-xs-12"> <h2>Repeat Loan</h2><h1 class="value"><?=$dashboard['SanctionRepeat']?></h1> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'cpu') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'aud') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                    </div>
                <?php } ?>
                <!-- /row -->
                <?php
                if($this->session->role_id != 'super' && $this->session->role_id != 'ssuper')?>

            </div>
        </div>
    </div>
    <?php $this->load->view("onepuhunan/copyright"); ?>
    <?php $this->load->view("onepuhunan/footer"); ?>
