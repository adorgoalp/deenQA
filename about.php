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

include_once './backendless/autoload.php';
        Backendless::initApp('0F8F33A0-5515-0C9B-FFCB-F8A0A3E92A00', 'B1ACD24E-02A7-E964-FFA0-7D0ABB2FFD00', 'v1');
        include_once './deenQA_lib.php';
        unset($_SESSION['sc']);
        ?>
        <title>About</title>
    </head>
    <body style="background-color: #D1D1D1;">

        <div id='cssmenu'>
            <ul>
                <li><a href='index.php'>DeenQA Home</a></li>
                <li><a href='search.php'>Search</a></li>
                <li><a href='category.php'>Category</a></li>
                <li><a href='ask.php'>Ask</a></li>
                <li class='active'><a href='about.php'>About</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="panel panel-default" style="margin-top: 20px;">
                <div class="panel-body">
                    <fieldset>
                        <legend>About</legend>
                        <p>
                            কুরআন-সুন্নাহ তথা শরিয়তের চার দলিল অনুসারে হানাফি ফিকহের উসুল অনুযায়ী <br>আপনাদের দৈনন্দিন জিজ্ঞাসার জবাব দিবেন মুহতারাম মুফতিগণ।<br>
                            <br>
                            প্রধান মুফতিঃ হাফেজ মুফতি <strong>জিয়া রাহমান</strong> (দাঃবাঃ)<br>
                            <br>
                            সম্মানিত মুফতিগণঃ<br>
                            <br>
                            ১। মুফতি <strong>দানিয়াল মাহমূদ</strong> (দাঃবাঃ)<br>
                            ২। হাফেজ মুফতি <strong>এম এম এইচ সালেহ আহমাদ</strong> (দাঃবাঃ)<br>
                            ৩। মুফতি <strong>এমদাদ হক</strong> (দাঃবাঃ)</p>
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
