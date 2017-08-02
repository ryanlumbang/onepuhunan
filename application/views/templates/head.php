<head>
   <title><?=$title;?></title>
       
   <!-- favicon -->    
   <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>img/onepuhunan.ico" >
   
   <!-- css styles -->
   <link rel="stylesheet" href="<?=base_url()?>css/uikit.css">
   <link rel="stylesheet" href="<?=base_url()?>css/components/tooltip.gradient.min.css">
   <link rel="stylesheet" href="<?=base_url()?>css/components/accordion.gradient.min.css">
   <link rel="stylesheet" href="<?=base_url()?>css/components/datepicker.css">
    <link rel="stylesheet" href="<?=base_url()?>css/sweetalert.css">
   
   <link rel="stylesheet" href="<?=base_url()?>css/custom.css">
   <link rel="stylesheet" href="<?=base_url()?>css/general.css">
   <link rel="stylesheet" href="<?=base_url()?>css/onepuhunan/css/validate-error.css">
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

       
   <?php 
//        if (basename($_SERVER['REQUEST_URI']) !== "opslogin.php" AND basename($_SERVER['REQUEST_URI']) !== "index.php") {
//            echo "<meta http-equiv='refresh' content='600;url=../onepuhunan/logout'/>";
//        }
   
//        $page = array("opslogin", "index.php", "hr");
//        if (!in_array(basename($_SERVER['REQUEST_URI']), $page)) {
//            echo "<meta http-equiv='refresh' content='1800;url=" . base_url() . "logout'/>";
//        }
   ?>

   <!-- jquery -->
   <script src="<?=base_url()?>js/jquery-3.1.1.min.js"></script>
   <script src="<?=base_url()?>js/uikit.min.js"></script>
   <script src="<?=base_url()?>js/components/tooltip.min.js"></script>
   <script src="<?=base_url()?>js/components/accordion.min.js"></script>
   <script src="<?=base_url()?>js/components/datepicker.js"></script>
    <script src="<?=base_url()?>js/jquery.validate.min.js"></script>
    <script src="<?=base_url()?>js/onepuhunan/required_fields.js"></script>
   <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>js/sweetalert.min.js"></script>
   <script src="<?=base_url()?>js/custom.js"></script>

</head>