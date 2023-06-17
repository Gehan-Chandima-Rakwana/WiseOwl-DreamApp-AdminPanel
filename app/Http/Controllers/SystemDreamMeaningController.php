<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemDreamMeaning;
use App\Models\SysLang;


class SystemDreamMeaningController extends Controller
{
    function index(){
        $sysDream = SystemDreamMeaning::all()->sortBy("dream_meaning_id");
        return view('system_dream_meaning.systemDreamMeaning', compact('sysDream'));
    }

    function addNewSysDreamMeaningIndex(){
        $sysLang = SysLang::where("is_active", "=", 1)->get();
        return view('system_dream_meaning.addSystemDreamMeaning', compact('sysLang'));
    }

    function saveNewSysDreamMeaning(Request $request){
        $DreamMeaning = $request -> DreamMeaning;
        $isoCode = $request -> isoCode;

        if(!$DreamMeaning){
            return response()->json(['data' => 0,'message' => "Dream Meaning cannot be empty"], 200);
        }
        if(!$isoCode){
            return response()->json(['data' => 0,'message' => "Language cannot be empty"], 200);
        }

        try
        {
            $sysDream = new SystemDreamMeaning;
            $data['dream_meaning'] = $DreamMeaning;
            $data['lang_iso_code'] = $isoCode;
            $sysDream->create($data);

            return response()->json(['data' => 1], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function view($id)
    {
        try
        {
            $sysDream = SystemDreamMeaning::findOrFail($id);
            return view('system_dream_meaning.systemDreamMeaningView', compact('sysDream'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $sysDream = SystemDreamMeaning::findOrFail($id);
            $sysLang = SysLang::where("is_active", "=", 1)->get();
            return view('system_dream_meaning.editSystemDreamMeaning', compact('sysDream','sysLang'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {

        if(!$request->DreamMeaning){
            return response()->json(['data' => 0,'message' => "Dream Meaning cannot be empty"], 200);
        }
        if(!$request->isoCode){
            return response()->json(['data' => 0,'message' => "Language cannot be empty"], 200);
        }

        try
        {
            $sysDream = SystemDreamMeaning::findOrFail($request->DreamMeaningID);
            $sysDream->dream_meaning = $request->DreamMeaning;
            $sysDream->lang_iso_code = $request->isoCode;
            $sysDream->update();

            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try
        {
            SystemDreamMeaning::destroy($request->sysDreamID);
            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
