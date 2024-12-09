<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'content','summary', 'author_id', 'published_at', 'status', 'category_id', 'image_url', 'tags', 'views', 'is_featured', 'attachment_url', 'event_date', 'location'];
}
