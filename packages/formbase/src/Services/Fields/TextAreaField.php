<?php


namespace Saodat\FormBase\Services\Fields;

/**
 * Class TextAreaField
 * @package Saodat\FormBase\Services\Fields
 */
class TextAreaField extends AbstractField
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
     * TextAreaField constructor.
     * @param string $name
     * @param string $label
     * @param null $value
     * @param string $validationRule
     * @param string $placeholder
     */
    public function __construct(string $name, string $label = '', $value = null,  $validationRule = '', string $placeholder = '')
    {
        $this->placeholder = $placeholder;

        parent::__construct( $name,  $label, $value, $validationRule);
    }

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
