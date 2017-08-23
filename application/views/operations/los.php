<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container" id="losbody">  <!-- Modal HTML embedded directly into document -->
            <br/>
            <?php
            $msg = $this->session->flashdata('message');
            if( !$msg == '' ) {
                $flashdata = '<div class=\'alert alert-success\'>'
                    . '<span>' . $msg . '</span>'
                    . '<a href="' . site_url("operations/los") . '">[Back to Operations Dashboard]</a>'
                    . '</div>';
                echo $flashdata;
            }
            ?>

            <input id="txt_role"      class="hidden" value="<?=$this->session->role_id?>" />
            <input id="txt_datedata"  class="hidden" value="<?=$this->session->datedata?>" />

            <table id="tbl_los" class="table table-striped op-table E1">
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
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>



