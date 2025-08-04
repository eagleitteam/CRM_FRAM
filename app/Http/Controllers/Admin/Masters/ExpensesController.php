<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreExpensesRequest;
use App\Http\Requests\Admin\Masters\UpdateExpensesRequest;
use App\Models\Expenses;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expenses::latest()->get();

        return view('admin.masters.expenses')->with(['expenses' => $expenses]);
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
    public function store(StoreExpensesRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Expenses::create(Arr::only($input, (new Expenses())->getFillable()));
            DB::commit();

            return response()->json(['success' => 'Expenses created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Expenses');
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
   public function edit(Expenses $expenses, Request $request)
{

    $expenses = Expenses::find($request->model_id);
    if ($expenses) {
        return response()->json([
            'result' => 1,
            'expenses' => $expenses,
        ]);
    } else {
        return response()->json([
            'result' => 0,
            'message' => 'Expenses not found',
        ]);
    }
}

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateExpensesRequest $request, Expenses $expenses)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $expenses = Expenses::find($request->edit_model_id);
            $expenses->update(Arr::only($input, Expenses::getFillables()));
            DB::commit();

            return response()->json(['success' => 'Expenses updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Expenses');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expenses $expenses, Request $request)
    {
        $expenses = Expenses::find($request->model_id);

        try {
            DB::beginTransaction();
            $expenses->delete();
            DB::commit();
            return response()->json(['success' => 'Expenses deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Expenses');
        }
    }
}
