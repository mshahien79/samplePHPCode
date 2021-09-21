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

Route::get('/', function () {
  return view('auth.login');
});

Auth::routes();
Route::get('send-mail','MailController@sendMail');
Route::get('ProcessVacc','ProcessVaccController@processvaccs');
Route::get('/home', 'HomeController@view');
Route::group(['prefix' => 'guestuser'], function () {
	Route::get('/view', 'guestuserController@view');
});
Route::group(['prefix' => 'trusteduser'], function () {
	Route::get('/view', 'trusteduserController@view');
});

Route::group(['prefix' => 'farms'], function () {

	Route::get('/create', 'FarmsController@create');
	Route::post('/store', 'FarmsController@store');
	Route::get('/view', 'FarmsController@view');
	Route::get('/index', 'FarmsController@index');
	Route::get('/show/{id}', 'FarmsController@show');
	Route::get('/edit/{id}', 'FarmsController@edit');
	Route::post('/update/{id}', 'FarmsController@update');
	Route::get('/destroy/{id}', 'FarmsController@destroy');

});

Route::group(['prefix' => 'barns'], function () {

	Route::get('/create', 'BarnsController@create');
	Route::post('/store', 'BarnsController@store');
	Route::get('/view', 'BarnsController@view');
	Route::get('/index', 'BarnsController@index');
	Route::get('/show/{id}', 'BarnsController@show');
	Route::get('/edit/{id}', 'BarnsController@edit');
	Route::post('/update/{id}', 'BarnsController@update');
	Route::get('/destroy/{id}', 'BarnsController@destroy');
	Route::get('/closebatch/selectBatch', 'BarnsController@closebatchselect');
	Route::get('/closebatch/{id}', 'BarnsController@closebatchbyid');
	Route::get('/closebatchadm/{id}', 'BarnsController@closebatchbyadminid');
	Route::get('/closebatch1/adminselectBatch', 'BarnsController@closebatchselectadmin');


});

Route::group(['prefix' => 'doctors'], function () {

	Route::get('/create', 'DoctorController@create');
	Route::post('/store', 'DoctorController@store');
	Route::get('/view', 'DoctorController@view');
	Route::get('/index', 'DoctorController@index');
	Route::get('/show/{id}', 'DoctorController@show');
	Route::get('/edit/{id}', 'DoctorController@edit');
	Route::post('/update/{id}', 'DoctorController@update');
	Route::get('/destroy/{id}', 'DoctorController@destroy');

});

Route::group(['prefix' => 'refrigrators'], function () {

	Route::get('/create', 'RefrigratorController@create');
	Route::post('/store', 'RefrigratorController@store');
	Route::get('/view', 'RefrigratorController@view');
	Route::get('/index', 'RefrigratorController@index');
	Route::get('/show/{id}', 'RefrigratorController@show');
	Route::get('/edit/{id}', 'RefrigratorController@edit');
	Route::post('/update/{id}', 'RefrigratorController@update');
	Route::get('/destroy/{id}', 'RefrigratorController@destroy');

});

Route::group(['prefix' => 'barnjournal'], function () {

	Route::get('/create', 'barnjournalController@create');
	Route::post('/storeNutJournal', 'barnjournalController@storeNutJournal');
  Route::post('/storeMedJournal', 'barnjournalController@storeMedJournal');
  Route::post('/storeVacJournal', 'barnjournalController@storeVacJournal');
  Route::post('/storeSawdustJournal', 'barnjournalController@storeSawdustJournal');
  Route::post('/storeMortJournal', 'barnjournalController@storeMortJournal');
  Route::post('/storeWghtJournal', 'barnjournalController@storeWghtJournal');
  Route::post('/storeEmgSlghtJournal', 'barnjournalController@storeEmgSlghtJournal');
	Route::get('/view', 'barnjournalController@view');
  Route::get('/IndexWgtJournal', 'barnjournalController@IndexWgtJournal');
	Route::get('/IndexNutJournal', 'barnjournalController@IndexNutJournal');
	Route::get('/IndexMedJournal', 'barnjournalController@IndexMedJournal');
  Route::get('/IndexVacJournal', 'barnjournalController@IndexVacJournal');
  Route::get('/IndexSawdustJournal', 'barnjournalController@IndexSawdustJournal');
  Route::get('/IndexMortJournal', 'barnjournalController@IndexMortJournal');
  Route::get('/IndexReferigeratorJournal', 'barnjournalController@IndexReferigeratorJournal');
	Route::get('/show/{id}', 'barnjournalController@show');
	Route::get('/edit/{id}', 'barnjournalController@edit');
	Route::post('/update/{id}', 'barnjournalController@update');
	Route::get('/destroy/{id}', 'barnjournalController@destroy');

});


Route::group(['prefix' => 'weights'], function () {
	Route::get('/create', 'WeightsController@create');
	Route::get('/view', 'WeightsController@view');
	Route::get('/index', 'WeightsController@index');
	Route::get('/show/{id}', 'WeightsController@show');
	Route::get('/edit/{id}', 'WeightsController@edit');
	Route::post('/update/{id}', 'WeightsController@update');
	Route::get('/destroy/{id}', 'WeightsController@destroy');

});

Route::group(['prefix' => 'nutrition'], function () {

	Route::get('/create', 'NutritionController@create');
	Route::post('/store', 'NutritionController@store');
	Route::get('/view', 'NutritionController@view');
	Route::get('/nutstockview', 'NutritionController@nutstockview');
	Route::get('/index', 'NutritionController@index');
	Route::get('/show/{id}', 'NutritionController@show');
	Route::get('/edit/{id}', 'NutritionController@edit');
	Route::post('/update/{id}', 'NutritionController@update');
	Route::get('/destroy/{id}', 'NutritionController@destroy');

});

Route::group(['prefix' => 'nutritioninventory'], function () {

	Route::get('/create', 'nutritioninventoryController@create');
	Route::post('/store', 'nutritioninventoryController@store');
	Route::post('/storepurchase', 'nutritioninventoryController@storepurchase');
	Route::get('/view', 'nutritioninventoryController@view');
	Route::get('/index', 'nutritioninventoryController@index');
	Route::get('/show/{id}', 'nutritioninventoryController@show');
	Route::get('/edit/{id}', 'nutritioninventoryController@edit');
	Route::post('/update/{id}', 'nutritioninventoryController@update');
	Route::get('/destroy/{id}', 'nutritioninventoryController@destroy');

});
Route::group(['prefix' => 'medicines'], function () {

	Route::get('/create', 'MedicinesController@create');
	Route::post('/store', 'MedicinesController@store');
	Route::get('/view', 'MedicinesController@view');
	Route::get('/medicineinventoryview', 'MedicinesController@medInvview');
	Route::get('/medicineinventoryindex', 'MedicinesController@medInvindex');
	Route::get('/index', 'MedicinesController@index');
	Route::get('/show/{id}', 'MedicinesController@show');
	Route::get('/edit/{id}', 'MedicinesController@edit');
	Route::post('/update/{id}', 'MedicinesController@update');
	Route::get('/destroy/{id}', 'MedicinesController@destroy');

});
Route::group(['prefix' => 'medicinespurchases'], function () {

	Route::get('/create', 'medicinespurchasesController@create');
	Route::post('/store', 'medicinespurchasesController@store');
	Route::get('/view', 'medicinespurchasesController@view');
	Route::get('/index', 'medicinespurchasesController@index');
	Route::get('/show/{id}', 'medicinespurchasesController@show');
	Route::get('/edit/{id}', 'medicinespurchasesController@edit');
	Route::post('/update/{id}', 'medicinespurchasesController@update');
	Route::get('/destroy/{id}', 'medicinespurchasesController@destroy');

});

Route::group(['prefix' => 'vaccinations'], function () {

	Route::get('/create', 'VaccinationsController@create');
	Route::post('/store', 'VaccinationsController@store');
	Route::get('/view', 'VaccinationsController@view');
	Route::get('/index', 'VaccinationsController@index');
	Route::get('/show/{id}', 'VaccinationsController@show');
	Route::get('/edit/{id}', 'VaccinationsController@edit');
	Route::post('/update/{id}', 'VaccinationsController@update');
	Route::get('/destroy/{id}', 'VaccinationsController@destroy');
	Route::get('/vaccinationinventoryview', 'VaccinationsController@vacInvview');
	Route::get('/vaccinationinventoryindex', 'VaccinationsController@vacInvindex');

});


Route::group(['prefix' => 'vaccinationspurchases'], function () {

	Route::get('/create', 'vaccinationspurchasesController@create');
	Route::post('/store', 'vaccinationspurchasesController@store');
	Route::get('/view', 'vaccinationspurchasesController@view');
	Route::get('/index', 'vaccinationspurchasesController@index');
	Route::get('/show/{id}', 'vaccinationspurchasesController@show');
	Route::get('/edit/{id}', 'vaccinationspurchasesController@edit');
	Route::post('/update/{id}', 'vaccinationspurchasesController@update');
	Route::get('/destroy/{id}', 'vaccinationspurchasesController@destroy');

});

Route::group(['prefix' => 'sales'], function () {

	Route::get('/create', 'SalesController@create');
	Route::post('/store', 'SalesController@store');
	Route::get('/view', 'SalesController@view');
	Route::get('/index', 'SalesController@index');
	Route::get('/show/{id}', 'SalesController@show');
	Route::get('/edit/{id}', 'SalesController@edit');
	Route::post('/update/{id}', 'SalesController@update');
	Route::get('/destroy/{id}', 'SalesController@destroy');

});

Route::group(['prefix' => 'newsales'], function () {

	Route::get('/create/{BatchName}', 'newSalesController@create');
	Route::get('/selectbatch', 'newSalesController@selectBatch');
	Route::post('/store', 'newSalesController@store');
	Route::get('/view', 'newSalesController@view');
	Route::get('/index', 'newSalesController@index');
	Route::get('/show/{id}', 'newSalesController@show');
	Route::get('/edit/{id}', 'newSalesController@edit');
	Route::post('/update/{id}', 'newSalesController@update');
	Route::get('/destroy/{id}', 'newSalesController@destroy');

});

Route::group(['prefix' => 'customers'], function () {

	Route::get('/create', 'CustomersController@create');
	Route::post('/store', 'CustomersController@store');
	Route::get('/view', 'CustomersController@view');
	Route::get('/index', 'CustomersController@index');
	Route::get('/show/{id}', 'CustomersController@show');
	Route::get('/edit/{id}', 'CustomersController@edit');
	Route::post('/update/{id}', 'CustomersController@update');
	Route::get('/destroy/{id}', 'CustomersController@destroy');

});

Route::group(['prefix' => 'purchases'], function () {

	Route::get('/create', 'purchasesController@create');
	Route::post('/store', 'purchasesController@store');
	Route::get('/view', 'purchasesController@view');
	Route::get('/index', 'purchasesController@index');
	Route::get('/show/{id}', 'purchasesController@show');
	Route::get('/edit/{id}', 'purchasesController@edit');
	Route::post('/update/{id}', 'purchasesController@update');
	Route::get('/destroy/{id}', 'purchasesController@destroy');
	Route::get('/nutpurchasesview', 'nutritioninventoryController@nutpurchasesview');
	Route::get('/nutpurchaseslist', 'nutritioninventoryController@nutpurchaseslist');
	Route::get('/nutritionpurchase', 'nutritioninventoryController@nutritionpurchase');
	Route::get('/sawdustpurchasesview', 'SawdustController@sawdustpurchasesview');
	Route::get('/sawdustpurchaseslist', 'SawdustController@sawdustpurchaseslist');
	Route::get('/sawdustpurchasecreate', 'SawdustController@sawdustpurchasecreate');
	Route::post('/sawduststore', 'SawdustController@store');

});

Route::group(['prefix' => 'supplier'], function () {

	Route::get('/create', 'SupplierController@create');
	Route::post('/store', 'SupplierController@store');
	Route::get('/view', 'SupplierController@view');
	Route::get('/index', 'SupplierController@index');
	Route::get('/show/{id}', 'SupplierController@show');
	Route::get('/edit/{id}', 'SupplierController@edit');
	Route::post('/update/{id}', 'SupplierController@update');
	Route::get('/destroy/{id}', 'SupplierController@destroy');

});

Route::group(['prefix' => 'turkeyvaccs'], function () {

	Route::get('/create', 'turkeyvaccsController@create');
	Route::post('/store', 'turkeyvaccsController@store');
	Route::get('/view', 'turkeyvaccsController@view');
	Route::get('/index', 'turkeyvaccsController@index');
	Route::get('/show/{id}', 'turkeyvaccsController@show');
	Route::get('/edit/{id}', 'turkeyvaccsController@edit');
	Route::post('/update/{id}', 'turkeyvaccsController@update');
	Route::get('/destroy/{id}', 'turkeyvaccsController@destroy');

});

Route::group(['prefix' => 'appusers'], function () {

	Route::get('/create', 'appusersController@create');
	Route::post('/store', 'appusersController@store');
	Route::get('/view', 'appusersController@view');
  Route::get('/viewmsg', 'appusersController@viewmsg');
  Route::get('/viewmsgdet/{id}', 'appusersController@viewmsgdet');
	Route::get('/index', 'appusersController@index');
  Route::get('/listmsg', 'appusersController@listmsg');
	Route::get('/show/{id}', 'appusersController@show');
	Route::get('/edit/{id}', 'appusersController@edit');
	Route::get('/resetpass/{id}', 'appusersController@editpass');
  Route::post('/update/{id}', 'appusersController@update');
  Route::post('/updatemsg/{id}', 'appusersController@updatemsg');
	Route::get('/destroy/{id}', 'appusersController@destroy');
	Route::get('/destroymsg/{id}', 'appusersController@destroymsg');

});
Route::group(['prefix' => 'movements'], function () {

	Route::get('/create', 'movementsController@create');
	Route::post('/store', 'movementsController@store');
	Route::get('/view', 'movementsController@view');
	Route::get('/index', 'movementsController@index');
	Route::get('/show/{id}', 'movementsController@show');
	Route::get('/edit/{id}', 'movementsController@edit');
	Route::post('/update/{id}', 'movementsController@update');
	Route::get('/destroy/{id}', 'movementsController@destroy');

});

Route::group(['prefix' => 'turkeyoperation'], function () {

	Route::get('/create', 'turkeyoperationController@create');
	Route::post('/store', 'turkeyoperationController@store');
	Route::get('/view', 'turkeyoperationController@view');
	Route::get('/index', 'turkeyoperationController@index');
	Route::get('/show/{id}', 'turkeyoperationController@show');
  Route::get('/details/{id}', 'turkeyoperationController@details');
	Route::get('/edit/{id}', 'turkeyoperationController@edit');
	Route::post('/update/{id}', 'turkeyoperationController@update');
	Route::get('/destroy/{id}', 'turkeyoperationController@destroy');
	Route::get('/mortadminselectBatch', 'turkeyoperationController@mortadminselectBatch');
	Route::get('/editmorperbatch/{id}', 'turkeyoperationController@editmorperbatch');
	Route::post('/updatemortality/{id}', 'turkeyoperationController@updatemortality');

	
});

Route::group(['prefix' => 'turkeybreedingjournal'], function () {

	Route::get('/create', 'turkeybreedingjournalController@create');
	Route::post('/store', 'turkeybreedingjournalController@store');
	Route::get('/view', 'turkeybreedingjournalController@view');
	Route::get('/index', 'turkeybreedingjournalController@index');
	Route::get('/show/{id}', 'turkeybreedingjournalController@show');
	Route::get('/edit/{id}', 'turkeybreedingjournalController@edit');
	Route::post('/update/{id}', 'turkeybreedingjournalController@update');
	Route::get('/destroy/{id}', 'turkeybreedingjournalController@destroy');
});

Route::group(['prefix' => 'search'], function () {
	Route::any('/farm_name', 'SearchController@farm_name');
  Route::any('/supplier_name', 'SearchController@supplier_name');
  Route::any('/nutsupplier_name', 'SearchController@nutsupplier_name');
  Route::any('/farm_barn_name', 'SearchController@farm_barn_name');
  Route::any('/farm_occupied_barn_name', 'SearchController@farm_occupied_barn_name');
  Route::any('/customer_name', 'SearchController@customer_name');
  Route::any('/purchase_category_name', 'SearchController@purchase_category_name');
  Route::any('/batch_name', 'SearchController@batch_name');
  Route::any('/nut_name', 'SearchController@nut_name');
  Route::any('/nut_name_stock', 'SearchController@nut_name_stock');
  Route::any('/med_name', 'SearchController@med_name');
  Route::any('/doc_name', 'SearchController@doc_name');
  Route::any('/vac_name', 'SearchController@vac_name');
  Route::any('/fridge_name', 'SearchController@fridge_name');
  Route::any('/batch_name_by_barnID', 'SearchController@batch_name_by_barnID');
  Route::any('/med_name_stock', 'SearchController@med_name_stock');
  Route::any('/vac_name_stock', 'SearchController@vac_name_stock');
  Route::any('/cost_name', 'SearchController@cost_name');
});

Route::group(['prefix' => 'dataloader'], function () {

	Route::get('/viewSuppliers', 'DataloaderController@view');
	Route::post('/readSuppliers', 'DataloaderController@import');
	Route::get('/view', 'DataloaderController@view');
	Route::get('/index', 'DataloaderController@index');
	Route::get('/show/{id}', 'DataloaderController@show');
	Route::get('/edit/{id}', 'DataloaderController@edit');
	Route::post('/update/{id}', 'DataloaderController@update');
	Route::get('/destroy/{id}', 'DataloaderController@destroy');

});

Route::group(['prefix' => 'category'], function () {

	Route::get('/create', 'CategoryController@create');
	Route::post('/store', 'CategoryController@store');
	Route::get('/view', 'CategoryController@view');
	Route::get('/index', 'CategoryController@index');
	Route::get('/show/{id}', 'CategoryController@show');
	Route::get('/edit/{id}', 'CategoryController@edit');
	Route::post('/update/{id}', 'CategoryController@update');
	Route::get('/destroy/{id}', 'CategoryController@destroy');

});

Route::group(['prefix' => 'reports'], function () {

	Route::get('/sales/reportsalesfromto/index', 'printSalesfromtoController@index');
	Route::get('/sales/reportsalesfromto/fromto/{from}/{to}', 'printSalesfromtoController@fromto');
	Route::get('/sales/reportsalesfromto/view', 'printSalesfromtoController@view');
	Route::get('/stocktakeing/nutFromToView', 'stocktakeingController@nutselectFromTo');
	Route::post('/stocktakeing/nutrepview', 'stocktakeingController@inventNutfromTo');
	Route::get('/stocktakeing/medFromToView', 'stocktakeingController@medselectFromTo');
	Route::post('/stocktakeing/medrepview', 'stocktakeingController@inventMedfromTo');
	Route::get('/stocktakeing/VacsFromToView', 'stocktakeingController@vacselectFromTo');
	Route::post('/stocktakeing/vacrepview', 'stocktakeingController@inventVacfromTo');
	Route::get('/stocktakeing/SawdustFromToView', 'stocktakeingController@sawdustselectFromTo');
	Route::post('/stocktakeing/sawdustrepview', 'stocktakeingController@inventsawdustfromTo');
	Route::get('/costanalyses/actualcostsbybatchview', 'costanalysesController@actualcostsbybatchview');
	Route::get('/costanalyses/actualcostsbybatchindex', 'costanalysesController@actualcostsbybatchindex');
	Route::get('/costanalyses/kgmeatcostsbybatchview', 'costanalysesController@kgmeatcostsbybatchview');
	Route::get('/costanalyses/kgmeatcostsbybatchindex', 'costanalysesController@kgmeatcostsbybatchindex');
	Route::get('/nutconsumption/nutconsumption_rep', 'NutritionController@nutconsumption_rep');
});

Route::group(['prefix' => 'sawdust'], function () {

	Route::get('/create', 'SawdustController@create');
	Route::post('/store', 'SawdustController@store');
	Route::get('/view', 'SawdustController@view');
	Route::get('/index', 'SawdustController@index');
	Route::get('/show/{id}', 'SawdustController@show');
	Route::get('/edit/{id}', 'SawdustController@edit');
	Route::post('/update/{id}', 'SawdustController@update');
	Route::get('/destroy/{id}', 'SawdustController@destroy');
	Route::get('/sawdustinventoryview', 'SawdustController@sawdustInvview');
	Route::get('/sawdustinventoryindex', 'SawdustController@sawdustInvindex');

});

Route::group(['prefix' => 'fixedcosts'], function () {

	Route::get('/create', 'fixedcostsController@create');
	Route::post('/store', 'fixedcostsController@store');
	Route::get('/view', 'fixedcostsController@view');
	Route::get('/index', 'fixedcostsController@index');
	Route::get('/show/{id}', 'fixedcostsController@show');
	Route::get('/edit/{id}', 'fixedcostsController@edit');
	Route::post('/update/{id}', 'fixedcostsController@update');
	Route::get('/destroy/{id}', 'fixedcostsController@destroy');

});

Route::group(['prefix' => 'fixedcoststrx'], function () {

	Route::get('/create', 'fixedcoststrxController@create');
	Route::post('/store', 'fixedcoststrxController@store');
	Route::get('/view', 'fixedcoststrxController@view');
	Route::get('/index', 'fixedcoststrxController@index');
	Route::get('/show/{id}', 'fixedcoststrxController@show');
	Route::get('/edit/{id}', 'fixedcoststrxController@edit');
	Route::post('/update/{id}', 'fixedcoststrxController@update');
	Route::get('/destroy/{id}', 'fixedcoststrxController@destroy');

});

Route::group(['prefix' => 'test'], function () {

	Route::get('/testQS', 'testController@testQueryString');
	Route::get('/test01', function() {return "Goodbye";});

});

Route::group(['prefix' => 'facades'], function () {

	Route::get('/db', 'dbfacController@dbfac');


});

