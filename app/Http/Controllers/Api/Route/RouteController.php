<?php

namespace App\Http\Controllers\Api\Route;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $route = new Route;
            $route->name = $request->get('name');
            $route->from = $request->get('from');
            $route->to = $request->get('to');
            $route->range = $request->get('range');

            $route->save();

            return response()->json([
                'message' => 'The route was added successfully',
                'route'   =>  $route
            ], 200);
        } catch (\Exception $e) {
            logger('Error in RouteController.store', [$e->getMessage()]);
            return response()->json(['error' => 'Something went wrong saving the route'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $route = Route::findOrFail($id);
            $route->delete();
            return response()->json(['success' => 'Route deleted successfully'], 200);
        } catch (\Exception $e) {
            logger('Error in RouteController.destroy', [$e->getMessage()]);
            return response()->json(['error' => 'Something went wrong deleteing the saved route'], 400);
        }
    }
}
