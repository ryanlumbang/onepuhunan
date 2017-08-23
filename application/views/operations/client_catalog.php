<?php
    $data['title'] = 'OnePuhunan Service Portal | Client Catalog';
?>
<?php $this->load->view("onepuhunan/header",$data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?=form_open("", array("class" => "form-width-small"));?>
                    <h2 class="text-center">CLIENT CATALOG SEARCH</h2>
                    <div class="form-group text-center">
                        <label>Enter client's name or part of a name, client id, and date of birth(<i>yyyy-MM-dd</i>)</label>
                        <input type="text" id="c_name" name="c_name" class="form-control input-lg">
                        <input type="checkbox" name="chk-spouse" class="tm-chkbox" value="true" <?php if(filter_input(INPUT_POST, 'chk-spouse')) { echo "checked='checked'"; } ?>>
                        <label>Include borrower's spouse name to search criteria.</label>
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
                </div>
            </div>
            <div class="row">
                <?php
                    if(filter_input_array(INPUT_POST)) {
                        if($number_of_rows > 0) {
                            $table = "<table id='c_catalog' class=\"table table-striped op-table E1\">"
                                   . "<caption>See below for search results close to your request, or try a new search. <br/><br/> "
                                   . " You searched for <b> \"". filter_input(INPUT_POST, "c_name") . "\" </b><br/> "
                                   . "(" . $number_of_rows . " rows retrieved)</caption>"
                                   . "<thead>"
                                   . "<tr>"
                                   . "<th class=\"text-center\">#</th>"
                                   . "<th class=\"text-center\">Branch ID</th>"
                                   . "<th class=\"text-center\">Branch Name</th>"
                                   . "<th class=\"text-center\">Client ID</th>"
                                   . "<th class=\"text-center\">Name</th>"
                                   . "<th class=\"text-center\">Client Since</th>"
                                   . "<th class=\"text-center\">Loan Availed</th>"
                                   . "</tr>"
                                   . "</thead>"
                                   . "<tbody>";
                            echo $table;

                            foreach((array) $query as $item) {
                                $result = "<tr>"
                                        . "<td class=\"font-weight-bold text-center\">" . $item["RowNumber"] . "</td>"
                                        . "<td class=\"text-center\">" . $item["OurBranchID"] . "</td>"
                                        . "<td class=\"text-center\">" . $item["BranchName"] . "</td>"
                                        . "<td class=\"text-center\">" . $item["ClientID"] . "</td>"
                                        . "<td class=\"text-center\"><a href='./client_info/" . dechex($item["ClientID"]) . "'>" . $item["Name"] . "</a></td>"
                                        . "<td class=\"text-center\">" . $item["ClientSince"] . "</td>"
                                        . "<td class=\"text-center\">" . $item["LoanAvailmentSeries"] . "</td>"
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