<?php


namespace Saodat\FormBase\Services\Fields;


use Illuminate\Support\Arr;

class SelectField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'select';

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
        'validationRule',
    ];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }


    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['options'] = $this->options;

        return $fieldSchema;
    }
}
