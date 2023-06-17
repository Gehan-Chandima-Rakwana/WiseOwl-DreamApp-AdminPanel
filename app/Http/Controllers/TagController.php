<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\SysLang;

class TagController extends Controller
{
    function index(){
        $tags = Tag::all()->sortBy("tag_id");
        return view('tags.tags', compact('tags'));

        
    }

    function addNewIndex(){
        $sysLang = SysLang::where("is_active", "=", 1)->get();
        return view('tags.tagsAdd',compact('sysLang'));
    }

    function saveNewTag(Request $request){
        $tagName = $request -> tag;
        $isoCode = $request -> isoCode;

        $userID = session()->get('userID');
        if(!$userID){
            $userID=0;
        }

        if(!$isoCode){
            return response()->json(['data' => 0,'message' => "Language cannot be empty"], 200);
        }
        
        try
        {
            $tag = new Tag;
            $data['tag'] = $tagName;
            $data['lang_iso_code'] = $isoCode;
            $data['created_user_id'] = $userID;
            $data['created_date'] = date('Y-m-d');
            $data['is_active'] = "1";
            $data['is_deleted'] = "0";
    
            $tag->create($data);

            return response()->json(['data' => 1], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $tag = Tag::findOrFail($id);
            $sysLang = SysLang::where("is_active", "=", 1)->get();
            return view('tags.tagsEdit', compact('tag','sysLang'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        if(!$request->isoCode){
            return response()->json(['data' => 0,'message' => "Language cannot be empty"], 200);
        }
        
        try
        {
            $tag = Tag::findOrFail($request->tagID);
            $tag->tag = $request->tag;
            $tag->lang_iso_code = $request->isoCode;
            $tag->update();

            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request)
    {
        try
        {
            Tag::destroy($request->tagid);
            return response()->json(['data' => 1], 200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
