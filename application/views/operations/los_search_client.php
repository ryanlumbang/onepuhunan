
<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <!-- Trigger/Open The Modal -->
            <?=form_open("", array("class" => "form-width-small"));?>
            <h1 class="text-center">LOS Client Search</h1>
            <div class="form-group">
                <label class="text-center">Enter client's name or part of a name, and client id.</label>
                <input type="text" id="c_name" name="c_name" class="form-control input-lg">
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <button type="submit" class="input-lg form-control global-button-success">Search</button>
                </div>
                <div class="col-xs-6">
                    <button type="reset" class="input-lg form-control global-button">Clear</button>
                </div>
            </div>
            <?=form_close();?>

            <div class="row">
                <?php
                if(filter_input_array(INPUT_POST)) {
                    if($number_of_rows > 0) {
                        $table = "<table id=\"c_search\" class=\"table table-striped op-table E1 \" cellspacing=\"0\" width=\"100%\">"
                            . "<caption>See below for search results close to your request, or try a new search. <br/><br/> "
                            . " You searched for <b> \"". filter_input(INPUT_POST, "c_name") . "\" </b><br/> "
                            . "(" . $number_of_rows . " rows retrieved)<br/></caption>"
                            . "<thead>"
                            . "<tr>"
                            . "<th class=\"text-center\">DATE</th>"
                            . "<th class=\"text-left\">BRANCH</th>"
                            . "<th class=\"text-left\">CENTER</th>"
                            . "<th class=\"text-left\">CLIENT</th>"
                            . "<th class=\"text-center\">LOAN TYPE</th>"
                            . "<th class=\"text-center\">BRNET</th>"
                            . "<th class=\"text-center\">DESTINATION</th>"
                            . "</tr>"
                            . "</thead>"
                            . "<tbody>";
                        echo $table;

                        foreach((array) $query as $item) {
                            $result = "<tr>"
                                . "<td class=\"text-center\">" . $item["AsOfDate"] . "</td>"
                                . "<td class=\"text-left\">" . $item["OurBranchID"] ." - ". $item["BranchName"] . "</td>"
                                . "<td class=\"text-left\">" . $item["GroupID"] ." - ". $item["GroupName"] . "</td>"
                                . "<td class=\"text-left\">" . $item["ClientID"] ." - ". $item["ClientName"] . "</td>"
                                . "<td class=\"text-center\">" . $item["LOSLoanTypeID"] . "</td>"
                                . "<td class=\"text-center\">" . $item["BRNETClientID"] . "</td>"
                                . "<td class=\"text-center\">" . $item["DestProcess"] . "</td>"
                                . "</tr>";
                            echo $result;
                        }
                        echo "</tbody></table>";
                    } else {
                        $table = "<table>"
                            . "<caption>No results found. Try searching again.<br/><br/>"
                            . "You searched for <b> \"". filter_input(INPUT_POST, "c_name") . "\" </b><br/>"
                            . "(" . $number_of_rows . " rows retrieved)</caption>"
                            . "</table>";
                        echo $table;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("onepuhunan/copyright"); ?>
<?php $this->load->view("onepuhunan/footer"); ?>
