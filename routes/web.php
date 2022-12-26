<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('/categorias', 'PagesController@categorias')->name('categorias');
Route::get('/categoria/{id}', 'PagesController@categoria')->name('categoria');
Route::get('/sub-categoria/{id}', 'PagesController@subCategoria')->name('sub-categoria');
Route::get('/producto/{product}', 'PagesController@producto')->name('producto');
Route::get('/pedidos', 'PagesController@pedidos')->name('pedidos');
Route::get('/novedades', 'PagesController@novedades')->name('novedades');
Route::get('/novedades/{id}', 'PagesController@obtenerNovedad')->name('obtenerNovedad');
Route::get('/solicitud-de-presupuesto', 'PagesController@cotizacion')->name('cotizacion');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('enviar-cotizacion-manual', 'MailController@quoteManual')->name('send-quote-manual');
Route::get('/ficha-tecnica/{id}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::get('/descargar-formato', 'ContentController@descargarFormato')->name('descargar-formato');

Route::delete('/ficha-tecnica/{id}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
Route::get('novedad/pdf/{id}', 'ContentController@pdfNovedad')->name('novedad.pdf');
Route::get('content/ficha-tecnica/{id}', 'ContentController@fichaTecnica')->name('content.ficha-tecnica');
Route::get('content/politica/{id}', 'ContentController@obtenerPolitica')->name('content.politica');
Route::post('content/ficha-tecnica/{id}', 'ContentController@borrarFichaTecnica')->name('content.borrar-ficha-tecnica');
Route::post('content/image/{id}', 'ContentController@borrarImagenContenido')->name('content.borrar-imagen-contenido');
Route::post('/imagen-descrptiva/{id}', 'ProductController@borrarImagenDescriptiva')->name('borrar-imagen-descriptiva');

Route::post('vp', 'ItemSessionController@addVP')->name('vp.store');
Route::get('vp', 'ItemSessionController@getSession')->name('vp');
Route::delete('vp/{id}', 'ItemSessionController@destroy')->name('vp.destroy');

Route::middleware('auth')->prefix('admin')->group(function () {

    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/updateInfo', 'HomeController@updateInfo')->name('home.update-info');
    Route::post('home/eliminar-imagen/{id}', 'HomeController@eliminarImagen')->name('home.eliminar-imagen');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/update-info-images', 'CompanyController@updateInfoImages')->name('company.content.updateInfoImages');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/features', 'CompanyController@featuresGetList')->name('company.feautes');
    /** Fin company*/

    /** Page Category */
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::get('category/content/{id}', 'CategoryController@findContent');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/update', 'CategoryController@update')->name('category.content.update');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::delete('category/content/image/{id}', 'CategoryController@Imagedestroy')->name('category.image.destroy');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/

    /** Page Category */
    Route::get('sub-category/content', 'SubCategoryController@content')->name('sub-category.content');
    Route::get('sub-category/content/{id}', 'SubCategoryController@findContent');
    Route::get('sub-category/get-category/{id}', 'SubCategoryController@getCategory');
    Route::post('sub-category/content/store', 'SubCategoryController@store')->name('sub-category.content.store');
    Route::post('sub-category/content/update', 'SubCategoryController@update')->name('sub-category.content.update');
    Route::delete('sub-category/content/{id}', 'SubCategoryController@destroy')->name('sub-category.content.destroy');
    Route::get('sub-category/content/slider/get-list', 'SubCategoryController@sliderGetList')->name('sub-category.slider.get-list');
    /** Fin Category*/

    /** Page Color */
    Route::get('color/content', 'ColorController@content')->name('color.content');
    Route::get('color/content/{id}', 'ColorController@findContent');
    Route::post('color/content/store', 'ColorController@store')->name('color.content.store');
    Route::post('color/content/update', 'ColorController@update')->name('color.content.update');
    Route::delete('color/content/{id}', 'ColorController@destroy')->name('color.content.destroy');
    Route::get('color/content/slider/get-list', 'ColorController@sliderGetList')->name('color.slider.get-list');
    /** Fin Color*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    Route::get('product/content/images/get-list/{id}', 'ProductController@ImagesGetList')->name('product.images.get-list');
    Route::post('product/content/images/create', 'ProductController@ImagesCreate')->name('product.images.create');
    Route::post('product/content/images/update', 'ProductController@ImagesUpdate')->name('product.images.update');
    Route::get('product/content/images/find/{id?}', 'ProductController@ImagesFind')->name('product.images.find');
    Route::delete('product/content/images/{id?}', 'ProductController@ImagesDelete')->name('product.images.delete');
    /** Fin product*/

    /** Page News */
    Route::get('news/content', 'NewsController@content')->name('news.content');
    Route::get('news/content/create', 'NewsController@create')->name('news.content.create');
    Route::post('news/content/store', 'NewsController@store')->name('news.content.store');
    Route::get('news/content/{id}/edit', 'NewsController@edit')->name('news.content.edit');
    Route::put('news/content', 'NewsController@update')->name('news.content.update');
    Route::delete('news/content/{id}', 'NewsController@destroy')->name('news.content.destroy');
    Route::get('news/content/get-list', 'NewsController@getList')->name('news.content.get-list');
    Route::get('news/content/find-product/{id?}', 'NewsController@find')->name('news.content.find');
    /** Fin News*/

    /** Page Product Picture */

    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    Route::delete('product-banner/content/destroy/{id}', 'ProductPictureController@destroyBanner')->name('product-banner.content.destroy');
    /** Fin product picture*/

    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    
    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
