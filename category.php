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
        unset($_SESSION['sc']);
        ?>
        <title>Category</title>
    </head>
    <body style="background-color: #D1D1D1;">

       <div id='cssmenu'>
            <ul>
                <li><a href='index.php'>DeenQA Home</a></li>
                <li><a href='search.php'>Search</a></li>
                <li class='active'><a href='category.php'>Category</a></li>
                <li><a href='ask.php'>Ask</a></li>
                <li><a href='about.php'>About</a></li>
            </ul>
        </div>
        <div class="container">
            <div class="panel panel-default" style="margin-top: 20px; width: 25%;float: left; overflow: hidden;">
                <div class="panel-body">
                    <fieldset>
                        <legend>Category</legend>
                        <table class="table table-striped table-condensed">
                            <tbody>
                                <?php
                                $query = new BackendlessDataQuery();
                                $query->setPageSize(100);
                                $data = Backendless::$Data->of('Category')->find($query)->getAsArray();
                                $data = array_reverse($data);
                                foreach ($data as $d) {
                                    echo '<tr>';
                                    echo '<td><a href="category.php?cat=' . $d['cat'] . '">' . $d['cat'] . '</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
            <div class="panel panel-info" style="margin-top: 20px; width: 75%;float: left;overflow: hidden;">
                <div class="panel-body">
                    <fieldset>
                        <?php
                        $cat = 'All';
                        if (isset($_GET['cat'])) {
                            $cat = $_GET['cat'];
                        }
                        ?>
                        <legend>Category: <?php echo $cat;?></legend>
                        <table class="table table-striped">
                            <tbody>
                                <?php
                                if (isset($_GET['offset'])) {
                                    $offset = $_GET['offset'];
                                    if (!$offset || $offset < 0) {
                                        $offset = 0;
                                    }
                                } else {
                                    $offset = 0;
                                }

                                $query = new BackendlessDataQuery();
                                $query->setPageSize(10);
                                $query->setOffset($offset);
                                if ($cat === 'All') {
                                    
                                } else {
                                    $query->setWhereClause("category LIKE  '%$cat%'");
                                }
                                $data = Backendless::$Data->of('QA')->find($query)->getAsArray();
                                $i = 1 + $offset;
                                foreach ($data as $d) {
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>' . $d['title'] . '</td>';
                                    echo '<td><a href="viewQA.php?q=' . $d['objectId'] . '" target="_blank">View</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                    <nav>
                        <ul class="pager">
                            <?php
                            if ($offset == 0) {
                                echo '<li class="disabled"><a href="#">Previous</a></li>';
                            } else {
                                echo '<li><a href="category.php?cat=' . $cat . '&offset=' . ($offset - 10) . '">Previous</a></li>';
                            }
                            if (count($data) < 10) {
                                echo '<li class="disabled"><a href="#">Next</a></li>';
                            } else {
                                echo '<li><a href="category.php?cat=' . $cat . '&offset=' . ($offset + 10) . '">Next</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </body>
</html>
