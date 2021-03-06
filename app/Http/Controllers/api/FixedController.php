<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fixed;
use Validator;

class FixedController extends Controller{


    public function index(Request $request)
    {
        $project_id = request()->header('projectid');
        $Fixed = Fixed::where('project_id', $project_id)->get();
        if ($Fixed != null) {
            return response(responses(true, trans("admin.data_received"), ['Fixed' => $Fixed,]));

        }else{
            return response(responses(false, trans("admin.no_data"), ['Fixed' => []]));

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


            $add = new Fixed;
            // subscriber_id
            $add->project_id = $project_id;
            $add->name = $request->name;
            $add->price = $request->price;
            $add->save();
            return response(responses(true,  trans("admin.add Successfully"),$add));
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
            $add = Fixed::findOrFail($id);
            $add->name = $request->name;
            $add->price = $request->price;
            $add->save();
            return response(responses(true, trans("admin.updated Successfully"),$add ));
        }
    }


    //Delete Fixed Member
    public function destroy(Request $request, $id)
    {
        $api_token = $request->api_token;

        $delete =  Fixed::find($id);
        $delete->delete();
        return response(responses( true,trans("admin.deleted"),[]));
    }
}
