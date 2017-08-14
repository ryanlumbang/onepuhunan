<?php
    $data['title'] = 'OnePuhunan Service Portal | Registration Request';
    header("Cache-Control: max-age=0, must-revalidate");
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?=form_open("", array("class" => "form-width-small"));?>
                <h1><b>NEW USER</b> REGISTRATION APPROVAL</h1>
                <div class="form-group">
                    <input type="text" id="reg_name" name="reg_name" class="form-control input-lg">
                </div>
                <div class="form-group row">
                    <div class="col-xs-6">
                        <button type="submit" class="input-lg form-control global-button">Search</button>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="input-lg form-control global-button">Show All</button>
                    </div>
                </div>
            <?=form_close();?>
            <?php
                if($number_of_rows > 0) {
                    $table = "<table class = \"table table-striped\">"
                           . "<caption>" . $number_of_rows . " Pending Registration Approval(s)</caption>"
                           . "<thead>"
                           . "<tr>"
                           . "<th>Employee ID</th>"
                           . "<th>Employee Name</th>"
                           . "<th>Email Address</th>"
                           . "<th>Job Title</th>"
                           . "<th>Department</th>"
                           . "<th>Action</th>"
                           . "</tr>"
                           . "</thead>"
                           . "<tbody>";
                    echo $table;

                    foreach((array) $query as $item) {
                        $result = "<tr>"
                                . "<td class=\"\"><strong>" . $item["emp_id"] . "</strong></td>"
                                . "<td class=\"text-uppercase\">" . $item["name"] . "</td>"
                                . "<td class=\"uk-table-middle\">" . $item["email"] . "</td>"
                                . "<td class=\"uk-table-middle\">" . $item["job_title"] . "</td>"
                                . "<td class=\"uk-table-middle\">" . $item["dept_name"] . "</td>"
                                . "<td class=\"\">" . "<a class=\"btn global-btn-blue\" href='../sys/approve_user/" . dechex($item["emp_id"]) . "'><i class='glyphicon glyphicon-ok'></i>    Approve</a>" . "</td>"
                                . "</tr>";
                        echo $result;
                    }

                    echo "</tbody></table>";
                } else {
                    $table = "<table class=\"uk-table\">"
                           . "<caption>0 Pending Registration Approval(s)</caption>"
                           . "</table>";
                    echo $table;
                }
            ?>
                
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>