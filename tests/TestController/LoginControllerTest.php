<?php

namespace tests\TestController;

use App\Models\User;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tests\TestController;
class LoginController extends TestCase
{
    public function testLogin(){
        $plainPassword = '123456';
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make($plainPassword)

        ]);
        $response = $this->post('/admin/users/login', ['email'=> $user->email, 'password'=>$plainPassword]);
        $response-> assertRedirect('/admin/main');
        $response->assertStatus(302);
    }
}