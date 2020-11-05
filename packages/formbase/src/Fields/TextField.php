<?php

namespace Saodat\FormBase\Fields;


class TextField extends AbstractField
{
    protected $type;
    protected $component = 'text';
    protected $placeholder;

    protected $availableTypes = [
        'text',
        'email',
        'url',
        'tel',
        'search',
        'password',
        'hidden',
        'number',
        'color',
        'range',
        'time',
        'week'
    ];

    /**
     * TextField constructor.
     * @param string $type
     * @param string $name
     * @param string $label
     * @param array $attributes
     * @param null $value
     * @param string $validationRule
     * @param string $placeholder
     */
    public function __construct(string $type, string $name, string $label = "", $attributes = [], $value = null, $validationRule = '', $placeholder = "")
    {
        $this->validateType($type);
        $this->type = $type;

        $this->placeholder = $placeholder;

        parent::__construct($name, $label, $value, $attributes, $validationRule);
    }

    public function validateType($type): bool
    {
        if (!$type || trim($type) == '') {
            throw new \InvalidArgumentException('Field type must be provided.');
        }

        if (!in_array($type, $this->availableTypes)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported field type [%s]. Available types are: %s',
                    $type,
                    join(', ', $this->availableTypes)
                )
            );
        }
        return true;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['type'] = $this->type;
        $fieldSchema['placeholder'] = $this->placeholder;

        return $fieldSchema;
    }
}
