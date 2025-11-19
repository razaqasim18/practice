<?php

use App\Http\Controllers\CartController;
use App\Models\Category;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Video;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCondition;


Route::get('/check', function () {
    // $post = Post::create([
    //     'title' => "Something 2",
    //     'content' => "Something 2",
    // ]);
    // return $post;

    // $post = Post::find(1);
    // $post->comments()->create([
    //     'comment' => "i am a comment of post 2"
    // ]);

    // $post = Post::find(2);
    // dd($post->comments);


    // $video = Video::create([
    //     'title' => "Video",
    //     'url' => "Something Video",
    // ]);
    // return $video;

    // $post = Post::find(1);
    // $video->comments()->create([
    //     'comment' => "i am a comment of video 1"
    // ]);

    // $video = Video::find(1);

    // $tag = Tag::insert([
    //     [
    //         'text' => "Funny"
    //     ],
    //     [
    //         'text' => "Action"
    //     ]
    // ]);

    $post = Post::find(1);
    // $post->tags()->attach([
    //     '1'
    // ]);
    dd($post->tags);
});






Route::get('/', [FrontController::class, 'index']);
Route::get('/product/detail/{slug}', [FrontController::class, 'detail'])->name('product.detail');




Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');



Route::get('/cart', function () {
    // dd(config('app.session_driver'));
    // \Cart::session(auth()->user()->id)->clear();
    dd(\Cart::session(auth()->user()->id)->getContent());
});

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::get('/add', [CartController::class, 'add'])->name('add');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::get('/count', [CartController::class, 'count'])->name('count');
    Route::post('/update', [CartController::class, 'count'])->name('update');
    Route::get('/clear', [CartController::class, 'clear'])->name('clear');
});

Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'checkout']);
    Route::get('/process', [CheckoutController::class, 'checkoutProcess'])->name('process');
});

Route::prefix('category')->name('category.')->group(function () {
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/create', [CategoryController::class, 'save'])->name('save');
    Route::get('/delete/{id?}', [CategoryController::class, 'delete'])->name('delete');
    Route::post('/update', [CategoryController::class, 'update'])->name('update');
});

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'insert'])->name('insert');
    Route::get('/index', [ProductController::class, 'index'])->name('index');
    Route::get('/delete/{id?}', [ProductController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/imagedelete', [ProductController::class, 'Imagedelete'])->name('Imagedelete');
});

Route::prefix('quickbasket')->name('quickbasket.')->group(function () {
    Route::get('/home', function () {
        return view('quickbasket');
    });
    Route::get('/productdetail', function () {
        return view('product.product_detail1');
    });
});
