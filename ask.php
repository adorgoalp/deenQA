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
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#searchbox2").select2({
                    tags: true,
                    tokenSeparators: [',', ' '],
                    minimumResultsForSearch: Infinity
                    
                });
            });
        </script>
        <link rel="stylesheet" href="pure/pure-min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/iftaCss.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">


        <?php

        use backendless\Backendless;
        use backendless\exception\BackendlessException;

include_once './backendless/autoload.php';
        Backendless::initApp('0F8F33A0-5515-0C9B-FFCB-F8A0A3E92A00', 'B1ACD24E-02A7-E964-FFA0-7D0ABB2FFD00', 'v1');
        include_once './deenQA_lib.php';
        ?>
        
        <title>Ask</title>
    </head>
    <body style="background-color: #D1D1D1;">

        <div id='cssmenu'>
            <ul>
                <li><a href='index.php'>DeenQA Home</a></li>
                <li class='active'><a href='ask.php'>Ask</a></li>
                <li><a href='category.php'>Category</a></li>
                <li><a href='about.php'>About</a></li>
                <li>
                    <div style="margin-top: 8px; float: right;">
                        <form class="pure-form">
                            <input type="text" name="searchtext" style="margin-right: 8px;">
                            <button type="submit" class="pure-button pure-button-primary">Search</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="panel panel-default" style="margin-top: 20px;">
                <div class="panel-body">
                    <fieldset>
                        <legend>Ask us a question</legend>
                        <p>
                            আসসালামু আলাইকুম,<br>
                            প্রশ্ন করার আগে প্রশ্ন করার নিয়ম গুলো জেনে নিন।<br>
                        </p>
                        <ul>
                            <li>আগে ভালো ভাবে সার্চ করে দেখুন আপনি যেই প্রশ্নের উত্তর চান তা আগেই দেয়া হয়ে গেছে কিনা। 
                                <br>
                                আগে উত্তর দেয়া হলে প্রশ্ন করা থেকে বিরত থাকুন।</li>
                            <li>একটা প্রশ্নের উত্তর দিতে ওলামা হযরতগণের অনেক মূল্যবান সময় ব্যায় করতে হয়। 
                                <br>
                                তাই প্রশ্নের উত্তর আগে দেয়া থাকলে প্রশ্ন করা থেকে বিরত থাকুন।</li>
                            <li>একবারে একটি বিষয়ে প্রশ্ন করুন। একাধিক প্রশ্ন করা থেকে বিরত থাকুন।</li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>আপনার প্রশ্নের কি ওয়ার্ড  লিখে সার্চ  করুন</legend>
                        <ul><li>যেমন নামাজ বিষয়ক প্রশ্ন থাকলে সালাত,নামাজ লিখে সার্চ  করুন</li></ul>

                    </fieldset>
                    <form method="post" action="ask.php">
                        <div class="form-group">
                            <select class="form-control" id="searchbox2" name="searchtext[]" multiple required>
                            </select>
                        </div>
                        <button name="search" type="submit" class="pure-button pure-button-primary" style="float: right; margin-top: 10px;">Search</button>
                    </form>
                    <div class="clearfix"></div>
                    <?php
                    if (isset($_POST['search'])) {
                        echo '<hr>';
                        $searchWords = $_POST['searchtext'];
                        
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
