<?php
namespace Saodat\FormBase\Services\Fields;

/**
 * Class CheckboxField
 * @package Saodat\FormBase\Services\Fields
 */
class CheckboxField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'checkbox';

    /**
     * @var
     */
    protected $options;

    /**
     * @var array
     */
    protected $properties = [
        'name',
        'label',
        'options',
        'value'
    ];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return array
     */
    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['options'] = $this->options;

        return $fieldSchema;
    }
}
