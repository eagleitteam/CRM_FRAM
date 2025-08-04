<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreCommissionRequest;
use App\Http\Requests\Admin\Masters\UpdateCommissionRequest;
use App\Models\Commission;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CommissionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commissions = Commission::latest()->get();

        return view('admin.masters.commissions')->with(['commissions' => $commissions]);
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
    public function store(StoreCommissionRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Commission::create(Arr::only($input, (new Commission())->getFillable()));
            DB::commit();

            return response()->json(['success' => 'Commission created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Commission');
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
   public function edit(Commission $commission, Request $request)
{

    $commission = Commission::find($request->model_id);
    if ($commission) {
        return response()->json([
            'result' => 1,
            'commission' => $commission,
        ]);
    } else {
        return response()->json([
            'result' => 0,
            'message' => 'Commission not found',
        ]);
    }
}

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateCommissionRequest $request, Commission $commission)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $commission = Commission::find($request->edit_model_id);
            $commission->update(Arr::only($input, Commission::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Commission updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Commission');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commission $commission, Request $request)
    {
        $commission = Commission::find($request->model_id);

        try {
            DB::beginTransaction();
            $commission->delete();
            DB::commit();
            return response()->json(['success' => 'Commission deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Commission');
        }
    }
}
