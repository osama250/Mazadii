@extends('adminPanel.layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('adminPanel.socialLinks.index') !!}">@lang('models/socialLinks.singular')</a>
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
                              <strong>Edit @lang('models/socialLinks.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($socialLink, ['route' => ['adminPanel.socialLinks.update', $socialLink->id], 'method' => 'patch']) !!}

                              @include('adminPanel.social_links.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection