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

Route::get('/','homecontroller@index');
Route::get('/backend','admincontroller@index');
Route::get('/dashbord','suppercontroller@index');
Route::post('/admindasbords','admincontroller@admindasbords');
Route::get('/logout','suppercontroller@logout');
Route::get('/addcatagory','addcatagerycontroller@index');








Route::get('/allcategory','addcatagerycontroller@allcategory');
Route::post('/savecategory','addcatagerycontroller@savecategory');
Route::get('/unactive_category/{category_id}','addcatagerycontroller@unactive_category');



Route::get('/unactive_brand/{manufactur_id}','brandcontroller@unactive_brand');

//unactive product
Route::get('/unactive_product/{product_id}','productcontroller@unactive_product');
Route::get('/active_product/{product_id}','productcontroller@active_product');
Route::get('/delete_product/{peoduct_id}','productcontroller@delete_product');





Route::get('/active_category/{category_id}','addcatagerycontroller@active_category');
Route::get('/active_brand/{manufactur_id}','brandcontroller@active_brand');


Route::get('/edit_brand/{manufactur_id}','brandcontroller@edit_brand');






Route::get('/edit_category/{category_id}','addcatagerycontroller@edit_category');


Route::post('/update_category/{category_id}','addcatagerycontroller@update_category');







Route::get('/delete_category/{category_id}','addcatagerycontroller@delete_category');
Route::get('/delete_brand/{manufactur_id}','brandcontroller@delete_brand');


//brand.......................................................................*********************************
Route::get('/addbrand','brandcontroller@index');


Route::post('/savebrand','brandcontroller@savebrand');
//allbrand

Route::get('/allbrand','brandcontroller@allbrand');

Route::post('/update_brand/{manufactur_id}','brandcontroller@update_brand');



//prodeuct area

Route::get('/addproduct','productcontroller@index'); 
Route::get('/allproduct','productcontroller@allproduct'); 


Route::post('/save_product','productcontroller@save_product');


Route::get('/edit_product/{product_id}','productcontroller@edit_product');


Route::post('/update_product/{product_id}','productcontroller@update_product');



//addslider part is here/////////////////////////////////////////////////////

Route::get('/addslider','slidercontroller@index');
Route::get('/allslider','slidercontroller@allslider');
Route::post('/save_slider','slidercontroller@save_slider');
 
//slider/////////////////////////////////////////////
Route::get('/active_slider/{slider_id}','slidercontroller@active_slider');
Route::get('/unactive_slider/{slider_id}','slidercontroller@unactive_slider');
Route::get('/delete_slider/{slider_id}','slidercontroller@delete_slider');


//show product by category

Route::get('/showproduct_by_category/{category_id}','slidercontroller@showproduct_by_category');
Route::get('/showproduct_by_manufactur/{manufactur_id}','slidercontroller@showproduct_by_manufactur');
Route::get('/view_product/{product_id}','slidercontroller@view_product');
Route::get('/view_products/{product_id}','slidercontroller@view_products');
Route::get('/view_productss/{product_id}','slidercontroller@view_productss');

//cart controller//////////////////////////////////


Route::post('/addto_cart','cartcontroller@addto_cart');







