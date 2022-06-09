<?php

namespace App\Http\Controllers\API;

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
        return response()->json(Ad::all());
    }

    public function getDeletedAds()
    {
        return response()->json((Ad::onlyTrashed()->get()));
    }

    public function getAdsWithDeleted()
    {
        return response()->json((Ad::withTrashed()->get()));
    }

    public function restoreDeletedAd($ad)
    {
        $trashed = Ad::onlyTrashed()->find($ad);
        if ($trashed) {
            $trashed->restore();
            return response()->json(['message' => 'success', 'data' => $trashed]);
        } else {
            return response()->json(['message' => 'this ad is not trashed']);
        }
    }

    public function getAllAds()
    {
        $ads = Ad::orderBy('id', 'desc')->take(4)->get();
        return response()->json(['message' => 'success', 'data' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(newAdRequest $request)
    {
        $ad = Ad::create($request->validated());
        if($request->image){
            $file = $request->image->store('public','public');
            $ad->update(['image'=>$file]);
        }
        return response()->json(['message' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function show($ad)
    {
        if ($ad) {
            return response()->json(['message' => 'success', 'data' => $ad]);
        } else {
            return response()->json(['message' => 'this ad does not exist']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function edit($ad)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function update(updateAdRequest $request, $ad)
    {
        if ($ad) {
            $ad->update($request->validated());
            if($request->image){
                $file = $request->image->store('public','public');
                $ad->update(['image'=>$file]);
            }
            return response()->json(['message' => 'success', 'data' => $ad]);
        } else {
            return response()->json(['message' => 'this ad does not exist']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ad $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy($ad)
    {
        if ($ad) {
            $ad->delete();
            return response()->json(['message' => 'success']);
        } else {
            return response()->json(['message' => 'this ad does not exist']);
        }
    }

}
