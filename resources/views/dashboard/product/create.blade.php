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
                <div class="form-group">
                    <label>@lang('site.code')</label>
                    <input type="text" name="productcode" value="{{old('productcode')}}" class="form-control">
                </div>

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="form-group">
                        <label>@lang('site.name_'.$localeCode)</label>
                        <input type="text" name="name_{{$localeCode}}" value="{{old('name_'.$localeCode)}}" class="form-control">
                    </div>
                @endforeach

                <div class="form-group">
                    <label>@lang('itemContent')</label>
                    <input type="text" name="itemContent" value="{{old('itemContent')}}" class="form-control">
                </div>


                <div class="form-group">
                    <label>@lang('unititem')</label>
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

                <div class="form-group">
                    <label>@lang('categorytype')</label>
                    <select class="form-control" name="categoryId">
                        @foreach($itemunits as $itemunit)
                            @if(LaravelLocalization::getCurrentLocale() == 'ar')
                                <option value="{{$itemunit->id}}">{{$itemunit->categorytype_ar}}</option>
                            @else
                                <option value="{{$itemunit->id}}">{{$itemunit->categorytype_en}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="@lang('site.add')">
                </div>
            </form>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
