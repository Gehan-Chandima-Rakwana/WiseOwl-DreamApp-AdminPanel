<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserDream;
use App\Models\DreamClarity;
use App\Models\DreamType;


class HomeController extends Controller
{
    function index(){
        $totRegisterCount = User::all()->count();
        $totOnlineUserCount = User::where("is_active",1)->count();

        $totDreamPostCount = UserDream::all()->count();

        $laste7day = date('Y-m-d', strtotime('-7 days'));
        $totDPostLastDayCount = UserDream::where("created_time", ">", $laste7day)->count();

        $superClearCount = UserDream::where("sys_dream_clarity_id", "=", 1)->count();
        $clearCount = UserDream::where("sys_dream_clarity_id", "=", 2)->count();
        $normalCount = UserDream::where("sys_dream_clarity_id", "=", 3)->count();
        $notClearCount = UserDream::where("sys_dream_clarity_id", "=", 4)->count();
        $didntDreamCount = UserDream::where("sys_dream_clarity_id", "=", 5)->count();

        $wOWCount = UserDream::where("sys_dream_mood_id", "=", 1)->count();
        $nICECount = UserDream::where("sys_dream_mood_id", "=", 2)->count();
        $nORMALCount = UserDream::where("sys_dream_mood_id", "=", 3)->count();
        $nEGATIVECount = UserDream::where("sys_dream_mood_id", "=", 4)->count();
        $vERYBADCount = UserDream::where("sys_dream_mood_id", "=", 5)->count();

        // last 7 days dream post
        //$dreamPostLastDays = UserDream::all();
        $dreamPostLastDays= UserDream::orderBy("user_dream_id",'desc')->take(20)->get();

        //return $dreamPostLastDays;

        return view('index', compact('totRegisterCount',
                                    'totOnlineUserCount',
                                    'totDreamPostCount',
                                    'totDPostLastDayCount',
                                    'superClearCount',
                                    'clearCount',
                                    'normalCount',
                                    'notClearCount',
                                    'didntDreamCount',
                                    'wOWCount',
                                    'nICECount',
                                    'nORMALCount',
                                    'nEGATIVECount',
                                    'vERYBADCount',
                                    'dreamPostLastDays'));
    }

    public function getDreamTypeDetails()
    {
        try
        {
            $daydreams              = UserDream::where("dream_type_id", "=", 1)->count();
            $falseAwakeningDreams   = UserDream::where("dream_type_id", "=", 2)->count();
            $lucidDreams            = UserDream::where("dream_type_id", "=", 3)->count();
            $nightmares             = UserDream::where("dream_type_id", "=", 4)->count();
            $recurringDreams        = UserDream::where("dream_type_id", "=", 5)->count();
            $healingDreams          = UserDream::where("dream_type_id", "=", 6)->count();
            $propheticDreams        = UserDream::where("dream_type_id", "=", 7)->count();
            $signalDreams           = UserDream::where("dream_type_id", "=", 8)->count();
            $epicDreams             = UserDream::where("dream_type_id", "=", 9)->count();

            if(!$daydreams)
                $daydreams = 0;
            if(!$falseAwakeningDreams)
                $falseAwakeningDreams = 0;
            if(!$lucidDreams)
                $lucidDreams = 0;
            if(!$nightmares)
                $nightmares = 0;
            if(!$recurringDreams)
                $recurringDreams = 0;
            if(!$healingDreams)
                $healingDreams = 0;
            if(!$propheticDreams)
                $propheticDreams = 0;
            if(!$signalDreams)
                $signalDreams = 0;
            if(!$epicDreams)
                $epicDreams = 0;

            $dream_type  = ["Daydreams","False Awakening Dreams","Lucid Dreams","Nightmares","Recurring Dreams","Healing Dreams",
                            "Prophetic Dreams","Signal Dreams","Epic Dreams"];
            
            $dream_count = [$daydreams,$falseAwakeningDreams,$lucidDreams,$nightmares,$recurringDreams,$healingDreams,
                            $propheticDreams,$signalDreams,$epicDreams];

            $backgroundColor = ["#DFFF00", "#FFBF00", "#FF7F50", "#DE3163", "#9FE2BF","#40E0D0","#6495ED","#CCCCFF","#FF00FF"];

            $hoverBackgroundColor = ["#c66765", "#be726f", "#d97875", "#e06c6b", "#e97573","#9FE2BF","#1F618D","#A6ACAF","#FADBD8"];

            return response()->json(['dream_type' => $dream_type,'dream_count' => $dream_count,
                                    'backgroundColor' => $backgroundColor,'hoverBackgroundColor' => $hoverBackgroundColor], 200);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
