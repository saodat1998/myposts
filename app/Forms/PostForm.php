<?php
namespace App\Forms;

use Saodat\FormBase\Services\Contracts\FieldManager;

class PostForm
{

    /**
     * @var FieldManager
     */
    protected $fieldManager;

    /**
     * PostForm constructor.
     * @param FieldManager $fieldManager
     */
    public function __construct(FieldManager $fieldManager)
    {
        $this->fieldManager = $fieldManager;
    }

    /**
     * @return array
     */
    public function buildForm()
    {
        /**
         * addField(type, name, label, options, validationRule, value, placeholder)
         */
        $options = [1 => 'a', 2 => 'b', 3 => 'c'];
        $attributes = ['dense'=>true, "cols"=>'6', 'class'=> 'my-class'];
        return $this->fieldManager
            ->addField('select', 'name', 'select-label', $options)
            ->setAttributes($attributes)
            ->getOne();
    }
}
