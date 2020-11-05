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
     * @var array
     */
    protected $properties = [
        'name',
        'label',
        'options',
        'value',
        'validationRule',
    ];

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
