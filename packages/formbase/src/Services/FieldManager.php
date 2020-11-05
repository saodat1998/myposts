<?php
namespace Saodat\FormBase\Services;

use Saodat\FormBase\Services\Contracts\FieldManager as FieldManagerContracts;

///Todo dependency injection PHP
/// Todo service container
/// Todo service providers
///
///
/// Todo Логика Attributes
/// Todo Внедрить класс Attributes в класс AbstractField
/// Todo доработать метод addField

/**
 * Class FieldManager
 * @package Saodat\FormBase
 */
class FieldManager extends FormBase implements FieldManagerContracts
{

    /**
     * @var
     */
    protected $field;

    /**
     * @param array $attributes
     * @return mixed|FormBase
     */
    public function setAttributes($attributes = [])
    {
        return parent::setAttributes($attributes);
    }
}
