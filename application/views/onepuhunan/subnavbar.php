<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <?php
            if($this->session->role_id == 'super') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("audit/audit_extraction")
                    || current_url() == site_url("audit/audit_import")
                    || current_url() == site_url("audit/aud_extraction_assign")
                    || current_url() == site_url("audit/assign_branch")
                    || current_url() == site_url("audit/aud_client")

                    ) ? 'active' : '' ?>

                    "><a  href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-download-alt"></i> <i class="icon-long-arrow-down"></i><span>Audit Application</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("audit/audit_extraction"); ?>"><i class="icon-download-alt"></i><span> Audit Extraction of Raw Data</span></a></li>
                            <li><a target="_blank" href="<?php echo site_url("audit/audit_import"); ?>"><i class="icon-upload-alt"></i><span> Audit Uploading of Sampling</span></a></li>
                            <li><a target="_blank" href="<?php echo site_url("audit/aud_extraction_assign"); ?>"><i class="icon-download-alt"></i><span> Audit Extraction For Auditor</span></a></li>
                            <li><a target="_blank" href="<?php echo site_url("audit/assign_branch"); ?>"><i class="icon-align-justify"></i><span> Manage Branch Assignment</span></a></li>
                            <li class="dropdown-submenu">
                                <a target="_blank" class="test" tabindex="-1" href="#"><i class="icon-list-alt"></i><span> Data Consolidated</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a target="_blank" tabindex="-1" href="<?php echo site_url("audit/aud_client"); ?>">
                                            <i class="icon-list-alt"></i><span> Data Entry</span></a>
                                    </li>
                                    <li>
                                        <a target="_blank" tabindex="-1" href="#"><i class="icon-list-alt"></i> Consolidation of Data</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("operations/client-catalog")
                        || current_url() == site_url("operations/client-rejected")
                        || current_url() == site_url("operations/client-search")

                    ) ? 'active' : '' ?>
                    "><a  href="<?php echo site_url("dashboard"); ?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-group"></i> <i class="icon-long-arrow-down"></i><span>Operations</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                        </ul>
                    </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("sys/registration-request")
                        || current_url() == site_url("sys/assign_role_id")
                    ) ? 'active' : '' ?>
                    "><a  href="<?php echo site_url("dashboard"); ?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-cogs "></i> <i class="icon-long-arrow-down"></i><span>System Settings</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("sys/registration-request"); ?>"><i class="icon-user"></i> Registration Request</a></li>
                            <li><a target="_blank" href="<?php echo site_url("sys/assign_role_id"); ?>"><i class="icon-cog"></i> Manage Role ID's</a></li>
                        </ul>
                    </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("operations/branch-handle")
                        || current_url() == site_url("sys/tc_question")
                        || current_url() == site_url("operations/los-report")
                        || current_url() == site_url("operations/processor-pending")
                    ) ? 'active' : '' ?>
                    "><a target="_blank" href="<?php echo site_url("dashboard"); ?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i> <i class="icon-long-arrow-down"></i><span>LOS Settings</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("operations/branch-handle"); ?>"><i class="icon-align-justify"></i> Branch Assignment</a></li>
                            <li><a target="_blank" href="<?php echo site_url("sys/tc_question"); ?>"><i class="icon-tasks "></i> TelleCaller Questions<span></a></li>
                            <li><a target="_blank" href="<?php echo site_url("operations/los-report"); ?>"><i class="icon-list-alt"></i> LOS Report<span></a></li>
                            <li><a target="_blank" href="<?php echo site_url("operations/processor-pending"); ?>"><i class="icon-list "></i> Processor Pending<span></a></li>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php
            if($this->session->role_id == 'ssuper') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("operations/client-catalog")
                        || current_url() == site_url("operations/client-rejected")
                        || current_url() == site_url("operations/client-search")

                    ) ? 'active' : '' ?>
                    "><a  href="<?php echo site_url("dashboard"); ?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-group"></i> <i class="icon-long-arrow-down"></i><span>Operations</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                        </ul>
                    </li>
                    <li class="<?php echo (current_url() == site_url("operations/los-report")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/los-report"); ?>"><i class="icon-list-alt"></i> <span>LOS Report<span></a></li>
                    <li class="<?php echo (current_url() == site_url("operations/processor-pending")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/processor-pending"); ?>"><i class="icon-list "></i> <span>Processor Pending<span></a></li>
                </ul>
            <?php } ?>
            <?php
            if($this->session->role_id == 'qa_sup') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("operations/client-catalog")
                        || current_url() == site_url("operations/client-rejected")
                        || current_url() == site_url("operations/client-search")

                    ) ? 'active' : '' ?>
                    "><a  href="<?php echo site_url("dashboard"); ?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-group"></i> <i class="icon-long-arrow-down"></i><span>Operations</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                        </ul>
                    </li>
                    <li class="<?php echo (current_url() == site_url("operations/branch-handle")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/branch-handle"); ?>"><i class="icon-align-justify"></i> <span>Branch Assignment<span></a></li>
                    <li class="<?php echo (current_url() == site_url("operations/los-report")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/los-report"); ?>"><i class="icon-list-alt"></i> <span>LOS Report<span></a></li>
                    <li class="<?php echo (current_url() == site_url("operations/processor-pending")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/processor-pending"); ?>"><i class="icon-list "></i> <span>Processor Pending<span></a></li>
                </ul>
            <?php } ?>
            <?php
            if($this->session->role_id == 'tc_sup') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("operations/client-catalog")
                        || current_url() == site_url("operations/client-rejected")
                        || current_url() == site_url("operations/client-search")

                    ) ? 'active' : '' ?>
                    "><a target="_blank" href="<?php echo site_url("dashboard"); ?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-group"></i> <i class="icon-long-arrow-down"></i><span>Operations</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                        </ul>
                    </li>
                    <li class="<?php echo (current_url() == site_url("operations/branch-handle")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/branch-handle"); ?>"><i class="icon-align-justify"></i> <span>Branch Assignment<span></a></li>
                    <li class="<?php echo (current_url() == site_url("sys/tc_question")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("sys/tc_question"); ?>"><i class="icon-tasks "></i> <span>TelleCaller Questions<span></a></li>
                    <li class="<?php echo (current_url() == site_url("operations/-")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/los-report"); ?>"><i class="icon-list-alt"></i> <span>LOS Report<span></a></li>
                    <li class="<?php echo (current_url() == site_url("operations/processor-pending")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/processor-pending"); ?>"><i class="icon-list "></i> <span>Processor Pending<span></a></li>
                </ul>
            <?php } ?>
            <?php
            if($this->session->role_id == 'cpu_sup') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="dropdown
                    <?php echo (current_url() == site_url("operations/client-catalog")
                        || current_url() == site_url("operations/client-rejected")
                        || current_url() == site_url("operations/client-search")

                    ) ? 'active' : '' ?>
                    "><a href="<?php echo site_url("dashboard"); ?>" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-group"></i> <i class="icon-long-arrow-down"></i><span>Operations</span> </a>
                        <ul class="dropdown-menu">
                            <li><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                            <li><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                        </ul>
                    </li>
                    <li class="<?php echo (current_url() == site_url("operations/branch-handle")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/branch-handle"); ?>"><i class="icon-align-justify"></i> <span>Branch Assignment<span></a></li>
                    <li class="<?php echo (current_url() == site_url("operations/los-report")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/los-report"); ?>"><i class="icon-list-alt"></i> <span>LOS Report<span></a></li>
                    <li class="<?php echo (current_url() == site_url("operations/processor-pending")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/processor-pending"); ?>"><i class="icon-list "></i> <span>Processor Pending<span></a></li>
                </ul>
            <?php } ?>
            <?php
            if($this->session->role_id == 'qa') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-catalog")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                    <li class="<?php echo (current_url() == site_url("operations/client-rejected")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-search")) ? 'active' : '' ?>"><a target="_blank"  href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/report")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/report"); ?>"><i class="icon-file"></i><span> LOS Generate Report</span> </a> </li>

                </ul>
            <?php } ?>
            <?php
            if($this->session->role_id == 'ci') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-catalog")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                    <li class="<?php echo (current_url() == site_url("operations/client-rejected")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-search")) ? 'active' : '' ?>"><a target="_blank"  href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>

                </ul>
            <?php } ?>
            <?php
            if($this->session->role_id == 'bm') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/los")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/los"); ?>"><i class="icon-tasks"></i><span> Loan Origination System</span> </a></li>
                    <li class="<?php echo (current_url() == site_url("operations/client-catalog")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                    <li class="<?php echo (current_url() == site_url("operations/client-rejected")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-search")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                </ul>
           
            <?php } ?>
            <?php
            if($this->session->role_id == 'tc') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-catalog")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                    <li class="<?php echo (current_url() == site_url("operations/client-rejected")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-search")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                </ul>

            <?php } ?>
            <?php
            if($this->session->role_id == 'cpu') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a  href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-catalog")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-catalog"); ?>"><i class="icon-group"></i><span> Client's Catalog</span> </a></li>
                    <li class="<?php echo (current_url() == site_url("operations/client-rejected")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-rejected"); ?>"><i class="icon-remove-sign"></i><span> Client's Rejected</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client-search")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client-search"); ?>"><i class="icon-eye-open"></i><span> LOS Client Search</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("operations/client_upload")) ? 'active' : '' ?>"><a target="_blank" href="<?php echo site_url("operations/client_upload"); ?>"><i class="icon-upload-alt"></i><span> LOS Upload</span> </a> </li>
                </ul>

            <?php } ?>
            <?php
            if($this->session->role_id == 'aud') { ?>
                <ul class="mainnav">
                    <li class="<?php echo (current_url() == site_url("dashboard")) ? 'active' : '' ?>"><a href="<?php echo site_url("dashboard"); ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="<?php echo (current_url() == site_url("audit/audit_extraction")) ? 'active' : '' ?>"><a href="<?php echo site_url("audit/audit_extraction"); ?>"><i class="icon-download-alt"></i><span>Audit Extraction of Raw Data</span></a></li>
                    <li class="<?php echo (current_url() == site_url("audit/aud_extraction_assign")) ? 'active' : '' ?>"><a href="<?php echo site_url("audit/aud_extraction_assign"); ?>"><i class="icon-download-alt"></i><span>Audit Extraction For Auditor</span></a></li>
                    <li class="<?php echo (current_url() == site_url("audit/assign_branch")) ? 'active' : '' ?>"><a href="<?php echo site_url("audit/assign_branch"); ?>"><i class="icon-align-justify"></i><span>Manage Branch Assignment</span></a></li>
                    <li class="dropdown <?php echo (current_url() == site_url("audit/aud_client")) ? 'active' : '' ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-list-alt"></i><i class="icon-long-arrow-down"></i><span> Data Consolidated</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url("audit/aud_client"); ?>"><i class="icon-list-alt"></i><span> Data Entry</span></a></li>
                            <li><a href="#"><i class="icon-list-alt"></i><span> Consolidation of Data</span></a></li>
                        </ul>
                    </li>
                </ul>

            <?php } ?>

        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->
<br/>