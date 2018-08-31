<?php

namespace Forms\Element;

class SelectElement {

    protected $inputStringFinal;

    /**
     * TextElement constructor.
     */
    public function __construct($name)
    {
        $this->inputStringFinal = "<select name='" . $name . "'>";

        return $this;
    }

    public function addOption($value, $name, $selected = false)
    {
        $this->inputStringFinal .= "<option ";
        if ($selected) {
            $this->inputStringFinal .= "selected='selected' ";
        }
        $this->inputStringFinal .= "value='" . $value . "'>" . $name . "</option>";
    }

    public function completeElement()
    {
        echo $this->inputStringFinal . "</select> <br><br>";
    }



}