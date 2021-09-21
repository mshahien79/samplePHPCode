<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class barnjournalController extends Controller
{
  /**
   * Display a listing of the resource.

    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
   }
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */

    public function IndexWgtJournal(Request $request)
    {
        if(!isset($request['order'])){
            if($request['order']!='desc')
            $request['order']='desc';

        }

        if(!isset($request['search'])){
            if($request['search']!='%%')
            $request['search']='%%';

        }else{
            $request['search']='%'.$request['search'].'%';
        }

        if(!isset($request['filter'])){

            $request['filter'] = [];

        }

        if(!isset($request['sort'])){
            if($request['sort']!='id')
            $request['sort']='id';

        }

        $rows = \App\Models\WeightsJournalView::whereDate('created_at', '=' , date('Y-m-d'))
                ->Where(function ($query) use($request){
                              $query->where('id','like',$request['search'])
                              ->orWhere('currentAvgWeightMale','like',$request['search'])
                              ->orWhere('currentAvgWeightFemale','like',$request['search'])
                              ->orWhere('pastAvgWeightMale','like',$request['search'])
                              ->orWhere('pastAvgWeightFemale','like',$request['search'])
                              ->orWhere('batch_name','like',$request['search'])
                              ->orWhere('barn_name','like',$request['search'])
                              ->orWhere('farm_name','like',$request['search']);
                          })->orderBy($request['sort'],$request['order'])
                            ->skip($request['offset'])
                            ->take($request['limit'])
                            ->get();



        $total = \App\Models\WeightsJournalView::where(function($query) use($request){
                    $query->orwhere('id','like',$request['search'])
                    ->orwhere('currentAvgWeightMale','like',$request['search'])
                    ->orwhere('currentAvgWeightFemale','like',$request['search'])
                    ->orwhere('pastAvgWeightMale','like',$request['search'])
                    ->orwhere('pastAvgWeightFemale','like',$request['search'])
                    ->orwhere('batch_name','like',$request['search'])
                    ->orwhere('barn_name','like',$request['search'])
                    ->orwhere('farm_name','like',$request['search']);
                  })->count();

        return ['rows'=>$rows,'total'=>$total];
    }
    public function IndexNutJournal(Request $request)
    {
        if(!isset($request['order'])){
            if($request['order']!='desc')
            $request['order']='desc';

        }

        if(!isset($request['search'])){
            if($request['search']!='%%')
            $request['search']='%%';

        }else{
            $request['search']='%'.$request['search'].'%';
        }

        if(!isset($request['filter'])){

            $request['filter'] = [];

        }

        if(!isset($request['sort'])){
            if($request['sort']!='id')
            $request['sort']='id';

        }

        $rows = \App\Models\NutritionJournalView::where(function($query) use($request){
                      $query->orwhere('id','like',$request['search'])
                      ->orwhere('nut_name','like',$request['search'])
                      ->orwhere('nut_quantity_into_barn','like',$request['search'])
                      ->orwhere('batch_name','like',$request['search'])
                      ->orwhere('barn_name','like',$request['search'])
                      ->orwhere('nut_bag_price','like',$request['search'])                      
                      ->orwhere('farm_name','like',$request['search']);
                  })->orderBy($request['sort'],$request['order'])
                    ->skip($request['offset'])
                    ->take($request['limit'])
                    ->get();

        $total = \App\Models\NutritionJournalView::where(function($query) use($request){
                    $query->orwhere('id','like',$request['search'])
                    ->orwhere('nut_name','like',$request['search'])
                    ->orwhere('nut_quantity_into_barn','like',$request['search'])
                    ->orwhere('batch_name','like',$request['search'])
                    ->orwhere('barn_name','like',$request['search'])
                    ->orwhere('farm_name','like',$request['search']);
                  })->count();

        return ['rows'=>$rows,'total'=>$total];
    }
    public function IndexMedJournal(Request $request)
    {
        if(!isset($request['order'])){
            if($request['order']!='desc')
            $request['order']='desc';

        }

        if(!isset($request['search'])){
            if($request['search']!='%%')
            $request['search']='%%';

        }else{
            $request['search']='%'.$request['search'].'%';
        }

        if(!isset($request['filter'])){

            $request['filter'] = [];

        }

        if(!isset($request['sort'])){
            if($request['sort']!='id')
            $request['sort']='id';

        }

        $rows = \App\Models\MedicinesJournalView::where(function($query) use($request){
                      $query->orwhere('id','like',$request['search'])
                      ->orwhere('batch_name','like',$request['search'])
                      ->orwhere('med_name','like',$request['search'])
                      ->orwhere('used_med_quantity','like',$request['search'])
                      ->orwhere('prescription','like',$request['search'])
                      ->orwhere('barn_name','like',$request['search'])
                      ->orwhere('farm_name','like',$request['search'])
                      ->orwhere('doc_name_ar','like',$request['search']);
                  })->orderBy($request['sort'],$request['order'])
                    ->skip($request['offset'])
                    ->take($request['limit'])
                    ->get();

        $total = \App\Models\MedicinesJournalView::where(function($query) use($request){
                    $query->orwhere('id','like',$request['search'])
                    ->orwhere('batch_name','like',$request['search'])
                    ->orwhere('med_name','like',$request['search'])
                    ->orwhere('used_med_quantity','like',$request['search'])
                    ->orwhere('prescription','like',$request['search'])
                    ->orwhere('barn_name','like',$request['search'])
                    ->orwhere('farm_name','like',$request['search'])
                    ->orwhere('doc_name_ar','like',$request['search']);;
                  })->count();

        return ['rows'=>$rows,'total'=>$total];
    }
    public function IndexVacJournal(Request $request)
    {
        if(!isset($request['order'])){
            if($request['order']!='desc')
            $request['order']='desc';

        }

        if(!isset($request['search'])){
            if($request['search']!='%%')
            $request['search']='%%';

        }else{
            $request['search']='%'.$request['search'].'%';
        }

        if(!isset($request['filter'])){

            $request['filter'] = [];

        }

        if(!isset($request['sort'])){
            if($request['sort']!='id')
            $request['sort']='id';

        }

        $rows = \App\Models\VaccinesJournalView::where(function($query) use($request){
                      $query->orwhere('id','like',$request['search'])
                      ->orwhere('batch_name','like',$request['search'])
                      ->orwhere('vac_name','like',$request['search'])
                      ->orwhere('prescription','like',$request['search'])
                      ->orwhere('barn_name','like',$request['search'])
                      ->orwhere('farm_name','like',$request['search'])
                      ->orwhere('doc_name_ar','like',$request['search']);
                  })->orderBy($request['sort'],$request['order'])
                    ->skip($request['offset'])
                    ->take($request['limit'])
                    ->get();

        $total = \App\Models\VaccinesJournalView::where(function($query) use($request){
                    $query->orwhere('id','like',$request['search'])
                    ->orwhere('batch_name','like',$request['search'])
                    ->orwhere('vac_name','like',$request['search'])
                    ->orwhere('prescription','like',$request['search'])
                    ->orwhere('barn_name','like',$request['search'])
                    ->orwhere('farm_name','like',$request['search'])
                    ->orwhere('doc_name_ar','like',$request['search']);
                  })->count();

        return ['rows'=>$rows,'total'=>$total];
    }
    
    
    public function IndexSawdustJournal(Request $request)
    {
        if(!isset($request['order'])){
            if($request['order']!='desc')
            $request['order']='desc';

        }

        if(!isset($request['search'])){
            if($request['search']!='%%')
            $request['search']='%%';

        }else{
            $request['search']='%'.$request['search'].'%';
        }

        if(!isset($request['filter'])){

            $request['filter'] = [];

        }

        if(!isset($request['sort'])){
            if($request['sort']!='id')
            $request['sort']='id';

        }

        $rows = \App\Models\SawdustJournalView::where(function($query) use($request){
                      $query->orwhere('id','like',$request['search'])
                      ->orwhere('sawdust_quantity_into_barn','like',$request['search'])
                      ->orwhere('barn_name','like',$request['search'])
                      ->orwhere('farm_name','like',$request['search']);
                  })->orderBy($request['sort'],$request['order'])
                    ->skip($request['offset'])
                    ->take($request['limit'])
                    ->get();

        $total = \App\Models\SawdustJournalView::where(function($query) use($request){
                    $query->orwhere('id','like',$request['search'])
                    ->orwhere('sawdust_quantity_into_barn','like',$request['search'])
                    ->orwhere('barn_name','like',$request['search'])
                    ->orwhere('farm_name','like',$request['search']);
                  })->count();

        return ['rows'=>$rows,'total'=>$total];       
    }


    public function IndexReferigeratorJournal(Request $request)
    {
        if(!isset($request['order'])){
            if($request['order']!='desc')
            $request['order']='desc';

        }

        if(!isset($request['search'])){
            if($request['search']!='%%')
            $request['search']='%%';

        }else{
            $request['search']='%'.$request['search'].'%';
        }

        if(!isset($request['filter'])){

            $request['filter'] = [];

        }

        if(!isset($request['sort'])){
            if($request['sort']!='id')
            $request['sort']='id';

        }

        $rows = \App\Models\emergSlaughtJournalView::where(function($query) use($request){
                      $query->orwhere('id','like',$request['search'])
                      ->orwhere('slaught_no','like',$request['search'])
                      ->orwhere('slaught_type','like',$request['search'])
                      ->orwhere('slaught_weight','like',$request['search'])
                      ->orwhere('fridge_name','like',$request['search'])
                      ->orwhere('batch_name','like',$request['search'])
                      ->orwhere('barn_name','like',$request['search'])
                      ->orwhere('farm_name','like',$request['search']);
                  })->orderBy($request['sort'],$request['order'])
                    ->skip($request['offset'])
                    ->take($request['limit'])
                    ->get();

        $total = \App\Models\emergSlaughtJournalView::where(function($query) use($request){
                    $query->orwhere('id','like',$request['search'])
                    ->orwhere('slaught_no','like',$request['search'])
                    ->orwhere('slaught_type','like',$request['search'])
                    ->orwhere('slaught_weight','like',$request['search'])
                    ->orwhere('fridge_name','like',$request['search'])
                    ->orwhere('batch_name','like',$request['search'])
                    ->orwhere('barn_name','like',$request['search'])
                    ->orwhere('farm_name','like',$request['search']);
                  })->count();

        return ['rows'=>$rows,'total'=>$total];
    }
    public function IndexMortJournal(Request $request)
    {
        if(!isset($request['order'])){
            if($request['order']!='desc')
            $request['order']='desc';

        }

        if(!isset($request['search'])){
            if($request['search']!='%%')
            $request['search']='%%';

        }else{
            $request['search']='%'.$request['search'].'%';
        }

        if(!isset($request['filter'])){

            $request['filter'] = [];

        }

        if(!isset($request['sort'])){
            if($request['sort']!='id')
            $request['sort']='id';

        }

        $rows = \App\Models\MortalityJournalView::where(function($query) use($request){
                      $query->orwhere('id','like',$request['search'])
                      ->orwhere('mortality_number','like',$request['search'])
                      ->orwhere('mort_kind','like',$request['search'])                     
                      ->orwhere('mortality_cause','like',$request['search'])
                      ->orwhere('batch_name','like',$request['search'])
                      ->orwhere('barn_name','like',$request['search'])
                      ->orwhere('farm_name','like',$request['search']);
                  })->orderBy($request['sort'],$request['order'])
                    ->skip($request['offset'])
                    ->take($request['limit'])
                    ->get();

        $total = \App\Models\MortalityJournalView::where(function($query) use($request){
                    $query->orwhere('id','like',$request['search'])
                    ->orwhere('mortality_number','like',$request['search'])
                    ->orwhere('mort_kind','like',$request['search'])  
                    ->orwhere('mortality_cause','like',$request['search'])
                    ->orwhere('batch_name','like',$request['search'])
                    ->orwhere('barn_name','like',$request['search'])
                    ->orwhere('farm_name','like',$request['search']);
                  })->count();

        return ['rows'=>$rows,'total'=>$total];
    }

    public function view()
    {
        return view('barns.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nutStock= \App\Models\NutritionInventoryView::get();
        $barnocc = \App\Models\OccupiedBarns::pluck('Barn_Batch', 'barn_id','batch_id');
        $arrnutStock = array();
        $length = count($nutStock);
        foreach ($nutStock as $key => $value)
        {
          $nutStock[$key]['value'] = $value->nut_stock_bag;
        }
        return view('barnjournal.create')->with('nutStock',$nutStock)->with('barnocc',$barnocc);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeWghtJournal(Request $request){
      try { 
        
        $batch = \App\Models\TurkeyBreeding::where(function($query) use($request){
            $query->where('barn_id', $request->barn_id)
            ->where('BatchAllSold','0');
        })->get()->first();

        $wgt =\App\Models\WeightsJournalDetail::where('batch_id', $batch->id)->max('currentAvgWeightFemale');
        $wgt1 =\App\Models\WeightsJournalDetail::where('batch_id', $batch->id)->max('currentAvgWeightMale');

        $wgtJournal = array();
        $wgtJournal['id'] = 0;
        $wgtJournal['barn_id'] = $request->barn_id;
        $wgtJournal['batch_id'] = $batch->id;
        $wgtJournal['currentAvgWeightMale'] = $request->currentAvgWeightMale;
        $wgtJournal['currentAvgWeightFemale'] = $request->currentAvgWeightFemale;
        $wgtJournal['pastAvgWeightMale'] = $wgt1;
        $wgtJournal['pastAvgWeightFemale'] = $wgt;
        $wgtJournal['created_at'] = \Carbon\Carbon::now();
        $wgtJournalins = \App\Models\WeightsJournalDetail::insert($wgtJournal);


        /**update stock details with new weights*/
        echo "test test";
        echo $request->BatchName1;
        echo "test test";
        $stock = \App\Models\StockDetail::where('stock_name',$batch->BatchName)->get()->first();
        $ttlwgtmale = $request->currentAvgWeightMale*$stock->male_stock_quantity; 
        $ttlwgtfemale = $request->currentAvgWeightFemale*$stock->female_stock_quantity;   
        $stock->male_stock_wgt = $request->currentAvgWeightMale;
        $stock->female_stock_wgt = $request->currentAvgWeightFemale;
        $stock->current_TTL_MaleWeight = $ttlwgtmale;
        $stock->current_TTL_FemaleWeight = $ttlwgtfemale;
        $stock->updated_at = \Carbon\Carbon::now();
        $stock->save();

        /** */
         $messageType = 1;
            $message = "Success!";

        } 
        catch(\Illuminate\Database\QueryException $ex)
        {
            $messageType = 2;
            $message = "Failure!!";
        }

        return redirect(url("barnjournal/create"))->with('messageType',$messageType)->with('message',$message);

    }

    public function storeNutJournal(Request $request)
    {
      try { 
            // echo $request->nut_name1."echo ------------------------------------***zz";
            $batch = \App\Models\TurkeyBreeding::where(function($query) use($request){
                $query->where('barn_id', $request->barn_id)
                ->where('BatchAllSold','0');
            })->get()->first();

            $nuts = \App\Models\NutritionDetail::where('nut_name',$request->nut_name1)->get()->first(); 
            /** create NutritionJournalDetail record */
            $nutjournal = array();
            $nutjournal['barn_id'] = $request->barn_id;
            $nutjournal['nut_id'] = $nuts->id;
            $nutjournal['nut_quantity_into_barn'] = $request->nut_quantity_into_barn;
            $nutjournal['batch_id'] = $batch->id;
            $nutjournal['nut_bag_price'] = $request->nut_bag_price;
            $nutjournal['created_at'] = \Carbon\Carbon::now();
            $nutjournal = \App\Models\NutritionJournalDetail::insert($nutjournal);

            /** Update Nut stock after Nut dipensed */
            $nutstock = \App\Models\NutritionInventory::where('nut_id',$nuts->id)->get()->first(); 
            $nutstock->nut_stock_bag = (($request->nut_stock) - ($request->nut_quantity_into_barn));
            $nutstock->save();


          $messageType = 1;
          $message = "Success!";

      } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "Failure!!";
        }

        return redirect(url("barnjournal/create"))->with('messageType',$messageType)->with('message',$message);
    }

    public function storeMedJournal(Request $request)
    {
      try {
            $batch = \App\Models\TurkeyBreeding::where(function($query) use($request){
                $query->where('barn_id', $request->barn_id)
                ->where('BatchAllSold','0');
            })->get()->first();
            $meds = \App\Models\Medicines::where('med_name',$request->med_name1)->get()->first(); 
            /** create NutritionJournalDetail record */
            $medjournal = array();
            $medjournal['barn_id'] = $request->barn_id;
            $medjournal['med_id'] = $meds->id;
            $medjournal['doc_id'] = $request->doc_id;
            $medjournal['batch_id'] = $batch->id;
            $medjournal['used_med_quantity'] = $request->med_quantity_into_barn;           
            $medjournal['prescription'] = $request->prescription;
            $medjournal['created_at'] = \Carbon\Carbon::now();
            $medjournal = \App\Models\MedicinesJournalDetail::insert($medjournal);

            /** Update Nut stock after Nut dipensed */
            $medstock = \App\Models\MedicinesInventory::where('med_id',$meds->id)->get()->first(); 
            $medstock->med_quantity = (($medstock->med_quantity) - ($request->med_quantity_into_barn));
            $medstock->save();



          $messageType = 1;
            $message = "Success!";

      } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "Failure!!";
        }

        return redirect(url("barnjournal/create"))->with('messageType',$messageType)->with('message',$message);
    }
    public function storeVacJournal(Request $request)
    {
      try {
            $batch = \App\Models\TurkeyBreeding::where(function($query) use($request){
                $query->where('barn_id', $request->barn_id)
                ->where('BatchAllSold','0');
            })->get()->first();
            $vacs = \App\Models\VaccinationsDetail::where('vac_name',$request->vac_name1)->get()->first(); 
            /** create NutritionJournalDetail record */
            $vacjournal = array();
            $vacjournal['barn_id'] = $request->barn_id;
            $vacjournal['vac_id'] = $vacs->id;
            $vacjournal['doc_id'] = $request->doc_id;
            $vacjournal['batch_id'] = $batch->id;
            $vacjournal['used_vac_quantity'] = $request->vac_quantity_into_barn;           
            $vacjournal['prescription'] = $request->prescription;
            $vacjournal['created_at'] = \Carbon\Carbon::now();
            $vacjournal = \App\Models\VaccinesJournalDetail::insert($vacjournal);

            /** Update Nut stock after Nut dipensed */
            $vacstock = \App\Models\VaccinationsInventory::where('vac_id',$vacs->id)->get()->first(); 
            $vacstock->vac_quantity = (($vacstock->vac_quantity) - ($request->vac_quantity_into_barn));
            $vacstock->save();


          $messageType = 1;
            $message = "Success!";

      } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "Failure!!";
        }

        return redirect(url("barnjournal/create"))->with('messageType',$messageType)->with('message',$message);
    }
    
    public function storeSawdustJournal(Request $request)
    {
        try {
            $batch = \App\Models\TurkeyBreeding::where(function($query) use($request){
                $query->where('barn_id', $request->barn_id)
                ->where('BatchAllSold','0');
            })->get()->first();
            /** create SawdustJournalDetail record */
            $sawjournal = array();
            $sawjournal['barn_id'] = $request->barn_id;
            $sawjournal['batch_id'] = $batch->id;
            $sawjournal['sawdust_quantity_into_barn'] = $request->sawdust_quantity_into_barn;           
            $sawjournal['created_at'] = \Carbon\Carbon::now();
            $sawjournal = \App\Models\SawdustJournal::insert($sawjournal);

            /** get farm id from batch and barn ids */
            $farm = \App\Models\TurkeyBreedingView::where('barn_id',$request->barn_id)->
            where('id',$batch->id)->get()->first(); 

            /** Update sawdust stock after Nut dipensed */
            $sawduststock = \App\Models\SawdustInventory::where('farm_id',$farm->farm_id)->get()->first(); 
            $sawduststock->sawdust_quantity = (($sawduststock->sawdust_quantity) - ($request->sawdust_quantity_into_barn));
            $sawduststock->save();


          $messageType = 1;
            $message = "Success!";

      } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "Failure!!";
        }  

        return redirect(url("barnjournal/create"))->with('messageType',$messageType)->with('message',$message);

    }
    
    public function storeMortJournal(Request $request)
    {
      try {
            $batch = \App\Models\TurkeyBreeding::where(function($query) use($request){
                $query->where('barn_id', $request->barn_id)
                ->where('BatchAllSold','0');
            })->get()->first();

            $mortjournal = array();
            $mortjournal['barn_id'] = $request->barn_id;
            $mortjournal['batch_id'] = $batch->id;
            $mortjournal['mortality_number'] = $request->mortality_number; 
            $mortjournal['mortality_cause'] = $request->mortality_cause; 
            $mortjournal['mort_kind'] = $request->mort_kind;                      
            $mortjournal['created_at'] = \Carbon\Carbon::now();
            $mortjournal = \App\Models\MortalityJournalDetail::insert($mortjournal);

            /** Update the batch number */
            $turkeybreeding = \App\Models\TurkeyBreeding::where('id',$batch->id)->get()->first(); 
            $rows = \App\Models\StockDetail::where('stock_name',$turkeybreeding->BatchName)->get()->first();
            if($request->mort_kind == 'Male')
            {
                $rows->male_stock_quantity = $rows->male_stock_quantity - $request->mortality_number;
                $rows->current_TTL_MaleWeight = $rows->male_stock_wgt*$rows->male_stock_quantity;           
                $rows->stock_quantity = $rows->male_stock_quantity + $rows->female_stock_quantity;
                $rows->save();
            }
            elseif ($request->mort_kind == 'Female')
            {
                $rows->female_stock_quantity = $rows->female_stock_quantity - $request->mortality_number;
                $rows->current_TTL_FemaleWeight = $rows->female_stock_wgt*$rows->female_stock_quantity;           
                $rows->stock_quantity = $rows->male_stock_quantity + $rows->female_stock_quantity;
                $rows->save();

            }

           /* $turkeybreeding = \App\Models\TurkeyBreeding::where('BatchName',$request->BatchName)->get()->first(); */
            $turkeybreeding->MaleHeadCount  =   $rows->male_stock_quantity;
            $turkeybreeding->FemaleHeadCount  =   $rows->female_stock_quantity;
            $turkeybreeding->BatchHeadCount	= $turkeybreeding->FemaleHeadCount+$turkeybreeding->MaleHeadCount;
            $turkeybreeding->BatchMortalities = $turkeybreeding->BatchMortalities+$request->mortality_number;
            $turkeybreeding->save();

            $turkeybreedingdetails = array();
              $turkeybreedingdetails['batch_id'] = $turkeybreeding->id;
              $turkeybreedingdetails['transaction_id'] = 3; /** Mortality */
              $turkeybreedingdetails['affected_number'] = '-'.$request->mortality_number;
              $turkeybreedingdetails['created_at'] = \Carbon\Carbon::now();
            $turkeybreedingdetail = \App\Models\TurkeyBreedingDetails::insert($turkeybreedingdetails);



            /**end */

          $messageType = 1;
            $message = "Success!";

      } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "Failure!!";
        }

        return redirect(url("barnjournal/create"))->with('messageType',$messageType)->with('message',$message);
    }
    public function storeEmgSlghtJournal(Request $request)
    {
      try {
        $batch = \App\Models\TurkeyBreeding::where(function($query) use($request){
            $query->where('barn_id', $request->barn_id)
            ->where('BatchAllSold','0');
        })->get()->first();

        $emSljournal = array();
        $emSljournal['barn_id'] = $request->barn_id;
        $emSljournal['batch_id'] = $batch->id;
        $emSljournal['slaught_no'] = $request->slaught_no; 
        $emSljournal['slaught_weight'] = $request->slaught_weight; 
        $emSljournal['slaught_type'] = $request->slaught_type;   
        $emSljournal['slaugth_fridge_no'] = $request->slaugth_fridge_no;                     
        $emSljournal['created_at'] = \Carbon\Carbon::now();
        $emSljournal = \App\Models\emergSlaughtJournalDetail::insert($emSljournal);

        /** Update the batch number */
        $turkeybreeding = \App\Models\TurkeyBreeding::where('id',$batch->id)->get()->first(); 
        $rows = \App\Models\StockDetail::where('stock_name',$turkeybreeding->BatchName)->get()->first();
        if($request->slaught_type == 'Male')
        {
            $rows->male_stock_quantity = $rows->male_stock_quantity - $request->slaught_no;
            $rows->current_TTL_MaleWeight = $rows->male_stock_wgt*$rows->male_stock_quantity;           
            $rows->stock_quantity = $rows->male_stock_quantity + $rows->female_stock_quantity;
            $rows->save();
        }
        elseif ($request->slaught_type == 'Female')
        {
            $rows->female_stock_quantity = $rows->female_stock_quantity - $request->slaught_no;
            $rows->current_TTL_FemaleWeight = $rows->female_stock_wgt*$rows->female_stock_quantity;           
            $rows->stock_quantity = $rows->male_stock_quantity + $rows->female_stock_quantity;
            $rows->save();

        }
        $turkeybreeding->MaleHeadCount  =   $rows->male_stock_quantity;
        $turkeybreeding->FemaleHeadCount  =   $rows->female_stock_quantity;
        $turkeybreeding->BatchHeadCount	= $turkeybreeding->FemaleHeadCount+$turkeybreeding->MaleHeadCount;
        $turkeybreeding->save();

        /** Update the operations */
        $turkeybreedingdetails = array();
        $turkeybreedingdetails['batch_id'] = $turkeybreeding->id;
        $turkeybreedingdetails['transaction_id'] = 5; /** Emergency Slaught */
        $turkeybreedingdetails['affected_number'] = '-'.$request->slaught_no;
        $turkeybreedingdetails['created_at'] = \Carbon\Carbon::now();
      $turkeybreedingdetail = \App\Models\TurkeyBreedingDetails::insert($turkeybreedingdetails);

          $messageType = 1;
            $message = "Success!";

      } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "Failure!!";
        }

        return redirect(url("barnjournal/create"))->with('messageType',$messageType)->with('message',$message);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barn = \App\Models\BarnsDetailView::find($id);

        return view('barns.edit')->with('barn',$barn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $barn = \App\Models\BarnsDetail::find($id);

            $barn->update($request->all());

            $messageType = 1;
            $message = "العنبر ".$barn->barn_name." تم تحديث بياناتها بنجاح !";

        } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "لم يتم تحديث الييانات !";
        }

        return redirect(url("/barns/view"))->with('messageType',$messageType)->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $barn = \App\Models\BarnsDetail::find($id);

            $barn->delete();

            $messageType = 1;
            $message = "العنبر ".$barn->barn_name." تم مسحهامن النظام !";

        } catch(\Illuminate\Database\QueryException $ex){
            $messageType = 2;
            $message = "لم يتم مسح العنبر";
        }

        return redirect(url("/barns/view"))->with('messageType',$messageType)->with('message',$message);
    }
}
