<?php

namespace App\Http\Controllers\Dashboard;

use App\Categorytype;
use App\Http\Controllers\Controller;
use App\ItemTitle;
use App\Itemunit;
use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::when($request->search,function($q) use ($request){
            return $q->whereTranslationLike('name','%'.$request->search.'%');

        })->latest()->paginate(5);

        if($products){
            return view('dashboard.product.index',compact('products'));
        }else {
            $products = Product::when($request->search,function($q) use ($request){
                return $q->where('productcode','=',$request->search);

            })->latest()->paginate(5);
            return view('dashboard.product.index',compact('products'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemunits = Itemunit::all();
        $categories= Categorytype::all();
        $itemstitle = ItemTitle::all();
        return view('dashboard.product.create',compact('itemunits','categories','itemstitle'));
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
            'productcode' => 'required',
            'name_en' => 'required',
            'name_ar' => 'required',
            'itemunitId' => 'required',
            'itemContent' => 'required',
            'subsetitem-one'=>'required',

            'itemContentTwo'=>'required',
            'itemContentOne'=>'required',
            'subsetitem-two'=>'required',

            'itemtitle_id'=>'required',
            'categoryId' => 'required',
            'itemrequest'=>'required',
            'itemmax'=>'required',
            'itemmin'=>'required',
        ]);

        Product::create($validatedData);

        return redirect()->route('dashboard.products.index');
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
        $product = Product::find($id);
        if($product){
            $product->delete();
            session()->flash('success',__('site.deleted_successfully'));
        }
        return redirect()->route('dashboard.products.index');
    }
}
