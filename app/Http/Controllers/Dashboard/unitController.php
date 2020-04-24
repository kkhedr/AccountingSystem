<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Itemunit;
use Illuminate\Http\Request;

class unitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Itemunit::paginate(5);
        return view('dashboard.unit_item.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.unit_item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'itemunit_en' => 'required',
            'itemunit_ar' => 'required',
        ]);

        Itemunit::create($validatedData);

        return redirect()->route('dashboard.unit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Itemunit  $itemunit
     * @return \Illuminate\Http\Response
     */
    public function show(Itemunit $itemunit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Itemunit  $itemunit
     * @return \Illuminate\Http\Response
     */
    public function edit(Itemunit $itemunit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Itemunit  $itemunit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itemunit $itemunit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Itemunit  $itemunit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Itemunit::find($id);
        if($item){
            $item->delete();
            session()->flash('success',__('site.deleted_successfully'));
        }
        return redirect()->route('dashboard.unit.index');

    }
}
