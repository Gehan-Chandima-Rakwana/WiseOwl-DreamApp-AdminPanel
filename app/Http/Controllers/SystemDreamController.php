<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemDream;
use App\Models\DreamType;
use App\Models\SystemDreamMeaning;
use App\Models\DreamMeaningLink;

use Illuminate\Support\Facades\DB;

class SystemDreamController extends Controller
{
    function index(){
        $sysDream = SystemDream::all()->sortBy("sys_dream_id");
        // $sysDream = DB::table('dream_type')
        //             ->join('dream', 'dream.sys_dream_type', '=', 'dream_type.dream_type_id')
        //             ->orderByRaw('dream.sys_dream_id ASC')
        //             ->get();
        return view('system_dream.sysDream', compact('sysDream'));
    }

    function addSysDreamIndex(){
        $dreamType = DreamType::all()->sortBy("dream_type_id");
        $DreamMeaning = SystemDreamMeaning::all()->sortBy("dream_meaning_id");
        return view('system_dream.addSysDream', compact('dreamType','DreamMeaning'));
    }

    function saveSystemDream(Request $request){
        $DreamType = $request -> DreamType;
        $DreamTypeDet = $request -> DreamTypeDet;
        $DreamMeanings = $request -> DreamMeanings;

        if($DreamType == 0){
            return response()->json(['data' => 0,'message' => "Dream Type cannot be empty"], 200);
        }
        if(!$DreamTypeDet){
            return response()->json(['data' => 0,'message' => "Dream Details cannot be empty"], 200);
        }

        try
        {
            $sysDream = new SystemDream;
            $data['sys_dream_type'] = $DreamType;
            $data['sys_dream'] = $DreamTypeDet;
            $data['created_date'] = date('Y-m-d');
            $data['is_active'] = "1";
            $data['is_deleted'] = "0";
            $data['last_updated_date'] = date('Y-m-d');

            $sysDreamObj = $sysDream->create($data);

            if($DreamMeanings){
                foreach ($DreamMeanings as $value) {
                    $DreamMeaningLink = new DreamMeaningLink;
                    $dataM['sys_dream_id'] = $sysDreamObj->sys_dream_id;
                    $dataM['dream_meaning_id'] = $value;
                    $DreamMeaningLink->create($dataM); 
                } 
            }

            return response()->json(['data' => 1], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function view($id)
    {
        try
        {
            $sysDream = SystemDream::findOrFail($id);
            $dreamType = DreamType::all()->sortBy("dream_type_id");
            $DreamMeaningLink = DreamMeaningLink::where("sys_dream_id","=",$id)->get();
            return view('system_dream.viewSysDream', compact('sysDream','dreamType','DreamMeaningLink'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $sysDream = SystemDream::findOrFail($id);
            $dreamType = DreamType::all()->sortBy("dream_type_id");
            $DreamMeaning = SystemDreamMeaning::all()->sortBy("dream_meaning_id");

            $DreamMeaningLink = DreamMeaningLink::where("sys_dream_id","=",$id)->get();
            $selectedDMLarr = array();
            foreach ($DreamMeaningLink as $value) {
                array_push($selectedDMLarr,$value->dream_meaning_id);
            } 

            return view('system_dream.editSysDream', compact('sysDream','dreamType','DreamMeaning','selectedDMLarr'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        $DreamMeanings = $request -> DreamMeanings;

        if($request->DreamType == 0){
            return response()->json(['data' => 0,'message' => "Dream Type cannot be empty"], 200);
        }
        if(!$request->DreamTypeDet){
            return response()->json(['data' => 0,'message' => "Dream Details cannot be empty"], 200);
        }

        try
        {
            $sysDream = SystemDream::findOrFail($request->DreamID);
            $sysDream->sys_dream_type = $request->DreamType;
            $sysDream->sys_dream = $request->DreamTypeDet;
            $sysDream->last_updated_date = date('Y-m-d');
            $sysDream->update();

            DreamMeaningLink::where("sys_dream_id","=",$request->DreamID)->delete();

            if($DreamMeanings){
                foreach ($DreamMeanings as $value) {
                    $DreamMeaningLink = new DreamMeaningLink;
                    $dataM['sys_dream_id'] = $request->DreamID;
                    $dataM['dream_meaning_id'] = $value;
                    $DreamMeaningLink->updateOrCreate($dataM); 
                } 
            }
           

            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try
        {
            SystemDream::destroy($request->id);
            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
