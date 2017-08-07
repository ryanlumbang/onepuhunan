<?php $this->load->view("onepuhunan/header"); ?>
    <div class="main">
        <div class="main-inner">
            <div class="container">
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
                if($this->session->role_id == 'qa') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                        <h1><?= $count['count_pending'] ? $count['count_pending'] : '0' ?></h1>
                        <p> <?php
                            foreach ($user_branch as $branchList){
                                echo $branchList['BranchName']."<br/>";
                            }?>
                        </p>

                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'bm') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                        <h1><?= $count['count_pending'] ? $count['count_pending'] : '0' ?></h1>
                        <p> <?php
                            foreach ($user_branch as $branchList){
                                echo $branchList['BranchName']."<br/>";
                            }?>
                        </p>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'tc') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                        <h1><?= $count['count_pending'] ? $count['count_pending'] : '0' ?></h1>
                        <p> <?php
                            foreach ($user_branch as $branchList){
                                echo $branchList['BranchName']."<br/>";
                            }?>
                        </p>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'cpu') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                        <h1><?= $count['count_pending'] ? $count['count_pending'] : '0' ?></h1>
                        <p> <?php
                            foreach ($user_branch as $branchList){
                                echo $branchList['BranchName']."<br/>";
                            }?>
                        </p>
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
            </div>
        </div>
    </div>
    <?php $this->load->view("onepuhunan/footer"); ?>
