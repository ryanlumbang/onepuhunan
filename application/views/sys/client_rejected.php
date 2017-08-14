<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <h1> MANAGE CLIENT REJECTED</h1>

            <!-- Trigger/Open The Modal -->

            <table id="c_rejected" class="table table-striped" cellspacing="0" width="100%">
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
                            "<a onclick=\"return confirm('Are you sure you want to reprocess this record?')\" class=\"btn global-btn-red\" href='../sys/reprocess_user/" . $item["fileno"] . "'>Reprocess</a>" . "</td>";
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