<?php

namespace App\Http\Controllers\Api;


use App\Outlay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grow;
use App\Elements;
use App\Finance;
use App\Advantage;
use App\Administrative;
use App\Plan;
use App\Fixed;


use ConsoleTVs\Charts\Facades\Charts;
class GrowController extends Controller{


    public function index(Request $request)
    {
        $api_token = $request->api_token;

        $project_id = $request->project_id;
        $Grow = Grow::where('project_id', $project_id)->first();
        $sum = Grow::where('project_id', $project_id)->first();
        return response(responses(true, null, ['Grow' => $Grow,'sum' => $sum,],$api_token));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function firstyear(Request $request)
    {
        $api_token = $request->api_token;
        $project_id = $request->project_id;
        $Finance = Finance::where('project_id', $project_id)->get();
        $Financesum = $Finance->sum('price');
        $Advantage = Advantage::where('project_id', $project_id)->first();
        $Administrative = Administrative::where('project_id', $project_id)->get();
        $administrativesum = $Administrative->sum('price');
        $outlay = Outlay::where('project_id', $project_id)->get();
        $outlaysum= $outlay->sum('price') * 12;
        $Plan = Plan::where('project_id', $project_id)->first();
        $Revenues = $Plan->price*$Plan->on_year;
        $elements = Elements::where('project_id', $project_id)->get();
        $elementssum= $elements->sum('price') *$Plan->on_year ;
        $Fixed = Fixed::where('project_id', $project_id)->get();
        $Fixedsum = $Fixed->sum('price');
        $allsum = $Fixedsum + $elementssum + $outlaysum + $administrativesum;
        $finish = $Revenues - $allsum;


        $pie = Charts::database($allsum,'bar', 'highcharts')
            ->title(' ')
            ->elementLabel(trans('admin.finish'))
            ->dimensions(1000, 500)
            ->responsive(true)
            ->values([$allsum,$Revenues])
            ->labels([ trans('admin.outlays'),trans('admin.revenues')]);
        return response(responses(true, null, ['Advantage' => $Advantage,'Financesum' => $Financesum,'administrativesum' => $administrativesum,'outlaysum' => $outlaysum,'elementssum' => $elementssum,'Fixedsum' => $Fixedsum,'allsum' => $allsum,'Revenues'=>$Revenues,'finish'=>$finish,],$api_token));

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
        $this->rules['first'] = 'required';
        $this->rules['first_reason'] = 'required';
        $this->rules['second'] = 'required';
        $this->rules['second_reason'] = 'required';
        $this->rules['third'] = 'required';
        $this->rules['third_reason'] = 'required';
        $data = $this->validate($request, $this->rules);
                $add = Grow::findOrFail($id);
                $add->first = $request->first;
                $add->first_reason = $request->first_reason;
                $add->second = $request->second;
                $add->second_reason = $request->second_reason;
                $add->third = $request->third;
                $add->second_reason = $request->third_reason;
                $add->save();
        return response(responses(true, null, trans("admin.add Successfully"),$api_token));
    }


}
