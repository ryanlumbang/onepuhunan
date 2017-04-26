<?php
$data['title'] = 'OnePuhunan Service Portal';
?>
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("templates/head", $data); ?>
<body>
<div class="site-header">
    <div class="uk-container uk-container-center" style="text-align: center;">
        <img src="<?=base_url()?>img/onepuhunan.png"  class="img-header" />
    </div>
</div>
<div class="page-wrap main-pagewrap">
    <div id="submain">
        <span>MicroVentures Philippines Financing Company Incs.</span>
    </div>
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-margin-large-top fix-uk-margin">
            <div class="uk-width-1-4">
                <div class="uk-thumbnail">
                    <figure class="uk-overlay uk-overlay-hover">
                        <img src="<?=base_url()?>img/system_png/rsz_audit1.png" width="200" height="200" alt="Image">
                        <img class="uk-overlay-panel uk-overlay-image" src="<?=base_url()?>img/system_png/rsz_audit2.png" width="200" height="200" alt="Image">
                        <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">
                            <a href="<?php echo site_url("audit/index"); ?>">Internal Audit</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="uk-width-1-4">
                <div class="uk-thumbnail">
                    <figure class="uk-overlay uk-overlay-hover">
                        <img src="<?=base_url()?>img/system_png/rsz_hr1.png" width="200" height="200" alt="Image">
                        <img class="uk-overlay-panel uk-overlay-image" src="<?=base_url()?>img/system_png/rsz_hr2.png" width="200" height="200" alt="Image">
                        <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">
                            <a href="<?php echo site_url("audit/index"); ?>">Human Resources</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="uk-width-1-4">
                <div class="uk-thumbnail">
                    <figure class="uk-overlay uk-overlay-hover">
                        <img src="<?=base_url()?>img/system_png/rsz_it1.png" width="200" height="200" alt="Image">
                        <img class="uk-overlay-panel uk-overlay-image" src="<?=base_url()?>img/system_png/rsz_it2.png" width="200" height="200" alt="Image">
                        <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">
                            <a href="#">Information Technology</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="uk-width-1-4">
                <div class="uk-thumbnail">
                    <figure class="uk-overlay uk-overlay-hover">
                        <img src="<?=base_url()?>img/system_png/rsz_ops1.png" width="200" height="200" alt="Image">
                        <img class="uk-overlay-panel uk-overlay-image" src="<?=base_url()?>img/system_png/rsz_ops2.png" width="200" height="200" alt="Image">
                        <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom">
                            <a href="<?php echo site_url("opslogin"); ?>">Operations</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed-footer"><?php $this->load->view("templates/footer"); ?></div>
</body>
</html>
