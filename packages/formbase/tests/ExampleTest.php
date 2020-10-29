<?php

namespace Saodat\FormBase\Fields\Tests;

use Orchestra\Testbench\TestCase;
use Saodat\FormBase\Fields\FormBaseServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [FormBaseServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
