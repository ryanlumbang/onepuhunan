
<?php
$data['title'] = 'OnePuhunan Service Portal | Manage TelleCaller Questions';
?>
<?php $this->load->view("onepuhunan/header", $data); ?>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <?php if($this->session->flashdata('message')){?>
                <div align="center" class="alert alert-success">
                    <?php echo $this->session->flashdata('message')?>
                </div>
            <?php } ?>
            <form class="form-width-small"  method="post" action="<?php echo site_url("operations/client_upload"); ?>" method="post" name="upload_excel" enctype="multipart/form-data">
                <h1 class="text-center"> UPLOADING OF RAW DATA</h1>
                <div class="form-group">
                    <label class="text-center">
                        Please click the Choose A File to upload a file, CSV File Type only Accepting.<br>
                        Once completed, please select the <b>"UPLOAD"</b> button.
                    </label>
                </div>
                <?php if($this->session->flashdata('message')){?>
                    <div align="center" class="alert alert-success">
                        <?php echo $this->session->flashdata('message')?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input type="file" name="file" id="file" class="input-file hidden" accept=".csv" onchange="ValidateSingleInput(this);">
                    <label for="file" class="form-control js-labelFile form-input-file">
                        <i class="uk-icon-cloud-upload"></i>
                        <span class="js-fileName">Choose a file<span class="tm-required-label">*</span></span>
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-xs-6">
                        <button type="submit" name="import" id="submit" class="form-control global-button">Upload</button>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?php echo site_url("aud_dashboard"); ?>" class="btn form-control global-button">Cancel</a>
                    </div>
                </div>
            </form>

            <table id="c_sanction_waive" class="table table-striped E1 tc-table" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center">FILE NO</th>
                    <th class="text-center">FILE NAME</th>
                    <th class="text-center">BRANCH</th>
                    <th class="text-left"> CLIENT ID</th>
                    <th class="text-left"> NAME</th>
                    <th class="text-left"> PROCESSOR</th>
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
                        . "<td class=\"text-center\">" . $item["FileNo"] . "</td>"
                        . "<td class=\"text-center\">" . $item["FileName"] . "</td>"
                        . "<td class=\"text-left\">" . $item["Branch"] . "</td>"
                        . "<td class=\"text-left\">" . $item["ClientID"] . "</td>"
                        . "<td class=\"text-left\">" . $item["Name"] . "</td>"
                        . "<td class=\"text-left\">" . $item["Processor"] . "</td>";
                    if($this->session->role_id == 'super' OR $this->session->role_id == 'sa') {
                        $result = $result . "<td class=\"text-center\">" . "<a onclick=\"return confirm('Are you sure you want to reprocess this record?')\" class=\"btn global-btn-red\" href='../sys/reprocess_user/" . $item["fileno"] . "'>Reprocess</a>" . "</td>";
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

