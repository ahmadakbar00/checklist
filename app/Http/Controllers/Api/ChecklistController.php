<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Checklist;
use Illuminate\Support\Facades\Validator;


class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
         //get data from table posts
         $data = Checklist::all();

         //make response JSON
         return response()->json([
             'success' => true,
             'message' => 'List Data Post',
             'data'    => $data  
         ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //set validation
          $validator = Validator::make($request->all(), [
            'name'   => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $data = Checklist::create([
            'name'     => $request->name,
        ]);

        //success save to database
        if($data) {

            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $data  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //find post by ID
          $data = Checklist::findOrfail($id);

          if($data) {
  
              //delete post
              $data->delete();
  
              return response()->json([
                  'success' => true,
                  'message' => 'Post Deleted',
              ], 200);
  
          }
  
          //data post not found
          return response()->json([
              'success' => false,
              'message' => 'Post Not Found',
          ], 404);
    }
}
