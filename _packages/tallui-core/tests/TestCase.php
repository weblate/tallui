<?php

namespace Usetall\TalluiCore\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Usetall\\TalluiCore\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    public function getEnvironmentSetUp($app)
    {

        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_tallui_core_table.php.stub';
        $migration->up();
    }
}
