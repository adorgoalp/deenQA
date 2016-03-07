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
        use backendless\services\persistence\BackendlessDataQuery;
        use PendingQA;

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
                <li><a href='search.php'>Search</a></li>
                <li><a href='category.php'>Category</a></li>
                <li class='active'><a href='ask.php'>Ask</a></li>
                <li><a href='about.php'>About</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="panel panel-default" style="margin-top: 20px;">
                <div class="panel-body">
                    <fieldset>
                        <legend>আপনার জিজ্ঞাসা</legend>
                        <p>
                            আসসালামু আলাইকুম,<br>
                            প্রশ্ন করার আগে প্রশ্ন করার নিয়ম গুলো জেনে নিন।<br>
                        </p>
                        <ul>
                            <li>আগে ভালো ভাবে <a href="search.php">সার্চ </a> করে দেখুন আপনি যেই প্রশ্নের উত্তর চান তা আগেই দেয়া হয়ে গেছে কিনা। 
                                <br>
                                আগে উত্তর দেয়া হলে প্রশ্ন করা থেকে বিরত থাকুন।</li>
                            <li>একটা প্রশ্নের উত্তর দিতে ওলামা হযরতগণের অনেক মূল্যবান সময় ব্যায় করতে হয়। 
                                <br>
                                তাই প্রশ্নের উত্তর আগে দেয়া থাকলে প্রশ্ন করা থেকে বিরত থাকুন।</li>
                            <li>একবারে একটি বিষয়ে প্রশ্ন করুন। একাধিক প্রশ্ন করা থেকে বিরত থাকুন।</li>
                            <li>বাংলায় প্রশ্ন করুন</li>
                        </ul>
                    </fieldset>
                    <fieldset>
                        <legend>আপনার প্রশ্নের কি ওয়ার্ড  লিখে <a href="search.php">সার্চ </a>  করুন</legend>
                        <ul>
                            <li>যেমন নামাজ বিষয়ক প্রশ্ন থাকলে সালাত,নামাজ লিখে <a href="search.php">সার্চ </a>  করুন</li>
                            <li>জায়েজ-নাজায়েজ বিষয়ক প্রশ্ন থাকলে জায়েজ,নাজায়েজ লিখে <a href="search.php">সার্চ </a>  করুন</li>
                            <li>প্রতিটি <a href="category.php"> ক্যাটাগরিতে</a> ভালো ভাবে খোজ করুন</li>
                        </ul>

                    </fieldset>
                    <fieldset>
                        <legend><a href="search.php">সার্চ </a> করে না পেলে নিচের ফর্মে আপনার প্রশ্নটি করুন</legend>
                        <form action="ask.php" method="post">
                            <div class="form-group">
                                <label>প্রশ্ন</label>
                                <textarea name="question" class="form-control" rows="8" required ></textarea>
                            </div>
                            <div class="form-group">
                                <label>আপনার নাম</label>
                                <input name="askerName" type="text" class="form-control" required id="askername">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="noname" name="noname">
                                <label>নাম প্রকাশে অনিচ্ছুক</label>
                            </div>
                            <script>
                                document.getElementById('noname').onchange = function () {
                                    document.getElementById('askername').disabled = this.checked;
                                };
                            </script>
                            <div class="form-group">
                                <label>আপনার ইমেইল</label>
                                <input name="email" type="email" class="form-control">
                            </div>
                            <div class="pure-form-message">
                            <?php
                            if (isset($_POST['submitQuestion'])) {
                                $question = filter_input(INPUT_POST, 'question');
                                $askerName = "";
                                if (isset($_POST['noname'])) {
                                    $askerName = "নাম প্রকাশে অনিচ্ছুক";
                                } else {
                                    $askerName = filter_input(INPUT_POST, 'askerName');
                                    if ($askerName === '') {
                                        $askerName = "নাম প্রকাশে অনিচ্ছুক";
                                    }
                                }
                                $email = filter_input(INPUT_POST, 'email');
                                $qa = new PendingQA($question, $askerName, $email);
                                try {
                                    $savedQA = Backendless::$Persistence->save($qa);
                                    if ($savedQA !== NULL) {
                                        echo 'Alhamdulillah! Your question submitted successfully.';
                                    }
                                } catch (BackendlessException $ex) {
                                    echo $ex->getMessage();
                                }
                            }
                            ?>
                            </div>
                            <input class="pure-button pure-button-primary" name="submitQuestion" type="submit" value="Submit Question" style="float: right; margin-top: 10px;">
                        </form>

                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
