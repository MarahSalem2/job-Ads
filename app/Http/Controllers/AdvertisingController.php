<?php

namespace App\Http\Controllers;
use App\Models\Section;
use App\Models\Advertiser;
// use App\Models\AdvertiserType;
use App\Models\Advertising;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisings = Advertising::with('section')->get();
        $advertiser = Advertiser::all();
        // $advertiserTypes = AdvertiserType::all();
        return response()->view('cms.advertisings.index', ['advertisings' => $advertisings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $sections = Section::where('active','=',true)->get();
        $advertisers = Advertiser::all();
        // $advertiserTypes = AdvertiserType::all();
        return response()->view('cms.advertisings.create',['sections' => $sections,'advertisers' => $advertisers]);

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
        $validator = Validator($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string',
            'job_type' => 'required|string',
            'section_id' => 'required|numeric|exists:sections,id',
            'advertiser_id' => 'required|numeric|exists:advertisers,id',
            // 'AdvertiserType_id' => 'required|numeric|exists:advertiser_types,id',
        ]);
        if(! $validator->fails()){
            $advertising = new Advertising();
               $advertising->name = $request->input('name');
               $advertising->description = $request->input('description');
               $advertising->job_type = $request->input('job_type');
               $advertising->section_id = $request->input('section_id');
               $advertising->advertiser_id = $request->input('advertiser_id');
            //    $advertising->advertiserType_id = $request->input('advertiserType_id');
           $isSaved = $advertising->save();
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
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show(Advertising $advertising)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertising $advertising)
    {
        //
        $sections = Section::where('active','=',true)->get();
        $advertisers = Advertiser::all();
        return response()->view('cms.advertisings.edit',['advertising'=>$advertising,'sections'=>$sections,'advertisers'=>$advertisers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertising $advertising)
    {
        //
        $validator = Validator($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string',
            'job_type' => 'required|string',
            'section_id' => 'required|numeric|exists:sections,id',
            'advertiser_id' => 'required|numeric|exists:advertisers,id',
            // 'AdvertiserType_id' => 'required|numeric|exists:advertiser_types,id',
        ]);
        if(! $validator->fails()){
            // $advertising = new Advertising();
               $advertising->name = $request->input('name');
               $advertising->description = $request->input('description');
               $advertising->job_type = $request->input('job_type');
               $advertising->section_id = $request->input('section_id');
               $advertising->advertiser_id = $request->input('advertiser_id');
            //    $advertising->advertiserType_id = $request->input('advertiserType_id');
           $isSaved = $advertising->save();
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
     * @param  \App\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        //
        $deleted = $advertising->delete();
        return response()->json(
            ['message'=> $deleted ? 'Deleted successfuly' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        
    }
}
