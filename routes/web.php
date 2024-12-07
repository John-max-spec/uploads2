<?php


use App\Models\Post;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\Auth\RegisteredUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Registration form route
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

// Registration submission route
Route::post('register', [RegisteredUserController::class, 'store']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::get('/uploads', [UploadController::class, 'index']);

Route::get('/uploads/create', [UploadController::class, 'create'])->middleware(['auth','verified']);


Route::post('/uploads', [UploadController::class, 'store'])->middleware(['auth','verified']);

Route::get('/uploads/{upload}/edit/', [UploadController::class, 'edit'])->middleware(['auth','verified']);

Route::get('/uploads/{upload}/{originalName?}', [UploadController::class, 'show'])->middleware(['auth','verified']);

Route::delete('/uploads/{upload}', [UploadController::class, 'destroy'])->middleware(['auth','verified']);

Route::put('/uploads/{upload}', [UploadController::class, 'update'])->middleware(['auth','verified']);
require __DIR__.'/auth.php';















/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/post', function () {
    $files = File::files(resource_path("posts"));
    $posts = [];

    foreach ($files as $file) {
        $document = YamlFrontMatter::parseFile($file);

        $posts[] = new Post(
            $document->matter('title'),
            $document->matter('excerpt'),
            $document->matter('date'),
            $document->body(),
            $document->matter('slug')
        );
    }

    return view('post.posts', [ // Adjusted view path
        'posts' => $posts
    ]);
});



// // 注册路由
// Route::get('register', [RegisterController::class, 'create']);

// 动态路由处理帖子
Route::get('posts/{post}', function ($slug) {
    // 拼接帖子文件路径
    $path = resource_path("posts/{$slug}.html");

    // 检查文件是否存在
    if (!File::exists($path)) {
        abort(404, 'Post not found'); // 如果文件不存在，返回 404
    }

    // 解析 YAML 前置内容
    $document = YamlFrontMatter::parseFile($path);

    // 返回视图，并传递解析后的内容到 Blade 模板
    return view('post.post', [ // Adjusted view path
        'title' => $document->matter('title'),
        'body' => $document->body(), // 帖子正文内容
    ]);
});



// // Route::get('posts/{post}',function($slug) {
// // $path=__DIR__ . "/../resources/posts/{$slug}.html";
// // return view('posts', [  
      
// // ]);

// // $post = Post::find($slug);

// // if (! file_exists($path)) {


// //     return redirect('/');

// // }

// // $post=cache()->remember("posts.{$slug}", 1200, function () use($path) {


    
// //     return file_get_contents($path);
// // // });
// //     return view('post',[
// //   'post' => Post::find($slug)
// //     // 'post'  => $post

// // ]);
// // })->where('post', '[A-z_\-]+');

// $posts[] = new Post(
//   $document->title,
//   $document->excerpt,
//   $document->date,
//   $document->body(),
//   $document->slug

// );


// }


// // $file = File::files(resource_path("posts"));


//   //     return view('posts' , [


// //         'posts' => Post::all()
    
// // //  ]);
// // $document = YamlFrontMatter::parseFile(
// //     // $path
// // resource_path('posts/my-fourth-post.html')

// // );


// // ddd($document->matter('title'));
// // ddd($posts);
// });