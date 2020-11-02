<?php


namespace Saodat\FormBase\Fields;

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
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['placeholder'] = $this->placeholder;

        return $fieldSchema;
    }

}
