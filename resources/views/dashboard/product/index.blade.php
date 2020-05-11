@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>
        </section>

        <div class="row">
            <div class="col-md-4">
                <form action="{{route('dashboard.products.index')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <div class="form-group">
                        <input type="text" name="search" value="@lang('site.search')" class="form-control">
                    </div>
                    <input type="submit" name="btn_search" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8"></div>
        </div>
        <section class="content">
            <div>
                @if(session()->has('delete'))
                    <p class="alert alert-success">{{session('delete')}}</p>
                @endif
            </div>
            <table class="table table-responsive table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('site.code')</th>
                    <th scope="col">@lang('site.name')</th>
                    <th scope="col">@lang('site.itemTitle')</th>

                    <th scope="col">@lang('site.unititem')</th>
                    <th scope="col">@lang('site.subsetunititem')</th>

                    <th scope="col">@lang('site.itemContent')</th>
                    <th scope="col">@lang('site.categorytype')</th>

                    <th scope="col">@lang('site.itemrequest')</th>
                    <th scope="col">@lang('site.itemmax')</th>
                    <th scope="col">@lang('site.itememin')</th>


                    <th scope="col">@lang('site.delete')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=>$product)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$product->productcode}}</td>

                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                            <td>{{$product->name_ar}}</td>
                            <td>{{$product->Itemunit->itemunit_ar}}</td>
                            <td>{{$product->subsetitem}}</td>
                            <td>{{$product->itemContent}}</td>
                            <td>{{$product->category_type->categorytype_ar}}</td>
                            <td>{{$product->ItemTitle->itemtitle_ar}}</td>
                        @else
                            <td>{{$product->name_en}}</td>
                            <td>{{$product->Itemunit->itemunit_en}}</td>
                            <td>{{$product->subsetitem}}</td>
                            <td>{{$product->itemContent}}</td>
                            <td>{{$product->category_type->categorytype_en}}</td>
                            <td>{{$product->ItemTitle->itemtitle_en}}</td>
                        @endif

                        <td>{{$product->itemrequest}}</td>
                        <td>{{$product->itemmax}}</td>
                        <td>{{$product->itemmin}}</td>


                        <td>
                            <form action="{{route('dashboard.products.destroy',$product->id)}}" method="post" style="display: inline-block">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit" class="btn btn-danger delete"><li class="fa fa-trash"></li>@lang('site.delete')</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection