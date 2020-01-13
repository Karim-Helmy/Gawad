<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Target;

class TargetController extends Controller{


    public function index(Request $request)
    {
        $project_id = request()->header('projectid');


        $Target = Target::where('project_id', $project_id)->get();
        if ($Target != null) {
            return response(responses(true, trans("admin.data_received"), ['Target' => $Target]));
        }else{
            return response(responses( true, trans("admin.no_data"),['Target' => $Target]));

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
        $api_token = $request->api_token;

        $project_id = $request->project_id;
        // Make Validation
        $this->rules['type'] = 'required';
        $this->rules['need'] = 'required';
        $this->rules['description'] = 'required';
        $this->rules['age'] = 'required';

        $data = $this->validate($request, $this->rules);
        $Target =  $request->repeater;

                $add = new Target;
                // subscriber_id
                $add->project_id = $project_id;
                $add->type = $request->type;
                $add->need = $request->need;

                $add->description = $request->description;
                $add->age = $request->age;
                $add->save();
                return response(responses( true, null,trans("admin.add Successfully"),$api_token));



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
        $api_token = $request->api_token;

        // Make Validation
        $this->rules['type'] = 'required';
        $this->rules['description'] = 'required';
        $this->rules['age'] = 'required';
        $this->rules['need'] = 'required';


        $data = $this->validate($request, $this->rules);
                $add = Target::findOrFail($id);
                $add->type = $request->type;
                $add->need = $request->need;
                $add->description = $request->description;
                $add->age = $request->age;

        $add->save();
        return response(responses( true, null,trans("admin.add Successfully"),$api_token));
    }


    //Delete Target Member
    public function destroy(Request $request, $id)
    {
        $api_token = $request->api_token;

        $delete =  Target::find($id);
        $delete->delete();
        return response(responses( true, null,trans("admin.deleted"),$api_token));
    }
}
