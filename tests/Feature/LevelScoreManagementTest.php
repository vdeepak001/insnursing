<?php

use App\Models\LevelScore;
use App\Models\User;

test('admin can view level score page with branded level cards', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);

    $response = $this->actingAs($admin)->get(route('admin.level-scores.index'));

    $response->assertSuccessful();
    $response->assertSee('Level Score Information', false);
    $response->assertSee('Factual Knowledge', false);
    $response->assertSee('Functional Knowledge', false);
    $response->assertSee('Critical Application', false);
});

test('admin can save level score from single page', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);

    $response = $this->actingAs($admin)->post(route('admin.level-scores.store'), [
        'level_1' => 10,
        'level_2' => 20,
        'level_3' => 30,
    ]);

    $response->assertRedirect(route('admin.level-scores.index'));

    $this->assertDatabaseHas('level_scores', [
        'level_1' => 10,
        'level_2' => 20,
        'level_3' => 30,
    ]);
});

test('admin save action updates existing level score', function () {
    $admin = User::factory()->create(['role_type' => 'admin']);
    $levelScore = LevelScore::create([
        'level_1' => 1,
        'level_2' => 2,
        'level_3' => 3,
    ]);

    $updateResponse = $this->actingAs($admin)->post(route('admin.level-scores.store'), [
        'level_1' => 11,
        'level_2' => 22,
        'level_3' => 33,
    ]);

    $updateResponse->assertRedirect(route('admin.level-scores.index'));
    expect($levelScore->fresh()->level_1)->toBe(11);
    expect(LevelScore::count())->toBe(1);
});
