<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i<27; $i++){
            Contact::create([
                'name' => 'Ousman Camara',
                'email' => 'camaraousman99@gmail.com',
                'phone' => '+905370378559',
                'position' => 'Software Developer',
                'company' => 'Teta Elektronik',
                'user_id' => 1,
            ]);
        }
    }
}
