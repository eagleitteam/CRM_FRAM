<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreBankmasterRequest;
use App\Http\Requests\Admin\Masters\UpdateBankmasterRequest;
use App\Models\Bankmaster;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BankmasterController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankmasters = Bankmaster::latest()->get();

        return view('admin.masters.bankmaster')->with(['bankmasters' => $bankmasters]);
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
    public function store(StoreBankmasterRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Bankmaster::create(Arr::only($input, (new Bankmaster())->getFillable()));
            DB::commit();

            return response()->json(['success' => 'Bankmaster created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Bankmaster');
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
   public function edit(Bankmaster $bankmaster, Request $request)
{

    $bankmaster = Bankmaster::find($request->model_id);
    if ($bankmaster) {
        return response()->json([
            'result' => 1,
            'bankmasters' => $bankmaster,
        ]);
    } else {
        return response()->json([
            'result' => 0,
            'message' => 'Bankmaster not found',
        ]);
    }
}

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateBankmasterRequest $request, Bankmaster $bankmaster)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $bankmaster = Bankmaster::find($request->edit_model_id);
            $bankmaster->update(Arr::only($input, Bankmaster::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Bankmaster updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Bankmaster');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bankmaster $bankmaster, Request $request)
    {
        $bankmaster = Bankmaster::find($request->model_id);

        try {
            DB::beginTransaction();
            $bankmaster->delete();
            DB::commit();
            return response()->json(['success' => 'Bankmaster deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Bankmaster');
        }
    }
}
