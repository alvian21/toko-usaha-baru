<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Employee::create([
            'nama' => 'admin',
            'jenis_kelamin' => 'L',
            'alamat' => 'surabaya',
            'umur' => '20',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'role' => 'admin'
       ]);
    }
}
