<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 14/11/14
 * Time: 14:34
 */

include("Result.php");
include("Filter.php");

class ProfileResult extends Result
{
    public $commandList;
    public $filterList;

    public function __construct()
    {
        $this->commandList = array();
        $this->filterList = array();
    }

    public function addCommand(String $inCommand) {
        array_push($this->commandList, $inCommand);
    }

    public function addFilter(Filter $inFilter) {
        array_push($this->filterList, $inFilter);
    }
}