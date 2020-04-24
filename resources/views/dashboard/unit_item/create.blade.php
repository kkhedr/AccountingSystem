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
            <form action="{{route('dashboard.unit.store')}}" method="post">
                {{csrf_field()}}
                {{method_field('POST')}}

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div class="form-group">
                        <label>@lang('site.additem_'.$localeCode)</label>
                        <input type="text" name="itemunit_{{$localeCode}}" value="{{old('itemunit_'.$localeCode)}}" class="form-control">
                    </div>
                @endforeach

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="@lang('site.add')">
                </div>
            </form>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
