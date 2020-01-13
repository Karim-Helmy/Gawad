<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;
use ConsoleTVs\Charts\Facades\Charts;
class PlanController extends Controller{


    public function index(Request $request)
    {
        $api_token = $request->api_token;

        $project_id = $request->project_id;
        $Plan = Plan::where('project_id', $project_id)->first();
        $sum = Plan::where('project_id', $project_id)->first();




        return response(responses(true, null, [ 'Plan' => $Plan,
            'sum' =>$sum,
            ],$api_token));



    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $api_token = $request->api_token;

        // Make Validation
        $this->rules['on_day'] = 'required';
        $this->rules['on_month'] = 'required';
        $this->rules['on_year'] = 'required';
        $this->rules['price'] = 'required';
        $data = $this->validate($request, $this->rules);
                $add = Plan::findOrFail($id);
                $add->price = $request->price;
                $add->on_day = $request->on_day;
                $add->on_month = $request->on_month;
                $add->on_year = $request->on_year;

        $add->save();
        return response(responses( true, null,trans("admin.add Successfully"),$api_token));            }



}
