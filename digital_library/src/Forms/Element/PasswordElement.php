<?php

namespace Forms\Element;

class PasswordElement extends BaseElement {


    /**
     * PasswordElement constructor.
     */
    public function __construct($name)
    {
        parent::__construct(BaseElement::INPUT_TYPE_PASSWORD, $name);

        return $this;
    }
}