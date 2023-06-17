<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDream;
use App\Models\DreamType;
use App\Models\DreamClarity;
use App\Models\DreamMood;
use App\Models\SysYamayan;
use App\Models\SleepQuality;
use App\Models\User;
use App\Models\Tag;
use App\Models\UserDreamTags;
use App\Models\SystemDreamMeaning;
use App\Models\UserDreamMeaning;


class UserDreamController extends Controller
{
    function index(){
        $userDream = UserDream::all()->sortBy("user_dream_id");
        return view('user_dream.userDream', compact('userDream'));
    }

    function addUserDreamIndex(){
        $dreamType = DreamType::all()->sortBy("dream_type_id");
        $dreamClarity = DreamClarity::all()->sortBy("dream_type_id");
        $dreamMood = DreamMood::all()->sortBy("dream_type_id");
        $sysYamayan = SysYamayan::all()->sortBy("dream_type_id");
        $sleepQuality = SleepQuality::all()->sortBy("dream_type_id");
        $tag = Tag::all()->sortBy("tag_id");
        $user = User::where("is_active", "=", 1)->orderBy('user_id')->get();
        $DreamMeaning = SystemDreamMeaning::all()->sortBy("dream_meaning_id");

        return view('user_dream.addUserDream', compact('dreamType',
                                                    'dreamClarity',
                                                    'dreamMood',
                                                    'sysYamayan',
                                                    'sleepQuality',
                                                    'user',
                                                    'tag',
                                                    'DreamMeaning'));
    }

    function saveUserDream(Request $request){
        $userID = $request -> userID;
        $DreamTitle = $request -> DreamTitle;
        $DreamType = $request -> DreamType;
        $DreamStory = $request -> DreamStory;
        $Tags = $request -> Tags;
        $DreamDate = $request -> DreamDate;
        $DreamClarity = $request -> DreamClarity;
        $DreamMood = $request -> DreamMood;
        $SleepQuality = $request -> SleepQuality;
        $Yamayan = $request -> Yamayan;
        $DreamMeanings = $request -> DreamMeanings;

        if(!$DreamTitle){
            return response()->json(['data' => 0,'message' => "Dream Title cannot be empty"], 200);
        }
        if(!$DreamType){
            return response()->json(['data' => 0,'message' => "Dream Type cannot be empty"], 200);
        }
        if(!$DreamStory){
            return response()->json(['data' => 0,'message' => "Dream Storye cannot be empty"], 200);
        }

        $userIDS = session()->get('userID');
        if(!$userID){
            $userID=0;
        }

        try
        {
            $UserDream = new UserDream;
            $data['user_id'] = $userID;
            $data['dream_title'] = $DreamTitle;
            $data['dream_story'] = $DreamStory;
            $data['dream_datetime'] = $DreamDate;
            $data['sys_dream_clarity_id'] = $DreamClarity;
            $data['sys_dream_mood_id'] = $DreamMood;
            $data['sys_sleep_quality'] = $SleepQuality;
            $data['sys_yamayan'] = $Yamayan;
            $data['dream_type_id'] = $DreamType;
            $data['created_time'] = date('Y-m-d');
            $data['created_user_id'] = $userIDS;
            $data['last_updated_time'] = date('Y-m-d');
            $data['last_updated_user'] = $userIDS;
            $data['is_active'] = "1";
            $data['is_deleted'] = "0";

            $UserDreamObj = $UserDream->create($data);

            if($Tags){
                foreach ($Tags as $value) {
                    $UserDreamTags = new UserDreamTags;
                    $dataM['user_dream_id'] = $UserDreamObj->user_dream_id;
                    $dataM['tag_id'] = $value;
                    $dataM['created_time'] = date('Y-m-d');
                    $UserDreamTags->create($dataM); 
                } 
            }

            if($DreamMeanings){
                foreach ($DreamMeanings as $value) {
                    $UserDreamMeaning = new UserDreamMeaning;
                    $dataU['user_dream_id'] = $UserDreamObj->user_dream_id;
                    $dataU['sys_dream_id'] = "0";
                    $dataU['dream_meaning_id'] = $value;
                    $dataU['created_time'] =date('Y-m-d');
                    $UserDreamMeaning->create($dataU); 
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
            $userDream = UserDream::findOrFail($id);

            $goodCount = UserDream::where("user_id", "=", $userDream->user_id)->where("sys_dream_mood_id", "=", 2)->count();
            $normalCount = UserDream::where("user_id", "=", $userDream->user_id)->where("sys_dream_mood_id", "=", 3)->count();
            $badCount = UserDream::where("user_id", "=", $userDream->user_id)->where("sys_dream_mood_id", "=", 4)->count();
            $UserDreamTags = UserDreamTags::where("user_dream_id","=",$id)->get();
            $UserDreamMeaning = UserDreamMeaning::where("user_dream_id","=",$id)->get();

            return view('user_dream.viewUserDream', compact('userDream',
                                                            'goodCount',
                                                            'normalCount',
                                                            'badCount',
                                                            'UserDreamTags',
                                                            'UserDreamMeaning'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $UserDream = UserDream::findOrFail($id);

            $dreamType = DreamType::all()->sortBy("dream_type_id");
            $dreamClarity = DreamClarity::all()->sortBy("dream_type_id");
            $dreamMood = DreamMood::all()->sortBy("dream_type_id");
            $sysYamayan = SysYamayan::all()->sortBy("dream_type_id");
            $sleepQuality = SleepQuality::all()->sortBy("dream_type_id");
            $user = User::where("is_active", "=", 1)->orderBy('user_id')->get();

            $tag = Tag::all()->sortBy("tag_id");
            $UserDreamTags = UserDreamTags::where("user_dream_id","=",$id)->get();
            $SelectedUTagsArr = array();
            foreach ($UserDreamTags as $value) {
                array_push($SelectedUTagsArr,$value->tag_id);
            } 

            $DreamMeaning = SystemDreamMeaning::all()->sortBy("dream_meaning_id");

            $UserDreamMeaning = UserDreamMeaning::where("user_dream_id","=",$id)->get();
            $selectedUDMarr = array();
            foreach ($UserDreamMeaning as $value) {
                array_push($selectedUDMarr,$value->dream_meaning_id);
            } 

            return view('user_dream.editUserDream', compact('UserDream',
                                                            'dreamType',
                                                            'dreamClarity',
                                                            'dreamMood',
                                                            'sysYamayan',
                                                            'sleepQuality',
                                                            'user',
                                                            'tag',
                                                            'SelectedUTagsArr',
                                                            'DreamMeaning',
                                                            'selectedUDMarr'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request)
    {
        $userID = $request -> userID;
        $Tags = $request -> Tags;
        $DreamTitle = $request -> DreamTitle;
        $DreamType = $request -> DreamType;
        $DreamStory = $request -> DreamStory;
        $DreamDate = $request -> DreamDate;
        $DreamClarity = $request -> DreamClarity;
        $DreamMood = $request -> DreamMood;
        $SleepQuality = $request -> SleepQuality;
        $Yamayan = $request -> Yamayan;
        $DreamMeanings = $request -> DreamMeanings;

        if(!$DreamTitle){
            return response()->json(['data' => 0,'message' => "Dream Title cannot be empty"], 200);
        }
        if(!$DreamType){
            return response()->json(['data' => 0,'message' => "Dream Type cannot be empty"], 200);
        }
        if(!$DreamStory){
            return response()->json(['data' => 0,'message' => "Dream Storye cannot be empty"], 200);
        }

        $adminUserID = session()->get('userID');
        if(!$userID){
            $userID=0;
        }

        try
        {
            $userDream = UserDream::findOrFail($request->DreamID);
            $userDream->user_id = $userID;
            $userDream->dream_title = $DreamTitle;
            $userDream->dream_type_id = $DreamType;
            $userDream->dream_story = $DreamStory;
            $userDream->dream_datetime = $DreamDate;
            $userDream->sys_dream_clarity_id = $DreamClarity;
            $userDream->sys_dream_mood_id = $DreamMood;
            $userDream->sys_sleep_quality = $SleepQuality;
            $userDream->sys_yamayan = $Yamayan;
            $userDream->last_updated_time = date('Y-m-d');
            $userDream->last_updated_user = $adminUserID;
            $userDream->update();

            UserDreamTags::where("user_dream_id","=",$request->DreamID)->delete();

            if($Tags){
                foreach ($Tags as $value) {
                    $UserDreamTags = new UserDreamTags;
                    $dataM['user_dream_id'] = $request->DreamID;
                    $dataM['tag_id'] = $value;
                    $dataM['created_time'] = date('Y-m-d');
                    $UserDreamTags->updateOrCreate($dataM); 
                } 
            }

            UserDreamMeaning::where("user_dream_id","=",$request->DreamID)->delete();

            if($DreamMeanings){
                foreach ($DreamMeanings as $value) {
                    $UserDreamMeaning = new UserDreamMeaning;
                    $dataU['user_dream_id'] = $request->DreamID;
                    $dataU['sys_dream_id'] = "0";
                    $dataU['dream_meaning_id'] = $value;
                    $dataU['created_time'] =date('Y-m-d');
                    $UserDreamMeaning->updateOrCreate($dataU); 
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
