<?php


namespace Saodat\FormBase\Fields;


class FileField extends AbstractField
{
    protected $component = 'file';
    protected $placeholder;

    /**
     * CheckboxField constructor.
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param null $value
     * @param string $validationRule
     */
    public function __construct(string $name, string $label, $placeholder = "", $validationRule = '', $value = null)
    {
        $this->placeholder = $placeholder;
        parent::__construct($name, $label, $value, $validationRule);
    }


    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['placeholder'] = $this->placeholder;

        return $fieldSchema;
    }
}
