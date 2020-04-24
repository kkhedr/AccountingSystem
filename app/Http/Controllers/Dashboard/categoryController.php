<?php

namespace App\Http\Controllers\Dashboard;

use App\Categorytype;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryTypes = Categorytype::paginate(5);
        return view('dashboard.category_type.index',compact('categoryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category_type.create');
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
            'addcategorytype_en' => 'required',
            'addcategorytype_ar' => 'required',
        ]);

        Categorytype::create([
            'categorytype_ar'=>$validatedData['addcategorytype_ar'],
            'categorytype_en'=>$validatedData['addcategorytype_en']
        ]);

        return redirect()->route('dashboard.type.index');
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
        $categorytype = Categorytype::find($id);
        if($categorytype){
            $categorytype->delete();
            session()->flash('success',__('site.deleted_successfully'));
        }
        return redirect()->route('dashboard.type.index');
    }
}
