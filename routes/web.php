<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Request;

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

Route::get('/captcha-test', function () {

    // Generate image captcha (text hidden)
    $captcha = app('captcha')->create('default', true);

    // Store same captcha text for audio
    session(['audio_captcha' => session('captcha.key')]);

    return '
    <form method="POST" action="/captcha-test">
        '.csrf_field().'

        <h3>Image + Audio Captcha</h3>

        <div>
            '.$captcha.'
            <button type="button" onclick="playCaptcha()">🔊</button>
        </div>

        <br>

        <input type="text" name="captcha" placeholder="Enter captcha">

        <br><br>

        <button type="submit">Verify</button>

        <script>
        function playCaptcha() {
            let text = "'.implode(' ', str_split(session('audio_captcha'))).'";
            let msg = new SpeechSynthesisUtterance(text);
            msg.lang = "en-US";
            speechSynthesis.cancel();
            speechSynthesis.speak(msg);
        }
        </script>
    </form>
    ';
});


Route::post('/captcha-test', function (Request $request) {

    if (!captcha_check($request->captcha)) {
        return "❌ Image captcha incorrect";
    }
    return "✅ Captcha Verified (Image + Audio matched)";
});


Route::get('/audio-captcha-text', function () {
    $captchaText = strtoupper(Str::random(5));
    Session::put('audio_captcha', $captchaText);
    return response()->json(['text' => $captchaText]);
});

Route::get('/audio-captcha', function () {
    $captchaText = strtoupper(Str::random(5));
    Session::put('audio_captcha', $captchaText);

    // Use OS TTS (Linux / Windows needs setup)
    $text = implode(' ', str_split($captchaText));

    $file = storage_path('app/audio_captcha.mp3');

    // Linux (espeak)
    exec("espeak '$text' --stdout | lame - $file");
    return Response::file($file, [
        'Content-Type' => 'audio/mpeg'
    ]);
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', [App\Http\Controllers\Props\PropertiesController::class, 'index'])->name('properties.index');

Route::group(['prefix'=>'property'], function() {
    Route::get('/property-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'single'])->name('properties.details');
Route::post('/property-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'insertRequest'])->name('properties.insertRequest');
//save props
Route::post('props/property-save/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProperty'])->name('properties.saveProperty');

//displaying props by rent and buy
Route::get('/property-buy/type/buy', [App\Http\Controllers\Props\PropertiesController::class, 'propsBuy'])->name('properties.buy');
Route::get('/property-buy/type/rent', [App\Http\Controllers\Props\PropertiesController::class, 'propsrent'])->name('properties.rent');


//display property by order
Route::get('/property-buy/asc', [App\Http\Controllers\Props\PropertiesController::class, 'PriceAsc'])->name('properties.priceasc');
Route::get('/property-buy/desc', [App\Http\Controllers\Props\PropertiesController::class, 'PriceDesc'])->name('properties.pricedesc');
Route::get('/property-buy/home-type/{home_type}', [App\Http\Controllers\Props\PropertiesController::class, 'DisplayByHometype'])->name('properties.byType');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('properties.contact');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('properties.about');


//search functionality  

Route::any('/search', [App\Http\Controllers\Props\PropertiesController::class, 'search'])->name('properties.search');
});



//userpage
Route::group(['prefix'=>'users'],function(){
Route::get('/all-requests', [App\Http\Controllers\Users\UsersController::class, 'allRequests'])->name('users.allrequests');
Route::get('/all-saved', [App\Http\Controllers\Users\UsersController::class, 'allsaved'])->name('users.allsaved');
});




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/homee', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
