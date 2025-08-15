<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreFramRequest;
use App\Http\Requests\Admin\Masters\UpdateFramRequest;
use App\Models\Fram;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class FramController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frams = Fram::latest()->get();

        return view('admin.masters.add-Edit-Frampage')->with(['frams' => $frams]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masters.add-Edit-Frampage')->with(['frams' => $frams]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFramRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Fram::create(Arr::only($input, (new Fram())->getFillable()));
            DB::commit();

            return response()->json(['success' => 'Fram created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Fram');
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
   public function edit(Fram $fram, Request $request)
{

    $fram = Fram::find($request->model_id);
    if ($fram) {
        return response()->json([
            'result' => 1,
            'fram' => $fram,
        ]);
    } else {
        return response()->json([
            'result' => 0,
            'message' => 'Fram not found',
        ]);
    }
}

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateFramRequest $request, Fram $fram)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $fram = Fram::find($request->edit_model_id);
            $fram->update(Arr::only($input, Fram::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Fram updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Fram');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fram $fram, Request $request)
    {
        $fram = Fram::find($request->model_id);

        try {
            DB::beginTransaction();
            $fram->delete();
            DB::commit();
            return response()->json(['success' => 'Fram deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Fram');
        }
    }
}
