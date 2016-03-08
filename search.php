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
        <link rel="stylesheet" href="pure/buttons-min.css">
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

        <title>Ask</title>
    </head>
    <body style="background-color: #D1D1D1;">

        <div id='cssmenu'>
            <ul>
                <li><a href='index.php'>DeenQA Home</a></li>
                <li class='active'><a href='search.php'>Search</a></li>
                <li><a href='category.php'>Category</a></li>
                <li><a href='ask.php'>Ask</a></li>
                <li><a href='about.php'>About</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="panel panel-default" style="margin-top: 20px;">
                <div class="panel-body">
                    <fieldset>
                        <legend>সার্চ  করুন। বাংলায় লিখুন।</legend>
                    </fieldset>
                    <form method="post" action="search.php">
                        <div class="form-group">
                            <select class="form-control" id="searchbox2" name="searchtext[]" multiple required>
                            </select>
                        </div>
                        <button name="search" type="submit" class="pure-button pure-button-primary" style="float: right; margin-top: 10px;">Search</button>
                    </form>
                    <div class="clearfix"></div>
                    <table class="table table-striped">
                        <tbody>
                            <?php
                            if (isset($_POST['search'])) {
                                echo '<hr>';
                                $searchWords = $_POST['searchtext'];
                                $whereClause = "";
                                foreach ($searchWords as $sw) {
                                    $whereClause.= "question LIKE  '%$sw%' OR category LIKE  '%$sw%' OR ";
                                }
                                $whereClause = substr($whereClause, 0, strlen($whereClause) - 3);
                                
                                $_SESSION['sc'] = $whereClause;
                                //echo $whereClause;
                                if (isset($_GET['offset'])) {
                                    $offset = $_GET['offset'];
                                    if (!$offset || $offset < 0) {
                                        $offset = 0;
                                    }
                                } else {
                                    $offset = 0;
                                }
                                $query = new BackendlessDataQuery();
                                $query->setWhereClause($whereClause);
                                $query->addProp('title');
                                $query->addProp('objectId');
                                $query->setPageSize(10);
                                $query->setOffset($offset);
                                $data = Backendless::$Data->of('QA')->find($query)->getAsArray();
                                $i = 1;
                                foreach ($data as $d) {
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>' . $d['title'] . '</td>';
                                    echo '<td><a href="viewQA.php?q=' . $d['objectId'] . '" target="_blank">View full QA</a></td>';
                                    echo '</tr>';
                                }
                            } else if (isset ($_SESSION['sc'])){
                                echo '<hr>';
                                if (isset($_GET['offset'])) {
                                    $offset = $_GET['offset'];
                                    if (!$offset || $offset < 0) {
                                        $offset = 0;
                                    }
                                } else {
                                    $offset = 0;
                                }
                                $whereClause = $_SESSION['sc'];
                                $query = new BackendlessDataQuery();
                                $query->setWhereClause($whereClause);
                                $query->addProp('title');
                                $query->addProp('objectId');
                                $query->setPageSize(10);
                                $query->setOffset($offset);
                                $data = Backendless::$Data->of('QA')->find($query)->getAsArray();
                                $i = 1+$offset;
                                foreach ($data as $d) {
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>' . $d['title'] . '</td>';
                                    echo '<td><a href="viewQA.php?q=' . $d['objectId'] . '" target="_blank">View full QA</a></td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pager">
                            <?php
                            if ($offset == 0) {
                                echo '<li class="disabled"><a href="#">Previous</a></li>';
                            } else {
                                echo '<li><a href="search.php?offset=' . ($offset - 10) . '">Previous</a></li>';
                            }
                            if (count($data) < 10) {
                                echo '<li class="disabled"><a href="#">Next</a></li>';
                            } else {
                                echo '<li><a href="search.php?offset=' . ($offset + 10) . '">Next</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </body>
</html>
