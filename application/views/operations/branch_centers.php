<?php
$data['title'] = 'OnePuhunan Service Portal | Loan Origination System';
ini_set('max_execution_time', 0)
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <br/>
            <table class="table table-striped op-table E1">
                    <thead>
                    <tr>
                        <th>CENTER NAME</th>
                        <th class="text-center" width="15%"></th>
                        <th class="text-center" width="10%">KYC</th>
                        <th class="text-center" width="10%">BMV</th>
                        <th class="text-center" width="10%">ALAF</th>
                        <th class="text-center" width="10%">TC</th>
                        <th class="text-center" width="10%">SANCTION</th>
                        <th class="text-center" width="10%">TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($centerlist) > 0) {
                        foreach((array) $centerlist as $status) {
                            $result = '<tr>'
                                . '<td><a  href="los/' . base64_encode('X') . '/' . $branch_code . '/' . $status['GroupID'] . '">' . $status['Group'] . '</a></td>'
                                . '<td class="text-center">' .  '</td>';

                            /* kyc */
                            if($this->session->role_id === 'qa'  OR $this->session->role_id == 'qa_new' OR $this->session->role_id == 'qa_rpt') {
                                $result = $result . '<td class="text-center highlight">' . $status['KYC'] . '</td>';
                            } else {
                                $result = $result . '<td class="text-center">' . $status['KYC'] . '</td>';
                            }

                            /* bmv */
                            if($this->session->role_id === 'bm' OR $this->session->role_id == 'ci' ) {
                                $result = $result . '<td class="text-center highlight">' . $status['BMV'] . '</td>';
                            } else {
                                $result = $result . '<td class="text-center">' . $status['BMV'] . '</td>';
                            }


                            /* alaf */
                            if($this->session->role_id === 'qa'  OR $this->session->role_id == 'qa_new' OR $this->session->role_id == 'qa_rpt') {
                                $result = $result . '<td class="text-center highlight-2">' . $status['ALAF'] . '</td>';
                            } else {
                                $result = $result . '<td class="text-center">' . $status['ALAF'] . '</td>';
                            }

                            /* tc */
                            if($this->session->role_id === 'tc') {
                                $result = $result . '<td class="text-center highlight">' . $status['TC'] . '</td>';
                            } else {
                                $result = $result . '<td class="text-center">' . $status['TC'] . '</td>';
                            }

                            /* sanction */
                            if($this->session->role_id === 'cpu') {
                                $result = $result . '<td class="text-center highlight">' . $status['SANCTION'] . '</td>';
                            } else {
                                $result = $result . '<td class="text-center">' . $status['SANCTION'] . '</td>';
                            }

                            $result = $result . '<td class="text-center uk-text-bold">' . $status['Total'] . '</td>';
                            $result = $result . '</tr>';

                            echo $result;

                        }
                    } else {
                        $result = '<tr><td colspan="8" class="text-center">--- Nothing ---</td></tr>';
                        echo $result;
                    }
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
