<?php
$data['title'] = 'OnePuhunan';
?>
<?php var_dump($this->session->set_userdata['logged_in']);
if ($this->session->set_userdata['logged_in'] != 1)
{
    redirect(site_url());
}
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
    <div class="main">
        <div class="main-inner">
            <div class="container">
             <?php if($this->session->role_id == 'bm') { ?>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="widget widget-nopad">
                                        <div class="widget-header text-center">
                                           <h3>Total Pending</h3>
                                        </div>
                                        <div class="widget-content">
                                            <div class="text-center default-margin row">

                                                <div class="col-xs-12">
                                                        <?php
                                                        foreach((array) $pending_branch as $row) {
                                                            $result = '<h2 class="value">'
                                                                . '<span>' . $row['bmv'] . '</span>'
                                                                . '</h2>';
                                                            echo $result;
                                                        }
                                                        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($this->session->role_id == 'ci') { ?>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="widget widget-nopad">
                                        <div class="widget-header text-center">
                                            <h3>Total Pending</h3>
                                        </div>
                                        <div class="widget-content">
                                            <div class="text-center default-margin row">

                                                <div class="col-xs-12">
                                                    <h2 class="value"><?=$pending_total['sum_bmv'] ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <h2 class="title"><i class="glyphicon glyphicon-tag"></i> Branch Assigned</h2>
                            <table class="table table-striped op-table E1">
                                <thead>
                                <tr class="tr-content box-header-bottom">
                                    <th>Branch</th>
                                    <th class="text-center">Pending</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach((array) $pending_branch as $row) {
                                    $result = '<tr>'
                                        . '<td><a  target="_blank" href="'.site_url("operations/branch_centers?branch_code=".$row['ourbranchid']."").'"> '. $row['ourbranchid'] .' - ' . $row['branchname'] . '</a></td>'
                                        . '<td class="text-center">' . $row['bmv'] . '</td>'
                                        . '</tr>';
                                    echo $result;
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
                <?php if($this->session->role_id == 'tc') { ?>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="widget widget-nopad">
                                        <div class="widget-header text-center">
                                            <h3>Total TC NEW </h3>
                                        </div>
                                        <div class="widget-content">
                                            <div class="text-center default-margin row">

                                                <div class="col-xs-12">
                                                    <h2 class="value"><?=$pending_total['sum_tc_new'] ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="widget widget-nopad">
                                        <div class="widget-header text-center">
                                            <h3>Total TC REPEAT </h3>
                                        </div>
                                        <div class="widget-content">
                                            <div class="text-center default-margin row">

                                                <div class="col-xs-12">
                                                    <h2 class="value"><?=$pending_total['sum_tc_repeat'] ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i> Branch Assigned</h2>
                                    <table class="table table-striped op-table E1">
                                        <thead>
                                        <tr class="tr-content box-header-bottom">
                                            <th>Branch</th>
                                            <th class="text-center">TC NEW</th>
                                            <th class="text-center">TC REPEAT</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach((array) $pending_branch as $row) {
                                            $result = '<tr>'
                                                . '<td><a target="_blank" href="'.site_url("operations/branch_centers?branch_code=".$row['ourbranchid']."").'"> '. $row['ourbranchid'] .' - ' . $row['branchname'] .'</a></td>'
                                                . '<td class="text-center">' . $row['tc_new'] . '</td>'
                                                . '<td class="text-center">' . $row['tc_repeat'] . '</td>'
                                                . '</tr>';
                                            echo $result;
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php if($this->session->role_id == 'qa') { ?>
            <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="widget widget-nopad">
                                    <div class="widget-header text-center">
                                        <i class="icon-list-alt"></i><h3>Total KYC NEW </h3>
                                    </div>
                                    <div class="widget-content">
                                        <div class="text-center default-margin row">

                                            <div class="col-xs-12">
                                                <h2 class="value"><?=$pending_total['sum_kyc_new'] ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-nopad">
                                    <div class="widget-header text-center">
                                        <i class="icon-list-alt"></i> <h3>Total ALAF NEW </h3>
                                    </div>
                                    <div class="widget-content">
                                        <div class="text-center default-margin row">

                                            <div class="col-xs-12">
                                                <h2 class="value"><?=$pending_total['sum_alaf_new'] ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="widget widget-nopad">
                                    <div class="widget-header text-center">
                                        <i class="icon-list-alt"></i><h3>Total KYC REPEAT </h3>
                                    </div>
                                    <div class="widget-content">
                                        <div class="text-center default-margin row">

                                            <div class="col-xs-12">
                                                <h2 class="value"><?=$pending_total['sum_kyc_repeat'] ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget widget-nopad">
                                    <div class="widget-header text-center">
                                        <i class="icon-list-alt"></i><h3>Total ALAF REPEAT </h3>
                                    </div>
                                    <div class="widget-content text-center">
                                        <div class="text-center default-margin row">

                                            <div class="col-xs-12">
                                                <h2 class="value"><?=$pending_total['sum_alaf_repeat'] ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2 class="title"><i class="glyphicon glyphicon-tag"></i> Branch Assigned</h2>
                        <table class="table table-striped op-table E1">
                            <thead>
                            <tr class="tr-content box-header-bottom">
                                <th>Branch</th>
                                <th class="text-center">KYC NEW</th>
                                <th class="text-center">KYC REPEAT</th>
                                <th class="text-center">ALAF NEW</th>
                                <th class="text-center">ALAF REPEAT</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach((array) $pending_branch as $row) {
                                    $result = '<tr>'
                                        . '<td><a  target="_blank" href="'.site_url("operations/branch_centers?branch_code=".$row['ourbranchid']."").'"> '. $row['ourbranchid'] .' - ' . $row['branchname'] . '</a></td>'
                                        . '<td class="text-center">' . $row['kyc_new'] . '</td>'
                                        . '<td class="text-center">' . $row['kyc_repeat'] . '</td>'
                                        . '<td class="text-center">' . $row['alaf_new'] . '</td>'
                                        . '<td class="text-center">' . $row['alaf_repeat'] . '</td>'
                                        . '</tr>';
                                    echo $result;
                                }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            <?php if($this->session->role_id == 'cpu') { ?>
            <br/>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="widget widget-nopad">
                        <div class="widget-header text-center">
                            <h3>Total CPU NEW </h3>
                        </div>
                        <div class="widget-content">
                            <div class="text-center default-margin row">

                                <div class="col-xs-12">
                                    <h2 class="value"><?=$pending_total['sum_cpu_new'] ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="widget widget-nopad">
                        <div class="widget-header text-center">
                            <h3>Total CPU REPEAT </h3>
                        </div>
                        <div class="widget-content">
                            <div class="text-center default-margin row">

                                <div class="col-xs-12">
                                    <h2 class="value"><?=$pending_total['sum_cpu_repeat'] ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h2 class="title"><i class="glyphicon glyphicon-tag"></i> Branch Assigned</h2>
                    <table class="table table-striped op-table E1">
                        <thead>
                        <tr class="tr-content box-header-bottom">
                            <th>Branch</th>
                            <th class="text-center">CPU NEW</th>
                            <th class="text-center">CPU REPEAT</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            foreach((array) $pending_branch as $row) {
                                $result = '<tr>'
                                    . '<td><a target="_blank"  href="'.site_url("operations/branch_centers?branch_code=".$row['ourbranchid']."").'"> ' . $row['ourbranchid'] .' - ' . $row['branchname'] .'</a></td>'
                                    . '<td class="text-center">' . $row['cpu_new'] . '</td>'
                                    . '<td class="text-center">' . $row['cpu_repeat'] . '</td>'
                                    . '</tr>';
                                echo $result;
                            }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
            <?php if($this->session->role_id == 'super' OR $this->session->role_id == 'ssuper') { ?>
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
            <?php } ?>
            <?php if($this->session->role_id == 'qa_sup') { ?>
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
            <?php } ?>
            <?php if($this->session->role_id == 'tc_sup') { ?>
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
            <?php } ?>
            <?php if($this->session->role_id == 'cpu_sup') { ?>
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
            <?php } ?>
            <?php
            if($this->session->role_id == 'aud') { ?>
                <div class="row">
                    <br>
                    <h2 style="text-align: center">UNDER CONSTRUCTION...</h2>
                </div>
            <?php } ?>
          </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
