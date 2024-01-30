<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('deletes a user', function () {
    $user = User::factory()->create();

    $response = $this->delete("/api/users/{$user->id}");

    $response->assertStatus(204);

    $this->assertEmpty(User::find($user->uuid));
});
