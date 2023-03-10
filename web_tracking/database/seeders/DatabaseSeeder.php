<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\roleModel;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        roleModel::create([
            'nama_role' => 'Pekerja Lapangan'
        ]);

        roleModel::create([
            'nama_role' => 'Supervisor'
        ]);

        roleModel::create([
            'nama_role' => 'Admin'
        ]);

        User::create([
        'nama'      	=> "Mimin",
        'username'  	=> "mimin",
		'email'  		=> "mimin@gmail.com",
		'id_role_fk'	=> 3,
        'password'  	=> Hash::make("mimin")
      ]);
    }
}
