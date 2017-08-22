<!--new navbar-->
<nav class="navbar navbar-fixed-top no-margin">
    <div class="navbar-inner navbar-op">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand brand" href="<?php echo site_url("/"); ?>">
                    <img  src="<?=base_url()?>img/logo/onepuhunan_logo.png" alt="OnePuhunan" title="OnePuhunan">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a class="">
                            <i class="icon-calendar"></i> <?php echo date("l") . ", " . date("d F Y") ?>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-cog"></i> Account <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url("profile/userinfo"); ?>"> Update Profile</a></li>
                            <li><a href="<?php echo site_url("profile/changepass"); ?>"> Change Password</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?= $this->session->emp_name ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li> <a href="<?php echo site_url("logout"); ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>