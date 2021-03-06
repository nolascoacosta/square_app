<?php

use Illuminate\Database\Seeder;
use App\Services\GenerateUserName;
class UsersSeeder extends Seeder
{

    /**
     * A helper to generate userNames .
     *
     * @var GenerateUserName
     */
    protected $generateUserName;
    public function __construct(GenerateUserName $generateUserName)
    {
        $this->generateUserName = $generateUserName;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'first_name'        => 'Square',
            'last_name'         => 'One',
            'email'             => 'squareone@squareone.com',
            'user_name'         => $this->generateUserName->generateUserName('Square','One'),
            'email_verified_at' => now(),
            'password'          => '123456789', // password
            'remember_token'    => \Illuminate\Support\Str::random(10),
            'is_admin'          => true
        ]);
    }
}
