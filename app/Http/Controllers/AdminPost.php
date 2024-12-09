<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPost
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index')->with('posts', $posts);
    }
    public function create()
    {
        return view('admin.post.create');

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => '',
            'content' => '',
            'summary' => '',
            'author_id' => '',
            'published_at' => '',
            'status' => '',
            'category_id'=> '',
            'image_url'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags'=> '',
            'views'=> '',
            'is_featured'=> '',
            'event_date'=> '',
            'location'=> '',
            'attachment_url'=> '',
        ]);

        $validated['is_featured'] = isset($request->is_featured) ? 1 : 0;
        $validated['author_id'] = 1;

        if ($request->file('image_url')) {
//            $fileName = time() . '.' . $request->image_url->extension();
//            $request->image_url->move(public_path('uploads'), $fileName);
            $fileName = $request->file('image_url')->store('uploads', 'public');
            $validated['image_url'] = $fileName;
        }



        $post = Post::create($validated);


        return redirect()->route('admin.post.index');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id); // Находим пост по ID
        return view('admin.post.edit', compact('post')); // Передаём пост в представление
    }
    public function update($id, Request $request){
        $validated = $request->validate([
            'title' => '',
            'content' => '',
            'summary' => '',
            'author_id' => '',
            'published_at' => '',
            'status' => '',
            'category_id'=> '',
            'image_url'=> '',
            'tags'=> '',
            'views'=> '',
            'is_featured'=> '',
            'event_date'=> '',
            'location'=> '',
            'attachment_url'=> '',
        ]);


        $post = Post::findOrFail($id);

        if ($request->hasFile('image_url') && $request->file('image_url')->isValid()) {

            // Удалить старое фото, если оно существует
            if ($post->image_url) {
                Storage::disk('public')->delete($post->image_url);
            }

            // Загрузить новое фото
            $filePath = $request->file('image_url')->store('uploads', 'public');
            $post->image_url = $filePath;
            $validated['image_url'] = $filePath;
//        dd($post->image_url);
        }
//        dd($validated);

        $post->update($validated); // Обновляем пост

        return redirect()->route('admin.post.index')->with('success', 'Пост обновлён.');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        try {
            $post->delete();
            return redirect()->route('admin.post.index')->with('success', 'Пост успешно удалён.');
        } catch (\Exception $e) {
            return redirect()->route('admin.post.index')->with('error', 'Ошибка при удалении поста.');
        }

    }
}
