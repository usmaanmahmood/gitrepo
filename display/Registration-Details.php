<?php include "../template-head.php" ?>
    <title>Registration Details | ARCADE</title>
    <style>
        body {
            padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>
    </head>

    <body>

    <?php include("../template-nav.php");

    $arcadeClient = new ARCADEClient();
    $query = new Query("registration-details", 0); // command, plainTextWanted

    $query->addDatabases($arcadeProfile->getDatabaseList());
    $result = $arcadeClient->execute($query);

    $databaseList = $result->getDatabaseList();

    /*
        for each database
            display db name
            display number of matching students
            for each student
                display details
        */


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
                        $currentNumber = ucfirst(convertNumber(($key1)));

                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading<?= $currentNumber ?>">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse<?= $currentNumber ?>"
                                       aria-expanded="true"
                                       aria-controls="collapse<?= $currentNumber ?>">
                                        <?= $database->getDatabaseParsedName() . " (" . $database->getDatabaseName() . ")"; ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?= $currentNumber ?>" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="heading<?= $currentNumber ?>">
                                <div class="panel-body">
                                    <?php foreach ($database->getStudentList() as $student) {
                                        ?>

                                        <table class="table table-striped  table-hover">
                                            <tr>
                                                <th>Attribute</th>
                                                <th>Value</th>
                                            </tr>
                                            <tr>
                                                <td>Student ID</td>
                                                <td><?= $student->getStudentID(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Reg. Status</td>
                                                <td><?= $student->getRegStatus(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Reg number</td>
                                                <td><?= $student->getRegNumber(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Degree</td>
                                                <td><?= $student->getDegree(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Year</td>
                                                <td><?= $student->getYear(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Owner</td>
                                                <td><?= $student->getOwner(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Lab Group</td>
                                                <td><?= $student->getRegStatus(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tutorial Group</td>
                                                <td><?= $student->getTutorialGroup(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tutor</td>
                                                <td><?= $student->getTutor(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Preferred Name</td>
                                                <td><?= $student->getPreferredName(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>DB Surname</td>
                                                <td><?= $student->getDbSurname(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>DB First names</td>
                                                <td><?= $student->getDbFirstNames(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email name:</td>
                                                <td><?= $student->getEmailName(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Modules</td>
                                                <td><?= implode(", ", $student->getModules()); ?></td>
                                            </tr>

                                        </table>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>


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
function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string)$number);

    $output = "";

    if ($integer{0} == "-") {
        $output = "negative ";
        $integer = ltrim($integer, "-");
    } else if ($integer{0} == "+") {
        $output = "positive ";
        $integer = ltrim($integer, "+");
    }

    if ($integer{0} == "0") {
        $output .= "zero";
    } else {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group = rtrim(chunk_split($integer, 3, " "), " ");
        $groups = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g) {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++) {
            if ($groups2[$z] != "") {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                    $z < 11
                    && !array_search('', array_slice($groups2, $z + 1, -1))
                    && $groups2[11] != ''
                    && $groups[11]{0} == '0'
                        ? " and "
                        : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0) {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++) {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index) {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0") {
        return "";
    }

    if ($digit1 != "0") {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0") {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0") {
        $buffer .= convertTwoDigit($digit2, $digit3);
    } else if ($digit3 != "0") {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0") {
        switch ($digit1) {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1") {
        switch ($digit2) {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }
    } else {
        $temp = convertDigit($digit2);
        switch ($digit1) {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit) {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}

?>