<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function cities(Request $request) {
        $province_id = $request->province_id;
        $cities = DB::table("tb_ro_cities")->where("province_id", $province_id)->get();
        return response()->json($cities, 200);
    }

    public function subdistricts(Request $request) {
        $city_id = $request->city_id;
        $subdistricts = DB::table("tb_ro_subdistricts")->where("city_id", $city_id)->get();
        return response()->json($subdistricts, 200);
    }
}
