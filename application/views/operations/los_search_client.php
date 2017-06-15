<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
<div id="page-wrapper">
    <?php $this->load->view("templates/op-header"); ?>
    <?php $this->load->view("templates/subheader"); ?>
    <div class="header-bg">
        <div class="header-banner">
            <div class="uk-container op-container">
                <h2>SYSTEM SETTINGS</h2>
            </div>
        </div>
    </div>
    <section id="main-section">

        <div class="uk-container table-wrap op-container tc-container">  <!-- Modal HTML embedded directly into document -->

            <div class="op-title"><h1><i class="uk-icon-tags"></i> MANAGE CLIENT REJECTED</h1></div>

            <!-- Trigger/Open The Modal -->

            <table id="c_search" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="dt-center" width="15%">BRANCH ID</th>
                    <th class="uk-text-left" width="40%">CLIENT NAME</th>
                    <th class="uk-text-left" width="35%">PROCESSOR</th>
                    <th class="dt-center" width="10%">ACTION</th>
                </tr>
                </thead>
                <tbody>
<!--                --><?php
//
//                foreach((array) $rejected as $row) { ?>
<!--                    <tr>-->
<!--                        <td class="dt-center">--><?php //echo $row['ourbranchid'] ?><!--</td>-->
<!--                        <td>--><?php //echo $row['clientid'] ?><!-- - --><?php //echo $row['clientname'] ?><!--</td>-->
<!--                        <td>--><?php //echo $row['processor'] ?><!--</td>-->
<!--                        <td class="dt-center"><button>REPROCESS</button></td>-->
<!--                    </tr>-->
<!--                --><?php //  }
//
//                ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php $this->load->view("templates/footer"); ?>
    <?php $this->load->view("templates/modal"); ?>
</div>
</body>
</html>