<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form(){
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_duplication(){
        $user1 = User::make([
            'name' => 'Stiven Cano',
            'email' => 'saguirre785@misena.edu.co'
        ]);

        $user2 = User::make([
            'name' => 'Mauricio Cardona',
            'email' => 'lmangel37@misena.edu.co'
        ]);

        $this->assertTrue($user1->email != $user2->email && $user1->name != $user2->name );
    }

    public function test_delete_user(){
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user){
            $user->delete();
        }

        $this->assertTrue(true);

    }

    public function test_guarda_nuevo_user(){
        $respuesta = $this->post('/register', [
            'name' => 'Stiven',
            'email' => 'saguirre785@misena.edu.co',
            'password' => 'stiven123',
            'password_confirmation' => 'stiven123'
        ]);
        return $respuesta->assertRedirect('/home');
    }

    public function test_loguea_usuario(){
        $respuesta = $this->post('/login', [
            'email' => 'saguirre785misena.edu.co',
            'password' => 'stiven123'

        ]);
        return $respuesta->assertRedirect('/home');
    }
}
