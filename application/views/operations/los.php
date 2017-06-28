<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
<div id="page">
    <div id="page-wrapper">
        <?php $this->load->view("templates/op-header"); ?>
        <?php $this->load->view("templates/subheader"); ?>
        <div class="header-bg">
            <div class="header-banner">
                <div class="uk-container op-container">
                    <h2>OPERATIONS</h2>
                </div>
            </div>
        </div>
        <section id="main-section">


            <div class="uk-container table-wrap op-container tc-container">  <!-- Modal HTML embedded directly into document -->
                <div class="bg-middle bg-shadow2">
                    <div class="bg-lower">
                        <?php
                        $msg = $this->session->flashdata('message');
                        if( !$msg == '' ) {
                            $flashdata = '<div class="uk-alert uk-alert-success los-alert" data-uk-alert>'
                                . '<p class="uk-margin-bottom-remove">' . $msg . '</p>'
                                . '<a href="' . site_url("operations/los") . '" class="uk-text-small">[Back to Operations Dashboard]</a>'
                                . '</div>';
                            echo $flashdata;
                        }
                        ?>

                        <input id="txt_role"      class="uk-hidden" value="<?=$this->session->role_id?>" />
                        <input id="txt_datedata"  class="uk-hidden" value="<?=$this->session->datedata?>" />

                        <table id="tbl_los" class="cell-border stripe table-fix table-los op-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Branch</th>
                                <th>Center</th>
                                <th>LAF #</th>
                                <th>Name</th>
                                <th>Client ID</th>
                                <th>BRNET</th>
                                <th>Loan Type</th>
                                <th></th>
                                <th>Age</th>
                                <th>Dest</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view("templates/footer"); ?>
        <?php $this->load->view("templates/modal"); ?>
    </div>
</div>
<div id="loading"></div>
</body>
</html>




