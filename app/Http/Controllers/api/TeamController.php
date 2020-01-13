<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Team;
use Validator;

class TeamController extends Controller{


    public function index(Request $request)
    {
        $project_id = request()->header('projectid');
        $team = Team::where('project_id', $project_id)->get();
        if ($team != null) {
            return response(responses(true, trans("admin.data_received"), ['teams' => $team,]));

        }else{
            return response(responses(false, trans("admin.no_data"), ['teams' => []]));

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
            'role' => 'required',

        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails())
        {

            return response(['status' => false, 'messages' => $validator->messages(),'data'=>[]]);
        }
        else {


            $add = new Team;
            // subscriber_id
            $add->project_id = $project_id;
            $add->name = $request->name;
            $add->role = $request->role;
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
                'role' => 'required',

            ];
            $validator = Validator::make(request()->all(), $rules);
            if ($validator->fails())
            {

                return response(['status' => false, 'messages' => $validator->messages(),'data'=>[]]);
            }
            else {
                $add = Team::findOrFail($id);
                $add->name = $request->name;
                $add->role = $request->role;
                $add->save();
                return response(responses(true, trans("admin.updated Successfully"),$add ));
            }
    }


    //Delete Team Member
    public function destroy(Request $request, $id)
    {
        $api_token = $request->api_token;

        $delete =  Team::find($id);
        $delete->delete();
        return response(responses( true,trans("admin.deleted"),[]));
    }
}
