<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory()
            ->times(100)
            ->create();
    }
}
