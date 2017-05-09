<?php
    $data['title'] = 'OnePuhunan Service Portal | Loan Origination System';	
    ini_set('max_execution_time', 0)
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
                      
                    <div id="los-accordion" class="uk-accordion" data-uk-accordion="{collapse: false}">     
                        <?php foreach((array) $ln_branch as $row) { ?>
                            <h3 class="uk-accordion-title uk-text-uppercase"><?=$row['BranchName']?> </h3>
                            <div class="uk-accordion-content">
                                <table class="uk-table uk-table-striped uk-table-condensed">
                                    <thead>
                                        <tr>
                                            <th>CENTER NAME</th>
                                            <th class="uk-text-center" width="15%"></th>
                                            <th class="uk-text-center" width="10%">KYC</th>
                                            <th class="uk-text-center" width="10%">BMV</th>
                                            <th class="uk-text-center" width="10%">ALAF</th>
                                            <th class="uk-text-center" width="10%">TC</th>
                                            <th class="uk-text-center" width="10%">SANCTION</th>
                                            <th class="uk-text-center" width="10%">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                            if(count($row['ln_status']) > 0) {
                                                foreach((array) $row['ln_status'] as $status) {
//                                                    $result = '<tr>'
//                                                            . '<td><a  href="los/' . $status['DateData'] . '/' . $row['BranchCode'] . '/' . $status['GroupID'] . '">' . $status['Group'] . '</a></td>'
//                                                            . '<td class="uk-text-center">' . $status['AsOfDate'] . '</td>'
//                                                            . '<td class="uk-text-center">' . $status['KYC']      . '</td>'
//                                                            . '<td class="uk-text-center">' . $status['BMV']      . '</td>'
//                                                            . '<td class="uk-text-center">' . $status['ALAF']     . '</td>'
//                                                            . '<td class="uk-text-center">' . $status['TC']       . '</td>'
//                                                            . '<td class="uk-text-center">' . $status['SANCTION'] . '</td>'
//                                                            . '<td class="uk-text-center uk-text-bold">' . $status['Total'] . '</td>'
//                                                            . '</tr>';
//                                                    echo $result;
                                                    
                                                   /* $result = '<tr>'
                                                            . '<td><a  href="los/' . $status['DateData'] . '/' . $row['BranchCode'] . '/' . $status['GroupID'] . '">' . $status['Group'] . '</a></td>'
                                                            . '<td class="uk-text-center">' . $status['AsOfDate'] . '</td>'; */
                                                 
                                                    $result = '<tr>'
                                                            . '<td><a  href="los/' . 'X' . '/' . $row['BranchCode'] . '/' . $status['GroupID'] . '">' . $status['Group'] . '</a></td>'
                                                            . '<td class="uk-text-center">' .  '</td>';
                                                    
                                                    /* kyc */
                                                    if($this->session->role_id === 'qa') {
                                                        $result = $result . '<td class="uk-text-center highlight">' . $status['KYC'] . '</td>';
                                                    } else {
                                                        $result = $result . '<td class="uk-text-center">' . $status['KYC'] . '</td>';
                                                    }
                                                    
                                                    /* bmv */
                                                    if($this->session->role_id === 'bm') {
                                                        $result = $result . '<td class="uk-text-center highlight">' . $status['BMV'] . '</td>';
                                                    } else {
                                                        $result = $result . '<td class="uk-text-center">' . $status['BMV'] . '</td>';
                                                    }
                                                    
                                                    /* alaf */
                                                    if($this->session->role_id === 'qa') {
                                                        $result = $result . '<td class="uk-text-center highlight-2">' . $status['ALAF'] . '</td>';
                                                    } else {
                                                        $result = $result . '<td class="uk-text-center">' . $status['ALAF'] . '</td>';
                                                    }
                                                    
                                                    /* tc */
                                                    if($this->session->role_id === 'tc') {
                                                        $result = $result . '<td class="uk-text-center highlight">' . $status['TC'] . '</td>';
                                                    } else {
                                                        $result = $result . '<td class="uk-text-center">' . $status['TC'] . '</td>';
                                                    }
                                                    
                                                    /* sanction */
                                                    if($this->session->role_id === 'cpu') {
                                                        $result = $result . '<td class="uk-text-center highlight">' . $status['SANCTION'] . '</td>';
                                                    } else {
                                                        $result = $result . '<td class="uk-text-center">' . $status['SANCTION'] . '</td>';
                                                    }
                                                    
                                                    $result = $result . '<td class="uk-text-center uk-text-bold">' . $status['Total'] . '</td>';
                                                    $result = $result . '</tr>';
                                                    
                                                    echo $result;
                                                    
                                                }
                                            } else {
                                                $result = '<tr><td colspan="8" class="uk-text-center">--- Nothing ---</td></tr>';
                                                echo $result;
                                            }
                                       ?>
                                    </tbody>
                                </table>
                            </div>                   
                        <?php } ?>
                    </div>
                                        
                </div>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>
