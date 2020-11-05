<?php

namespace Saodat\FormBase\Services\Fields;

/**
 * Class FileField
 * @package Saodat\FormBase\Services\Fields
 */
class FileField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'file';

    /**
     * @var string
     */
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

    /**
     * @return array
     */
    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();

        $fieldSchema['placeholder'] = $this->placeholder;

        return $fieldSchema;
    }
}
