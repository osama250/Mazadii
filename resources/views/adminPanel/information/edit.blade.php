@extends('adminPanel.layouts.app')

@section('title', __('models/information.plural') . ' ' . $settings->where('key', 'title_prefix')->first()->value)

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('adminPanel.information.index') !!}">@lang('models/information.singular')</a>
          </li>
          <li class="breadcrumb-item active">@lang('crud.edit')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit @lang('models/information.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($information, ['route' => ['adminPanel.information.update', $information->id], 'method' => 'patch']) !!}

                              @include('adminPanel.information.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection