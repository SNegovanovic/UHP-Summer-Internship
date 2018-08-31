<?php

namespace Forms\Element;

class BaseElement {

    const INPUT_TYPE_TEXT = 'text';
    const INPUT_TYPE_PASSWORD = 'password';
    const SUBMIT = 'submit';

    protected $inputStringFinal;

    private $placeholder;
    private $value;
    private $required;
    private $class;
    //....

    /**
     * BaseElement constructor.
     */
    public function __construct($type, $name)
    {
        $this->inputStringFinal = "<input type='". $type ."' name='". $name ."'";
        //$this->completeElement();
    }


    /**
     * @return mixed
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * @param mixed $placeholder
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function completeElement()
    {
        if ($this->getPlaceholder()) {
            $this->inputStringFinal .= " placeholder='" . $this->getPlaceholder() . "'";
        }

        if ($this->getValue()) {
            $this->inputStringFinal .= " value='" . $this->getValue() . "'";
        }

        $this->inputStringFinal .= " /> <br><br>";

        echo $this->inputStringFinal;
    }


}
