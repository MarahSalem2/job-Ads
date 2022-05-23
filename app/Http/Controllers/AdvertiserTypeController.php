<?php

namespace App\Http\Controllers;

use App\Models\AdvertiserType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertiserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertiserTypes = AdvertiserType::all();
        return response()->view('cms.advertiserTypes.index',['advertiserTypes' => $advertiserTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.advertiserTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string',
        ]);
        if(! $validator->fails()){
         $advertiserType = new AdvertiserType();
            $advertiserType->name = $request->input('name');
        $isSaved = $advertiserType->save();
        return response()->json(
            ['message'=>$isSaved ? 'Saved Successfuly' : 'Save failed!'],
            $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json(['message'=>$validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvertiserType  $advertiserType
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertiserType $advertiserType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvertiserType  $advertiserType
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertiserType $advertiserType)
    {
        //
        return response()->view('cms.advertiserTypes.edit',['advertiserType'=>$advertiserType]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvertiserType  $advertiserType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertiserType $advertiserType)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string',
        ]);
        if(! $validator->fails()){
         $advertiserType = new AdvertiserType();
            $advertiserType->name = $request->input('name');
        $isSaved = $advertiserType->save();
        return response()->json(
            ['message'=>$isSaved ? 'Updated Successfuly' : 'Update failed!'],
            $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json(['message'=>$validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvertiserType  $advertiserType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertiserType $advertiserType)
    {
        //
        $deleted = $advertiserType->delete();
        return response()->json(
            ['message'=> $deleted ? 'Deleted successfuly' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
