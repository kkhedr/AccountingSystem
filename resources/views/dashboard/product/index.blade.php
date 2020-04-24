@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>
        </section>

        <section class="content">
            <div>
                @if(session()->has('delete'))
                    <p class="alert alert-success">{{session('delete')}}</p>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('site.code')</th>
                    <th scope="col">@lang('site.name')</th>
                    <th scope="col">@lang('itemContent')</th>
                    <th scope="col">@lang('unititem')</th>
                    <th scope="col">@lang('categorytype')</th>

                    <th scope="col">@lang('site.delete')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=>$product)
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$product->productcode}}</td>

                        @if(LaravelLocalization::getCurrentLocale() == 'ar')
                            <td>{{$unit->name_ar}}</td>
                            <td>{{$product->Itemunit()->itemunit_ar}}</td>
                            <td>{{$product->category_type()->categorytype_ar}}</td>
                        @else
                            <td>{{$unit->name_en}}</td>
                            <td>{{$product->Itemunit()->itemunit_en}}</td>
                            <td>{{$product->category_type()->categorytype_en}}</td>
                        @endif
                        <td>{{$product->itemContent}}</td>

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