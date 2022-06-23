<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\Menu;

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

// Route untuk admin
Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function() {

    Route::get('/dashboard', Admin\DashboardController::class)->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Menu
    Route::get('/menu/index', [Admin\MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [Admin\MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/store', [Admin\MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{menu}', [Admin\MenuController::class, 'show'])->name('menu.show');
    Route::get('/menu/{menu}/edit', [Admin\MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{menu}', [Admin\MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menu}', [Admin\MenuController::class, 'destroy'])->name('menu.destroy');

    // Event
    Route::get('/event/index', [Admin\EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [Admin\EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [Admin\EventController::class, 'store'])->name('event.store');
    Route::get('/event/{event}/edit', [Admin\EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{event}', [Admin\EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{event}', [Admin\EventController::class, 'destroy'])->name('event.destroy');

    // Testimonial
    Route::get('/testimonial/index', [Admin\TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/testimonial/create', [Admin\TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonial/store', [Admin\TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/{testimonial}/edit', [Admin\TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{testimonial}', [Admin\TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/testimonial/{testimonial}', [Admin\TestimonialController::class, 'destroy'])->name('testimonial.destroy');
});



// Route untuk pengunjung (Guest)
Route::middleware(['guest'])->name('guest.')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/', function () {
        $menus = Menu::with(['category'])->get();
        $menusGroupedByCat = $menus
            ->groupBy(fn($item) => strtolower($item->category->name));
        $events = Event::all();
        $testimonials = Testimonial::all();

        return view('guest.index', [
            "title" => "Home",
            'menus' => $menus,
            'menusGroupedByCat' => $menusGroupedByCat,
            'events' => $events,
            'testimonials' => $testimonials
        ]);
    })->name('index');

    Route::get('/home', function () {
        $menus = Menu::with(['category'])->get();
        $menusGroupedByCat = $menus
            ->groupBy(fn($item) => strtolower($item->category->name));
        $events = Event::all();
        $testimonials = Testimonial::all();

        return view('guest.index', [
            "title" => "Home",
            'menus' => $menus,
            'menusGroupedByCat' => $menusGroupedByCat,
            'events' => $events,
            'testimonials' => $testimonials
        ]);
    })->name('home');

    Route::get('/about', function () {
        return view('guest.about', [
            "title" => "About"
        ]);
    })->name('about');

    Route::get('/faq', function () {
        return view('guest.faq', [
            "title" => "FAQ"
        ]);
    })->name('faq');

    /**
     * DIHAPUS
     */
    Route::get('/food', function () {
        $testimonials = Testimonial::get();

        return view('guest.food', [
            "title" => "Food",
            "testimonials" => $testimonials,
        ]);
    })->name('food');

    Route::get('/menu', function () {
        $menus = Menu::with(['category'])->get()
            ->groupBy(fn($item) => strtolower($item->category->name));

        return view('guest.menu', [
            "title" => "Menu",
            'menus' => $menus,
        ]);
    })->name('menu');

    Route::get('/gallery', function () {
        $menus = Menu::with(['category'])->get()
            ->groupBy(fn($item) => strtolower($item->category->name));

        return view('guest.gallery', [
            'title' => 'Gallery',
            'menus' => $menus,
        ]);
    })->name('gallery');
});
