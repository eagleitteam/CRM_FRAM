<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreSalestagRequest;
use App\Http\Requests\Admin\Masters\UpdateSalestagRequest;
use App\Models\Salestag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SalestagController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salestags = Salestag::latest()->get();

        return view('admin.masters.salestags')->with(['salestags' => $salestags]);
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
    public function store(StoreSalestagRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Salestag::create(Arr::only($input, (new Salestag())->getFillable()));
            DB::commit();

            return response()->json(['success' => 'Salestag created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Salestag');
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
   public function edit(Salestag $salestag, Request $request)
{

    $salestag = Salestag::find($request->model_id);
    if ($salestag) {
        return response()->json([
            'result' => 1,
            'salestag' => $salestag,
        ]);
    } else {
        return response()->json([
            'result' => 0,
            'message' => 'Salestag not found',
        ]);
    }
}

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateSalestagRequest $request, Salestag $salestag)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $salestag = Salestag::find($request->edit_model_id);
            $salestag->update(Arr::only($input, Salestag::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Salestag updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Salestag');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salestag $salestag, Request $request)
    {
        $salestag = Salestag::find($request->model_id);

        try {
            DB::beginTransaction();
            $salestag->delete();
            DB::commit();
            return response()->json(['success' => 'Salestag deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Salestag');
        }
    }
}
