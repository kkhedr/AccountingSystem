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
                    <th scope="col">@lang('site.unit')</th>
                    <th scope="col">@lang('site.delete')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($units as $key=>$unit)
                <tr>
                    <td>{{$key + 1}}</td>
                    @if(LaravelLocalization::getCurrentLocale() == 'ar')
                        <td>{{$unit->itemunit_ar}}</td>
                    @else
                        <td>{{$unit->itemunit_en}}</td>
                    @endif

                    <td>
                        <form action="{{route('dashboard.unit.destroy',$unit->id)}}" method="post" style="display: inline-block">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <button type="submit" class="btn btn-danger delete"><li class="fa fa-trash"></li>@lang('site.delete')</button>
                        </form>
                    </td>


                </tr>
                @endforeach
                </tbody>
            </table>
         {{$units->links()}}
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection