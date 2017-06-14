<?php
    $data['title'] = 'OnePuhunan Service Portal | Loan Origination System';
?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body id="losbody" class="uk-height-1-1">
        <?php $this->load->view("templates/header"); ?>
        <div class="page-wrap">
            <?php $this->load->view("templates/subheader"); ?>
            
            <div class="bg-middle" style="padding-top: 100px;">
                <div class="uk-container uk-container-center" style="margin-bottom: -4px;">
                    <span id="hrtitle" class="uk-margin-large-left">LOAN ORIGINATION SYSTEM</span>
                </div>
            </div>
            <div class="bg-middle bg-shadow2">
                <div class="uk-container uk-container-center bg-lower">
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
                    
                    <table id="tbl_los" class="cell-border stripe table-fix">
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
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>

