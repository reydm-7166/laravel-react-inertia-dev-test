<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Post extends Model
{

    protected $fillable = [
        'UUID',
        'user_id',
        'slug',
        'title',
        'content',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Eager load the posts along with key user details and format the created_at timestamp to a human-readable format.
     * 
     * @return Collection
     */
    public function getPosts(): Collection  
    {
        return self::with('user')->latest()->get()->map(function ($post): array {
            return [
                'id' => $post->id,
                'UUID' => $post->UUID,
                'slug' => $post->slug,
                'title' => $post->title,
                'description' => $post->description,
                'created_at' => $post->created_at->diffForHumans(),
                'user' => [
                    'id' => $post->user->id,
                    'name' => $post->user->name,
                    'username' => $post->user->username,
                ],
            ];
        });
    }

    /**
     * Eager load the POST along with key user details and format the created_at timestamp to a human-readable format.
     * 
     * @return array
     */
    public function getPost(string $slug): array  
    {
        $post = self::with('user')
            ->where('slug', $slug)
            ->latest()
            ->firstOrFail();

        return [
            'id' => $post->id,
            'UUID' => $post->UUID,
            'slug' => $post->slug,
            'title' => $post->title,
            'description' => $post->description,
            'created_at' => $post->created_at->diffForHumans(),
            'name' => $post->user->name,
            'username' => $post->user->username,
        ];
    }
}
