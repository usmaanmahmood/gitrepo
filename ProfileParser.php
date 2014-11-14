<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 14:25
 */

include("Parser.php");
include("ProfileResult.php");

class ProfileParser extends Parser {
    public function parse($inString)
    {
        $profileResult = new ProfileResult();

        $linesArray = explode(" ", $inString);

        // collect commands
        while($linesArray[0] != "++MODULESORTOORDER")
            if ($linesArray[0] == "++COMMAND\n")
            {
                array_shift($linesArray); // remove ++COMMAND line
                $profileResult->addCommand(array_shift($linesArray));
            }

        // remove ++modulesortoorder lines and their results
        $doneModuleSortOrder = false;
        while(!$doneModuleSortOrder)
            if ($linesArray[0] == "++MODULESORTTO\n")
            {
                array_shift($linesArray); // remove ++MODULESORTTO line
                array_shift($linesArray); // remove next line because it's garbage too
            }
            else
                $doneModuleSortOrder = true;

        // add rest of lines as they are Filters
        while ($currentLine = array_shift($linesArray[0]))
            $profileResult->addFilter(new Filter($currentLine));


        return $profileResult;
    }
}