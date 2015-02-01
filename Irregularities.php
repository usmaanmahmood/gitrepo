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
            <div class="col-lg-12">
                <h1>Registration Details</h1>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    foreach ($databaseList as $key => $database) {
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
                                            <?= $database->getDatabaseParsedName() . " (" . $database->getDatabaseName() . ")"; ?></strong></a>
                                </h4>
                            </div>
                            <!-- panel-heading -->
                            <div id="collapse<?= $currentNumber ?>"
                                 class="panel-collapse collapse<?= $currentNumber == "One" ? " in" : "" ?>"
                                 role="tabpanel"
                                 aria-labelledby="heading<?= $currentNumber ?>">
                                <!--                                <div class="panel-body">-->
                                <?php foreach ($database->$irregularityList() as $irregularity) {
                                    ?>
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <th>Module:</th>
                                            <th>Module Group:</th>
                                            <th>Date (DD/MM):</th>
                                            <th>Note:</th>
                                        </tr>
                                        <tr>
                                            <td><?= $irregularity->getModule(); ?></td>
                                            <td><?= $irregularity->getGroup(); ?></td>
                                            <td><?= $irregularity->getDate(); ?></td>
                                            <td><?= $irregularity->getIrregularity(); ?></td>
                                        </tr>
                                    </table>
                                <?php
                                } // foreach $student
                                ?>
                                <!--                                </div>-->
                            </div>
                        </div> <!-- panel panel-default -->
                    <?php } // foreach $database ?>
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


        }) // document ready

    </script>

    </body>
    </html>
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