<?php

namespace TokenizedLogin\Tests;

use App\User;
use Tests\TestCase;
use TokenizedLogin\Facades\TokenRepositoryFacade;
use TokenizedLogin\Facades\UserRepositoryFacade;

class TokenizedLoginTest extends TestCase
{
    /** @test */
    public function it_can_request_token()
    {
        User::unguard(); // In order to change 'id'
        $this->withoutExceptionHandling();
        $email = 'amirreza@hotmail.com';

        UserRepositoryFacade::shouldReceive('isBanned')
            ->once()
            ->with(1)
            ->andReturn(false);

        UserRepositoryFacade::shouldReceive('getUserByEmail')
            ->once()
            ->with($email)
            ->andReturn($user = new User(['id' => 1, 'email' => $email]));

        TokenRepositoryFacade::shouldReceive('generate')
            ->once()
            ->withNoArgs()
            ->andReturn('1234');

        TokenRepositoryFacade::shouldReceive('save')->once()->with('1234', $user->id);

        $this->post(route('tokenized-login.request'),[
            'email' => $email
        ])
            ->assertJson(['message' => 'Token was sent'])
            ->assertStatus(200);
    }

    /** @test */
    public function banned_users_can_not_request()
    {
        User::unguard();
        $email = 'amirreza@hotmail.com';

        UserRepositoryFacade::shouldReceive('getUserByEmail')
            ->once()
            ->with($email)
            ->andReturn($user = new User(['id' => 1, 'email' => $email]));

        UserRepositoryFacade::shouldReceive('isBanned')->once()->with(1)->andReturn(true);

        TokenRepositoryFacade::shouldReceive('generate')->never();

        TokenRepositoryFacade::shouldReceive('save')->never();

        $this->post(route('tokenized-login.request'),[
            'email' => $email
        ])->assertJson(['error' => 'You are banned']);
    }
}
