<br /><a href="querylist.php">profile</a>
<br /><a href="Welcome-and-help.php">Welcome and help</a>
<br /><a href="If-the-data-is-wrong.php">If the data is wrong</a>
<br /><a href="registration-details.php">registration-details</a>
<br /><a href="registration-details--with-lab-groups.php">registration-details: with lab groups</a>
<br /><a href="display-picture.php">display-picture</a>
<br /><a href="time-table--remaining.php">time-table: remaining</a>
<br /><a href="time-table--full.php">time-table: full</a>
<br /><a href="attendance-summary.php">attendance-summary</a>
<br /><a href="marks-table--all.php">marks-table: all</a>
<br /><a href="marks-table--fails-only.php">marks-table: fails only</a>
<br /><a href="expected.php">expected</a>
<br /><a href="excuses.php">excuses</a>
<br /><a href="irregularities.php">irregularities</a>
<br /><a href="failure-predictions.php">failure-predictions</a>
<br /><a href="full-story--with-notes.php">full-story: with notes</a>
<br /><a href="full-story--without-notes.php">full-story: without notes</a>
<br /><a href="full-story--chronological.php">full-story: chronological</a>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $( "#submit" ).click(function(){
        $command = $( "#CommandList option:selected" ).text()
    alert($command);
        $.ajax ({
            url: 'runQuery.php',
            data: { "command": $command},
            type: 'get',
            success: function(result)
            {
                $('#resultspane').html(result);
            }
        });
    });

</script>
  </body>
</html>

