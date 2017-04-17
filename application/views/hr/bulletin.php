<?php
    $data['title'] = 'HR | Memos and Announcements';
?>
<!DOCTYPE html>
<html id="hr" lang="en">
    <?php $this->load->view("templates/head", $data); ?>
    <body id="hrbody" class="uk-height-1-1">
        <div class="bg-upper"></div>
        <div class="bg-middle" style="padding-top: 100px;">
            <div class="uk-container uk-container-center" style="margin-bottom: -4px;">
                <span id="hrtitle" class="uk-margin-large-left">MEMOS AND ANNOUNCEMENTS</span>
            </div>
        </div>
        <div class="bg-middle bg-shadow">
            <div class="uk-container uk-container-center bg-lower">
                <table id="hr-memo" class="cell-border stripe">
                    <thead>
                       <tr>
                           <th>Date</th>
                           <th>File Name</th>
                           <th>Size</th> 
                           <th>Action</th>
                       </tr>
                    </thead>
                    <?php
                        $dirpath = "../onepuhunan/hrdocs";
                        $files = array();
                        
                        foreach (new DirectoryIterator($dirpath) as $file) {
                            if ($file->isFile()) {
                                $files[] = array(
                                    "f_date" => $file->getCTime(),
                                    "f_name" => $file->getFilename(),
                                    "f_size" => $file->getSize()
                                );
                            }
                        }

                        foreach($files as $file) {                          
                            $result = "<tr>"
                                    . "<td class='uk-text-center'>" . date('m/d/y', $file["f_date"]) . "</td>"
                                    . "<td>" . $file["f_name"] . "</td>"
                                    . "<td class='uk-text-center'>" . byteConvert($file["f_size"]) . "</td>"
                                    . "<td class='uk-text-center'><a href='" . base_url() . "hrdocs/" . $file["f_name"] . "' class='uk-link'>View/Download</a></td>"
                                    . "</tr>";
                            echo $result;
                        }
                        
                        function byteConvert($bytes) {
                            if ($bytes == 0) { return "0.00 B"; }
                            
                            $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
                            $e = floor(log($bytes, 1024));

                            return round($bytes/pow(1024, $e), 2). " " . $s[$e];
                        }
                    ?>
                </table>
            </div>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </body>
</html>