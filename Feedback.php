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

    <form id="form" class="form-horizontal" role="form" method="post" action="FeedbackSave.php">
    <fieldset>

    <!-- Form Name -->
    <legend class="text-center">Web Arcade Feedback Form</legend>
    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasicYear">Year*</label>

        <div class="col-md-4">
            <select id="selectbasicYear" name="selectbasicYear" class="form-control" required>
                <option value="" disabled selected>Please select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasicGUI">Website Area*</label>

        <div class="col-md-4">
            <select id="selectbasicGUI" name="selectbasicGUI" class="form-control" required>
                <option value="" disabled selected>Please select</option>
                <option value="Entire Website">Entire Website</option>
                <option value="Attendance Summary">Attendance Summary</option>
                <option value="Classic">Classic</option>
                <option value="Excuses">Excuses</option>
                <option value="Expected">Expected</option>
                <option value="Full Story">Full Story</option>
                <option value="Irregularities">Irregularities</option>
                <option value="Marks Table">Marks Table</option>
                <option value="Registration Details">Registration Details</option>
                <option value="Timetable">Timetable</option>
            </select>
        </div>
    </div>

    <!-- Select Multiple -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasicDevice">Device*</label>

        <div class="col-md-4">
            <select id="selectbasicDevice" name="selectbasicDevice" class="form-control" required>
                <option value="" disabled selected>Please select</option>
                <option value="Mobile Phone">Mobile Phone</option>
                <option value="Tablet">Tablet</option>
                <option value="Laptop">Laptop</option>
                <option value="PC">PC</option>
            </select>
        </div>
    </div>
    <h4 class="text-center"><abbr
            title="intuitive: using without conscious reasoning; instinctive.">Intuitiveness</abbr></h4>
    <!-- Multiple Radios (inline) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosIntuitivenessJava">Java Arcade*<br/>
            <small>(1 worst - 10 best)</small>
        </label>

        <div class="col-md-4">
            <label class="radio-inline" for="radiosIntuitivenessJava-0">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-0" value="1" required>
                1
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-1">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-1" value="2">
                2
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-2">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-2" value="3">
                3
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-3">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-3" value="4">
                4
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-4">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-4" value="5">
                5
            </label>
            <br/>
            <label class="radio-inline" for="radiosIntuitivenessJava-5">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-5" value="6">
                6
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-6">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-6" value="7">
                7
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-7">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-7" value="8">
                8
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-8">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-8" value="9">
                9
            </label>
            <label class="radio-inline" for="radiosIntuitivenessJava-9">
                <input type="radio" name="radiosIntuitivenessJava" id="radiosIntuitivenessJava-9" value="10">
                10
            </label>
        </div>
    </div>

    <!-- Multiple Radios (inline) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosIntuitivenessWeb">Web Arcade*<br/>
            <small>(1 worst - 10 best)</small>
        </label>

        <div class="col-md-4">
            <label class="radio-inline" for="radiosIntuitivenessWeb-0">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-0" value="1" required>
                1
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-1">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-1" value="2">
                2
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-2">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-2" value="3">
                3
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-3">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-3" value="4">
                4
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-4">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-4" value="5">
                5
            </label>
            <br/>
            <label class="radio-inline" for="radiosIntuitivenessWeb-5">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-5" value="6">
                6
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-6">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-6" value="7">
                7
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-7">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-7" value="8">
                8
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-8">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-8" value="9">
                9
            </label>
            <label class="radio-inline" for="radiosIntuitivenessWeb-9">
                <input type="radio" name="radiosIntuitivenessWeb" id="radiosIntuitivenessWeb-9" value="10">
                10
            </label>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textareaIntuitivenessComments">Comments &amp; Suggestions</label>

        <div class="col-md-4">
            <textarea class="form-control" id="textareaIntuitivenessComments"
                      name="textareaIntuitivenessComments"></textarea>
        </div>
    </div>

    <h4 class="text-center"><abbr title="presentation: the manner or style in which something is displayed.
">Presentation</abbr></h4>
    <!-- Multiple Radios (inline) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosPresentationJava">Java Arcade*<br/>
            <small>(1 worst - 10 best)</small>
        </label>


        <div class="col-md-4">
            <label class="radio-inline" for="radiosPresentationJava-0">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-0" value="1" required>
                1
            </label>
            <label class="radio-inline" for="radiosPresentationJava-1">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-1" value="2">
                2
            </label>
            <label class="radio-inline" for="radiosPresentationJava-2">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-2" value="3">
                3
            </label>
            <label class="radio-inline" for="radiosPresentationJava-3">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-3" value="4">
                4
            </label>
            <label class="radio-inline" for="radiosPresentationJava-4">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-4" value="5">
                5
            </label>
            <br/>
            <label class="radio-inline" for="radiosPresentationJava-5">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-5" value="6">
                6
            </label>
            <label class="radio-inline" for="radiosPresentationJava-6">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-6" value="7">
                7
            </label>
            <label class="radio-inline" for="radiosPresentationJava-7">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-7" value="8">
                8
            </label>
            <label class="radio-inline" for="radiosPresentationJava-8">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-8" value="9">
                9
            </label>
            <label class="radio-inline" for="radiosPresentationJava-9">
                <input type="radio" name="radiosPresentationJava" id="radiosPresentationJava-9" value="10">
                10
            </label>
        </div>
    </div>

    <!-- Multiple Radios (inline) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="radiosPresentationWeb">Web Arcade*<br/>
            <small>(1 worst - 10 best)</small>
        </label>

        <div class="col-md-4">
            <label class="radio-inline" for="radiosPresentationWeb-0">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-0" value="1" required>
                1
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-1">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-1" value="2">
                2
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-2">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-2" value="3">
                3
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-3">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-3" value="4">
                4
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-4">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-4" value="5">
                5
            </label>
            <br/>
            <label class="radio-inline" for="radiosPresentationWeb-5">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-5" value="6">
                6
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-6">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-6" value="7">
                7
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-7">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-7" value="8">
                8
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-8">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-8" value="9">
                9
            </label>
            <label class="radio-inline" for="radiosPresentationWeb-9">
                <input type="radio" name="radiosPresentationWeb" id="radiosPresentationWeb-9" value="10">
                10
            </label>
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="textareaPresentationComments">Comments &amp; Suggestions</label>

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
            <button id="singlebuttonSubmit" class="btn btn-primary btn-block btn-lg" type="submit">
                Submit</span></button>
        </div>

    </div>

    </fieldset>
    </form>


    <div id="submissionmessage"></div>

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
            $("#form").submit(function(e)
            {
                var postData = $(this).serializeArray();
                var formURL = $(this).attr("action");

                var $resultDiv = $('#submissionmessage');
                $resultDiv.fadeOut('slow');

                $.ajax(
                    {
                        url : formURL,
                        type: "POST",
                        data : postData,
                        success:function(result)
                        {
                            $resultDiv.html(result);
                            $resultDiv.fadeIn('slow');
                        },
                        error: function(xhr, status, error)
                        {
                            $resultDiv.html("<h1>error: " + xhr.status + " " + xhr.statusText + "</h1><p>Please try again. If the problem is recurring, email usmaanmahmood@hotmail.com</p>");
                            $resultDiv.fadeIn('slow');
                            $submitbutton.button('reset');
                        }
                    });
                e.preventDefault(); //STOP default action
                e.unbind(); //unbind. to stop multiple form submit.
            });


        // } document ready in template end

<?php include("template-end.php"); ?>