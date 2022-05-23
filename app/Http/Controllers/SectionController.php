<?php

namespace App\Http\Controllers;

use App\Models\advertiser;
use App\Models\Section;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;




class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = Section::all();
        return response()->view('cms.sections.index',['sections' => $sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = validator($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'active'=>'nullable|string|in:on',

        ]);
        if(! $validator->fails()){
         $section = new Section();
            $section->name = $request->input('name');
            $section->description = $request->input('description');
            $section->active = $request->has('active');
        $isSaved = $section->save();
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
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
        return response()->view('cms.sections.edit',['section'=>$section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'active'=>'nullable|string|in:on',

        ]);
        if(! $validator->fails()){
         $section = new Section();
            $section->name = $request->input('name');
            $section->description = $request->input('description');
            $section->active = $request->has('active');
        $isSaved = $section->save();
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
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
        $deleted = $section->delete();
        return response()->json(
            ['message'=> $deleted ? 'Deleted successfuly' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
