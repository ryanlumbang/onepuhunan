
<?php
$data['title'] = '404 Page not found';
?>
<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>img/onepuhunan.ico" >
<!--css-->
<link rel="stylesheet" href="<?=base_url()?>css/onepuhunan/css/err404.css">
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/op-head", $data); ?>
<body>
<div class="wrapper">
    <div>
        <img  src="<?=base_url()?>img/logo/logo-serviceportal.png" alt="OnePuhunan" title="OnePuhunan" class="company-logo">
        <h1>Whoops! Looks like you're lost.</h1>
        <p>Unfortunately, this page does not exist. Please check your URL or return to the
            <a href="<?= base_url() ?>"> Homepage </a></p>
    </div>
</div>

<div id="loading"></div>
</body>
</html>