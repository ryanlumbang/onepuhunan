<?php

    //Author : Ronald San Pedro, Jr.
    //Date   : October 21, 2016

    class Operations extends CI_Controller {
        public function _construct() {
            parent::__construct();
        }
        
        public function index() {
            $this->load->model("Operations_model");          
            $data["query"] = $this->Operations_model->client_catalog();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("operations/client_catalog", $data);
        }

        public function client_search() {
            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_client_search();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("operations/los_search_client", $data);
        }

        public function client_upload()
        {
            $this->load->model('Operations_model');
            $count = 0;

            if(isset($_POST["import"]))
            {
                $filename=$_FILES["file"]["tmp_name"];
                if($_FILES["file"]["size"] > 0)
                {
                    $file = fopen($filename, "r");
                    fgetcsv($file);
                    while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
                    {
                        $data = array(
                            'FileNo' => $importdata[0],
                            'FileName' =>$importdata[1],
                            'Branch' => $importdata[2],
                            'ClientID' => $importdata[3],
                            'Name' => $importdata[4],
                            'Processor' => $importdata[5]


                        );

                        //$insert = $this->welcome->insertCSV($data);
                        $this->Operations_model->update_sanction_waive($data);
                        $count++;
                    }
                    fclose($file);
                    redirect('operations/client_upload');
                }else{
                    redirect('operations/client_upload');
                }
            }
            $data["query"] = $this->Operations_model->get_sanction_waive();
            $data["number_of_rows"] = count($data["query"]);
            $this->load->view("operations/los_upload",$data);

        }
//
//    public function sanction_waive() {
//        $this->load->model("Operations_model");
//        $data["query"] = $this->Operations_model->get_sanction_waive();
//        $data["number_of_rows"] = count($data["query"]);
//        $this->load->view("sys/client_rejected", $data);
//    }
        
        public function client_info($input) {
            $this->load->model("Operations_model");
            
            $data["client_info"]  = $this->Operations_model->client_info(str_pad(hexdec($input), 10, '0', STR_PAD_LEFT));
            $data["acct_history"] = $this->Operations_model->client_acct_history(str_pad(hexdec($input), 10, '0', STR_PAD_LEFT));
                    
            $data["result"] = array(
                "OurBranchID"       => $data["client_info"]["OurBranchID"],
                "BranchName"        => $data["client_info"]["BranchName"],
                "ClientID"          => $data["client_info"]["ClientID"],
                "Name"              => $data["client_info"]["Name"],
                "DateOfBirth"       => $data["client_info"]["DateOfBirth"],
                "ClientSince"       => $data["client_info"]["ClientSince"],
                "NoOfLoanAvailed"   => $data["client_info"]["NoOfLoanAvailed"],
                "MarStatDesc"       => $data["client_info"]["MarStatDesc"],
                "LitLvlDesc"        => $data["client_info"]["LitLvlDesc"],
                "Mobile"            => $data["client_info"]["Mobile"],
                "Address1"          => $data["client_info"]["Address1"],
                "Address2"          => $data["client_info"]["Address2"],
                "City"              => $data["client_info"]["City"],
                "NumberOfHHMembers" => $data["client_info"]["NumberOfHHMembers"],
                "BusName"           => $data["client_info"]["BusName"],
                "BusinessAdd"       => $data["client_info"]["BusinessAdd"],
                "YearsInBus"        => $data["client_info"]["YearsInBus"],
                "BuSizeDesc"        => $data["client_info"]["BuSizeDesc"],
                "BTypeDesc"         => $data["client_info"]["BTypeDesc"]
            );
            
            $this->load->view("operations/client_info", $data);
        }
        
        public function los() {
           $this->load->model("Operations_model");

           $arraydata['ln_branch'] = $this->Operations_model->get_ln_branch();
           foreach((array) $arraydata['ln_branch'] as $key => $value) {
               $arraydata['ln_branch'][$key]['ln_status'] = $this->Operations_model->get_los_laf_status($value['BranchCode']);
           }
           
           $this->load->view("operations/los_dashboard", $arraydata);  
        }

        public function branch_centers() {
            $this->load->model("Operations_model");
            $arraydata= array(
                'centerlist' => $this->Operations_model->get_los_laf_status($this->input->get('branch_code')),
                'branch_code' => $this->input->get('branch_code')
            );
//            echo "<pre>";
//            var_dump($arraydata);
//           foreach((array) $arraydata['ln_branch'] as $key => $value) {
//               $arraydata['ln_branch'][$key]['ln_status'] = $this->Operations_model->get_los_laf_status($value['BranchCode']);
//           }
//
           $this->load->view("operations/branch_centers", $arraydata);
        }
                
        public function los_pending($dateData, $branchId, $groupId) {
            $session = array(
                "datedata" => $dateData,
                "branchid" => $branchId,
                "groupid"  => $groupId
            );
            $this->session->set_userdata($session);
            
            $this->load->view("operations/los");
        }
        
        public function los_info() {
            $this->load->model("Operations_model");
            $input = $this->uri->segment(6);


            $data = array(
                "cl_info"       => $this->Operations_model->get_los_laf_details($input),
                "cl_dbr2"       => $this->Operations_model->get_los_laf_dbr2($input),
                "cl_asset"      => $this->Operations_model->get_los_laf_asset_liabilities($input),
                "cl_error"      => null,//$this->Operations_model->get_los_laf_err($input),
                "cl_remarks"    => $this->Operations_model->get_los_laf_hist_remarks($input),
                "cl_tags"       => $this->Operations_model->get_los_laf_tags($input),
                "cl_tc"         => $this->Operations_model->get_los_laf_tc_questions($input),
                "cl_tc_display" => $this->Operations_model->get_los_laf_tc_display($input),
                "cl_repeat"     => null,//$this->Operations_model->get_los_laf_repeat_display($input),
                "input"         => $input
            );
            $this->load->view("operations/los_info", $data);
        }

        public function get_los_laf_repeat_display($input){
            $this->load->model("Operations_model");

            $data = array(
                "cl_repeat"     => $this->Operations_model->get_los_laf_repeat_display($input),
            );
            $this->load->view("operations/ajax/get_los_laf_repeat_display", $data);
        }

        public function get_los_laf_err($input){
            $this->load->model("Operations_model");

            $data = array(
                "cl_info"       => $this->Operations_model->get_los_laf_details($input),
                "cl_error"      => $this->Operations_model->get_los_laf_err($input),
            );
            $this->load->view("operations/ajax/get_los_laf_err", $data);
        }
                
        /* for individual approving/rejecting/reverting of accounts */
        public function los_laf_approval() {
            $this->load->model("Operations_model");

            $input = array();
            $tc_input = array();
            
            $header = "Submission Successful!";
            $content = "You have successfully submitted the application for the next processing.";

            if($_POST['Approval_hidden'] == 'APR') {//if (isset($_POST['btn_approve'])) {

                $input = array(
                    "FileNo"      => ($this->session->role_id != 'tc' ? $this->input->post("txt_fileno") : $this->input->post("txt_tc_fileno")),
                    "Approval"    => "APR",
                    "Remarks"     => ($this->session->role_id != 'tc' ? $this->input->post("txt_remarks") : ''),
                    "ProcessedBy" => $this->session->emp_id
                );
            }elseif($_POST['Approval_hidden'] == 'REJ') {//} elseif (isset($_POST['btn_reject'])) {
                $input = array(
                    "FileNo"      => ($this->session->role_id != 'tc' ? $this->input->post("txt_fileno") : $this->input->post("txt_tc_fileno")),
                    "Approval"    => "REJ",
                    "Remarks"     => ($this->session->role_id != 'tc' ? $this->input->post("txt_remarks") : ''),
                    "ProcessedBy" => $this->session->emp_id
                );
            }elseif($_POST['Approval_hidden'] == 'REV'){//} else {
                $input = array(
                    "FileNo"      => ($this->session->role_id != 'tc' ? $this->input->post("txt_fileno") : $this->input->post("txt_tc_fileno")),
                    "Approval"    => "REV",
                    "Remarks"     => ($this->session->role_id != 'tc' ? $this->input->post("txt_remarks") : ''),
                    "ProcessedBy" => $this->session->emp_id
                );  
            }

           $this->Operations_model->set_los_laf_approval($input);
           
           if($this->session->role_id == 'tc') {
               $tc = $_POST['tc'];
               $tc_q = $_POST['tc_q'];
               
               foreach($tc as $key => $n) {
                   $tc_input = array(
                       "QuestionNo"    => $tc_q[$key],
                       "FileNo"        => $this->input->post("txt_tc_fileno"),
                       "ProcessValue"  => $n,
                       "ProcessedBy"   => $this->session->emp_id
                   );
                   $this->Operations_model->set_los_laf_tc_process($tc_input);
                   unset($tc_input);
               }
           }
           
           $this->session->set_flashdata('message', '<i class="uk-icon-check-circle-o uk-icon-medium"></i>&nbsp;&nbsp;' . $header . '<br><small>' . $content . '</small>');
           
           if($this->session->records_count - 1 == 0) {
               redirect("operations/los");
           } else {
               $branchId = $this->session->branchid;
               $groupId  = $this->session->groupid;
               $dateData = $this->session->datedata;
               redirect("operations/los/" . $dateData . '/' . $branchId . '/' . $groupId);
           }
        }
        
        /* javascript: for bulk approving/rejecting/reverting of accounts  */
        public function los_laf($fileno, $approval) {
            $this->load->model("Operations_model");

            $header = "Submission Successful!";
            $content = "You have successfully submitted the application for the next processing.";
            
            $input = array(
                "FileNo"      => $fileno,
                "Approval"    => $approval,
                "Remarks"     => '',
                "ProcessedBy" => $this->session->emp_id
            );
            
            $this->Operations_model->set_los_laf_approval($input);
            $this->session->set_flashdata('message', '<i class="uk-icon-check-circle-o uk-icon-medium"></i>&nbsp;&nbsp;' . $header . '<br><small>' . $content . '</small>');
        }
        
        /* AJAX's */
        public function ops_pending_app() {
            $this->load->model("Operations_model");

            $input = array(
                "_roleid"      => $this->session->role_id,
                "_ourbranchid" => $this->session->branchid,
                "_groupid"     => $this->session->groupid,
                "_asofdate"    => $this->session->datedata
            );
            
            $data["query"] = $this->Operations_model->get_laf_pending($input); 
            $session = array("records_count" => count($data['query']));
            $this->session->set_userdata($session);
            
            echo "{ \"data\" : " . json_encode($data["query"]) . "}";
        }
        
        public function get_ln_branch() {
            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_ln_branch();
            echo "{ \"data\" : " . json_encode($data["query"]) . "}";
        }

        public function branch_handle() {
            $this->load->library("form_validation");
            $this->load->model("Operations_model");

            $data['ln_branch'] = $this->Operations_model->get_branchCode();

            $config = array(
                array(
                    "field" => "emp_id",
                    "label" => "Employee Id",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    )
                ),
                array(
                    "field" => "branch_ids",
                    "label" => "Branch Ids",
                    "rules" => "trim|required",
                    "errors" => array(
                        "required" => "<big class='uk-text-bold'>Required Field</big><br>The <b>\"%s\"</b> field is required."
                    )
                )
            );

            $this->form_validation->set_error_delimiters("<div class='uk-alert uk-alert-danger uk-text-small' data-uk-alert>", "</div>");
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE) {
                $this->load->view("operations/branch_handle", $data);
            } else {
                $input = array(
                    "emp_id"  => $this->input->post("emp_id"),
                    "branch_ids"  => $this->input->post("branch_ids")
                );

                $data["sp_upd_emp_branch"] = $this->Operations_model->set_branch_handle($input);
                $this->load->view("operations/branch_handle", $data);
            }

        }

        public function success_branch_assign() {
            $this->load->view("validation/success_branch_assign");
        }

        public function los_report() {
            $this->load->view("operations/los_report");
        }

        public function los_report_qa() {
            $this->load->model("Operations_model");

            $data['ln_branch'] = $this->Operations_model->get_asg_branch();


            $this->load->view("operations/los_report_qa", $data);
        }

        public function report_bmv_pending_qa()
        {

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $branchcode = $this->input->post("branch_code");

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_bmv_pending_qa();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','CENTER');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','LOS TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','BRNET CLIENT ID');

            $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:I1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'I'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);

                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['Branch']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['Center']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['LOSType']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['BRNETClientID']);


                $row++;
            }

            $filename = "BMV PENDING Report of ".$branchcode." AS OF ".date("M d, Y").'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("BMV_PENDING_REPORT");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_kyc_today()
        {

            $date = $this->input->post("hidden_date");

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_kyc_today();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','BRNET CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','OUTSTANDING PRINCIPAL');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','MATURITY DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','CLOSED DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','GROUP ID');
            $objPHPExcel->getActiveSheet()->setCellValue('K1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('L1','APPLIED LOAN AMOUNT');
            $objPHPExcel->getActiveSheet()->setCellValue('M1','APPLICATION DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('N1','LOAN AGE');
            $objPHPExcel->getActiveSheet()->setCellValue('O1','REMARKS');


            $objPHPExcel->getActiveSheet()->getStyle('A1:P1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:P1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'P'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['BRNETClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['OutstandingPrincipal']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['MaturityDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['ClosedDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['GroupID']);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['LOSLoanTypeID']);
                $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $item['AppliedLoanAmount']);
                $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $item['ApplicationDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $item['LoanAge']);
                $objPHPExcel->getActiveSheet()->setCellValue('O'.$row, $item['Remarks']);


                $row++;
            }

            $filename = "KYC Today Report ".$date."".'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("KYC_TODAY");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_kyc_pending()
        {

            $sdate = $this->input->post("start_date");
            $edate = $this->input->post("end_date");

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_kyc_pending();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','BRNET CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','OUTSTANDING PRINCIPAL');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','MATURITY DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','CLOSED DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','GROUP ID');
            $objPHPExcel->getActiveSheet()->setCellValue('K1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('L1','APPLIED LOAN AMOUNT');
            $objPHPExcel->getActiveSheet()->setCellValue('M1','APPLICATION DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('N1','LOAN AGE');
            $objPHPExcel->getActiveSheet()->setCellValue('O1','REMARKS');


            $objPHPExcel->getActiveSheet()->getStyle('A1:P1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:P1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'P'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['BRNETClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['OutstandingPrincipal']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['MaturityDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['ClosedDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['GroupID']);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['LOSLoanTypeID']);
                $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $item['AppliedLoanAmount']);
                $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $item['ApplicationDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $item['LoanAge']);
                $objPHPExcel->getActiveSheet()->setCellValue('O'.$row, $item['Remarks']);


                $row++;
            }

            $filename = "KYC Pending Report ".$sdate." to ".$edate."".'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("KYC_PENDING");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_kyc_remarks()
        {

            $sdate = $this->input->post("start_date_remarks");
            $edate = $this->input->post("end_date_remarks");

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_kyc_remarks();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','PROCESSED BY');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','DATE PROCESSED');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CENTER NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','PROCESS VALUE');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','OFFICER ID');
            $objPHPExcel->getActiveSheet()->setCellValue('K1','OFFICER NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('L1','REMARKS');


            $objPHPExcel->getActiveSheet()->getStyle('A1:M1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:M1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'M'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";


            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['ProcessedBy']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['DateProcessed']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['Branch']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['CenterName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['LOSLoanTypeID']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['ProcessValue']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['OfficerID']);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['OfficerName']);
                $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $item['Remarks']);


                $row++;
            }

            $filename = "KYC Remarks Report ".$sdate." to ".$edate."".'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("KYC_REMARKS");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_kyc_reverted()
        {

            $sdate = $this->input->post("start_date_rvrt");
            $edate = $this->input->post("end_date_rvrt");

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_kyc_rvrt();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','BRNET CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','OUTSTANDING PRINCIPAL');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','MATURITY DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','CLOSED DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','GROUP ID');
            $objPHPExcel->getActiveSheet()->setCellValue('K1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('L1','APPLIED LOAN AMOUNT');
            $objPHPExcel->getActiveSheet()->setCellValue('M1','APPLICATION DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('N1','LOAN AGE');

            $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:O1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'O'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['Branch']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['BRNETClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['OutstandingPrincipal']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['MaturityDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['ClosedDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['Group']);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['LOSType']);
                $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $item['AppliedLoanAmount']);
                $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $item['ApplicationDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $item['LoanAge']);


                $row++;
            }

            $filename = "KYC Reverted Application ".$sdate." to ".$edate."".'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("KYC_REVERTED_APPLICATION");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_bmv_remarks()
        {

            $sdate = $this->input->post("start_date_bmv_remarks");
            $edate = $this->input->post("end_date_bmv_remarks");

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_bmv_remarks();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','PROCESSED BY');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','DATE PROCESSED');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CENTER NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','PROCESS VALUE');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','OFFICER ID');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','OFFICER NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('K1','REMARKS');


            $objPHPExcel->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:L1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'K'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";


            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['ProcessedBy']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['DateProcessed']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['Branch']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['CenterName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['ProcessValue']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['OfficerID']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['OfficerName']);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['Remarks']);


                $row++;
            }

            $filename = "BMV Remarks Report ".$sdate." to ".$edate."".'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("BMV_REMARKS");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_bmv_pending()
        {

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_bmv_pending();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','CENTER');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','LOS TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','BRNET CLIENT ID');

            $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:I1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'I'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);

                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['Branch']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['Center']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['LOSType']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['BRNETClientID']);


                $row++;
            }

            $filename = "BMV PENDING Report ".date("M d, Y").'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("BMV_PENDING_REPORT");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_qa_productivity()
        {

            $sdate = $this->input->post("select_date_qa");

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_qa_productivity();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','EMPLOYEE ID');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','LAST NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','FIRST NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','ROLE ID');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','PROCESS VALUE');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','CASE');

            $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:I1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'I'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['emp_id']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['last_name']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['first_name']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['role_id']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['ProcessValue']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['LOSLoanTypeID']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['Case']);

                $row++;
            }

            $filename = "QA Productivity Report ".$sdate."".'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("QA_PRODUCTIVITY_REPORT");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_alaf()
        {

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_alaf_report();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','BRNET CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','OUTSTANDING PRINCIPAL');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','MATURITY DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','CLOSED DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','GROUP ID');
            $objPHPExcel->getActiveSheet()->setCellValue('K1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('L1','APPLIED LOAN AMOUNT');
            $objPHPExcel->getActiveSheet()->setCellValue('M1','APPLICATION DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('N1','LOAN AGE');

            $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:O1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'O'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['Branch']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['BRNETClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['OutstandingPrincipal']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['MaturityDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['ClosedDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['Group']);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['LOSType']);
                $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $item['AppliedLoanAmount']);
                $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $item['ApplicationDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $item['LoanAge']);


                $row++;
            }

            $filename = "ALAF Report ".date("M d, Y").'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("ALAF_REPORT");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_tc()
        {

            $sdate = $this->input->post("select_date_tc");

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_tc_report();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','BRANCH ID');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','GROUP ID');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','PROCESSED BY');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','PROCESSOR NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','DATE PROCESSED');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','QUESTION');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','PROCESS VALUE');


            $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:K1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'K'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['GroupID']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['LOSLoanTypeID']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['ProcessedBy']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['ProcessorName']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['DateProcessed']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['Question']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['ProcessValue']);


                $row++;
            }

            $filename = "TC Report ".$sdate."".'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("TC_REPORT");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function report_sanction()
        {

            ini_set('memory_limit', '-1');
            set_time_limit(0);

            $this->load->model("Operations_model");
            $data["query"] = $this->Operations_model->get_sanction_report();

            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
            require (APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()->setCreator($this->session->emp_name);
            $objPHPExcel->getProperties()->setLastModifiedBy("");
            $objPHPExcel->getProperties()->setTitle("");
            $objPHPExcel->getProperties()->setSubject("");
            $objPHPExcel->getProperties()->setDescription("");

            $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->setCellValue('A1','AS OF DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('B1','BRANCH');
            $objPHPExcel->getActiveSheet()->setCellValue('C1','CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('D1','CLIENT NAME');
            $objPHPExcel->getActiveSheet()->setCellValue('E1','BRNET CLIENT ID');
            $objPHPExcel->getActiveSheet()->setCellValue('F1','OUTSTANDING PRINCIPAL');
            $objPHPExcel->getActiveSheet()->setCellValue('G1','MATURITY DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('H1','CLOSED DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('I1','FILE NO');
            $objPHPExcel->getActiveSheet()->setCellValue('J1','GROUP ID');
            $objPHPExcel->getActiveSheet()->setCellValue('K1','LOAN TYPE');
            $objPHPExcel->getActiveSheet()->setCellValue('L1','APPLIED LOAN AMOUNT');
            $objPHPExcel->getActiveSheet()->setCellValue('M1','APPLICATION DATE');
            $objPHPExcel->getActiveSheet()->setCellValue('N1','LOAN AGE');

            $objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A1:O1')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


            $objPHPExcel->getActiveSheet();$objPHPExcel->getActiveSheet()
            ->getStyle('A')
            ->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->freezePane('A2');

            for($col = 'A'; $col !== 'O'; $col++)
            {
                $objPHPExcel->getActiveSheet()
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }

            $row = 2;

//            echo "<pre>";
//            print_r ($data['query']);
//            echo "</pre>";

            foreach ($data["query"] as $item)
            {
                //var_dump($item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $item['AsOfDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $item['OurBranchID']);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $item['ClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $item['ClientName']);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $item['BRNETClientID']);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $item['OutstandingPrincipal']);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $item['MaturityDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $item['ClosedDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $item['FileNo']);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $item['GroupID']);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $item['LOSLoanTypeID']);
                $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $item['AppliedLoanAmount']);
                $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $item['ApplicationDate']);
                $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $item['LoanAge']);


                $row++;
            }

            $filename = "Sanction Report AS of ".date("M d, Y").'.xls';
            $objPHPExcel->getActiveSheet()->setTitle("SANCTION REPORT");
            header('Content-type:application/
                        vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
            ob_end_clean();

            $writer->save('php://output');

            exit;
        }

        public function get_processor_pending() {
            $this->load->model("Operations_model");
            $data = array (
                "pro_pending_qa"  => $this->Operations_model->get_pro_pending_qa(),
                "pro_pending_bm"  => $this->Operations_model->get_pro_pending_bm(),
                "pro_pending_tc"  => $this->Operations_model->get_pro_pending_tc(),
                "pro_pending_sanction"  => $this->Operations_model->get_pro_pending_sanction(),
            );
            $this->load->view("operations/processor_pending", $data);
        }

    }
    
    