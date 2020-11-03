<?php namespace App\Forms;

use Saodat\FormBase\FormBase;

class PostForm extends FormBase
{

    public function buildForm()
    {
        $options = [1 => 'a', 2 => 'b', 3 => 'c'];
        $attributes = ['dense'=>true];
        return $this
            ->add('checkbox', 'name', $options)
                ->setAttribute('class', '123')
            ->add('select', 'select', $options)
                ->setAttribute('class', '123')
            ->add('text', 'name', 'label')
                ->setAttribute('class', '123')
            ->add('textarea', 'description', 'Desc')
                ->setAttribute('class', '123');
    }
}
