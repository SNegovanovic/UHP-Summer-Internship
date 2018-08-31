<?php
/**
 * Created by PhpStorm.
 * User: Vedran
 * Date: 7.8.2018.
 * Time: 1:21
 */

namespace Forms\Element;


class DatalistElement
{
    protected $inputStringFinal;

    /**
     * DatalistElement constructor.
     * @param $inputStringFinal
     */
    public function __construct($name, $id)
    {
        $this->inputStringFinal =   "<input list='" . $id ."' name='" . $name . "'>" .
                                    "<datalist id='" . $id ."'>";
    }
    public function addOption($value)
    {
        $this->inputStringFinal .= "<option value='" . $value . "'>";
    }

    public function completeElement()
    {
        echo $this->inputStringFinal . "</datalist><br><br>";
    }


}