<?php

namespace App\Http\Controllers\Super;

use App\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Plan;
use App\Grow;
use App\Advantage;






class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sessionstart(Request $request,$id)
    {
        $request->session()->put('project_id', $id);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super.projects.create', [
            'title' => trans('admin.add new project'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Make Validation
        $this->rules['name'] = 'required';
        $this->rules['vision'] = 'required';
        $this->rules['message'] = 'required';
        $this->rules['goal'] = 'required';
        $this->rules['summary'] = 'required';

        $data = $this->validate($request, $this->rules);
        $add = new Projects();
        // subscriber_id
        $add->name = $request->name;
        $add->user_id = auth()->user()->id;
        $add->vision = $request->vision;
        $add->message = $request->message;
        $add->goal = $request->goal;
        $add->summary = $request->summary;
        $request->session()->put('project_id', $add->id);
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

        $addadvantage= new Advantage();
        $addadvantage->project_id = $add->id;
        $addadvantage->price = 0;
        $addadvantage->save();


        session()->flash('success', trans("admin.add Successfully"));
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $projectss = Projects::where('id',$id)->first();
        $request->session()->put('project_id', $id);
        $request->session()->put('project_name', $projectss->name);

        return view('super.projects.edit', [
            'title' => trans('admin.edit'),
            'projectss' => $projectss,
        ]);
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

        $this->rules['name'] = 'required';
        $this->rules['vision'] = 'required';
        $this->rules['message'] = 'required';
        $this->rules['goal'] = 'required';
        $this->rules['summary'] = 'required';

        $data = $this->validate($request, $this->rules);
        $add = Projects::find($id);
        $add->name = $request->name;
        $add->vision = $request->vision;
        $add->message = $request->message;
        $add->goal = $request->goal;
        $add->summary = $request->summary;
        $add->save();
        $request->session()->put('project_id', $add->id);
        $request->session()->put('project_name', $add->name);
        session()->flash('success', trans("admin.add Successfully"));
        return back();
    }




    //Delete Project
    public function destroy( $id)
    {
        $delete =  Projects::find($id);

        $delete->delete();

        session()->flash('success',trans('admin.deleted'));
        return back();
    }



    public function test()
    {

        return view('super.projects.test', [

        ]);
    }
}
