<?php


namespace Saodat\FormBase\Services\Fields;

use Saodat\FormBase\Services\Fields\Contracts\GetOptions;

/**
 * Class RadioField
 * @package Saodat\FormBase\Services\Fields
 */
class RadioField extends AbstractField implements GetOptions
{
    /**
     * @var string
     */
    protected $component = 'radio';

    /**
     * @var array
     */
    protected $options;


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
