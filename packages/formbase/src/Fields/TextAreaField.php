<?php


namespace Saodat\FormBase\Fields;

// required|email|min

class TextAreaField extends AbstractField
{

    protected $component = 'textarea';
    protected $placeholder;

    public function __construct(string $name, string $label = '', $value = null,  $validationRule = '', string $placeholder = '')
    {
        $this->placeholder = $placeholder;

        parent::__construct( $name,  $label, $value, $validationRule);
    }

    /**
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    public function getFieldSchema(): array
    {
        $fieldSchema = [];
        $fieldSchema['component'] = $this->component;
        $fieldSchema['type'] = $this->type;
        $fieldSchema['name'] = $this->name;
        $fieldSchema['label'] = $this->label;
        $fieldSchema['placeholder'] = $this->placeholder;
        $fieldSchema['value'] = $this->value;

        return $fieldSchema;
    }

}
