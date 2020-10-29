<?php

namespace Saodat\FormBase;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Saodat\FormBase\Fields\Skeleton\SkeletonClass
 */
class FormBaseFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'formbase';
    }
}
