<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        // dd($posts);
        return view('admin.post.index', compact('posts')); 
    }





















    




    // public function index()
    // {
    //     $posts = Post::all();
    //     return view('post.index', compact('posts'));

    //     //$category = Category::find(1);
    //     ////$post = Post::find(1);
    //     ////$tag = Tag::find(1);
    //     //$posts = Post::where('category_id', $category->id)->get();
    //     ////dd($tag->posts);
    //     //dd($post->tags);
    // }

    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('post.create', compact('categories', 'tags'));
    // }

    // public function store()
    // {
    //     $data = request()->validate([
    //         'title' => 'string',
    //         'post_content' => 'string',
    //         'image' => 'string',
    //         'category_id' => '',
    //         'tags' => ''
    //     ]);
    //     $tags = $data['tags'];
    //     unset($data['tags']);

    //     $post = Post::create($data);

    //     $post->tags()->attach($tags);// = below
    //     // foreach ($tags as $tag){
    //     //     PostTag::firstOrCreate([
    //     //         'tag_id' => $tag,
    //     //         'post_id' => $post->id
    //     //     ]);
    //     return redirect()->route('post.index');
    // }

    // public function show(Post $post)
    // {
    //     //$post = Post::findOrFail($id); //= Post $post
    //     return view('post.show', compact('post'));
    // }

    // public function edit(Post $post)
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();
    //     return view('post.edit', compact('post', 'categories', 'tags'));
    // }

    // public function update(Post $post)
    // {
    //     $data = request()->validate([
    //         'title' => 'string',
    //         'post_content' => 'string',
    //         'image' => 'string',
    //         'category_id' => '',
    //         'tags' => ''
    //     ]);
    //     $tags = $data['tags'];
    //     unset($data['tags']);

    //     $post->update($data);
    //     //$post = $post->fresh();
    //     $post->tags()->sync($tags); 
    //     return redirect()->route('post.show', $post->id);
    // }

    // public function destroy(Post $post)
    // {
    //     $post->delete();
    //     return redirect()->route('post.index');
    // }





    // public function index()
    // {
    //     //$post = Post::find(1);
    //     //$posts = Post::all();
    //     ////$posts = Post::where('is_published', 1)->first();//->get();
    //     //foreach($posts as $post)
    //     //dump($post);
        
    //     ////dd('end');
    // }

    // public function create()
    // {
    //     $postsArr = [
    //         [
    //         'title' => 'NervTik4',
    //         'post_content' => 'tiktok',
    //         'image' => 'tikitoki',
    //         'likes' => 20,
    //         'is_published' => 1
    //         ],
    //         [
    //         'title' => 'NervTik3',
    //         'post_content' => 'tiktok2',
    //         'image' => 'tikitoki2',
    //         'likes' => 202,
    //         'is_published' => 0
    //         ]
    //     ];

    //     // Post::create([
    //     //     'title' => 'NervTik',
    //     //     'content' => 'tiktok',
    //     //     'image' => 'tikitoki',
    //     //     'likes' => 20,
    //     //     'is_published' => 1
    //     // ]);

    //     foreach ($postsArr as $item){
    //         Post::create($item);
    //     }

    //     // foreach ($postsArr as $item)
    //     // {
    //     // Post::create([
    //     //     'title' => $item['title'],
    //     //     'post_content' => $item['content']
    //     // ]);
    //     // }

    //     dd('created');
    // }

    // public function update()
    // {
    //     $post = Post::find(2);
    //     $post->update([
    //         'title' => 'Update2',
    //         'content' => 'Update2'
    //     ]);
    //     dd('updated');
    // }

    // public function delete()
    // {   
    //     $post = Post::find(5);
    //     //$post = Post::withTrashed()->find(3);
    //      $post->delete();
    //     // $post->restore();
    //     dd('deleted');
    // }

    // public function firstOrCreate()
    // {
    //     $anotherPost = [
    //         'title' => 'some post',
    //         'content' => 'some content',
    //         'image' => 'some image',
    //         'likes' => 2,
    //         'is_published' => 0
    //     ];
    //     $post = Post::firstOrCreate([
    //         'title' => 'NervTik'
    //     ],[
    //         'title' => 'some post',
    //         'content' => 'some content',
    //         'image' => 'some image',
    //         'likes' => 2,
    //         'is_published' => 0
    //     ]);
    //     dump($post->content);
    //     dd('finished');
    // }

    // public function updateOrCreate()
    // {
    // $post = Post::updateOrCreate([
    //     'title' => 'NervTik'
    // ],[
    //     'title' => 'update(Nervtik) some post',
    //         'content' => 'update  some content',
    //         'image' => 'update some image',
    //         'likes' => 2,
    //         'is_published' => 0
    // ]);
    // dump($post->content);
    // dd('updated');
    // }
}
