<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class BlogsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A  feature test Display my Blogs Users.
     */
    public function test_MyBlogs_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/blogs/my-blog');

        $response->assertOk();
    }


    public function test_Blog_show(): void
    {
        $blog = Blog::factory()->create();

        $response = $this->get("blogs/".$blog->id);

        $response->assertStatus(200);
    }

    public function test_blog_view_blade()
    {
        $blog = Blog::factory()->create();

       $response = $this->get('blogs/'.$blog->id);

        $response->assertViewIs('themes.blog.single');

        $response->assertViewHas('blogs');
        $response->assertStatus(302);
        // $response->assertSessionHasErrors(['']);

        // $response->assertSee($blog->name);

    }

    public function  test_auth_my_blog()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/blogs/my-blog');

        $response->assertOk();
    }

    public function  test_example_event()
    {
        Event::fake();

        // Event::assertDispatched(CreateCategoryEvent::class , function ($e)  {
        //     $e->category->name === "";
        // });
    }

}