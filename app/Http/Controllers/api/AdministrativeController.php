<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Administrative;
use Validator;

use ConsoleTVs\Charts\Facades\Charts;
class AdministrativeController extends Controller{


    public function index(Request $request)
    {


        $project_id = request()->header('projectid');
        $Administrative = Administrative::where('project_id', $project_id)->get();

        $result = $Administrative->map(function($el){
            $pers =  round($el->price*100/$el->sum('price'));
            return [
                'id' => $el->id,
                'project_id'=> $el->project_id,
                'name' => $el->name,
                'price' => $el->price,
                'percent' => $pers,
            ];
        });

        $sum = $Administrative->sum('price');
        if ($Administrative != null) {
            return response(responses(true, trans("admin.data_received"), ['Administrative' => $result,'sum' =>$sum]));
        }else{
            return response(responses( true, trans("admin.no_data"),['Administrative' => $result,'sum' =>$sum]));

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

            $add = new Administrative;
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
            $add = Administrative::findOrFail($id);
            $add->name = $request->name;
            $add->price = $request->price;
            $add->save();
            return response(responses(true, null, trans("admin.updated")));
        }
    }


    //Delete Administrative Member
    public function destroy(Request $request, $id)
    {
        $delete =  Administrative::find($id);
        $delete->delete();
        return response(responses( true,trans("admin.deleted"),[]));
    }
}