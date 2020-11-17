<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_a_task_can_be_created()
    {
        $response = $this->post('/task/create', [
            'name' => 'Example title',
            'description' => 'Example description for example title'
        ]);
        $response->assertOk();
        $this->assertCount(1, Task::all());
    }
}
