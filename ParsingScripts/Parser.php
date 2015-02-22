<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 13:56
 */

abstract class Parser
{
    abstract protected function parse($inString);
}

include("ProfileParser.php");
include("RegistrationDetailsParser.php");
include("MarksTableParser.php");
include("IrregularitiesExcusesExpectedParser.php");
include("AttendanceSummaryParser.php");
//include("FullStoryParser.php");

// can add the database name parsing in here
// and also module name parsing too
// perhaps student name parsing

?>
