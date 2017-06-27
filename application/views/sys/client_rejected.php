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

            <div class="op-title"><h1><i class="uk-icon-tags"></i> MANAGE CLIENT REJECTED</h1></div>

            <!-- Trigger/Open The Modal -->

            <table id="c_rejected" class="uk-text-center stripe hover op-table E1 tc-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="dt-center">BRANCH ID</th>
                    <th class="dt-center">FILE NO</th>
                    <th class="uk-text-left"> CLIENT NAME</th>
                    <th class="uk-text-left"> PROCESSOR</th>
                    <?php
                    if($this->session->role_id == 'super' OR $this->session->role_id == 'sa') { ?>
                    <th class="dt-center">ACTION</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach((array) $query as $item) {
                    $result = "<tr>"
                        . "<td class=\"dt-center\">" . $item["ourbranchid"] . "</td>"
                        . "<td class=\"dt-center\">" . $item["fileno"] . "</td>"
                        . "<td class=\"uk-text-left\">" . $item["clientid"] . " - " .$item["clientname"]."</td>"
                        . "<td class=\"uk-text-left\">" . $item["processor"] . "</td>";
                        if($this->session->role_id == 'super' OR $this->session->role_id == 'sa') {
                        $result = $result . "<td class=\"dt-center\">" . "<a onclick=\"return confirm('Are you sure you want to reprocess this record?')\" class=\"uk-button uk-button-small\" href='../sys/reprocess_user/" . $item["fileno"] . "'>Reprocess</a>" . "</td>";
                        }
                        $result = $result. "</tr>";
                    echo $result;
                 }

                ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php $this->load->view("templates/footer"); ?>
    <?php $this->load->view("templates/modal"); ?>
</div>
</div>
<div id="loading"></div>
</body>
</html>