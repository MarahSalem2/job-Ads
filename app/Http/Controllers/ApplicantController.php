<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\User;
use App\Models\specialization;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $applicants = Applicant::with('city')->get();
        $users = User::all();
        $specializations = Specialization::all();
        return response()->view('cms.applicants.index', ['applicants' => $applicants]);
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
        $users = User::all();
        $specializations = Specialization::all();
        return response()->view('cms.applicants.create',['cities' => $cities,'users' => $users,'specializations'=>$specializations]);
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
            'user_id' => 'required|numeric|exists:users,id',
            'email' => 'required|email',
            'id_number' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'city_id' => 'required|numeric|exists:cities,id',
            'qualivication' => 'required',
            'cv' => 'required',
            'specialization_id' => 'required|numeric|exists:specializations,id',

        ]);
        if(! $validator->fails()){
         $applicant = new Applicant();
            $applicant->user_id = $request->input('user_id');
            $applicant->email = $request->input('email');
            $applicant->id_number = $request->input('id_number');
            $applicant->phone = $request->input('phone');
            $applicant->gender = $request->input('gender');
            $applicant->date_of_birth = $request->input('date_of_birth');
            $applicant->city_id = $request->input('city_id');
            $applicant->qualivication = $request->input('qualivication');
            $applicant->cv = $request->input('cv');
            $applicant->specialization_id = $request->input('specialization_id');
        $isSaved = $applicant->save();
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
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
        $cities = City::where('active','=',true)->get();
        $users = User::all();
        $specializations = Specialization::all();
        return response()->view('cms.applicants.edit',['applicant'=>$applicant,'cities'=>$cities,'users'=>$users,'specializations'=>$specializations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
        $validator = Validator($request->all(),[
            'user_id' => 'required|numeric|exists:users,id',
            'email'=>'required|email',
            'id_number' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'city_id' => 'required|numeric|exists:cities,id',
            'qualivication' => 'required',
            'cv' => 'required',
            'specialization_id' => 'required|numeric|exists:specializations,id',

        ]);
        if(! $validator->fails()){
         $applicant = new Applicant();
            $applicant->user_id = $request->input('user_id');
            $applicant->email = $request->input('email');
            $applicant->id_number = $request->input('id_number');
            $applicant->phone = $request->input('phone');
            $applicant->gender = $request->input('gender');
            $applicant->date_of_birth = $request->input('date_of_birth');
            $applicant->city_id = $request->input('city_id');
            $applicant->qualivication = $request->input('qualivication');
            $applicant->cv = $request->input('cv');
            $applicant->specialization_id = $request->input('specialization_id');

        $isSaved = $applicant->save();
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
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
        $deleted = $applicant->delete();
        return response()->json(
            ['message'=> $deleted ? 'Deleted successfuly' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
