<?php


namespace Saodat\FormBase\Fields;


abstract class AbstractField
{
    protected $component;
    protected $name;
    protected $label;
    protected $value;
    protected $validationRule;


    public function __construct(string $name, string $label, $value = null, $validationRule = "")
    {
        $this->name = $name;
        $this->label = $label;
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
        $fieldSchema['label'] = $this->label;
        $fieldSchema['name'] = $this->name;
        $fieldSchema['value'] = $this->value;
        $fieldSchema['validationRule'] = $this->validationRule;

        return $fieldSchema;
    }

    abstract public function getFieldSchema(): array;
}

