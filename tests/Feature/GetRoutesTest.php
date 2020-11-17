<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetRoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testEnsureHomeRouteWorksTest()
    {
        // ensures all get routes are working
        $homepagetest = $this->get('/');
        $homepagetest->assertStatus(200);
        $homepagetest->assertSee('Tasks Manager App Homepage');    
    }

    // public function testTasksIndexPageShows(Type $var = null)
    // {
    //     # code...
    // }


}
