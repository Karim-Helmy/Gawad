<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Competitors;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class CompetitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $api_token = $request->api_token;
        $project_id = $request->project_id;
        $Competitors = Competitors::where('project_id', $project_id)->get();
        if ($Competitors != null) {
            return response(responses(true, trans("admin.data_received"), ['Competitors' => $Competitors],$api_token));
        }else{
            return response(responses(false, trans("admin.no_data"), ['Competitors' => $Competitors], $api_token));

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super.competitors.create', [
            'title' => trans('admin.add new competitors'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project_id = $request->project_id;
        $api_token = $request->api_token;

        // Make Validation
        $data = $this->validate($request, [
            'name' => 'required',
            'subscription_points' => 'required',
            'features' => 'required',
            'project_advantages' => 'required',
        ]);
        $data = $this->validate($request, $this->rules);
        $Competitors = $request->repeater;
        foreach ($Competitors as $member) {
            if ($member['name'] !== null && $member['subscription_points'] !== null && $member['features'] !== null && $member['project_advantages'] !== null) {
                $add = new Competitors;
                // subscriber_id
                $add->project_id = $project_id;
                $add->name = $member['name'];
                $add->subscription_points = $member['subscription_points'];
                $add->features = $member['features'];
                $add->project_advantages = $member['project_advantages'];
                $add->save();
                return response(responses(true, null, trans("admin.add Successfully"),$api_token));
            } else {
                return response(responses(false, null, trans("admin.must add"),$api_token));
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $api_token = $request->api_token;

        // Make Validation
        $this->rules['name'] = 'required';
        $this->rules['subscription_points'] = 'required';
        $this->rules['features'] = 'required';
        $this->rules['project_advantages'] = 'required';
        $data = $this->validate($request, $this->rules);
        $add = Competitors::findOrFail($id);
        $add->name = $request->name;
        $add->subscription_points = $request->subscription_points;
        $add->features = $request->features;
        $add->project_advantages = $request->project_advantages;
        $add->save();
        return response(responses(true, null, trans("admin.add Successfully"),$api_token));
    }



    //Delete Competitors
    public function destroy(Request $request, $id)
    {
        $api_token = $request->api_token;

        $delete =  Competitors::find($id);
        $delete->delete();
        return response(responses( true, null,trans("admin.deleted"),$api_token));
    }





}
