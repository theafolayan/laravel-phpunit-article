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
    use DatabaseMigrations, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function setup(): void
    // {
    //     parent::setUp();
    //     // Artisan::call('migrate:refresh');
    // }
    public function test_that_a_task_can_be_added()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/tasks/create', [
            'name' => 'Write Article',
            'description' => 'Write and publish an article'
        ]);
        $response->assertStatus(201);
        $this->assertTrue(count(Task::all()) > 0);
    }

    public function test_that_a_task_can_be_completed()
    {
        $this->withoutExceptionHandling();
        $task_id = Task::create([
            'name' => 'Example Name',
            'description' => 'Demo dscription'

        ]);
        $response = $this->patch("api/tasks/.$task_id/complete");
        $this->assertTrue(Task::findOrFail($task_id)->completed === 1);
    }
}
