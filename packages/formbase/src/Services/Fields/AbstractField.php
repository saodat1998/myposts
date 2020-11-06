<?php

namespace Saodat\FormBase\Services\Fields;

use Illuminate\Support\Arr;

/**
 * Class AbstractField
 * @package Saodat\FormBase\Services\Fields
 */
abstract class AbstractField
{
    /**
     * @var
     */
    protected $component;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var null
     */
    protected $value;

    /**
     * @var string
     */
    protected $validationRule;

    /**
     * Default properties
     *
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
     * @param array $params
     * @return $this
     */
    public function addParams($params = [])
    {
        foreach ($this->properties as $key => $property) {
            $this->{$property} = Arr::get($params, $key);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getComponent()
    {
        return $this->component;
    }

    /**
     * @return mixed|string
     */
    public function getValidationRule()
    {
        return $this->validationRule;
    }

    /**
     * @param mixed|string $validationRule
     */
    public function setValidationRule($validationRule): void
    {
        $this->validationRule = $validationRule;
    }

    public function getCommonFields(): array
    {
        $fieldSchema['component'] = $this->component;
        $fieldSchema['name'] = $this->name;
        $fieldSchema['label'] = $this->label;
        $fieldSchema['value'] = $this->value;
        $fieldSchema['validationRule'] = $this->validationRule;
        $fieldSchema['attributes'] = $this->attributes;

        return $fieldSchema;
    }

    abstract public function getFieldSchema(): array;
}

