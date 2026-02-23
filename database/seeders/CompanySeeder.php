<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\User;
use App\Models\Ship;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company1 = Company::create([
            'name' => 'Oceanic Fleet Ltd',
            'status' => 1,
            'created_at' => now()
        ]);

        $company2 = Company::create([
            'name' => 'Marine Logistics Corp',
            'status' => 1,
            'created_at' => now()
        ]);

        $user1 = User::create([
            'company_id' => $company1->id,
            'name' => 'John Manager',
            'email' => 'john@oceanic.com',
            'password' => Hash::make('password1234'),
            'status' => 1,
            'created_at' => now()
        ]);

        $user2 = User::create([
            'company_id' => $company2->id,
            'name' => 'Mike Captain',
            'email' => 'mike@marine.com',
            'password' => Hash::make('password1234'),
            'status' => 1,
            'created_at' => now()
        ]);

        Ship::create([
            'company_id' => $company1->id,
            'name' => 'Sea Queen',
            'imo_number' => 'IMO1234567',
            'status' => 1,
            'created_at' => now()
        ]);

        Ship::create([
            'company_id' => $company1->id,
            'name' => 'Blue Horizon',
            'imo_number' => 'IMO1234568',
            'status' => 1,
            'created_at' => now()
        ]);

        Ship::create([
            'company_id' => $company2->id,
            'name' => 'Ocean King',
            'imo_number' => 'IMO7654321',
            'status' => 1,
            'created_at' => now()
        ]);
    }
}
