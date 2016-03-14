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
        <link rel="shortcut icon" type="image/png" href="favicon.png"/>
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
                <li><a href='index.php'>Home</a></li>
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
                        <legend>Mission</legend>
                        <p>
                            যারা দৈনন্দিন নানাবিধ প্রশ্নের মুখোমুখি হন কিন্তু সম্মানিত 
                            আলিমদের সাথে যোগাযোগ না থাকায় তা অজানাই থেকে যায়। ফলে ইসলাম পালনে নানাবিধ বিদআত আর ভুল বোঝাবুঝি থেকে যায়।
                            <br>
                            আমরা তাদের আর আলিম সমাজের মাঝে একটি সেতুবন্ধন তৈরি করে দিতে চাই।
                        </p>
                    </fieldset>
                </div>
            </div>
            <div class="panel panel-default" style="margin-top: 20px;">
                <div class="panel-body">
                    <fieldset>
                        <legend>About</legend>
                        <p>
                            কুরআন-সুন্নাহ তথা শরিয়তের চার দলিল অনুসারে হানাফি ফিকহের উসুল অনুযায়ী <br>আপনাদের দৈনন্দিন জিজ্ঞাসার জবাব দিবেন মুহতারাম মুফতিগণ।<br>
                            <br>
                            সার্বিক তত্ত্বাবধানে- মুহতারাম মুফতি <strong>আবুল কালাম জাকারিয়া</strong> (দাঃ বাঃ)।
                            <br>
                            প্রধান মুফতি- <a href="https://facebook.com/Zia.Eshona" target="_blank">হাফেয মুফতি জিয়া রাহমান (দাঃ বাঃ)</a><br>
                            <br>
                            সম্মানিত মুফতিগণ-<br>
                            <br>
                            ১। <a href="https://facebook.com/profile.php?id=100006155267608" target="_blank">হাফেজ মুফতি সালেহ আহমদ (দাঃ বাঃ)</a><br>
                            ২। <a href="https://facebook.com/Danialbd" target="_blank">মুফতি দানিয়াল মাহমূদ (দাঃ বাঃ)</a><br>
                            ৩। <a href="https://facebook.com/mimemdad" target="_blank">মুফতি ইমদাদুল হক (দাঃ বাঃ)</a>
                        </p>
                        <hr>
                        <p>
                            সমন্বয়ে - <strong><a href="https://facebook.com/ghurabakajol" target="_blank">মামুনুর রশীদ কাজল</a></strong>
                            <br>
                            সহযোগিতা ও <a href="https://facebook.com/shoroeeshomadhan/timeline" target="_blank">ফেসবুক পেইজ</a> পরিচালনায় 
                            - <strong>হিশাম ইবনে জুবায়ের</strong>
                        </p>
                        <hr>
                        <p>
                            সার্বিক ব্যবস্থাপনায়- <a href="https://facebook.com/nusuksyl/"  target="_blank">নুসুক - نسك - Nusuk</a>
                        </p>
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
