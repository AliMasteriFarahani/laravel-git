<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/contact', function () {
    return 'this is contact page';
});

Route::get('/post/{id}/{name?}',function ($id,$name){
    return "post : $id - $name";
});

Route::get('admin/posts/example',function (){
    $url = route('admin');
    return 'this admin page and url is :'. $url;
})->name('admin');


Route::get('/admin/login',function (){
    return 'this is login page';
});


Route::redirect('/contact','admin/posts/example',301);

Route::prefix('/user')->group(function (){
    Route::get('/posts/example',function (){
        return 'this is post page';
    });
    Route::get('/login',function (){
        return 'this is user login page ';
    });
});*/


//Route::resource('/posts','PostController');

//-------------------------------------------------------------------------------------------------
// CRUD with DB class
//-------------------------------------------------------------------------------------------------
/*
Route::get('/insert','PostController@insert');
Route::get('/select','PostController@select');
Route::get('/update','PostController@update');
Route::get('/delete','PostController@delete');*/

//-------------------------------------------------------------------------------------------------
// CRUD with Eloquent
//-------------------------------------------------------------------------------------------------
/*
Route::get('/create','PostController@create');
Route::get('/postUpdate','PostController@postUpdate');
Route::get('/deletePost','PostController@postDelete');
Route::get('/soft-delete','PostController@softDelete');
Route::get('/restore','PostController@restore');
Route::get('/force-delete','PostController@forceDelete');*/


// ------------------------------------------------------------------------------------------------
// Eloquent one to one relationship
// ------------------------------------------------------------------------------------------------
/*
    Route::get('/user/{id}/post', function ($id) {
    $user =\App\User::find($id);

    return $user->post->title;
});


// Reverse or retrieve :
// - - - - - - - - - - - -

    Route::get('/post/{id}/user', function ($id) {
    $post =\App\Post::find($id);

    return $post->user;
});
*/

// ------------------------------------------------------------------------------------------------
// Eloquent one to many relationship
// ------------------------------------------------------------------------------------------------
/*
Route::get('user/{id}/posts', function ($id) {
    $user = \App\User::find($id);
    return $user->posts;
});

// Reverse or retrieve :
// - - - - - - - - - - - -

Route::get('post/{id}/user', function ($id) {
    $post = \App\Post::find($id);
    return $post->user;
});
*/

// ------------------------------------------------------------------------------------------------
// Eloquent many to many relationship
// ------------------------------------------------------------------------------------------------
/*
Route::get('/user/{id}/roles', function ($id) {
    $user = \App\User::find($id);
    foreach ($user->roles as $role){
        echo $role->created_at;
    }

  //  return $user->roles->created_at;
});

// Reverse or retrieve :
// - - - - - - - - - - - -


    Route::get('/role/{id}/users', function ($id) {
    $role = \App\Role::find($id);
    return $role->users;
});

*/
// ------------------------------------------------------------------------------------------------
// Eloquent has many through relationship :
// ------------------------------------------------------------------------------------------------
/*
Route::get('/country/{id}/posts', function ($id) {
    $country = \App\Country::find($id);
    return $country->posts;
});
*/

// ================== END ======================
// ================== END ======================
// ================== END ======================

// ------------------------------------------------------------------------------------------------
// polymorphic one to many relationship
// ------------------------------------------------------------------------------------------------
/*
Route::get('/user/{id}/photos', function ($id) {
    $user = \App\User::find($id);
        foreach ($user->photos as $photo){
            echo $photo->path;
        }
   // return $user->photos;
});

Route::get('/post/{id}/photos', function ($id) {
    $post = \App\Post::find($id);
        foreach ($post->photos as $photo){
            echo $post->path;
        }
    //return $post->photos;
});

// Reverse or retrieve :
// - - - - - - - - - - - -

Route::get('/photo/{id}/post-or-user', function ($id) {
    $photo = \App\photo::find($id);
       foreach ($post->photos as $photo){
            echo $post->path;
        }
   // return $photo->imageable;
});
*/
// ------------------------------------------------------------------------------------------------
// polymorphic many to many relationship
// ------------------------------------------------------------------------------------------------
/*
Route::get('/post/{id}/tags', function ($id) {
    $post = \App\Post::find($id);
    foreach ($post->tags as $tag) {
        echo $tag->name;
    }
   // return $post->tags;
});

Route::get('/video/{id}/tags', function ($id) {
    $video = \App\Video::find($id);
    foreach ($video->tags as $tag) {
        echo $tag->name;
    }
   // return $post->tags;
});

// Reverse or retrieve :
// - - - - - - - - - - - -

Route::get('/tag/{id}/posts', function ($id) {
    $tag = \App\Tag::find($id);
    foreach ($tag->posts as $post) {
        echo $post->title;
    }
  // return $tag->posts;
});

Route::get('/tag/{id}/videos', function ($id) {
    $tag = \App\Tag::find($id);
    foreach ($tag->videos as $video) {
        echo $video->name;
    }
  // return $tag->posts;
});
*/

// ------------------------------------------------------------------------------------------------
// CRUD -> Eloquent one to many relationship
// ------------------------------------------------------------------------------------------------
/*// create :



Route::get('/create', function () {
    $user = \App\User::find(1);
    $role = new \App\Role();
    $role->name = 'نویسنده';
    $user->roles()->save($role);
});

// read :

Route::get('/read', function () {
    $user = \App\User::find(1);
    foreach ($user->posts as $post){
        echo $post->title.'<br>';
    }
});

// update :

Route::get('/update', function () {
    $user = \App\User::find(1);
    // if ($user->has('roles'))
    foreach ($user->roles as $role){
        if ($role->name == 'نویسنده'){
            $role->name = 'Author';
            $role->save();
        }
    }
});


// delete :

Route::get('/delete', function () {
    $user = \App\User::find(1);
    foreach ($user->roles as $role){
        if ($role->name == 'Author'){
            $role->delete();
        }
    }
});

// detach :
Route::get('/detach', function () {
    $user = \App\User::find(1);
   // $user->roles()->whereId()->detach(2);
    $user->roles()->detach(2);

});

// attach :

Route::get('/attach', function () {
    $user = \App\User::find(1);
    $user->roles()->attach(2);
});

// sync :

Route::get('/sync', function () {
    $user = \App\User::find(1);
    $user->roles()->sync([1,2]);
});*/

// ------------------------------------------------------------------------------------------------
// CRUD -> Polymorphic Eloquent many to many relationship
// ------------------------------------------------------------------------------------------------
/*
// Create :
Route::get('/create', function () {

    $video = \App\Video::find(1);
    $video->tags()->create(['name' => '#php']);

});

// Update :

Route::get('/read', function () {
    $video = \App\Video::find(1);
    foreach ($video->tags as $tag) {

        echo $tag->name.'<br>' ;
    }

});

// Update :

Route::get('/update', function () {
    $video = \App\Video::find(1);
    $tags = $video->tags;
    $newTag = $tags->where('id',3)->first();
    $newTag->name = '#php mvc';
    $newTag->save();
});

// Delete :

Route::get('/delete', function () {
    $video = \App\Video::find(1);
    $tags = $video->tags;
    $tag  = $tags->where('id',3)->first();
    $tag->delete();
});

// Detach :

Route::get('/detach', function () {
    $video = \App\Video::find(1);
    $video->tags()->detach();
});

// Attach :

Route::get('/attach', function () {
    $video = \App\Video::find(1);
    $video->tags()->attach(2);
});

// Sync :

Route::get('/sync', function () {
    $video = \App\Video::find(1);
    $video->tags()->sync([1,2,3]);
});
*/



use Illuminate\Support\Facades\Storage;

//Route::resource('/posts','postsController');


// ------------------------------------------------------------------------------------------------
// Files :
// ------------------------------------------------------------------------------------------------
/*Route::get('/file',function (){
    $file = Storage::disk('public')->get('images/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg');
    // echo $file;

   // return Storage::url('images/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg');
  // storage_path('images/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg')
     Storage::disk('public')->download('images/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg');
    // return Storage::disk('files')->download('6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg');

    Storage::disk('public')->copy('images/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg','photo/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg');
    Storage::disk('public')->move('images/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg','photo/6SuKeVKUL3fIYeDm2x8aWvtu5oVyfX8ho9YX0PRc.jpeg');

});
*/

// ------------------------------------------------------------------------------------------------
// Email and middleware :
// ------------------------------------------------------------------------------------------------

// first way to add middleware :
//Auth::routes();
//Route::get('/home', 'HomeController@index')->middleware(['auth','verified'])->name('home');
// garde hefazati ;
/*Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index');
    Route::get('/');
});*/



// use Illuminate\Support\Facades\Auth;
//Auth::routes(['verify' => true]);

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/', function () {
    $user = Auth::user();
    // $user = Auth::check();
    // dd($user);
    if (Auth::check()){
        echo 'Hello '.$user->name;
    }else{
        redirect()->to('/home');
    }

    $pass = 'password';
    // $auth = Auth::attempt(['email'=>$user,'password'=>$pass]);
    $auth = Auth::once(['email'=>$user,'password'=>$pass]);
   //  dd($auth);

    $user = \App\User::findOrFail(5);
    $auth = Auth::login($user);
    dd($auth);
    Auth::loginUsingId(5);

    Auth::logout();

});*/

Route::get('/admin', function () {
//    $user = \App\User::find(5);
//    $ff = $user->isAdmin();
//    dd($ff);

    echo 'welcome to Admin page revolution';

})->middleware(['isAdmin:admin user']);


// ------------------------------------------------------------------------------------------------
// ACL  :
// ------------------------------------------------------------------------------------------------
use Illuminate\Support\Facades\Auth;
Auth::routes();
Auth::routes(['verify' => true]);
Route::middleware(['auth','verified'])->group(function (){
    Route::get('/home', 'HomeController@index');
    Route::resource('/posts','postsController');
    Route::get('/');
});

// ------------------------------------------------------------------------------------------------
// SESSIONS  :
// ------------------------------------------------------------------------------------------------
use Illuminate\Http\Request;
Route::get('/session', function (Request $request) {

    $request->session()->put(['name'=>'Ali']);
    //return $request->session()->get('name');
    //$request->session()->forget('name');
    $request->session()->keep('name');
   // $request->session()->flush();
   // $request->session()->flash('massage','post has been created');
    $request->session()->reflash();

    return $request->session()->all();

});

// ------------------------------------------------------------------------------------------------
// Events and listener and queue  :
// ------------------------------------------------------------------------------------------------

