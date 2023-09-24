@extends('adminPanel.layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">@lang('models/socialLinks.plural')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        @lang('models/socialLinks.plural')
                        @can('socialLinks create')
                            @if ( App::getLocale() == 'ar' )
                                <a class="pull-left" href="{{ route('adminPanel.socialLinks.create') }}">
                                    <i class="fa fa-plus-square fa-lg"></i>
                                </a>
                            @else
                                <a class="pull-right" href="{{ route('adminPanel.socialLinks.create') }}">
                                    <i class="fa fa-plus-square fa-lg"></i>
                                </a>
                            @endif
                        @endcan
                    </div>
                    <div class="card-body">
                        @include('adminPanel.social_links.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
