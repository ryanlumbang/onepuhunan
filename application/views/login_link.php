<?php
if($this->session->role_id == 'sa'  OR $this->session->role_id == 'super' OR $this->session->role_id == 'tc'
OR $this->session->role_id == 'qa'  OR $this->session->role_id == 'bm' OR $this->session->role_id == 'cpu'
OR $this->session->role_id == 'ssuper' OR $this->session->role_id == 'ram'  OR $this->session->role_id == 'qa_new'
){?>

    <?php $this->load->view("dashboard"); ?>


<?php } else{?>

    <?php $this->load->view("aud_dashboard"); ?>

<?php }?>
