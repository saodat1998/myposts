<?php

// Todo readd about namespaces
namespace Saodat\FormBase\Fields;

//Todo end textfield class
class TextField extends AbstractField
{
    protected $type;
    protected $component = 'text';
    protected $placeholder;

    /**
     * TextField constructor.
     * @param string $type
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param null $value
     * @throws \Exception
     */
    public function __construct(string $type, string $name, string $label = "", $placeholder = "", $value = null)
    {
        if ($this->validateType($type)) {
            $this->type = $type;
        } else {
            // Todo read about exceptions
            throw new \Exception('Invalid text-field type');
        }

        $this->placeholder = $placeholder;

        parent::__construct($name, $label, $value);
    }

    public function validateType($type) : bool
    {
        /// validation type logic
        return true;
    }
    public function getType(){
        return $this->type;
    }

    public function getFieldSchema(): array
    {
        $fieldSchema = [];

        $fieldSchema['component'] = $this->component;
        $fieldSchema['type'] = $this->type;
        $fieldSchema['name'] = $this->name;
        $fieldSchema['label'] = $this->label;
        $fieldSchema['placeholder'] = $this->placeholder;
        $fieldSchema['value'] = $this->value;

        return $fieldSchema;
    }
}
