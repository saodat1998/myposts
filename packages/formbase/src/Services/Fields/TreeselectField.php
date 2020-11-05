<?php


namespace Saodat\FormBase\Services\Fields;


class TreeselectField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'treeselect';

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
        'validationRule',
        'placeholder',
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
