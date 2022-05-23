<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specializations = Specialization::all();
        return response()->view('cms.specializations.index', ['specializations' => $specializations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.specializations.create');

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
        ]);

        if(! $validator->fails()){
            $specialization = new Specialization();
            $specialization->name = $request->input('name');
            $specialization->description = $request->input('description');
            $isSaved = $specialization->save();
            return response()->json([
                'message' => $isSaved ? 'Saved Successfully' : 'Save failed!'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else{
            return response()->json(['message', $validator->getMessageBag()->first()],
            Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function show(Specialization $specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialization $specialization)
    {
        //
        return response()->view('cms.specializations.edit',['specialization'=>$specialization]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialization $specialization)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        if(! $validator->fails()){
            $specialization->name = $request->input('name');
            $specialization->description = $request->input('description');
        $isSaved = $specialization->save();
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
     * @param  \App\Models\Specialization  $specialization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialization $specialization)
    {
        //
        $deleted = $specialization->delete();
        return response()->json([
            'title' => $deleted ? 'Deleted!' : 'Delete Failed!',
            'text'=> $deleted ? 'Store delete successfuly' : 'Stor seleting failed!',
            'icon'=> $deleted ? 'success' : 'error',],
         $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
