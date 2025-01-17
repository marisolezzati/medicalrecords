<?php

namespace App\Http\Controllers;

use App\Models\BloodTest;
use App\Models\Measure;
use Illuminate\Http\Request;

class BloodTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filerParams = $_GET;
        $bloodTest= BloodTest::where('user_id', auth()->user()->id)
        ->when(!empty($filerParams["date"]), function($query) use ($filerParams){
            return $query->where('date', $filerParams["date"]);
        })
        ->when(!empty($filerParams["measure_id"]), function($query) use ($filerParams){
            return $query->where('measure_id', $filerParams["measure_id"]);
        })
        ->orderBy('date')->get();
        $measures= Measure::orderBy('name')->get();
        return view('bloodtest.index', ['measures'=>$measures, 'bloodtests'=>$bloodTest]);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'value'=> ['required','numeric', 'min:0'],
            'date'=> ['required'],
        ]);
        $data['age'] = $request->user()->age;
        $data['user_id'] = $request->user()->id;
        $data['measure_id'] = intval($request->measure_id);
        $bloodtest = BloodTest::create($data);
        return to_route('bloodtest.index');
    }

    /**
     * Populates currencies table with data from the API
     */
    public function create()
    {
        $measures= Measure::orderBy('name')->get();
        return view('bloodtest.create', ['measures'=>$measures]);
    }


    /**
     * Display the specified resource.
     */
    public function show(BloodTest $bloodTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodTest $bloodTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodTest $bloodTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodTest $bloodTest)
    {
        //
    }
}
