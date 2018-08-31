<?php

namespace Forms\Element;

class SubmitElement extends BaseElement {

    /**
     * PasswordElement constructor.
     */
    public function __construct($name)
    {
        parent::__construct(BaseElement::SUBMIT, $name);

        return $this;
    }

}