<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//URL::forceSchema('https');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->post('loginWithPassword', 'Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');
});
    
$api->version('v1', ['namespace' => 'App\Http\Controllers', 'pageSize' => 10], function ($api) {
    $api->get('testenv', 'SwaggerController@testenv');
    
    // 01 users
    $api->post('register', 'APIAuthController@register');
    $api->post('loginWithToken', 'SocialAuthController@loginWithToken');
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->get('users/me', 'UserController@showMe');
        $api->put('users/{id}', 'UserController@update');
    });
        
    // 02 sellers
    $api->get('sellers/nearby', 'SellerController@getListByNearBy');
    $api->get('sellers/newest', 'SellerController@getListByNewest');
    $api->get('sellers/rating', 'SellerController@getListByRating');
    $api->get('sellers/category/{id}', 'SellerController@getListByCategory');
    $api->get('sellers/{sellerid}', 'SellerController@show');
    $api->get('sellers/{sellerid}/dishes', 'SellerController@getDishesBySeller');
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->resource('sellers', 'SellerController');
    });
    
    // 03 dishes
    $api->get('dishes/newest', 'DishController@getListByNewest');
    $api->get('dishes/rating', 'DishController@getListByRating');
    $api->get('dishes/category/{categoryid}', 'DishController@getListByCategory');
    $api->get('dishes/{dishid}', 'DishController@show');
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->resource('dishes', 'DishController');
    });  
    
    // 04 orders
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->get('shoppingcarts/buyer/{buyerid}', 'ShoppingCartController@viewByBuyer');
        $api->get('shoppingcarts/deliver-fee', 'ShoppingCartController@viewDeliverFeeBySeller');
        $api->resource('shoppingcarts', 'ShoppingCartController');
        $api->get('orders/buyer/{buyerid}', 'OrderController@viewByBuyer');
        $api->get('orders/seller/{sellerid}', 'OrderController@viewBySeller');
        $api->get('orders/seller/{sellerid}/filter', 'OrderController@viewBySellerFiltered');
        $api->put('orders/accept/{orderid}', 'OrderController@accept');
        $api->put('orders/reject/{orderid}', 'OrderController@reject');
        $api->put('orders/deliver/{orderid}', 'OrderController@deliver');
        $api->put('orders/complete/{orderid}', 'OrderController@complete');
        $api->resource('orders', 'OrderController');
    });
    
    // 05 reviews
    $api->get('reviews/dish/{dishid}', 'ReviewController@viewreviewsbyDishId');
    $api->get('reviews/seller/{sellerid}', 'ReviewController@viewreviewsbySellerId');
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->resource('reviews', 'ReviewController');
        $api->post('reviews/order/{orderid}', 'ReviewController@storeReviewsByOrder');
    });
    
    // 06 favorites
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->get('favorites/user/{userid}', 'FavoriteController@viewByUser');
        $api->resource('favorites', 'FavoriteController');
    });

    // 07 wishes
    $api->get('wishes', 'WishController@index');
    $api->get('wishes/{wishid}', 'WishController@show');
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->get('wishes/buyer/{buyerid}', 'WishController@getWishesByUser');
        $api->get('wishes/{wishid}/bids', 'WishController@getBidsByWishid');
        $api->resource('wishes', 'WishController', ['except' => ['index', 'show']]); 
    });

    // 08 bids
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->put('bids/{bidid}/assign', 'BidController@assignBidStatus');
        $api->resource('bids', 'BidController');
    });
    
    // 11 order supports
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->put('ordersupports/{ordersupportid}/solution', 'OrderSupportController@addSolution');
        $api->resource('ordersupports', 'OrderSupportController');
    });
    
    // 12 problems
    $api->get('problems/parentcode/{parent_code}', 'ProblemCodeController@viewProblems');
    $api->get('problems/{problemid}', 'ProblemCodeController@show');    
    
    // 13 categories
    $api->resource('categories', 'CategoryController');
    
    // 14 pickupMethods
    $api->get('pickupMethods/menu/{sellerid}', 'PickupMethodController@viewMenu'); 
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->get('pickupMethods/seller/{sellerid}', 'PickupMethodController@viewBySeller'); 
        $api->resource('pickupMethods', 'PickupMethodController');
    });
    
    // 15 pickupLocations
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->get('pickupLocations/seller/{sellerid}', 'PickupLocationController@viewBySeller'); 
        $api->resource('pickupLocations', 'PickupLocationController');
    });
    
    $api->post('getLocationByRadius', 'SwaggerController@getLocationByRadius'); 
    $api->post('CreateLocationByGPid', 'SwaggerController@CreateLocationByGPid');
    $api->put('UpdateLocationByGPid', 'SwaggerController@UpdateLocationByGPid');
    $api->put('DeleteLocationByGPid', 'SwaggerController@DeleteLocationByGPid');
    
 
    $api->group(['middleware' => 'auth:api'], function ($api){
        $api->post('AddNewCard', 'ShoppingController@PostAddNewPayment');
        $api->get('getCardList', 'ShoppingController@getCardList');
        $api->post('deleteCardByID', 'ShoppingController@deleteCardByID');
        $api->post('processPurchase', 'ShoppingController@processPurchase');
        $api->post('CreateConnectAccount', 'ShoppingController@CreateConnectAccount');
        $api->post('UpdateDefaultCard', 'ShoppingController@UpdateDefaultCard');
        $api->post('addPerchaseOrders', 'ShoppingController@addPerchaseOrders');
    });
    
    $api->post('/searchdish', 'SearchController@getDishListByKeyword');
    $api->post('/searchseller', 'SearchController@getSellerListByKeyword');
});


app('api.exception')->register(function (Exception $exception) {
    $request = Illuminate\Http\Request::capture();
    return app('App\Exceptions\Handler')->render($request, $exception);
});
