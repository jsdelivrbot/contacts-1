<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use App\Models\Contact;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
    }
    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param array $data
     * @return Contact
     */
    protected function createContact(array $data = []) : Contact
    {
        return $this->create($data, Contact::class);
    }

    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param array $data
     * @param $class
     * @return mixed
     */
    private function make(array $data = [], $class)
    {
        $instance = factory($class)->make($data);
        $instance->id = random_int(1, PHP_INT_MAX);
        return $instance;
    }

    /**
     * @author Musavengana Zirebwa <musaz01@gmail.com>
     * @param array $data
     * @param $class
     * @return mixed
     */
    private function create(array $data = [], $class)
    {
        return factory($class)->create($data);
    }
}
