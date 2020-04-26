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
            @include('partials._errors')
            <form action="{{route('dashboard.products.store')}}" method="post">
                {{csrf_field()}}
                {{method_field('POST')}}

                <div class="row">

                    <div class="form-group col-md-6">
                        <label>@lang('site.code')</label>
                        <input type="text" name="productcode" value="{{old('productcode')}}" class="form-control">
                    </div>

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <div class="form-group col-md-6">
                            <label>@lang('site.name_'.$localeCode)</label>
                            <input type="text" name="name_{{$localeCode}}" value="{{old('name_'.$localeCode)}}" class="form-control">
                        </div>
                    @endforeach

                    <div class="form-group col-md-6">
                        <label>@lang('site.itemContent')</label>
                        <input type="text" name="itemContent" value="{{old('itemContent')}}" class="form-control">
                    </div>


                    <div class="form-group col-md-6">
                        <label>@lang('site.unititem')</label>
                        <select class="form-control" name="itemunitId">
                            @foreach($itemunits as $itemunit)
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    <option value="{{$itemunit->id}}">{{$itemunit->itemunit_ar}}</option>
                                @else
                                    <option value="{{$itemunit->id}}">{{$itemunit->itemunit_en}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>@lang('site.subsetunititem')</label>
                        <select class="form-control" name="subsetitem">
                            @foreach($itemunits as $itemunit)
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    <option value="{{$itemunit->itemunit_ar}}">{{$itemunit->itemunit_ar}}</option>
                                @else
                                    <option value="{{$itemunit->itemunit_en}}">{{$itemunit->itemunit_en}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>@lang('site.categorytype')</label>
                        <select class="form-control" name="categoryId">

                            @foreach($categories as $category)
                                @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                    <option value="{{$category->id}}">{{$category->categorytype_ar}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->categorytype_en}}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>@lang('site.itemrequest')</label>
                        <input type="text" name="itemrequest" value="{{old('itemrequired')}}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>@lang('site.itemmax')</label>
                        <input type="text" name="itemmax" value="{{old('itemmax')}}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>@lang('site.itememin')</label>
                        <input type="text" name="itemmin" value="{{old('itemmin')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="@lang('site.add')">
                    </div>

                </div>


            </form>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
