<?php

namespace Forms\Element;

class TextElement extends  BaseElement {



    /**
     * TextElement constructor.
     */
    public function __construct($name)
    {
        parent::__construct(\Forms\Element\BaseElement::INPUT_TYPE_TEXT, $name);

        return $this;

    }
}