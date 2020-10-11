<?php

namespace TokenizedLogin\Tests;

use Tests\TestCase;

class TokenizedLoginTest extends TestCase
{
    /** @test */
    public function it_can_request_token()
    {
        $this->post(route('tokenized-login.request'))
            ->assertStatus(200);
    }
}
