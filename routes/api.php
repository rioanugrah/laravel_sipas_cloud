<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['prefix' => 'v1'], function() {
    
// });

    Route::get('org', 'Api\OrgController@index');
    Route::post('org', 'Api\OrgController@create');
    Route::get('org/{org_id}', 'Api\OrgController@show');
    Route::put('org/{org_id}', 'Api\OrgController@edit');
    Route::delete('org/{org_id}', 'Api\OrgController@destroy');
    
    Route::post('login', 'Api\Auth\LoginUsrController@Login');
    Route::post('register', 'Api\Auth\RegisterUsrController@Register');
    
    Route::get('usr', 'Api\UsrController@index');
    Route::post('usr', 'Api\UsrController@create');
    Route::get('usr/{usr_id}', 'Api\UsrController@show');
    Route::put('usr/{usr_id}', 'Api\UsrController@edit');
    Route::delete('usr/{usr_id}', 'Api\UsrController@destroy');
    
    Route::get('jab', 'Api\JabController@index');
    Route::post('jab', 'Api\JabController@create');
    Route::get('jab/{jab_id}', 'Api\JabController@show');
    Route::put('jab/{jab_id}', 'Api\JabController@edit');
    Route::delete('jab/{jab_id}', 'Api\JabController@destroy');
    
    Route::get('orgadm', 'Api\OrgAdmController@index');
    Route::post('orgadm', 'Api\OrgAdmController@create');
    Route::get('orgadm/{org_adm_id}', 'Api\OrgAdmController@show');
    Route::put('orgadm/{org_adm_id}', 'Api\OrgAdmController@edit');
    Route::delete('orgadm/{org_adm_id}', 'Api\OrgAdmController@destroy');
    
    Route::get('orgrole', 'Api\OrgRoleController@index');
    Route::post('orgrole', 'Api\OrgRoleController@create');
    Route::get('orgrole/{org_role_id}', 'Api\OrgRoleController@show');
    Route::put('orgrole/{org_role_id}', 'Api\OrgRoleController@edit');
    Route::delete('orgrole/{org_role_id}', 'Api\OrgRoleController@destroy');
    
    Route::get('staf', 'Api\StafController@index');
    Route::post('staf', 'Api\StafController@create');
    Route::get('staf/{staf_id}', 'Api\StafController@show');
    Route::put('staf/{staf_id}', 'Api\StafController@edit');
    Route::delete('staf/{staf_id}', 'Api\StafController@destroy');
    
    Route::get('subslog', 'Api\SubsLogController@index');
    Route::post('subslog', 'Api\SubsLogController@create');
    Route::get('subslog/{subslog_id}', 'Api\SubsLogController@show');
    Route::put('subslog/{subslog_id}', 'Api\SubsLogController@edit');
    Route::delete('subslog/{subslog_id}', 'Api\SubsLogController@destroy');
    
    Route::get('paket', 'Api\PaketController@index');
    Route::post('paket', 'Api\PaketController@create');
    Route::get('paket/{paket_id}', 'Api\PaketController@show');
    Route::put('paket/{paket_id}', 'Api\PaketController@edit');
    Route::delete('paket/{paket_id}', 'Api\PaketController@destroy');

    Route::get('payment', 'Api\PaymentController@index');
    Route::post('payment', 'Api\PaymentController@create');
    Route::get('payment/{payment_id}', 'Api\PaymentController@show');
    Route::put('payment/{payment_id}', 'Api\PaymentController@edit');
    Route::delete('payment/{payment_id}', 'Api\PaymentController@destroy');

    Route::get('profil', 'Api\ProfilController@index');
    Route::post('profil', 'Api\ProfilController@create');
    Route::get('profil/{profil_id}', 'Api\ProfilController@show');
    Route::put('profil/{profil_id}', 'Api\ProfilController@edit');
    Route::delete('profil/{profil_id}', 'Api\ProfilController@destroy');

    Route::get('authsrc', 'Api\AuthSrcController@index');
    Route::post('authsrc', 'Api\AuthSrcController@create');
    Route::get('authsrc/{authsrc_id}', 'Api\AuthSrcController@show');
    Route::put('authsrc/{authsrc_id}', 'Api\AuthSrcController@edit');
    Route::delete('authsrc/{authsrc_id}', 'Api\AuthSrcController@destroy');

    Route::get('prop', 'Api\PropController@index');
    Route::post('prop', 'Api\PropController@create');
    Route::get('prop/{prop_id}', 'Api\PropController@show');
    Route::put('prop/{prop_id}', 'Api\PropController@edit');
    Route::delete('prop/{prop_id}', 'Api\PropController@destroy');

    Route::get('unit', 'Api\UnitController@index');
    Route::post('unit', 'Api\UnitController@create');
    Route::get('unit/{unit_id}', 'Api\UnitController@show');
    Route::put('unit/{unit_id}', 'Api\UnitController@edit');
    Route::delete('unit/{unit_id}', 'Api\UnitController@destroy');
    
    Route::get('unitcakupan', 'Api\UnitCakupanController@index');
    Route::post('unitcakupan', 'Api\UnitCakupanController@create');

    Route::post('propbuatdata', 'Api\PropBuatDataController@create');
    Route::post('propubahdata', 'Api\PropUbahDataController@create');
    Route::post('prophapusdata', 'Api\PropHapusDataController@create');