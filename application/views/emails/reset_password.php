<!DOCTYPE html>
<html>
<head>
    <title>OnePuhunan Service Portal</title>
    <style>
        body {
            padding: 10px;
        }
        p, #table-details, #table-sig {
            font-family: Cambria, Cochin, serif;
            font-size: 14px;
            text-align: justify;
        }
        #table-details td {
            padding: 5px 20px;
        }
        #table-sig p {
            margin-top: -10px;
            margin-left: 10px;
            font-size: 12px;
        }
        #table-sig td {
            padding: 5px 15px 0;
            margin-bottom: -10px;
        }
        a {
            text-decoration: none;
        }
        .sig {
            border-left: solid rgb(47, 79, 117);
            border-width: 2px;
        }
        .sig > p {
            margin-bottom: -10px;
        }
    </style>
</head>
<body>
<p>
    <b>Dear <?php
        $trimmed = trim($email, "@onepuhunan.com.ph");
        $name = str_replace(".", " ", $trimmed);
        echo ucwords($name);?></b>,
    <br><br><br>
    You have submitted a password reset request at <b>OnePuhunan Service Portal</b>.
    <br><br>
    If it wasn't please disregard this email and make sure you can still login to your
    account. If it was you, then confirm the password change by <a href="<?php echo site_url("confirmation"); ?>">clicking here.</a>


<p>
    For more details, please send an email to <a href="mailto:it@onepuhunan.com.ph?">it@onepuhunan.com.ph</a>.
    <br><br>
    This is an automated message. Please do not reply to it.
    <br><br><br>
    Best Regards,
</p>

<br><br>

<table id="table-sig">
    <tr>
        <td>
            <img src="<?=base_url()?>img/onepuhunan.png" width="161" height="70">
        </td>
        <td class="sig">
            <p>
                <b>IT System Administrator</b><br>
                Information Technology Department
                <br><br>
                <b>MicroVentures Philippines Financing Company, Inc.</b><br>
                Unit 2906, One San Miguel Avenue Office Condominium <br>
                San Miguel Avenue cor.,  Shaw Blvd., Brgy. San Antonio <br>
                Ortigas Center, Pasig City, Philippines, 1600 <br>
                <a href="www.onepuhunan.com.ph">www.onepuhunan.com.ph</a>
            </p>
        </td>
    </tr>
</table>

</body>
</html>
