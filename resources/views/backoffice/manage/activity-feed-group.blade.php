@extends('layouts.backoffice')

@section('js')
  @parent

  <script type="text/javascript" src="{{ asset('js/backoffice.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/backoffice-manage.js') }}"></script>
 


@endsection
@section('backoffice-content')
<div class="container">

        @php
            echo View::make('includes.breadcrumb')->with([ "breadcrumbs"=>$breadcrumbs])
        @endphp

         @include('includes.manage-tabs')

        <div class="mt-4 bg-white border border-gray p-4">
            @include('includes.notification')
            <div class="row">
                <div class="col-md-6">
                    <h1 class="section-title font-weight-medium text-primary mb-0">Activity Feed Group</h1>
                     
                </div>
                <div class="col-md-6">
                    <div class="float-right">
 

                    </div>
                </div>
            </div>
            
            <div class="activity-group-type-map mt-3">
                <select class="form-control" name="activity_group" id="activity_group" >                 
                 <option value="">Select</option>
                    @foreach($groupList as $list)
                        <option value="{{ $list->id }}" >{{ $list->group_name }}</option>
                    @endforeach
                </select>

                <div class="activity-list d-none">
                    <ul>
                        
                    </ul>
                     <button type="button" class="btn btn-primary save-activity-group-types" >Save</button>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        #datatable-firms_filter{
            display: none;
        }
    </style>

@endsection