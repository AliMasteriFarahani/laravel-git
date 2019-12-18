<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Http\Requests\createPostRequest;
use App\Post;
//use Illuminate\Auth\Access\Gate;  // this is mistake
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;  // this is ok
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
//    public function insert()
//    {
//
//        DB::insert('insert into posts (title, body) values (?, ?)', ['title one', 'body one']);
//    }
//
//    public function select()
//    {
//        $posts = DB::select('SELECT * FROM posts');
//        return $posts;
//    }
//
//    public function update()
//    {
//        DB::update('UPDATE posts SET title = "title updated" WHERE id = ?', [1]);
//        return $this->select();
//    }
//
//    public function delete()
//    {
//        DB::delete('delete from posts where id = ?', [1]);
//        return $this->select();
//    }
//
//    public function create()
//    {
//        // first way :
//
//        /*      $post = new Post();
//                $post->title = 'new title';
//                $post->body = 'new body';
//                $post->save();
//        */
//
//        // second way :
//
//        $post = Post::create(['title' => 'new post 2', 'body' => 'new body 2']);
//    }
//
//    public function postUpdate()
//    {
//        // $post = Post::where('id',2)->update(['title'=>'updated title']);
//
//        /*      $post = new Post();
//                $post->where('id',2);
//                $post->update(['title'=>'updated title']);
//                $post->save();
//        */
//
//        $post = Post::findOrFail(2);
//        $post->title = 'title 3333';
//        $post->body = 'body 3333';
//        $post->save();
//    }
//
//    public function postDelete()
//    {
//        // first way :
//
//        //$post = Post::findOrFail(3)->first();
//        // $post->delete();
//
//        // second way :
//
//        Post::destroy(4); // [2,3]
//    }
//
//    public function restore()
//    {
//        Post::onlyTrashed()->where('id',4)->restore();
//    }
//
//    public function forceDelete()
//    {
//        Post::onlyTrashed()->where('id',4)->forceDelete();
//    }
//

    public function index()
    {
        //$posts = Post::all();
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(createPostRequest $request)    // Request $request         createPostRequest
    {
        /*        $this->validate($request,[
                    'title' => 'required',
                    'description' => 'required|min:10'
                ],[
                    'title.required' => 'عنوان الزامی است .',
                    'description.min' => 'طول عنوان کم است .',
                    'description.required' => 'توضیحات الزامی است'
                ]);*/

        $post = new Post();
        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            //$file->store($name);  // new folder with file name in storage
            $file->store('/public/images');
            /*            $file->move('images', $name);
                        $post->path = $name;
                        $post->title = $request->input('title');
                        $post->body = $request->input('description');
                        $post->user_id = 1;
                        $post->save();
                        return redirect('/posts');*/
        }
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        event(new PostViewEvent($post));
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();

        // policy in view
          return view('posts.edit', compact('post'));

        // using policy :
        /*      if ($user->can('update', $post)) {
                  return view('posts.edit', compact('post'));
              } else {
                  echo 'you can not access this action';
              }
        */

        //  using gate :
        /*        if (Gate::allows('edit-post',$post)){
                    return view('posts.edit', compact('post'));
                }else{
                    echo 'you can not access this action';
                }
        */
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->body = $request->input('description');
        $post->user_id = 1;
        $post->save();
        return redirect('/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }
}


