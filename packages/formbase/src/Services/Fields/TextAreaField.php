<?php


namespace Saodat\FormBase\Services\Fields;

use Saodat\FormBase\Services\Fields\Contracts\GetPlaceholder;

/**
 * Class TextAreaField
 * @package Saodat\FormBase\Services\Fields
 */
class TextAreaField extends AbstractField implements GetPlaceholder
{
    /**
     * @var string
     */
    protected $component = 'textarea';

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
    ];

    /**
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
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
