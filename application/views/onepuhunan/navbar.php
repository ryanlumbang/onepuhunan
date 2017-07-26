<div class="navbar navbar-fixed-top">
    <div class="navbar-inner navbar-op">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="<?php echo site_url("/"); ?>"><img  src="<?=base_url()?>img/logo/onepuhunan_logo.png" alt="OnePuhunan" title="OnePuhunan"></a>
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    <li class="">
                        <a  class="">
                            <i class="icon-calendar"></i> <?php echo date("l") . ", " . date("d F Y") ?>
                        </a>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-cog"></i> Account <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url("profile/userinfo"); ?>"> Update Profile</a></li>
                            <li><a href="javascript:;"> Change Password</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-user"></i> <?= $this->session->emp_name ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!--                        <li><a href="javascript:;">Profile</a></li>-->
                            <li> <a href="<?php echo site_url("logout"); ?>">Logout</a></li>
                        </ul>
                    </li>
                    <!--                <li class="">-->
                    <!--                    <a href="/" class="">-->
                    <!--                        <i class="icon-chevron-left"></i>-->
                    <!--                        Back to Homepage-->
                    <!--                    </a>-->
                    <!---->
                    <!--                </li>-->
                </ul>
                <!--                <form class="navbar-search pull-right">-->
                <!--                    <input type="text" class="search-query" placeholder="Search">-->
                <!--                </form>-->
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->