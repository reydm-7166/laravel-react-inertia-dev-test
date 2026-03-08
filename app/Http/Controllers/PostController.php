<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{

    /**
     * Get all of posts
     * 
     * @return Response
     */
    public function index(): Response 
    {
        $post = (new Post())->getPosts();
        return Inertia::render('posts/index', [
            'posts' => $post
        ]);
    }

    /**
     * Show the selected post
     * 
     * Summary of show
     * @param string $username
     * @param string $slug
     * @return Response
     */
    public function show(string $username, string $slug): Response
    {
        $post = (new Post())->getPost($slug);

        return Inertia::render('posts/show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form to create a new post
     * 
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('posts/create');
    }

    /**
     * Validate and save the post submitted by the user
     * 
     * Summary of store
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
        ]);

        Post::create([
            'UUID' => rand(100000, 999999),
            'user_id' => auth()->id(),
            'slug' => Str::slug($validated['title']),
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('post.index');
    }
}
