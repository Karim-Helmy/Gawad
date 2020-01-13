<?php

namespace App\Http\Controllers\Api;

use App\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Plan;
use App\Grow;
use App\Advantage;
use Validator;






class ProjectsController extends Controller
{


    public function index(Request $request)
    {

        $api_token = auth()->guard('api')->user()->api_token;

        $user_id = User::where('api_token',$api_token)->first();

      $projects = Projects::where('user_id',$user_id->id)->get();




        foreach ($projects as $key) {
            $key->vision = limit_text($key->vision,25);
            $key->message = limit_text($key->message,25);
            $key->summary = limit_text($key->summary,25);
            $key->goal = limit_text($key->goal,25);
        }
        if ($projects != null) {
            return response(responses(true, trans("admin.data_received"), ['projects' => $projects ]));
        }else{
            return response(responses(false, trans("admin.no_data"), ['projects' => $projects]));

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
        $api_token = auth()->guard('api')->user()->api_token;
        $user_id = User::where('api_token',$api_token)->first();
            $rules =  [  // Make Validation
            'name' => 'required',
            'vision' => 'required',
            'message' => 'required',
            'goal' => 'required',
            'summary' => 'required',
                        ];
            $validator = Validator::make(request()->all(), $rules);
            if ($validator->fails())
            {

                return response(['status' => false, 'messages' => $validator->messages(),'data'=>[]]);
            }
            else {
                $add = new Projects();
                // subscriber_id
                $add->name = $request->name;
                $add->user_id = $user_id->id;
                $add->vision = $request->vision;
                $add->message = $request->message;
                $add->goal = $request->goal;
                $add->summary = $request->summary;
                $add->save();

                $addplan = new Plan();
                $addplan->price = 0;
                $addplan->on_day = 0;
                $addplan->on_year = 0;
                $addplan->project_id = $add->id;
                $addplan->save();

                $addgrow = new Grow();
                $addgrow->first = 0;
                $addgrow->second = 0;
                $addgrow->third = 0;
                $addgrow->project_id = $add->id;
                $addgrow->save();

                $addadvantage = new Advantage();
                $addadvantage->project_id = $add->id;
                $addadvantage->price = 0;
                $addadvantage->save();
                return response(responses(true, trans("admin.add Successfully"), ['project' => $add]));

            }





}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $api_token = auth()->guard('api')->user()->api_token;
        $projectss = Projects::where('id',$id)->first();

        return response(responses(true, null, ['project' => $projectss,]));
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
            'vision' => 'required',
            'message' => 'required',
            'goal' => 'required',
            'summary' => 'required',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails())
        {

            return response(['status' => false, 'messages' => $validator->messages(),'data'=>null]);
        }
        else {
            $add = Projects::find($id);
            $add->name = $request->name;
            $add->vision = $request->vision;
            $add->message = $request->message;
            $add->goal = $request->goal;
            $add->summary = $request->summary;
            $add->save();
              return response(responses( true, trans("admin.updated"),['project' => $add]));
             }
    }





    //Delete Project
    public function destroy( Request $request,$id)
    {
        $delete =  Projects::find($id);

        $delete->delete();

        return response(responses( true, trans("admin.deleted"),[]));

    }
}
