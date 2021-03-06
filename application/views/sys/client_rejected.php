<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <h2 class="title"><i class="glyphicon glyphicon-tag"></i>  MANAGE CLIENT REJECTED</h2>

            <!-- Trigger/Open The Modal -->

            <table id="tbl_rejected" class="table table-striped op-table E1" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center">BRANCH ID</th>
                    <th class="text-center">FILE NO</th>
                    <th class="text-left"> CLIENT NAME</th>
                    <th class="text-left"> PROCESSOR</th>
                    <th class="text-left"> DATE PROCESSED</th>
                    <?php
                    if($this->session->role_id == 'super' OR $this->session->role_id == 'sa') { ?>
                    <th class="text-center">ACTION</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach((array) $query as $item) {
                    $result = "<tr>"
                        . "<td class=\"text-center\">" . $item["ourbranchid"] . "</td>"
                        . "<td class=\"text-center\">" . $item["fileno"] . "</td>"
                        . "<td class=\"text-left\">" . $item["clientid"] . " - " .$item["clientname"]."</td>"
                        . "<td class=\"text-left\">" . $item["processor"] . "</td>"
                        . "<td class=\"text-left\">" . $item["dateprocessed"] . "</td>";
                        if($this->session->role_id == 'super' OR $this->session->role_id == 'sa') {
                        $result = $result . "<td class=\"text-center\">" .
                            "<a data-fileno='" . $item["fileno"] . "' class=\"btn global-btn-red btn-reprocess\" >Reprocess</a>" . "</td>";
                        }
                        $result = $result. "</tr>";
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