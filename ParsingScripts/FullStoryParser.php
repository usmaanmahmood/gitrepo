<?php

$sampleFullStoryString = "===============================================================================
Database 12-13-2

    ARCADE Laboratory Details for Abedin,Shaaz
           -----------------------------------

This summary is for:
         21111C 21111E 23111E 23111L 22712L
(where taken)

There is one page for each module, each containing the SESSION DETAILS table,
and the corresponding entry in the MODULE TABLE.

SESSION DETAILS: Explanatory notes
----------------------------------
The SESSION DETAILS contain a row for each lab session, each with several
columns. If column data does not fit, it appears on the line(s) below.

The columns are:

        Session : the name, date, extension date and excuse expiry date.
        Attend  : student's Attendance record for the session.
        C.B.D.  : whether student Completed by deadline.
        Ext     : whether student got an Extension.
        C.B.E.  : whether student Completed By the Extension.
        Date    : the Date student did complete by.
        Mark    : the Mark student got.


MODULE TABLE: Explanatory notes
-------------------------------
A MODULE TABLE has a column for each exercise, a Total, then a Marked Total
column. The rows give the weightings of the exercises, the denominator for the
marks (which is often the maximum mark), and the student's marks.

Total column: this is student's actual weighted average mark as a percentage,
and scaled by the given scaling factor. It contains some prediction if student
has any work unmarked or expected. Once above 40% (after scaling) it has had
all late work truncated from it.

Marked Total column: this ignores late flags, expected work and unmarked work,
but it is still scaled. Thus, once all the work is marked and nothing is still
expected, it is the total student would have got if there was no late work.

Note that the scaling factor may be either current or final. The total mark
is only fixed if the scaling factor is final.

There is also a table entry for each sub-module, if any.

===============================================================================
Abedin,Shaaz (abedins1)
        Group -/21111E=K,22712L=I,23111E=K,23111L=F,23421L=G,23421W=G,23422L=F,24111L=H,24412L=G,25111L=G,25212L=I,26121L=H,26122L=H,27112L=G,Tut1=X6,Tut2=X6
Summary for module 21111C


21111C SESSION DETAILS
----------------------
 |    Session (& dates)   | Attend| C.B.D.| Ext   | C.B.E.| Date  | Mark  |
-------------------------------------------------------------------------------
Ex1D 4/10>11/10>18/10     | N     | /     | -     | /     | -     | 20    |
Ex2D 11/10>18/10>25/10    | N     | /     | -     | /     | -     | 20    |
Ex3D 18/10>25/10>8/11     | N     | /     | -     | /     | -     | 17    |
Ex4D 25/10>8/11>15/11     | N     | /     | -     | /     | -     | 19    |
Ex5D 8/11>15/11>22/11     | N     | /     | -     | /     | -     | 20    |
Ex6D 15/11>22/11>29/11    | N     | /     | -     | /     | -     | 17    |
Ex7D 22/11>29/11>6/12     | N     | /     | -     | /     | -     | 19    |
Ex8D 29/11>6/12>13/12     | N     | /     | -     | /     | -     | 16    |
Ex9D 6/12>13/12>14/12     | N     | /     | -     | /     | -     | 16    |
Ex10D 13/12>14/12>none    | N     | /     | -     | /     | -     | 9     |

Attend  :  N       = no attendance was necessary or attendance not taken
C.B.D.  :  /       = did complete by deadline
Ext     :  -       = either no deadline, or completed by deadline
C.B.E.  :  /       = did complete by extension
Date    :  -       = either no deadline, or completed by extension
Mark    :  A real number           = mark


21111C MODULE TABLE ENTRY
-------------------------
21111C No module scaling factor applied

------------------------------------------------------------------------------------------------
      Component     |Ex1D |Ex2D |Ex3D |Ex4D |Ex5D |Ex6D |Ex7D |Ex8D |Ex9D |Ex10D|Total   |Marked
------------------------------------------------------------------------------------------------
      Weighting     |1    |1    |1    |1    |1    |1    |1    |1    |1    |1    |10      |
------------------------------------------------------------------------------------------------
      Denominator   |20   |20   |20   |20   |20   |20   |20   |20   |20   |20   |%       |%
------------------------------------------------------------------------------------------------
abedins1 Abedin,Shaa|20   |20   |17   |19   |20   |17   |19   |16   |16   |9    |86.5    |86.5

===============================================================================
Abedin,Shaaz (abedins1)
        Group -/21111E=K,22712L=I,23111E=K,23111L=F,23421L=G,23421W=G,23422L=F,24111L=H,24412L=G,25111L=G,25212L=I,26121L=H,26122L=H,27112L=G,Tut1=X6,Tut2=X6
Summary for module 21111E


21111E SESSION DETAILS
----------------------
 |    Session (& dates)   | Attend| C.B.D.| Ext   | C.B.E.| Date  | Mark  |
-------------------------------------------------------------------------------
Ex1 8/10                  | N     | -     | -     | -     | -     | -     |
Ex2 15/10                 | N     | -     | -     | -     | -     | -     |
Ex3 22/10                 | N     | -     | -     | -     | -     | -     |
Ex4 5/11                  | N     | -     | -     | -     | -     | -     |
Ex5 12/11                 | N     | -     | -     | -     | -     | -     |
Ex6 19/11                 | N     | -     | -     | -     | -     | -     |
Ex7 26/11                 | N     | -     | -     | -     | -     | -     |
Ex8 3/12                  | N     | -     | -     | -     | -     | -     |
Ex9 10/12                 | N     | -     | -     | -     | -     | -     |

Attend  :  N       = no attendance was necessary or attendance not taken
C.B.D.  :  -       = there was no deadline for that session
Ext     :  -       = either no deadline, or completed by deadline
C.B.E.  :  -       = there was no deadline
Date    :  -       = either no deadline, or completed by extension
Mark    :  -       = either no deadline, or work not done


===============================================================================
Abedin,Shaaz (abedins1)
        Group -/21111E=K,22712L=I,23111E=K,23111L=F,23421L=G,23421W=G,23422L=F,24111L=H,24412L=G,25111L=G,25212L=I,26121L=H,26122L=H,27112L=G,Tut1=X6,Tut2=X6
Summary for module 23111E


23111E SESSION DETAILS
----------------------
 |    Session (& dates)   | Attend| C.B.D.| Ext   | C.B.E.| Date  | Mark  |
-------------------------------------------------------------------------------
Ex1 5/10                  | x     | -     | -     | -     | -     | -     |
Ex2 19/10                 | x     | -     | -     | -     | -     | -     |
Ex3 9/11                  | x     | -     | -     | -     | -     | -     |
Ex4 23/11                 | x     | -     | -     | -     | -     | -     |
Ex5 7/12                  | x     | -     | -     | -     | -     | -     |

Attend  :  x       = absent without excuse
C.B.D.  :  -       = there was no deadline for that session
Ext     :  -       = either no deadline, or completed by deadline
C.B.E.  :  -       = there was no deadline
Date    :  -       = either no deadline, or completed by extension
Mark    :  -       = either no deadline, or work not done


===============================================================================
Abedin,Shaaz (abedins1)
        Group -/21111E=K,22712L=I,23111E=K,23111L=F,23421L=G,23421W=G,23422L=F,24111L=H,24412L=G,25111L=G,25212L=I,26121L=H,26122L=H,27112L=G,Tut1=X6,Tut2=X6
Summary for module 23111L


23111L SESSION DETAILS
----------------------
 |    Session (& dates)   | Attend| C.B.D.| Ext   | C.B.E.| Date  | Mark  |
-------------------------------------------------------------------------------
1 12/10                   | /     | -     | -     | -     | -     | -     |
1D 19/10>26/10>9/11       | N     | /     | -     | /     | -     | 16    |
 |   Submitted: on 18/10/12 at 17:44
2 26/10                   | x     | -     | -     | -     | -     | -     |
2D 9/11>16/11>23/11       | N     | /     | -     | /     | -     | 19    |
 |   Submitted: on 08/11/12 at 21:37
3 16/11                   | x     | -     | -     | -     | -     | -     |
3D 23/11>30/11>7/12       | N     | /     | -     | /     | -     | 4     |
 |   Submitted: on 23/11/12 at 16:16
4 30/11                   | x     | -     | -     | -     | -     | -     |
4D 7/12>14/12>21/12       | N     | x     | x     | x     | X     | -     | L
5 14/12                   | x     | -     | -     | -     | -     | -     |
5D 21/12>1/2>none         | N     | x     | x     | x     | X     | -     | L

Attend  :  /       = attended
           x       = absent without excuse
           N       = no attendance was necessary or attendance not taken
C.B.D.  :  /       = did complete by deadline
           x       = did not complete by deadline
           -       = there was no deadline for that session
Ext     :  x       = should have got extension but did not, or none available
           -       = either no deadline, or completed by deadline
C.B.E.  :  /       = did complete by extension
           x       = should have completed by extension, but did not
           -       = there was no deadline
Date    :  -       = either no deadline, or completed by extension
           X       = has not done work
Mark    :  -       = either no deadline, or work not done
           A real number           = mark

Where there is an `L' after the Mark column, that work is flagged as late
because student did not get an extension, or missed it, or excuse ran out.

`Submitted: on  at ' moment of electronic submission.


23111L MODULE TABLE ENTRY
-------------------------
23111L Final dynamic scaling factor (range 60%-65%) is 0.83

------------------------------------------------------------------
      Component     |1D   |2D   |3D   |4D   |5D   |Total   |Marked
------------------------------------------------------------------
      Weighting     |1    |1    |1    |1    |1    |5       |
------------------------------------------------------------------
      Denominator   |20   |20   |20   |20   |20   |%       |%
------------------------------------------------------------------
abedins1 Abedin,Shaa|16   |19   |4    |-L   |-L   |32.4L   |32.4

  -       = student did not do it / missed demo.
  L       = work was or is late.

===============================================================================
Abedin,Shaaz (abedins1)
        Group -/21111E=K,22712L=I,23111E=K,23111L=F,23421L=G,23421W=G,23422L=F,24111L=H,24412L=G,25111L=G,25212L=I,26121L=H,26122L=H,27112L=G,Tut1=X6,Tut2=X6
Summary for module 22712L


22712L SESSION DETAILS
----------------------
 |    Session (& dates)   | Attend| C.B.D.| Ext   | C.B.E.| Date  | Mark  |
-------------------------------------------------------------------------------
1 28/1                    | /     | -     | -     | -     | -     | -     |
12 30/1                   | /     | -     | -     | -     | -     | -     |
2 4/2                     | /     | -     | -     | -     | -     | -     |
13 6/2                    | /     | -     | -     | -     | -     | -     |
3 11/2                    | /     | -     | -     | -     | -     | -     |
14D 13/2>18/2>20/2        | E-att | /     | -     | /     | -     | 16    |
 |      Attend = E-attendance-optional
4 18/2                    | /     | -     | -     | -     | -     | -     |
15 20/2                   | x     | -     | -     | -     | -     | -     |
5 25/2                    | x     | -     | -     | -     | -     | -     |
16D 27/2>4/3>6/3          | /     | x     | /     | x     | N     | 16    | L
6 4/3                     | x     | -     | -     | -     | -     | -     |
17 6/3                    | x     | -     | -     | -     | -     | -     |
7 11/3                    | x     | -     | -     | -     | -     | -     |
18 13/3                   | x     | -     | -     | -     | -     | -     |
8 18/3                    | x     | -     | -     | -     | -     | -     |
19 20/3                   | x     | -     | -     | -     | -     | -     |
9 15/4                    | x     | -     | -     | -     | -     | -     |
20 17/4                   | x     | -     | -     | -     | -     | -     |
10 22/4                   | x     | -     | -     | -     | -     | -     |
21 24/4                   | x     | -     | -     | -     | -     | -     |
11 29/4                   | x     | -     | -     | -     | -     | -     |
22 1/5                    | x     | -     | -     | -     | -     | -     |
Ex7D 3/5>3/5>10/5         | N     | x     | E     | x     | X     | -     | L
Ex9D 3/5>10/5>none        | N     | x     | E     | x     | X     | -     | L

Attend  :  /       = attended
           x       = absent without excuse
           E-blah  = excused for non-attendance
           N       = no attendance was necessary or attendance not taken
C.B.D.  :  /       = did complete by deadline
           x       = did not complete by deadline
           -       = there was no deadline for that session
Ext     :  /       = did get extension
           E-blah  = excused for not getting extension
           -       = either no deadline, or completed by deadline
C.B.E.  :  /       = did complete by extension
           x       = should have completed by extension, but did not
           -       = there was no deadline
Date    :  -       = either no deadline, or completed by extension
           N       = unknown date
           X       = has not done work
Mark    :  -       = either no deadline, or work not done
           A real number           = mark

Where there is an `L' after the Mark column, that work is flagged as late
because student did not get an extension, or missed it, or excuse ran out.


22712L MODULE TABLE ENTRY
-------------------------
22712L Final dynamic scaling factor (range 60%-65%) is 1.00

------------------------------------------------------------
      Component     |14D  |16D  |Ex7D |Ex9D |Total   |Marked
------------------------------------------------------------
      Weighting     |1    |1    |1    |1    |4       |
------------------------------------------------------------
      Denominator   |20   |20   |20   |20   |%       |%
------------------------------------------------------------
abedins1 Abedin,Shaa|16   |16L  |-L   |-L   |40L     |40

  -       = student did not do it / missed demo.
  L       = work was or is late.


===============================================================================
End of query results";

class FullStoryParser // extends Parser
{
    public function parse($inString)
    {
        $databaseStringArray = preg_split("/===============================================================================\nDatabase/", $inString,  null, PREG_SPLIT_NO_EMPTY);

        $result = new FullStoryResult();

//        foreach($databaseStringArray as $key => $database)
//            $result->addDatabase($this->parseDatabase($database));
        $result->addDatabase($this->parseDatabase($databaseStringArray[0]));

        return $result;

    }

    private function parseDatabase($inString)
    {
        $database = new FullStoryDatabase();

        // get the database name
        preg_match("/(?:\s+(\S+))/", $inString, $matches);
        $rawDbName = $matches[1];
        $database->setDatabaseName($rawDbName);
        preg_match("/(\d+)-(\d+)-(\d)(.*)/", $rawDbName, $rawDbNameMatches);
        $database->setDatabaseParsedName("20".$rawDbNameMatches[1]."/20".$rawDbNameMatches[2]." - Year ".$rawDbNameMatches[3]." - ".($rawDbNameMatches[4] == "X" ? ("Overall") : "Coursework Only"));


        $modulesSplit = preg_split("/===============================================================================\n/", $inString);
        array_shift($modulesSplit); // remove garbage info from before first module
        array_pop($modulesSplit); // remove end of queries line
//        var_dump($modulesSplit);

        // parse modules
        foreach ($modulesSplit as $moduleString)
        {
            preg_match("/\w+,\w+\s\(\w+\)\n\s+Group\s\-\/(\S+)\n.*?module\s(.*)\n\n\n.*\n.*\n.*\n.*\n((?:(?:.*)\n)*?)\n((?:(?:.*)\n)*)(?:.*)/", $moduleString, $match);
            array_shift($match); // remove first which is the whole thing
            $module = new FullStoryModule();
            $module->setModuleName($match[1]);
            $module->setRawSession($match[2]);
            $module->setSessionInfo($match[3]);

            // 0 = groups / module list - do i even need? don't think so!!!!!!!!!!!!!!!!!!!!!!!!
            // 1 = module name
            // 2 = sessions list raw
            // 3 = session info



            // need to parse session info based on number of pipes here
            // and add them to the session thing

            $database->addModule($module);
        }

        return $database;
    } // parseDatabase


}



// all below this line is temp for testing purposes only
//include("Result.php");

//$parser = new FullStoryParser();
//$result = $parser->parse($sampleFullStoryString);
//var_dump($result);