<?php

namespace App\Http\Controllers\Control_Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ads\newAdRequest;
use App\Http\Requests\Ads\updateAdRequest;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('control_panel.ads.index',compact('ads'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_panel.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newAdRequest $request)
    {
        $ad = Ad::create($request->validated());
        if($request->image){
            $file = $request->image->store('public','public');
            $ad->update(['image'=>$file]);
        }
        return redirect(route('ads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit( $ad)
    {
        if($ad) {
            return view('control_panel.ads.update',compact('ad'));
        }else{
            return redirect('/')->with('error','this ad does not exist');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(updateAdRequest $request, $ad)
    {
        if($ad) {
            $ad->update($request->validated());
            if($request->image){
                $file = $request->image->store('public','public');
                $ad->update(['image'=>$file]);
            }
            return redirect(route('ads.index'));
//            redirect(route('categories.index')->with('success','You edited the Category successfully.'));
        }else{
            return redirect('/')->with('error','this ad does not exist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy($ad)
    {
        if($ad) {
            $ad->delete();
            return redirect(route('ads.index'));
        }else{
            return redirect('/')->with('error','this ad does not exist');
        }
    }
}
