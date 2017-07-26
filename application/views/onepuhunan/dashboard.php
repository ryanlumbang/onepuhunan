<?php $this->load->view("onepuhunan/header"); ?>
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <?php
                if($this->session->role_id == 'super') { ?>
                    <div class="row">
                        <br>
                        <div class="span6">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Records ( <span class="date"></span><span id="daymonth"></span> , <span id="year"></span>)</h2><span class="value"> <?=$dashboard['NewRecords']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>KYC COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['KYCNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['KYCRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TC COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['TCNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['TCRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                        </div>
                        <!-- /span6 -->
                        <div class="span6">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>BMV COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"><h2>Loan</h2><span class="value"><?=$dashboard['BMV']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>ALAF COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['ALAFNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['ALAFRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>SANCTION COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['SanctionNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['SanctionRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                        </div>
                        <!-- /span6 -->
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'ssuper') { ?>
                    <div class="row">
                        <br>
                        <div class="span6">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Records ( <span class="date"></span><span id="daymonth"></span> , <span id="year"></span>)</h2><span class="value"> <?=$dashboard['NewRecords']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>KYC COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['KYCNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['KYCRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TC COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['TCNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['TCRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                        </div>
                        <!-- /span6 -->
                        <div class="span6">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>BMV COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"><h2>Loan</h2><span class="value"><?=$dashboard['BMV']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>ALAF COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['ALAFNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['ALAFRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>SANCTION COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['SanctionNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['SanctionRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                        </div>
                        <!-- /span6 -->
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'qa_sup') { ?>
                    <div class="row">
                        <br>
                        <div class="span6">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TOTAL UPDATE</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Records ( <span class="date"></span><span id="daymonth"></span> , <span id="year"></span>)</h2><span class="value"> <?=$dashboard['NewRecords']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>KYC COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['KYCNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['KYCRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>TC COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['TCNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['TCRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                        </div>
                        <!-- /span6 -->
                        <div class="span6">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>BMV COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"><h2>Loan</h2><span class="value"><?=$dashboard['BMV']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>ALAF COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['ALAFNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['ALAFRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3>SANCTION COUNTER</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content">
                                    <div class="widget big-stats-container">
                                        <div class="widget-content">
                                            <div id="big_stats" class="cf">
                                                <div class="stat"> <h2>New Loan</h2><span class="value"><?=$dashboard['SanctionNew']?></span> </div>
                                                <div class="stat"> <h2>Repeat Loan</h2><span class="value"><?=$dashboard['SanctionRepeat']?></span> </div>
                                                <!-- .stat -->
                                            </div>
                                        </div>
                                        <!-- /widget-content -->

                                    </div>
                                </div>
                            </div>
                            <!-- /widget -->
                        </div>
                        <!-- /span6 -->
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'qa') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'bm') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
                    </div>
                <?php } ?>
                <?php
                if($this->session->role_id == 'tc') { ?>
                    <div class="row">
                        <br>
                        <h1 style="text-align: center">UNDER CONSTRUCTION...</h1>
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
            </div>
        </div>
    </div>
    <?php $this->load->view("onepuhunan/footer"); ?>
