<?php

use App\Models\Menu;
use App\Models\Page;
use App\Http\Services\Navigation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GivingController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Administrator\MenuController;
use App\Http\Controllers\Administrator\PageController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\BannerController;
use App\Http\Controllers\HolySpiritExperienceController;
use App\Http\Controllers\Administrator\ServiceController;
use App\Http\Controllers\Administrator\SettingsController;
use App\Http\Controllers\PageController as IndexController;
use App\Http\Controllers\Administrator\NewsletterController;
use App\Http\Controllers\Administrator\HomeController as AdministratorHomeController;
use App\Http\Controllers\Administrator\EventController as AdministratorEventController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController as ControllersPageController;

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


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/event', [EventController::class, 'index'])->name('events');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');
Route::get('/giving', [GivingController::class, 'index'])->name('giving');
 
Route::get('/holyspiritexperience', [HolySpiritExperienceController::class, 'index'])->name('holyspiritexperience');
// Route::get('/streaming', [HolySpiritExperienceController::class, 'index'])->name('streaming');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/streaming', function () {
    return view('main.pages.streaming');
})->name('streaming');


Route::get('/bible-study', function () {
    return view('coming-soon');
})->name('bible-study');


Route::get('/book-reading', function () {
    return view('coming-soon');
})->name('book-reading');

/* sitemap */
Route::get('sitemap.xml', [SitemapController::class, 'index']);
/* sitemap */

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    foreach (Navigation::getAdminNavigation() as $navigation) {
        Route::get($navigation['link'], function () use ($navigation) {
            return view($navigation['page']);
        })->name($navigation['page']);
    }

    // Route::get('/run-database', function () {
    //     Artisan::call('migrate');
    //     return view('dashboard');
    // });

    // Route::get('/run-seeder', function () {
    //     Artisan::call('db:seed');
    //     return view('dashboard');
    // });
});

Route::get('artisan', [ArtisanController::class, 'index']);

Route::group(['middleware' => 'preventBackHistory'], function () {
    Auth::routes(['register' => false]);
});

// Admin section
Route::group(['prefix' => 'admin', 'middleware' => ['auth:web', 'preventBackHistory']], function () {
    Route::get('/', [AdministratorHomeController::class, 'index'])->name('admin.index');

    // Banner section
    Route::resource('banners', BannerController::class);
    Route::post('banner-status', [BannerController::class, 'bannerStatus'])->name('banner.status');

    Route::get('banner-advert', [BannerController::class, 'advert_banner'])->name('banner.advert');
    Route::get('banner-advert/{id}/edit', [BannerController::class, 'edit_advert_banner'])->name('banner.advert.edit');
    Route::put('banner-advert/{id}', [BannerController::class, 'update_advert_banner'])->name('banner.advert.update');

    Route::get('banner-outreach/{id}/edit', [BannerController::class, 'edit_outreach_banner'])->name('banner.outreach.edit');
    Route::put('banner-outreach/{id}', [BannerController::class, 'update_outreach_banner'])->name('banner.outreach.update');

    // Event section
    Route::resource('events', AdministratorEventController::class);
    Route::post('event-status', [AdministratorEventController::class, 'eventStatus'])->name('event.status');

    // Menu section
    Route::resource('menus', MenuController::class);
    Route::post('menu-status', [MenuController::class, 'menuStatus'])->name('menu.status');

    // Service section
    Route::resource('services', ServiceController::class);

    // Page section
    Route::resource('pages', PageController::class);
    Route::post('page-status', [PageController::class, 'pageStatus'])->name('page.status');

    //user profile
    Route::get('user-profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('user-profile', [UserController::class, 'update_profile'])->name('user.profile-update');

    // change password
    Route::get('change-password', [UserController::class, 'password'])->name('user.password');
    Route::put('change-password', [UserController::class, 'change_password'])->name('user.password-update');

    // Settings Section
    Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
    Route::put('settings', [SettingsController::class, 'updateSettings'])->name('settings.update');
    Route::put('mail-config', [SettingsController::class, 'mailConfiguration'])->name('settings.mail.config');

    // newsletter section
    Route::get('newsletters', [NewsletterController::class, 'newsletter'])->name('newsletters');
    Route::post('newsletters', [NewsletterController::class, 'newsletter_send'])->name('newsletters.send');
    Route::delete('newsletter/{id}', [NewsletterController::class, 'newsletter_destroy'])->name('newsletters.destroy');
});


if (Schema::hasTable('pages')) {
    $pages = Page::where('status', 'active')->get();

    foreach ($pages as $page) {
        $class = '\\App\\Http\\Controllers\\' .  $page->controller . '@index';

        // if ($page->controller == 'PageController') {
        //     Route::get('/page/{page}', $class)->name('page.' . $page->slug);
        // } else {
            Route::get('/' . $page->slug, $class)->name($page->slug);
        // }



        // if ($page->slug === 'contact') {
        //     Route::post('/' . $page->slug, [ContactController::class, 'store'])->name('contact.store');
        // }
        // if ($page->slug === 'event') {
        //     Route::get('/event/{event}', [EventController::class, 'show'])->name('events.show');
        // }
    }
}
