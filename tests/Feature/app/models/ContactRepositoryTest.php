<?php

namespace Tests\Feature\app\models;

use App\Models\Contact;
use App\Models\ContactRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class ContactRepositoryTest extends TestCase
{
    /**
     * @var ChecklistItemsRepository
     */
    private $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = new ContactRepository;
    }

    public function testItShould_createContact()
    {
        $faker = Faker::create();
        $input = [
            'first_name' => $faker->sentence,
            'last_name' => $faker->sentence,
            'email' => $faker->email,
            'telephone' => $faker->phoneNumber,
            'contact_type' => $faker->sentence,
        ];

        $contact = $this->repository->createContact($input)->fresh();

        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals($input['first_name'], $contact->first_name);
        $this->assertEquals($input['last_name'], $contact->last_name);
        $this->assertEquals($input['email'], $contact->email);
        $this->assertEquals($input['telephone'], $contact->telephone);
        $this->assertEquals($input['contact_type'], $contact->contact_type);
    }
    public function testItShould_findContactById()
    {
        $faker = Faker::create();
        $input = [
            'first_name' => $faker->sentence,
            'last_name' => $faker->sentence,
            'email' => $faker->email,
            'telephone' => $faker->phoneNumber,
            'contact_type' => $faker->sentence,
        ];

        $contact = $this->repository->createContact($input)->fresh();
        $this->assertEquals($contact->id, $this->repository->findById($contact->id)->id);
    }
    public function testItShould_deleteChecklistItem()
    {
        $faker = Faker::create();
        $input = [
            'first_name' => $faker->sentence,
            'last_name' => $faker->sentence,
            'email' => $faker->email,
            'telephone' => $faker->phoneNumber,
            'contact_type' => $faker->sentence,
        ];

        $contact = $this->repository->createContact($input)->fresh();
        $this->repository->deleteContact($contact->id);
        $this->assertNull($contact->fresh());
    }

}
