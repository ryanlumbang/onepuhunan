<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body id="losbody">
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
            <!-- Trigger/Open The Modal -->
            <div class="uk-container uk-width-5-10 uk-container-center">
                <?=form_open("", array("class" => "uk-form"));?>
                <legend class="uk-text-muted uk-margin-large-top"><b>LOS CLIENT</b> SEARCH</legend>
                <div class="uk-form-row tm-label">
                    <label class="uk-form-label uk-text-small">Enter <b>client's name</b> or part of a name, and <b>client id</b>.</b> </label>
                </div>
                <div class="uk-form-row uk-margin-top-remove">
                    <input type="text" id="c_name" name="c_name" class="uk-width-large uk-form-small">
                    <div style="text-align: center; margin-top: 10px;">
                        <button type="submit" class="uk-button uk-button-primary uk-button-small uk-width-2-10">Search</button>
                        <button type="reset" class="uk-button uk-button-small uk-width-2-10 clear-table">Clear</button>
                    </div>
                </div>
                <hr class='uk-article-divider' style="margin-top: 15px; margin-bottom: 15px;">
                <?=form_close();?>
            </div>

            <?php
            if(filter_input_array(INPUT_POST)) {
                if($number_of_rows > 0) {
                    $table = "<table id=\"c_search\" class=\"uk-text-center stripe hover op-table E1 tc-table\" cellspacing=\"0\" width=\"100%\">"
                        . "<caption>See below for search results close to your request, or try a new search. <br/><br/> "
                        . " You searched for <b> \"". filter_input(INPUT_POST, "c_name") . "\" </b><br/> "
                        . "(" . $number_of_rows . " rows retrieved)<br/></caption>"
                        . "<thead>"
                        . "<tr>"
                        . "<th class=\"dt-center\" width=\"10%\">DATE</th>"
                        . "<th class=\"uk-text-left\" width=\"20%\">BRANCH</th>"
                        . "<th class=\"uk-text-left\" width=\"25%\">CENTER</th>"
                        . "<th class=\"uk-text-left\" width=\"25%\">CLIENT</th>"
                        . "<th class=\"dt-center\" width=\"10%\">LOAN TYPE</th>"
                        . "<th class=\"dt-center\" width=\"5%\">BRNET</th>"
                        . "<th class=\"dt-center\" width=\"5%\">DESTINATION</th>"
                        . "</tr>"
                        . "</thead>"
                        . "<tbody>";
                    echo $table;

                    foreach((array) $query as $item) {
                        $result = "<tr>"
                            . "<td class=\"dt-center\" width=\"10%\">" . $item["AsOfDate"] . "</td>"
                            . "<td class=\"uk-text-left\" width=\"20%\">" . $item["OurBranchID"] ." - ". $item["BranchName"] . "</td>"
                            . "<td class=\"uk-text-left\" width=\"25%\">" . $item["GroupID"] ." - ". $item["GroupName"] . "</td>"
                            . "<td class=\"uk-text-left\" width=\"25%\">" . $item["ClientID"] ." - ". $item["ClientName"] . "</td>"
                            . "<td class=\"dt-center\" width=\"10%\">" . $item["LOSLoanTypeID"] . "</td>"
                            . "<td class=\"dt-center\" width=\"5%\">" . $item["BRNETClientID"] . "</td>"
                            . "<td class=\"dt-center\" width=\"5%\">" . $item["DestProcess"] . "</td>"
                            . "</tr>";
                        echo $result;
                    }
                    echo "</tbody></table>";
                } else {
                    $table = "<table class=\"uk-table\">"
                        . "<caption>No results found. Try searching again.<br/><br/>"
                        . "You searched for <b> \"". filter_input(INPUT_POST, "c_name") . "\" </b><br/>"
                        . "(" . $number_of_rows . " rows retrieved)</caption>"
                        . "</table>";
                    echo $table;
                }
            }
            ?>
        </div>
    </section>
    <?php $this->load->view("templates/footer"); ?>
    <?php $this->load->view("templates/modal"); ?>
</div>
</body>
</html>

