<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'name' => 'Manage Module',
            'slug' => 'modules',
            'description' => 'Module for managing users, roles, and permissions.',
        ],);

        Module::create([
            'name' => 'Manage Course',
            'slug' => 'courses',
            'description' => 'Module for managing courses and content.',
        ]);
    }
}
