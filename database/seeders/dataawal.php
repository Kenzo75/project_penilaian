<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dataawal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = new User();
        $guru->name = 'Guru';
        $guru->email = 'guru@gmail.com';
        $guru->password = bcrypt('guru123456');
        $guru->peran = 'guru';
        $guru->save();
    }
}
