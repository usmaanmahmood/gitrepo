<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 17/11/14
 * Time: 11:07
 */
class RegistrationDetailsParser // extends Parser
{

    public $sampleinString = "===============================================================================
Database 12-13-2X

One matching student

Student id:	155
Reg. status:	R
Reg. number:	7690400
Degree:		CSwIE
Year:		2
Owner:		admin2
Lab Group:	SH
Tutorial Group:	X6
Tutor:		KEC
Preferred Name:	Mahmood,Usmaan_Ali
DB Surname:	Mahmood
DB First names:	Usmaan_Ali
Email name:	mahmoou1
Modules:	 21111 22712 23111 23420 25111 25212 26120 27112 28112 28411

===============================================================================
Database 12-13-2

One matching student

Student id:	155
Reg. status:	R
Reg. number:	7690400
Degree:		CSwIE
Year:		2
Owner:		admin2
Lab Group:	-/21111E=J,22712L=I,23111E=K,23111L=F,23421L=I,23421W=I,23422L=F,25111L=G,25212L=G,26121L=H,26122L=H,27112L=H,28112L=I,28411L=F,28411W=J,Tut1=X6,Tut2=X6
Tutorial Group:	X6
Tutor:		KEC
Preferred Name:	Mahmood,Usmaan_Ali
DB Surname:	Mahmood
DB First names:	Usmaan_Ali
Email name:	mahmoou1
Modules:	 21111 22712 23111 23420 25111 25212 26120 27112 28112 28411

===============================================================================
Database 11-12-1X

One matching student

Student id:	133
Reg. status:	R
Reg. number:	7690400
Degree:		CSwIE
Year:		1
Owner:		admin1
Lab Group:	SH
Tutorial Group:	X6
Tutor:		KEC
Preferred Name:	Mahmood,Usmaan_Ali
DB Surname:	Mahmood
DB First names:	Usmaan_Ali
Email name:	mahmoou1
Modules:	 10120 11120 11212 12111 14112 15111 16121 16212 18112 SH

===============================================================================
Database 11-12-1

One matching student

Student id:	133
Reg. status:	R
Reg. number:	7690400
Degree:		CSwIE
Year:		1
Owner:		admin1
Lab Group:	X/101s1P=X6,101s2P=X6,IntroW=sLQ,PASS1=PS3,PASS2=PS6,Tut1=X6,Tut2=X6
Tutorial Group:	X6
Tutor:		KEC
Preferred Name:	Mahmood,Usmaan_Ali
DB Surname:	Mahmood
DB First names:	Usmaan_Ali
Email name:	mahmoou1
Modules:	 10120 11120 11212 12111 14112 15111 16121 16212 18112


===============================================================================
End of query results";

    public function parse($inString)
    {
        $linesArray = preg_split("===============================================================================\n", $inString);

        return var_dump($linesArray);
    }

}


$parser = new RegistrationDetailsParser();
$result = $parser->parse($parser->sampleinString);
echo $result;