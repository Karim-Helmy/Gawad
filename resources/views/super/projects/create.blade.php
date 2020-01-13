@extends('super.layouts.app')
@section('styles')
    <script src="{{ asset('frontend/ckeditor/ckeditor.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.datetimepicker.min.css')}}">
@endsection
@section('breadcrumbs')
    <!--Breadcrumb-->
    <div class="our_breadcrumb">
        <div class="container">
            <h1>{{ trans('admin.projects') }}</h1>
        </div>
    </div>
@endsection
@section('breadcrumbs2')
    <ul id="breadcrumb">
        <li><a href="{{ surl('/') }}"><span class="fa fa-home"> </span></a></li>
        <li><a href="{{ surl('/projects/create') }}"><span class="icon icon-beaker"> </span> {{ trans('admin.projects') }}</a></li>
        <li><a href="#"><span class="icon icon-beaker"> </span> {{ trans('admin.add') }}</a></li>
    </ul>
    <br /><br />
@endsection
@section('content')
    <div class="col-md-9">
        <!-- Start form-->
        @include('super.includes.messages')
    <form class="form form-horizontal striped-rows form-bordered" method="post" enctype="multipart/form-data"  action="{{ surl('/projects/store') }}">
        @csrf
        <div class="form_wrapper m-b-2">
            <!-- Name -->

            <div class="col-md-12 col-sm-12">

                <label class="req">{{ trans('admin.name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <!--    vision -->

                <div class="col-md-12 col-sm-12">

                    <label class="req" for="timesheetinput2">{{ trans('admin.vision') }}</label>
                        <textarea class="form-control" rows="4"  name="vision" >{{ old('vision') }}</textarea>

                </div>

            <!--    message -->
                <div class="col-md-12 col-sm-12">
                    <label class="req" for="timesheetinput2">{{ trans('admin.message') }}</label>

                    <textarea class="form-control" rows="4"  name="message" >{{ old('message') }}</textarea>

                </div>


            <!--    goal -->
                <div class="col-md-12 col-sm-12">
                    <label class="req" for="timesheetinput2">{{ trans('admin.goal') }}</label>

                        <textarea class="form-control" rows="4"  name="goal" >{{ old('goal') }}</textarea>


                </div>

            <div class="col-md-12 col-sm-12">
                <label class="req" for="timesheetinput2">{{ trans('admin.summary') }}</label>

                <textarea class="form-control" rows="4"  name="summary" >{{ old('summary') }}</textarea>


            </div>


        <div class="form-actions text-center">
            <button type="submit" class="btn btn-success">
                <i class="la la-check-square-o"></i> {{ trans('admin.save') }}
            </button>
        </div>
        </div>
    </form>
    </div>

@endsection
@section('scripts')

@endsection
