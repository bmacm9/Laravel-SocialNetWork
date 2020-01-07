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

//use App\Image;

//Route::get('/', function () {
/*public function ORM(){

    $images = Image::all();
    foreach ($images as $image){
        echo "<div>";
        echo $image->image_path . "<br/>";
        echo $image->description . "<br/>";
        echo $image->user->name. ' ' . $image->user->surname . ' ' . '<br/>';
        if(count($image->comments)>0) {
            echo '<h4>Comentarios</h4>';
            foreach ($image->comments as $comment) {
                echo '<strong>' . $comment->user->name . ' ' . $comment->user->surname . ' comentó: ' . $comment->content . '</strong> <br/>';
            }
        }

        echo 'Likes: ' . count($image->likes);
        echo "<hr/>";
        echo "</div>";
    }
        die();
}*/

    //return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/login2', 'HomeController@logtuenti');

Route::get('/config', 'UserController@config')->name('config');

Route::post('/user/update', 'UserController@update')->name('user.update');

Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');

Route::get('/subir-imagen', 'ImageController@create')->name('image.create');

Route::post('/image/save', 'ImageController@save')->name('image.save');

Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
