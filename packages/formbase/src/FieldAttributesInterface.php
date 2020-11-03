<?php


namespace Saodat\FormBase;


interface FieldAttributesInterface
{
    public function setAttributes(array $array);

    public function getSingleAttribute(string $key);

    public function getAllAttributes();
}
