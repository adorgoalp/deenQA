<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/iftaCss.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">


        <?php

        use backendless\Backendless;
        use backendless\exception\BackendlessException;
        use backendless\services\persistence\BackendlessDataQuery;

include_once './backendless/autoload.php';
        Backendless::initApp('0F8F33A0-5515-0C9B-FFCB-F8A0A3E92A00', 'B1ACD24E-02A7-E964-FFA0-7D0ABB2FFD00', 'v1');
        include_once './deenQA_lib.php';
        ?>
        <title>View QA</title>
    </head>
    <body style="background-color: #D1D1D1;">

        <div id='cssmenu'>
            <ul>
                <li><a href='index.php'>DeenQA Home</a></li>
                <li><a href='ask.php'>Ask</a></li>
                <li><a href='category.php'>Category</a></li>
                <li class="active"><a href='#'>View QA</a></li>
                <li><a href='about.php'>About</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="panel panel-default " style="margin-top: 20px; background-color: #527a7a; ">
                <div class="panel-body">    

                    <?php
                    $id = filter_input(INPUT_GET, 'q');
                    $data = Backendless::$Data->of('QA')->findById($id);
                    //print_r($data);
                    echo '<legend style=" color:  #fff;">' . $data['title'] . '</legend>';
                    echo '<div class="list-group" style="white-space: pre-wrap;">';
                    echo '<div class="list-group-item"  style="text-align: center;padding: 8px;background-color: #b3cccc;"><h2>প্রশ্ন</h2></div>';
                    echo '<div class="list-group-item"  style="padding: 8px;background-color: #c2d6d6;"><p>' . $data['question'] . '</p></div>';
                    echo '<div class="list-group-item"  style="text-align: right; padding: 10px; background-color:  #75a3a3;">Question posted by- <strong>' . $data['questionBy'] . '</strong></div>';
                    echo '<hr>';
                    echo '<div class="list-group-item"  style="text-align: center;padding: 8px;background-color: #b3cccc;"><h2>উত্তর</h2></div>';
                    echo '<div class="list-group-item"  style="padding: 8px;background-color: #c2d6d6;"><p>' . $data['answer'] . '</p></div>';
                    echo '<div class="list-group-item"  style="text-align: right; padding: 10px; background-color:  #75a3a3;">Answer given by- <strong>' . $data['answeredBy'] . '</strong></div>';
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
