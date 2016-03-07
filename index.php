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
        <link rel="stylesheet" href="pure/pure-min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
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
        <title>DeenQA Home</title>
    </head>
    <body style="background-color: #D1D1D1;">

        <div id='cssmenu'>
            <ul>
                <li class='active'><a href='index.php'>DeenQA Home</a></li>
                <li><a href='ask.php'>Ask</a></li>
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
                        <legend>Last 10 QA posted</legend>
                        <table class="table table-striped">
                            <tbody>
                                <?php
                                    $query = new BackendlessDataQuery();
                                    $query->setPageSize(12);
                                    $query->addProp('title');
                                    $query->addProp('objectId');
                                    $data = Backendless::$Data->of('QA')->find($query)->getAsArray();
                                    $i = 1;
                                    foreach ($data  as $d) {
                                        echo '<tr>';
                                        echo '<td>'.$i++.'</td>';
                                        echo '<td>'.$d['title'].'</td>';
                                        echo '<td><a href="viewQA.php?q='.$d['objectId'].'" target="_blank">View full QA</a></td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
        </div>
    </body>
</html>
