<?php

use App\Http\Controllers\Job\JobController;
use Illuminate\Support\Facades\{Route,Auth};
use App\Http\Controllers\DashboardwwtController;
use App\Http\Controllers\Dashboarddty1Controller;
use App\Http\Controllers\Dashboardplf2Controller;
use App\Http\Controllers\DashboardgensetController;
use App\Http\Controllers\Compress\CompressController;
use App\Http\Controllers\{HomeController,DashboardController};


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


Auth::routes();
Route::get('/', HomeController::class)->name('home');
Route::middleware('auth')->group(function(){
Route::get('dashboard',DashboardController::class)->name('dashboard');    
Route::get('dashboarddty1',Dashboarddty1Controller::class)->name('dashboarddty1');    
Route::get('dashboardplf2',Dashboardplf2Controller::class)->name('dashboardplf2');    
Route::get('dashboardgenset',DashboardgensetController::class)->name('dashboardgenset');    
Route::get('dashboardwwt',DashboardwwtController::class)->name('dashboardwwt');    
Route::prefix('jobs')->group (function(){
    Route::get ('create',[JobController::class,'create'])->name('jobs.create'); 
    Route::post('create',[JobController::class,'store']);     
    Route::get ('zr5view',[JobController::class,'zr5view'])->name('jobs.zr5view'); 
    Route::get ('{job:id}/zr5edit',[JobController::class,'zr5edit'])->name('jobs.zr5edit');     
    Route::put ('{job:id}/zr5edit',[JobController::class,'update']);     
    Route::get ('polyview',[JobController::class,'polyview'])->name('jobs.polyview');     
    //Route::get ('polyviewpermesin',[JobController::class,'polyviewpermesin'])->name('jobs.polyviewpermesin');         
    Route::get ('{job:id}/edit',[JobController::class,'edit'])->name('jobs.edit');     
    Route::put ('{job:id}/edit',[JobController::class,'update']);     
    Route::get ('zr400poly',[JobController::class,'zr400poly'])->name('jobs.zr400poly'); 
    Route::post('zr400poly',[JobController::class,'storezr400poly']);     
    Route::get ('zr400polyview',[JobController::class,'zr400polyview'])->name('jobs.zr400polyview');     
    Route::get ('{job:id}/edit400poly',[JobController::class,'edit400poly'])->name('jobs.edit400poly');     
    Route::put ('{job:id}/edit400poly',[JobController::class,'update400poly']);     
    Route::get ('kaeser',[JobController::class,'kaeser'])->name('jobs.kaeser'); 
    Route::post('kaeser',[JobController::class,'storekaeser']);     
    Route::get ('kaeserview',[JobController::class,'kaeserview'])->name('jobs.kaeserview');         
    Route::get ('{job:id}/editkaeser',[JobController::class,'editkaeser'])->name('jobs.editkaeser');     
    Route::put ('{job:id}/editkaeser',[JobController::class,'updatekaeser']);     
    Route::get ('elliot',[JobController::class,'elliot'])->name('jobs.elliot'); 
    Route::post('elliot',[JobController::class,'storeelliot']);     
    Route::get ('elliotview',[JobController::class,'elliotview'])->name('jobs.elliotview');         
    Route::get ('{job:id}/editelliot',[JobController::class,'editelliot'])->name('jobs.editelliot');     
    Route::put ('{job:id}/editelliot',[JobController::class,'updateelliot']);     
    Route::get ('cvgd_390',[JobController::class,'cvgd_390'])->name('jobs.cvgd_390'); 
    Route::post('cvgd_390',[JobController::class,'storecvgd_390']);     
    Route::get ('cvgd390view',[JobController::class,'cvgd390view'])->name('jobs.cvgd390view');         
    Route::get ('{job:id}/editcvgd390',[JobController::class,'editcvgd390'])->name('jobs.editcvgd390');     
    Route::put ('{job:id}/editcvgd390',[JobController::class,'updatecvgd390']);     
    Route::get ('cvhe_330_590',[JobController::class,'cvhe_330_590'])->name('jobs.cvhe_330_590'); 
    Route::post('cvhe_330_590',[JobController::class,'storecvhe_330_590']);     
    Route::get ('cvhe330590view',[JobController::class,'cvhe330590view'])->name('jobs.cvhe330590view');         
    Route::get ('{job:id}/editcvhe330590',[JobController::class,'editcvhe330590'])->name('jobs.editcvhe330590');     
    Route::put ('{job:id}/editcvhe330590',[JobController::class,'updatecvhe330590']);     
    Route::get ('ac_unit_poly',[JobController::class,'ac_unit_poly'])->name('jobs.ac_unit_poly'); 
    Route::post('ac_unit_poly',[JobController::class,'storeac_unit_poly']);     
    Route::get ('ac_unit_polyview',[JobController::class,'ac_unit_polyview'])->name('jobs.ac_unit_polyview');         
    Route::get ('{job:id}/editac_unit_poly',[JobController::class,'editac_unit_poly'])->name('jobs.editac_unit_poly');     
    Route::put ('{job:id}/editac_unit_poly',[JobController::class,'updateac_unit_poly']);     
    Route::get ('dryer_poly',[JobController::class,'dryer_poly'])->name('jobs.dryer_poly'); 
    Route::post('dryer_poly',[JobController::class,'storedryer_poly']);     
    Route::get ('dryer_polyview',[JobController::class,'dryer_polyview'])->name('jobs.dryer_polyview');         
    Route::get ('{job:id}/editdryer_poly',[JobController::class,'editdryer_poly'])->name('jobs.editdryer_poly');     
    Route::put ('{job:id}/editdryer_poly',[JobController::class,'updatedryer_poly']);     
    Route::get ('ahu_spinning1',[JobController::class,'ahu_spinning1'])->name('jobs.ahu_spinning1'); 
    Route::post('ahu_spinning1',[JobController::class,'storeahu_spinning1']);     
    Route::get ('ahu_spinning1view',[JobController::class,'ahu_spinning1view'])->name('jobs.ahu_spinning1view');         
    Route::get ('{job:id}/editahu_spinning1',[JobController::class,'editahu_spinning1'])->name('jobs.editahu_spinning1');     
    Route::put ('{job:id}/editahu_spinning1',[JobController::class,'updateahu_spinning1']);     
    Route::get ('trafo',[JobController::class,'trafo'])->name('jobs.trafo'); 
    Route::post('trafo',[JobController::class,'storetrafo']);   
    Route::get ('trafoview',[JobController::class,'trafoview'])->name('jobs.trafoview');         
    Route::get ('{job:id}/edittrafo',[JobController::class,'edittrafo'])->name('jobs.edittrafo');     
    Route::put ('{job:id}/edittrafo',[JobController::class,'updatetrafo']);     
    Route::get ('ahu',[JobController::class,'ahu'])->name('jobs.ahu'); 
    Route::post('ahu',[JobController::class,'storeahu']);     
    Route::get ('n2_plant',[JobController::class,'n2_plant'])->name('jobs.n2_plant'); 
    Route::post('n2_plant',[JobController::class,'storen2_plant']);     
    Route::get ('n2_plantview',[JobController::class,'n2_plantview'])->name('jobs.n2_plantview');         
    Route::get ('{job:id}/editn2_plant',[JobController::class,'editn2_plant'])->name('jobs.editn2_plant');     
    Route::put ('{job:id}/editn2_plant',[JobController::class,'updaten2_plant']);     
    Route::get ('demin_water',[JobController::class,'demin_water'])->name('jobs.demin_water'); 
    Route::post('demin_water',[JobController::class,'storedemin_water']);     
    Route::get ('deminwaterview',[JobController::class,'deminwaterview'])->name('jobs.deminwaterview');         
    Route::get ('{job:id}/editdeminwater',[JobController::class,'editdeminwater'])->name('jobs.editdeminwater');     
    Route::put ('{job:id}/editdeminwater',[JobController::class,'updatedeminwater']);     
    Route::get ('employee',[JobController::class,'create'])->name('jobs.employee'); 
    //Route::get ('cetak',[JobController::class,'cetak'])->name('jobs.cetak'); 
    Route::get ('compressordty1',[JobController::class,'compressordty1'])->name('jobs.compressordty1'); 
    Route::post('compressordty1',[JobController::class,'storecompressordty1']);     
    Route::get ('compressordty1view',[JobController::class,'compressordty1view'])->name('jobs.compressordty1view');         
    Route::get ('{job:id}/editcompressordty1',[JobController::class,'editcompressordty1'])->name('jobs.editcompressordty1');     
    Route::put ('{job:id}/editcompressordty1',[JobController::class,'updatecompressordty1']);     
    Route::get ('zr425',[JobController::class,'zr425'])->name('jobs.zr425'); 
    Route::post('zr425',[JobController::class,'storezr425']);     
    Route::get ('zr425view',[JobController::class,'zr425view'])->name('jobs.zr425view');         
    Route::get ('{job:id}/editzr425',[JobController::class,'editzr425'])->name('jobs.editzr425');     
    Route::put ('{job:id}/editzr425',[JobController::class,'updatezr425']);     
    Route::get ('elliotplf2',[JobController::class,'elliotplf2'])->name('jobs.elliotplf2'); 
    Route::post('elliotplf2',[JobController::class,'storeelliotplf2']);     
    Route::get ('elliotplf2view',[JobController::class,'elliotplf2view'])->name('jobs.elliotplf2view');         
    Route::get ('{job:id}/editelliotplf2',[JobController::class,'editelliotplf2'])->name('jobs.editelliotplf2');     
    Route::put ('{job:id}/editelliotplf2',[JobController::class,'updateelliotplf2']);     
    Route::get ('dryerfd1600plf2',[JobController::class,'dryerfd1600plf2'])->name('jobs.dryerfd1600plf2'); 
    Route::post('dryerfd1600plf2',[JobController::class,'storedryerfd1600plf2']);     
    Route::get ('dryerfd1600plf2view',[JobController::class,'dryerfd1600plf2view'])->name('jobs.dryerfd1600plf2view');         
    Route::get ('{job:id}/editdryerfd1600plf2',[JobController::class,'editdryerfd1600plf2'])->name('jobs.editdryerfd1600plf2');     
    Route::put ('{job:id}/editdryerfd1600plf2',[JobController::class,'updatedryerfd1600plf2']);     
    Route::get ('chillercvhe590',[JobController::class,'chillercvhe590'])->name('jobs.chillercvhe590'); 
    Route::post('chillercvhe590',[JobController::class,'storechillercvhe590']);     
    Route::get ('chillercvhe590view',[JobController::class,'chillercvhe590view'])->name('jobs.chillercvhe590view');         
    Route::get ('{job:id}/editchillercvhe590',[JobController::class,'editchillercvhe590'])->name('jobs.editchillercvhe590');     
    Route::put ('{job:id}/editchillercvhe590',[JobController::class,'updatechillercvhe590']);     
    Route::get ('ahu_spinning2',[JobController::class,'ahu_spinning2'])->name('jobs.ahu_spinning2'); 
    Route::post('ahu_spinning2',[JobController::class,'storeahu_spinning2']);     
    Route::get ('ahu_spinning2view',[JobController::class,'ahu_spinning2view'])->name('jobs.ahu_spinning2view');         
    Route::get ('{job:id}/editahu_spinning2',[JobController::class,'editahu_spinning2'])->name('jobs.editahu_spinning2');     
    Route::put ('{job:id}/editahu_spinning2',[JobController::class,'updateahu_spinning2']);     
    Route::get ('trafogenset',[JobController::class,'trafogenset'])->name('jobs.trafogenset'); 
    Route::post('trafogenset',[JobController::class,'storetrafogenset']);     
    Route::get ('trafogensetview',[JobController::class,'trafogensetview'])->name('jobs.trafogensetview');         
    Route::get ('{job:id}/edittrafogenset',[JobController::class,'edittrafogenset'])->name('jobs.edittrafogenset');     
    Route::put ('{job:id}/edittrafogenset',[JobController::class,'updatetrafogenset']);     
    Route::get ('dieselengine1',[JobController::class,'dieselengine1'])->name('jobs.dieselengine1'); 
    Route::post('dieselengine1',[JobController::class,'storedieselengine1']);     
    Route::get ('dieselengine1view',[JobController::class,'dieselengine1view'])->name('jobs.dieselengine1view');         
    Route::get ('{job:id}/editdieselengine1',[JobController::class,'editdieselengine1'])->name('jobs.editdieselengine1');     
    Route::put ('{job:id}/editdieselengine1',[JobController::class,'updatedieselengine1']);     
    Route::get ('dieselengine2',[JobController::class,'dieselengine2'])->name('jobs.dieselengine2'); 
    Route::post('dieselengine2',[JobController::class,'storedieselengine2']);     
    Route::get ('dieselengine2view',[JobController::class,'dieselengine2view'])->name('jobs.dieselengine2view');         
    Route::get ('{job:id}/editdieselengine2',[JobController::class,'editdieselengine2'])->name('jobs.editdieselengine2');     
    Route::put ('{job:id}/editdieselengine2',[JobController::class,'updatedieselengine2']);     
    Route::get ('gasengine1',[JobController::class,'gasengine1'])->name('jobs.gasengine1'); 
    Route::post('gasengine1',[JobController::class,'storegasengine1']);     
    Route::get ('gasengine1view',[JobController::class,'gasengine1view'])->name('jobs.gasengine1view');         
    Route::get ('{job:id}/editgasengine1',[JobController::class,'editgasengine1'])->name('jobs.editgasengine1');     
    Route::put ('{job:id}/editgasengine1',[JobController::class,'updategasengine1']);     
    Route::get ('gasengine2',[JobController::class,'gasengine2'])->name('jobs.gasengine2'); 
    Route::post('gasengine2',[JobController::class,'storegasengine2']);     
    Route::get ('gasengine2view',[JobController::class,'gasengine2view'])->name('jobs.gasengine2view');         
    Route::get ('{job:id}/editgasengine2',[JobController::class,'editgasengine2'])->name('jobs.editgasengine2');     
    Route::put ('{job:id}/editgasengine2',[JobController::class,'updategasengine2']);     
    Route::get ('chemical',[JobController::class,'chemical'])->name('jobs.chemical'); 
    Route::post('chemical',[JobController::class,'storechemical']);     
    Route::get ('chemicalview',[JobController::class,'chemicalview'])->name('jobs.chemicalview');         
    Route::get ('{job:id}/editchemical',[JobController::class,'editchemical'])->name('jobs.editchemical');     
    Route::put ('{job:id}/editchemical',[JobController::class,'updatechemical']);     
    Route::get ('panelstarter',[JobController::class,'panelstarter'])->name('jobs.panelstarter'); 
    Route::post('panelstarter',[JobController::class,'storepanelstarter']);     
    Route::get ('panelstarterview',[JobController::class,'panelstarterview'])->name('jobs.panelstarterview');         
    Route::get ('{job:id}/editpanelstarter',[JobController::class,'editpanelstarter'])->name('jobs.editpanelstarter');     
    Route::put ('{job:id}/editpanelstarter',[JobController::class,'updatepanelstarter']);     
    Route::get ('auxiliary1',[JobController::class,'auxiliary1'])->name('jobs.auxiliary1'); 
    Route::post('auxiliary1',[JobController::class,'storeauxiliary1']);     
    Route::get ('auxiliary1view',[JobController::class,'auxiliary1view'])->name('jobs.auxiliary1view');         
    Route::get ('{job:id}/editauxiliary1',[JobController::class,'editauxiliary1'])->name('jobs.editauxiliary1');     
    Route::put ('{job:id}/editauxiliary1',[JobController::class,'updateauxiliary1']);     
    Route::get ('auxiliary2',[JobController::class,'auxiliary2'])->name('jobs.auxiliary2'); 
    Route::post('auxiliary2',[JobController::class,'storeauxiliary2']);     
    Route::get ('auxiliary2view',[JobController::class,'auxiliary2view'])->name('jobs.auxiliary2view');         
    Route::get ('{job:id}/editauxiliary2',[JobController::class,'editauxiliary2'])->name('jobs.editauxiliary2');     
    Route::put ('{job:id}/editauxiliary2',[JobController::class,'updateauxiliary2']);     
    Route::get ('flowmeter',[JobController::class,'flowmeter'])->name('jobs.flowmeter'); 
    Route::post('flowmeter',[JobController::class,'storeflowmeter']);     
    Route::get ('flowmeterview',[JobController::class,'flowmeterview'])->name('jobs.flowmeterview');         
    Route::get ('{job:id}/editflowmeter',[JobController::class,'editflowmeter'])->name('jobs.editflowmeter');     
    Route::put ('{job:id}/editflowmeter',[JobController::class,'updateflowmeter']);     
    Route::get ('wwt',[JobController::class,'wwt'])->name('jobs.wwt'); 
    Route::post('wwt',[JobController::class,'storewwt']);     
    Route::get ('wwtview',[JobController::class,'wwtview'])->name('jobs.wwtview');         
    Route::get ('{job:id}/editwwt',[JobController::class,'editwwt'])->name('jobs.editwwt');     
    Route::put ('{job:id}/editwwt',[JobController::class,'updatewwt']);     
    Route::get ('paramwwt',[JobController::class,'paramwwt'])->name('jobs.paramwwt'); 
    Route::post('paramwwt',[JobController::class,'storeparamwwt']);     
    Route::get ('paramwwtview',[JobController::class,'paramwwtview'])->name('jobs.paramwwtview');         
    Route::get ('{job:id}/editparamwwt',[JobController::class,'editparamwwt'])->name('jobs.editparamwwt');     
    Route::put ('{job:id}/editparamwwt',[JobController::class,'updateparamwwt']);     
    Route::get ('dailyreport',[JobController::class,'dailyreport'])->name('jobs.dailyreport'); 
    Route::post('dailyreport',[JobController::class,'storedailyreport']);     
    Route::get ('dailyreportview',[JobController::class,'dailyreportview'])->name('jobs.dailyreportview');         
    Route::get ('{job:id}/editdailyreport',[JobController::class,'editdailyreport'])->name('jobs.editdailyreport');     
    Route::put ('{job:id}/editdailyreport',[JobController::class,'updatedailyreport']);     

    Route::get ('trafowwt',[JobController::class,'trafowwt'])->name('jobs.trafowwt'); 
    Route::post('trafowwt',[JobController::class,'storetrafowwt']);     
    Route::get ('trafowwtview',[JobController::class,'trafowwtview'])->name('jobs.trafowwtview');         
    Route::get ('{job:id}/edittrafowwt',[JobController::class,'edittrafowwt'])->name('jobs.edittrafowwt');     
    Route::put ('{job:id}/edittrafowwt',[JobController::class,'updatetrafowwt']);     
    Route::get ('dryerdty1',[JobController::class,'dryerdty1'])->name('jobs.dryerdty1'); 
    Route::post('dryerdty1',[JobController::class,'storedryerdty1']);     
    Route::get ('dryerdty1view',[JobController::class,'dryerdty1view'])->name('jobs.dryerdty1view');         
    Route::get ('{job:id}/editdryerdty1',[JobController::class,'editdryerdty1'])->name('jobs.editdryerdty1');     
    Route::put ('{job:id}/editdryerdty1',[JobController::class,'updatedryerdty1']);     
    Route::get ('chillercvhe530',[JobController::class,'chillercvhe530'])->name('jobs.chillercvhe530'); 
    Route::post('chillercvhe530',[JobController::class,'storechillercvhe530']);     
    Route::get ('chillercvhe530view',[JobController::class,'chillercvhe530view'])->name('jobs.chillercvhe530view');         
    Route::get ('{job:id}/editchillercvhe530',[JobController::class,'editchillercvhe530'])->name('jobs.editchillercvhe530');     
    Route::put ('{job:id}/editchillercvhe530',[JobController::class,'updatechillercvhe530']);     
    Route::get ('ac_station',[JobController::class,'ac_station'])->name('jobs.ac_station'); 
    Route::post('ac_station',[JobController::class,'storeac_station']);     
    Route::get ('ac_stationview',[JobController::class,'ac_stationview'])->name('jobs.ac_stationview');         
    Route::get ('{job:id}/editac_station',[JobController::class,'editac_station'])->name('jobs.editac_station');     
    Route::put ('{job:id}/editac_station',[JobController::class,'updateac_station']);     
    Route::get ('trafodty1',[JobController::class,'trafodty1'])->name('jobs.trafodty1'); 
    Route::post('trafodty1',[JobController::class,'storetrafodty1']);     
    Route::get ('trafodty1view',[JobController::class,'trafodty1view'])->name('jobs.trafodty1view');         
    Route::get ('{job:id}/edittrafodty1',[JobController::class,'edittrafodty1'])->name('jobs.edittrafodty1');     
    Route::put ('{job:id}/edittrafodty1',[JobController::class,'updatetrafodty1']);     
    Route::get ('wt',[JobController::class,'wt'])->name('jobs.wt'); 
    Route::post('wt',[JobController::class,'storewt']);     
    Route::get ('wtview',[JobController::class,'wtview'])->name('jobs.wtview');         
    Route::get ('{job:id}/editwt',[JobController::class,'editwt'])->name('jobs.editwt');     
    Route::put ('{job:id}/editwt',[JobController::class,'updatewt']);     
    Route::get ('garduinduk',[JobController::class,'garduinduk'])->name('jobs.garduinduk'); 
    Route::post('garduinduk',[JobController::class,'storegarduinduk']);     
    Route::get ('garduindukview',[JobController::class,'garduindukview'])->name('jobs.garduindukview');         
    Route::get ('{job:id}/editgarduinduk',[JobController::class,'editgarduinduk'])->name('jobs.editgarduinduk');     
    Route::put ('{job:id}/editgarduinduk',[JobController::class,'updategarduinduk']);     
   
    Route::get ('ac_stationplf2',[JobController::class,'ac_stationplf2'])->name('jobs.ac_stationplf2'); 
    Route::post('ac_stationplf2',[JobController::class,'storeac_stationplf2']);     
    Route::get ('ac_stationplf2view',[JobController::class,'ac_stationplf2view'])->name('jobs.ac_stationplf2view');         
    Route::get ('{job:id}/editac_stationplf2',[JobController::class,'editac_stationplf2'])->name('jobs.editac_stationplf2');     
    Route::put ('{job:id}/editac_stationplf2',[JobController::class,'updateac_stationplf2']);     

    Route::get('exportpdf',[JobController::class,'exportpdf'])->name('jobs.exportpdf');      
    Route::get('cetakpdf',[JobController::class,'cetakpdf'])->name('jobs.datajobs');                
});    

});



//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
