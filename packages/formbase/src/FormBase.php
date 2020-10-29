<?php

namespace Saodat\FormBase;


use Saodat\FormBase\Fields\TextAreaField;
use Saodat\FormBase\Fields\TextField;

class FormBase
{
    public $fields = [];

    public function buildForm()
    {
    }

    public function add($type, $name, $label)
    {
        try {
//            if ($type == 'textarea'){
//                $field = new TextAreaField($type, $name, $label);
//            } else {
                $field = new TextField($type, $name, $label);
//            }
            $this->fields[] = $field->getFieldSchema();

        } catch (\Exception $e) {

        }
        return $this;
    }
}
