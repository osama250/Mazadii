@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">@lang('models/rules.plural')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('models/rules.plural')
                        @if ( App::getLocale() == 'ar' )
                            <a class="pull-left" href="{{ route('adminPanel.rules.create') }}">
                                <i class="fa fa-plus-square fa-lg"></i>
                            </a>
                        @else
                            <a class="pull-right" href="{{ route('adminPanel.rules.create') }}">
                                <i class="fa fa-plus-square fa-lg"></i>
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @include('adminPanel.rules.table')
                        <div class="pull-right mr-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
