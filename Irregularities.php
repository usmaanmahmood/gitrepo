<?php include "template-head.php" ?>
    <title>Irregularities | ARCADE</title>
    <style>
        body {
            padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>
    </head>

<body>

<?php include("template-nav.php");

$arcadeClient = new ARCADEClient();
$query = new Query("irregularities", 0); // command, plainTextWanted

$query->addDatabases($arcadeProfile->getDatabaseList());
$result = $arcadeClient->execute($query);

$databaseList = $result->getDatabaseList();

// TODO: Only autoload the latest and have a load more... button that loads the rest


?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">

                <button type="button" class="btn btn-default btn-block dat-reset-filters">Reset Databases</button>

                <select class="form-control" size=4 id="DatabaseList">
                    <?php foreach (array_unique($arcadeProfile->getDatabaseList()) as $option) { ?>
                        <option value="<?php echo $option ?>">
                            <?php preg_match("/(\d+)-(\d+)-(\d)(.*)/", $option, $matches);
                            $databaseParsedName = ("Year " . $matches[3] . " - " . ($matches[4] == "X" ? ("Overall (inc. Exams)") : "Coursework Only"));
                            echo $databaseParsedName; ?></option>
                    <?php } ?>
                </select>
                <br/>
                <button type="button" class="btn btn-default btn-block mod-reset-filters">Reset Modules</button>


                <select multiple class="form-control" size=15 id="ModuleList">
                    <?php $twoDArray = $arcadeProfile->getTwoDimensionalArray();
                    foreach ($twoDArray as $filter) {
                        ?>
                        <option value="<?php echo $filter[4] ?>" data-db="<?= $filter[0] ?>">
                            <?php
                            $matched = preg_match("/(\d{3,5})(\S)$/", $filter[4], $matches);

                            if ($matched) {
                                switch ($matches[2]) {
                                    case "L":
                                        $matches[2] = " Labs";
                                        break;
                                    case "C":
                                        $matches[2] = " Coursework";
                                        break;
                                    case "E":
                                        $matches[2] = " Examples-Classes";
                                        break;
                                    case "W":
                                        $matches[2] = " Workshops";
                                        break;
                                    case "X":
                                        $matches[2] = " Exams";
                                        break;
                                }
                            };

                            if ($matched)
                                echo $matches[1] . $matches[2];
                            else
                                echo $filter[4];
                            ?></option>
                    <?php } ?>
                </select>
                <br/>
                <button type="button" class="btn btn-default btn-lg btn-block" data-loading-text="Executing..."
                        id="submit">Execute!
                </button>
            </div>


            <div class="col-md-9">
                <h1>Irregularities</h1>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php

                    // database title
                    // new panel for each module

                    foreach ($databaseList as $database) {
                        ?>
                        <h3><?= $database->getDatabaseParsedName() . " (" . $database->getDatabaseName() . ")"; ?></h3>
                        <?php
                        $itemModuleList = array_unique($database->getItemModuleList());
                        foreach ($itemModuleList as $key => $module) {
                            $key1 = $key + 1;
                            $currentNumber = ucfirst(convert_number_to_words(($key1)));

                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading<?= $currentNumber ?>">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse<?= $currentNumber ?>"
                                           aria-expanded="true"
                                           aria-controls="collapse<?= $currentNumber ?>"><strong>
                                                <?= $module; ?></strong>
                                            - <?= $database->getItemCountForModule($module); ?> irregularities</a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->
                                <div id="collapse<?= $currentNumber ?>"
                                     class="panel-collapse collapse<?= $currentNumber == "One" ? " in" : "" ?>"
                                     role="tabpanel"
                                     aria-labelledby="heading<?= $currentNumber ?>">
                                    <!--                                <div class="panel-body">-->
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Group:</th>
                                            <th>Date (DD/MM):</th>
                                            <th>Note:</th>
                                        </tr>
                                        <?php foreach ($database->getItemList() as $item) {
                                            if ($item->getModule() == $module) {
                                                ?>
                                                <tr>
                                                    <td><?= $item->getGroup(); ?></td>
                                                    <td><?= $item->getDate(); ?></td>
                                                    <td><?= $item->getNote(); ?></td>
                                                </tr>
                                            <?php
                                            } // if $module
                                        } // foreach $item in this module
                                        ?>
                                    </table>
                                    <!--                                </div>-->
                                </div>
                            </div> <!-- panel panel-default -->
                        <?php
                        } // foreach $module
                    } // foreach $database
                    ?>
                </div>
                <!-- panel-group -->
            </div>
        </div>
    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {

    // hide them all to start with
    $("#ModuleList option").hide();

    $("#DatabaseList").change(function () {
        $("#ModuleList option").hide();
        $("#ModuleList option[data-db=" + this.value + "]").show();
    });

//

    $(".dat-reset-filters").click(function () {
        $("#DatabaseList option:selected").removeAttr("selected");
    });

    $(".mod-reset-filters").click(function () {
        $("#ModuleList option:selected").removeAttr("selected");
    });


    $("#submit").click(function () {
        var $modules = $("#ModuleList").val();
        var $databases = [];
        $databases.push($("#DatabaseList").val());

        console.log($databases);
        console.log($modules);

        var $submitbutton = $('#submit').button('loading');

        var $resultDiv = $('#result');
        $resultDiv.fadeOut('slow');

        $.get("DisplayScripts/getAttendanceSummary.php", {"databases": $databases, "modules": $modules})
            .done(function (result) {
                $resultDiv.html(result);
                $resultDiv.fadeIn('slow');
                $submitbutton.button('reset');
            })
            .error(function (xhr, status, error) {
                $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com</p>");
                $resultDiv.fadeIn('slow');
                $submitbutton.button('reset');
            });

    });
        // } document ready in template end

<?php include("template-end.php"); ?>
    <?php
    function convert_number_to_words($number)
    {

        $hyphen = '-';
        $conjunction = ' and ';
        $separator = ', ';
        $negative = 'negative ';
        $decimal = ' point ';
        $dictionary = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'fourty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion',
            1000000000000 => 'trillion',
            1000000000000000 => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens = ((int)($number / 10)) * 10;
                $units = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int)($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string)$fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }

    ?>