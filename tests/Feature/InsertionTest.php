<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class InsertionTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setup(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
    }
    public function test_that_a_task_can_be_added()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/task/create', [
            'name' => 'Write Article',
            'description' => 'Write and publish an article'
        ]);
        $response->assertStatus(200);
        $this->assertTrue(count(Task::all()) > 0);
    }
}
