<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\advertiser;
use App\Models\AdvertiserType;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;


class AdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisers = Advertiser::with('city')->get();
        $advertiserTypes = AdvertiserType::all();
        $applicants = Applicant::all();
        return response()->view('cms.advertisers.index', ['advertisers' => $advertisers]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::where('active','=',true)->get();
        $advertiserTypes = AdvertiserType::all();
        $applicants = Applicant::all();
        return response()->view('cms.advertisers.create',['cities' => $cities, 'advertiserTypes' => $advertiserTypes, 'applicants'=>$applicants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
             'name'=>'required|string',
             'email'=>'required|email|unique:advertisers,email',
             'location' => 'required|string',
             'city_id' => 'required|numeric|exists:cities,id',
             'advertiserType_id' => 'required|numeric|exists:advertiser_types,id',
             'applicant_id' => 'required|numeric|exists:applicants,id',

        ]);
        if(! $validator->fails()){
         $advertiser = new Advertiser();
            $advertiser->name = $request->input('name');
            $advertiser->email = $request->input('email');
            $advertiser->location = $request->input('location');
            $advertiser->advertiserType_id = $request->input('advertiserType_id');
            $advertiser->city_id = $request->input('city_id');
            $advertiser->applicant_id = $request->input('applicant_id');
             $advertiser->password = Hash::make(1234);
        $isSaved = $advertiser->save();
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
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(advertiser $advertiser)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function edit(advertiser $advertiser)
    {
        //
        $cities = City::where('active','=',true)->get();
        $advertiserTypes = AdvertiserType::all();
        $applicants = Applicant::all();
        return response()->view('cms.advertisers.edit',['advertiser'=>$advertiser,'cities'=>$cities, 'advertiserType'=> $advertiserTypes, 'applicant'=>$applicants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, advertiser $advertiser)
    {
        //
        
        $validator = Validator($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:advertisers,email',
            'location' => 'required|string',
            'city_id' => 'required|numeric|exists:cities,id',
            'advertiserType_id' => 'required|numeric|exists:advertiserTypes,id',
            'applicant_id' => 'required|numeric|exists:applicants,id',

       ]);
       if(! $validator->fails()){
        $advertiser = new Advertiser();
           $advertiser->name = $request->input('name');
           $advertiser->email = $request->input('email');
           $advertiser->location = $request->input('location');
           $advertiser->advertiserType_id = $request->input('advertiserType_id');
           $advertiser->city_id = $request->input('city_id');
           $advertiser->applicant_id = $request->input('applicant_id');
       $isSaved = $advertiser->save();
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
     * @param  \App\Models\advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(advertiser $advertiser)
    {
        //
    $deleted = $advertiser->delete();
        return response()->json(
            ['message'=> $deleted ? 'Deleted successfuly' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }



    // public function addAdvertiser(Request $request)
    // {

    //     $validator = Validator($request->all(),[
    //         'name'=>'required|string',
    //         'email'=>'required|email|unique:users,email',
    //         'location' => 'required|string',
    //         'advertiser_type' => 'required|string',
    //         'city_id' => 'required|numeric|exists:cities,id',

    //     ]);

    //     if(! $validator->fails()){
    //         $advertiser = new Advertiser();
    //         $advertiser->name = $request->input('name');
    //         $advertiser->email = $request->input('email');
    //         $advertiser->location = $request->input('location');
    //         $advertiser->advertiser_type = $request->input('advertiser_type');
    //         $advertiser->city_id = $request->input('city_id');
    //         $advertiser->password = Hash::make(1234);
    //      $isSaved = $advertiser->save();
    //         return response()->json([
    //             'message' => $isSaved ? 'Saved Successfully' : 'Save failed!'
    //         ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    //     } else{
    //         return response()->json(['message', $validator->getMessageBag()->first()],
    //         Response::HTTP_BAD_REQUEST);
    //     }
        
    // }
}
