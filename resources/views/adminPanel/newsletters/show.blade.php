@extends('adminPanel.layouts.app')

@section('title', __('models/newsletters.plural') . ' ' . $settings->where('key', 'title_prefix')->first()->value)

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('adminPanel.newsletters.index') }}">@lang('models/newsletters.singular')</a>
    </li>
    <li class="breadcrumb-item active">@lang('crud.detail')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        @include('coreui-templates::common.errors')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>@lang('crud.detail')</strong>
                        <a href="{{ route('adminPanel.newsletters.index') }}" class="btn btn-ghost-light">Back</a>
                    </div>
                    <div class="card-body">
                        @include('adminPanel.newsletters.show_fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection