<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreLocationRequest;
use App\Http\Requests\Admin\Masters\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::latest()->get();

        return view('admin.masters.locations')->with(['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Location::create(Arr::only($input, (new Location())->getFillable()));
            DB::commit();

            return response()->json(['success' => 'Location created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Location');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Location $location, Request $request)
{

    $location = Location::find($request->model_id);
    if ($location) {
        return response()->json([
            'result' => 1,
            'location' => $location,
        ]);
    } else {
        return response()->json([
            'result' => 0,
            'message' => 'Location not found',
        ]);
    }
}

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateLocationRequest $request, Location $location)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $location = Location::find($request->edit_model_id);
            $location->update(Arr::only($input, Location::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Location updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Location');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location, Request $request)
    {
        $location = Location::find($request->model_id);

        try {
            DB::beginTransaction();
            $location->delete();
            DB::commit();
            return response()->json(['success' => 'Location deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Location');
        }
    }
}
