<?php


namespace Saodat\FormBase\Fields;


abstract class AbstractField
{
    protected $component;
    protected $name;
    protected $label;
    protected $attributes;
    protected $value;
    protected $validationRule;


    public function __construct(string $name, string $label, $value = null, $attributes = [], $validationRule = "")
    {
        $this->name = $name;
        $this->label = $label;
        $this->attributes = $attributes;
        $this->value = $value;
        $this->validationRule = $validationRule;
    }

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

