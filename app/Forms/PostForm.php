<?php namespace App\Forms;

use Saodat\FormBase\FormBase;

class PostForm extends FormBase
{

    public function buildForm()
    {
        $options = [1 => 'a', 2 => 'b', 3 => 'c'];

        return $this
            ->add('checkbox', 'name', $options)
            ->add('select', 'select', $options)
            ->add('text', 'name', 'label')
            ->add('textarea', 'description', 'Desc');

    }
}
