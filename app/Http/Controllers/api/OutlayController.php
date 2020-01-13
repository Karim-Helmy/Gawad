<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlay;
use Validator;

use ConsoleTVs\Charts\Facades\Charts;
class OutlayController extends Controller{


    public function index(Request $request)
    {


        $project_id = request()->header('projectid');
        $Outlay = Outlay::where('project_id', $project_id)->get();

        $result = $Outlay->map(function($el){
            $pers =  round($el->price*100/$el->sum('price'));
            return [
                'id' => $el->id,
                'project_id'=> $el->project_id,
                'name' => $el->name,
                'price' => $el->price,
                'percent' => $pers,
            ];
        });

        $sum = $Outlay->sum('price');
        if ($Outlay != null) {
            return response(responses(true, trans("admin.data_received"), ['Outlay' => $result,'sum' =>$sum]));
        }else{
            return response(responses( true, trans("admin.no_data"),['Outlay' => $result,'sum' =>$sum]));

        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_id = $request->projectid;
        $rules =  [  // Make Validation
            'name' => 'required',
            'price' => 'required',

        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails())
        {

            return response(['status' => false, 'messages' => $validator->messages(),'data'=>[]]);
        }
        else {

            $add = new Outlay;
            // subscriber_id
            $add->project_id = $project_id;
            $add->name = $request->name;
            $add->price = $request->price;
            $add->save();
            return response(responses(true, trans("admin.add Successfully"), $add));
        }

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
        $rules = [  // Make Validation
            'name' => 'required',
            'price' => 'required',

        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {

            return response(['status' => false, 'messages' => $validator->messages(), 'data' => []]);
        } else {
            $add = Outlay::findOrFail($id);
            $add->name = $request->name;
            $add->price = $request->price;
            $add->save();
            return response(responses(true, null, trans("admin.updated")));
        }
    }


    //Delete Outlay Member
    public function destroy(Request $request, $id)
    {
        $delete =  Outlay::find($id);
        $delete->delete();
        return response(responses( true,trans("admin.deleted"),[]));
    }
}