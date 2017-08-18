<?php
$data['title'] = 'OnePuhunan';
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
    <div class="main">
        <div class="main-inner">
                <?php if($this->session->role_id != 'super' && $this->session->role_id != 'qa' && $this->session->role_id != 'ssuper' && $this->session->role_id != 'usr' && $this->session->role_id != 'cpu' && $this->session->role_id != 'qa_sup' && $this->session->role_id != 'tc_sup' && $this->session->role_id != 'cpu_sup') {?>
                    <div class="row">
                        <br/>
                        <?php if((array)$count || (array)$user_branch) {?>
                            <?php foreach ((array)$count as $total)
                                 if ($this->session->role_id == 'ci'){ ?>
                                    <?php if($total['destprocess'] == 'BMV'){ ?>
                                         <div class="col-md-6 col-xs-12">
                                             <div class="widget widget-nopad">
                                                 <div class="widget-header"> <i class="icon-list-alt"></i>
                                                     <h3>TOTAL BMV</h3>
                                                 </div>
                                                 <div class="widget-content">
                                                     <div class="text-center default-margin row">
                                                         <div class="col-xs-12">
                                                             <h3><?=$total['destprocess'] ?></h3>
                                                             <h2 class="value"><?=$total['sum'] ?></h2>
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
                                                             <h3><?=$total['destprocess'] ?></h3>
                                                             <h2 class="value"><?=$total['sum'] ?></h2>
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
                                            <a href="<?php echo site_url("operations/branch_centers?branch_code=".$branchList['BranchCode'].""); ?>"><h3> <?=$branchList['BranchName']?></h3>
                                        </div>

                                        <div class="widget-content">
                                            <div class="text-center default-margin row">
                                                <?php if (count($count_branch_pending) == 0) { ?>
                                                    <div class="col-xs-12">
                                                        <h3>Total</h3>
                                                        <h2 class="value">0</h2>
                                                    </div>
                                                <?php } ?>
                                                <?php foreach ($count_branch_pending as $key => $pendingCount){ ?>
                                                    <?php if($pendingCount['ourbranchid'] == $branchList["BranchCode"] ){ ?>

                                                        <?php if($this->session->role_id == 'qa'){ ?>
                                                            <div class="col-md-6 col-xs-12">
                                                                <h3><?=$pendingCount['destprocess'] ?></h3>
                                                                <h2 class="value"><?=$pendingCount['sum'] ?></h2>
                                                            </div>
                                                        <?php } elseif ($this->session->role_id == 'bm' || $this->session->role_id == 'ci'){ ?>
                                                            <div class="col-xs-12">
                                                                <h3><?=$pendingCount['destprocess'] ?></h3>
                                                                <h2 class="value"><?=$pendingCount['sum'] ?></h2>
                                                            </div>
                                                        <?php } elseif ($this->session->role_id == 'tc'){ ?>
                                                            <div class="col-xs-12">
                                                                <h3><?=$pendingCount['destprocess'] ?></h3>
                                                                <h2 class="value"><?=$pendingCount['sum'] ?></h2>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if ($key == 0 && $key != $id  ) { ?>
                                                    <div class="col-xs-12">
                                                        <h3><?= $pendingCount['destprocess'] ?></h3>
                                                        <h2 class="value">0</h2>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-xs-12 text-center">
                                <h2>No data available</h2>
                            </div>
                        <?php } ?>

                    </div>
                <?php } ?>
                <?php if($this->session->role_id == 'qa') { ?>
                <br/>
                <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <?php foreach ((array)$count_qa as $total){
                                if($total['destprocess'] == 'KYC' OR $total['destprocess'] == 'ALAF') {?>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="widget widget-nopad">
                                            <div class="widget-header"> <i class="icon-list-alt"></i>
                                                <h3>Total</h3>
                                            </div>
                                            <div class="widget-content">
                                                <div class="text-center default-margin row">

                                                    <div class="col-xs-12">
                                                        <h3><?= $total['destprocess']  ?><?php echo($total['losloantypeid'] == 'R' ? ' Repeat ' : ' New ') ?>Loan</h3>
                                                        <h2 class="value"><?=$total['sum'] ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped op-table E1">
                            <thead>
                                <tr>
                                    <th>Branch</th>
                                    <th>ALAF New</th>
                                    <th>ALAF Repeat</th>
                                    <th>KYC New</th>
                                    <th>KYC Repeat</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if((array)$user_branch) {?>
                                <?php foreach ((array)$user_branch as $id => $branchList){  ?>
                                    <tr>

                                        <td><?=($branchList['BranchName'])?></td>
                                        <?php foreach ($count_qa_pending as $pendingCount){ ?>
                                            <?php if($branchList['BranchCode'] == $pendingCount['ourbranchid']){ ?>
                                            <td><?=$pendingCount['sum'] ?></td>
                                            <?php } ?>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
                </div>
                <?php
                if($this->session->role_id == 'super') { ?>
                 <div class="container">
                    <div class="row">
                        <br/>
                        <div class="col-md-6 col-xs-12">
                            <!--total update-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h3>New Records <br class="br-hide" /> (
                                            <span class="date"></span><span id="daymonth"></span> ,
                                            <span id="year"></span>)
                                        </h3>
                                        <h2 class="value"> <b><?=$dashboard['NewRecords']?></b></h2>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['KYCNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['KYCRepeat']?></h2> </div>
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
                                        <h3>Loan</h3><h2 class="value"><?=$dashboard['BMV']?></h2>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['ALAFNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['ALAFRepeat']?></h2> </div>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['TCNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['TCRepeat']?></h2> </div>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['SanctionNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['SanctionRepeat']?></h2> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'ssuper') { ?>
                <div class="container">
                    <div class="row">
                        <br/>
                        <div class="col-md-6 col-xs-12">
                            <!--total update-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h3>New Records <br class="br-hide" /> (
                                            <span class="date"></span><span id="daymonth"></span> ,
                                            <span id="year"></span>)
                                        </h3>
                                        <h2 class="value"> <b><?=$dashboard['NewRecords']?></b></h2>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['KYCNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['KYCRepeat']?></h2> </div>
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
                                        <h3>Loan</h3><h2 class="value"><?=$dashboard['BMV']?></h2>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['ALAFNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['ALAFRepeat']?></h2> </div>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['TCNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['TCRepeat']?></h2> </div>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['SanctionNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['SanctionRepeat']?></h2> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'qa_sup') { ?>
               <div class="container">
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
                                        <h3>New Records <br class="br-hide" /> (
                                            <span class="date"></span><span id="daymonth"></span> ,
                                            <span id="year"></span>)
                                        </h3>
                                        <h2 class="value"> <b><?=$dashboard['NewRecords']?></b></h2>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['KYCNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['KYCRepeat']?></h2> </div>
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
                                        <h3>Loan</h3><h2 class="value"><?=$dashboard['BMV']?></h2>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['ALAFNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['ALAFRepeat']?></h2> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
               </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'tc_sup') { ?>
                    <div class="container">
                        <div class="row">
                            <br/>
                            <div class="col-md-6 col-xs-12">
                                <!--total update-->
                                <div class="widget widget-nopad">
                                    <div class="widget-header"> <i class="icon-list-alt"></i>
                                        <h3>TOTAL UPDATE</h3>
                                    </div>
                                    <div class="widget-content">
                                        <div class="text-center default-margin">
                                            <h3>New Records <br class="br-hide" /> (
                                                <span class="date"></span><span id="daymonth"></span> ,
                                                <span id="year"></span>)
                                            </h3>
                                            <h2 class="value"> <b><?=$dashboard['NewRecords']?></b></h2>
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
                                            <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['TCNew']?></h2> </div>
                                            <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['TCRepeat']?></h2> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                 <?php
                 if($this->session->role_id == 'cpu_sup') { ?>
                <div class="container">
                    <div class="row">
                        <br/>
                        <div class="col-md-6 col-xs-12">
                            <!--total update-->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <div class="widget-content">
                                    <div class="text-center default-margin">
                                        <h3>New Records <br class="br-hide" /> (
                                            <span class="date"></span><span id="daymonth"></span> ,
                                            <span id="year"></span>)
                                        </h3>
                                        <h2 class="value"> <b><?=$dashboard['NewRecords']?></b></h2>
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
                                        <div class="col-md-6 col-xs-12"> <h3>New Loan</h3><h2 class="value"><?=$dashboard['SanctionNew']?></h2> </div>
                                        <div class="col-md-6 col-xs-12"> <h3>Repeat Loan</h3><h2 class="value"><?=$dashboard['SanctionRepeat']?></h2> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
                <?php
                if($this->session->role_id == 'cpu') { ?>
                <div class="container">
                    <div class="row">
                        <br>
                        <h2 style="text-align: center">UNDER CONSTRUCTION...</h2>
                    </div>
                </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'aud') { ?>
                    <div class="row">
                        <br>
                        <h2 style="text-align: center">UNDER CONSTRUCTION...</h2>
                    </div>
                <?php } ?>
                <!-- /row -->
                <?php
                if($this->session->role_id != 'super' && $this->session->role_id != 'ssuper' && $this->session->role_id != 'qa_sup' && $this->session->role_id != 'tc_sup' && $this->session->role_id != 'cpu_sup')?>

        </div>
    </div>
    <?php $this->load->view("onepuhunan/copyright"); ?>
    <?php $this->load->view("onepuhunan/footer"); ?>
