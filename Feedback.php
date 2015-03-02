<?php include "template-head.php" ?>
    <title>Feedback | ARCADE</title>
    <style>
        body {
            padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>
    </head>

<body>

<?php include("template-nav.php");
?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">
    <div class="col-md-12">

    <form class="form-horizontal">
    <fieldset>

    <!-- Form Name -->
    <legend>Web Arcade Feedback Form</legend>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasicYear">Year</label>

        <div class="col-md-4">
            <select id="selectbasicYear" name="selectbasicYear" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="Straff">Straff</option>
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasicGUI">GUI - Page</label>

        <div class="col-md-4">
            <select id="selectbasicGUI" name="selectbasicGUI" class="form-control">
                <option value="Classic">Classic</option>
                <option value="Attendance Summary">Attendance Summary</option>
                <option value="Timetable: Full">Timetable: Full</option>
                <option value="Marks Table">Marks Table</option>
                <option value="Full Story">Full Story</option>
                <option value="Registration Details">Registration Details</option>
                <option value="Expected">Expected</option>
                <option value="Excuses">Excuses</option>
                <option value="Irregularities">Irregularities</option>
            </select>
        </div>
    </div>

    <!-- Select Multiple -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectmultipleDevice">Device</label>

        <div class="col-md-4">
            <select id="selectmultipleDevice" name="selectmultipleDevice" class="form-control" multiple="multiple">
                <option value="Mobile Phone">Mobile Phone</option>
                <option value="Tablet">Tablet</option>
                <option value="Laptop">Laptop</option>
                <option value="PC">PC</option>
            </select>
        </div>
    </div>

    <!-- Multiple Radios -->
    <div class="col-md-6">
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosIntuitivenessJava">Java Arcade - Intuitiveness</label>

        <div class="col-md-4">
            <div class="radio">
                <label for="radiosIntuitivenessJava-0">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-0" value="1"
                           checked="checked">
                    1
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-1">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-1" value="2">
                    2
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-2">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-2" value="3">
                    3
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-3">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-3" value="4">
                    4
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-4">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-4" value="5">
                    5
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-5">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-5" value="6">
                    6
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-6">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-6" value="7">
                    7
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-7">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-7" value="8">
                    8
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-8">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-8" value="9">
                    9
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessJava-9">
                    <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-9" value="10">
                    10
                </label>
            </div>
        </div>
    </div>
</div>
    <div class="col-md-6">
    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosIntuitivenessWeb">Web Arcade - Intuitiveness</label>

        <div class="col-md-4">
            <div class="radio">
                <label for="radiosIntuitivenessWeb-0">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-0" value="1"
                           checked="checked">
                    1
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-1">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-1" value="2">
                    2
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-2">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-2" value="3">
                    3
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-3">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-3" value="4">
                    4
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-4">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-4" value="5">
                    5
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-5">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-5" value="6">
                    6
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-6">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-6" value="7">
                    7
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-7">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-7" value="8">
                    8
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-8">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-8" value="9">
                    9
                </label>
            </div>
            <div class="radio">
                <label for="radiosIntuitivenessWeb-9">
                    <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-9" value="10">
                    10
                </label>
            </div>
        </div>
    </div>
</div>
    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textareaIntuitivenessComments">Intuitiveness - Comments &amp;
            Suggestions</label>

        <div class="col-md-4">
            <textarea class="form-control" id="textareaIntuitivenessComments"
                      name="textareaIntuitivenessComments"></textarea>
        </div>
    </div>

    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosPresentationJava">Java Arcade - Presentation</label>

        <div class="col-md-4">
            <div class="radio">
                <label for="radiosPresentationJava-0">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-0" value="1"
                           checked="checked">
                    1
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-1">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-1" value="2">
                    2
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-2">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-2" value="3">
                    3
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-3">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-3" value="4">
                    4
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-4">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-4" value="5">
                    5
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-5">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-5" value="6">
                    6
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-6">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-6" value="7">
                    7
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-7">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-7" value="8">
                    8
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-8">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-8" value="9">
                    9
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationJava-9">
                    <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-9" value="10">
                    10
                </label>
            </div>
        </div>
    </div>

    <!-- Multiple Radios -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosPresentationWeb">Web Arcade - Presentation</label>

        <div class="col-md-4">
            <div class="radio">
                <label for="radiosPresentationWeb-0">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-0" value="1"
                           checked="checked">
                    1
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-1">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-1" value="2">
                    2
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-2">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-2" value="3">
                    3
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-3">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-3" value="4">
                    4
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-4">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-4" value="5">
                    5
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-5">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-5" value="6">
                    6
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-6">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-6" value="7">
                    7
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-7">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-7" value="8">
                    8
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-8">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-8" value="9">
                    9
                </label>
            </div>
            <div class="radio">
                <label for="radiosPresentationWeb-9">
                    <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-9" value="10">
                    10
                </label>
            </div>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textareaPresentationComments">Presentation - Comments &amp;
            Suggestions</label>

        <div class="col-md-4">
            <textarea class="form-control" id="textareaPresentationComments"
                      name="textareaPresentationComments"></textarea>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textareaOtherComments">Other Comments &amp; Suggestions</label>

        <div class="col-md-4">
            <textarea class="form-control" id="textareaOtherComments" name="textareaOtherComments"></textarea>
        </div>
    </div>

    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="singlebuttonSubmit"></label>

        <div class="col-md-4">
            <button id="singlebuttonSubmit" name="singlebuttonSubmit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    </fieldset>
    </form>


    </div>
    </div>
    </div>
    <!-- /.container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        $(document).ready(function () {


            $("#submit").click(function () {
                var $modules = $("#ModuleList").val();
                var $databases = [];
                $databases.push($("#DatabaseList").val());

                console.log($databases);
                console.log($modules);

                var $submitbutton = $('#submit').button('loading');

                var $resultDiv = $('#result');
                $resultDiv.fadeOut('slow');

                $.get("DisplayScripts/getMarksTables.php", {"databases": $databases, "modules": $modules})
                    .done(function (result) {
                        $resultDiv.html(result);
                        $resultDiv.fadeIn('slow');
                        $submitbutton.button('reset');
                    });
            })
                .error(function (xhr, status, error) {
                    $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com</p>");
                    $resultDiv.fadeIn('slow');
                    $submitbutton.button('reset');
                });


        // } document ready in template end

<?php include("template-end.php"); ?>