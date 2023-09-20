<div class="table-responsive-sm">
    <table class="table table-striped" id="sliders-table">
        <thead>
            <tr>
                <th>@lang('models/pages.fields.id')</th>
                <th>@lang('models/metas.fields.language')</th>
                <th>@lang('models/sliders.fields.title')</th>
                <th>@lang('models/sliders.fields.photo')</th>
                <th>@lang('models/sliders.fields.link')</th>
                <th>@lang('models/sliders.fields.status')</th>
                {{-- <th>@lang('models/sliders.fields.description')</th> --}}
                  {{--
                        <th>@lang('models/sliders.fields.sort')</th>  --}}
                        <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
         @foreach($sliders as $slider)
                @php $i = 1; @endphp
                @foreach ( config('langs') as $locale => $name)
                    <tr>
                        <td>{{ $slider->id }}</td>
                        <td>{{ $name }}</td>
                        <td>{{ $slider->translateOrNew($locale)->title }}</td>
                        <td>
                            @if ($i)
                            <img src="{{asset('uploads/images/thumbnail/' . $slider->photo)}}" alt="{{$slider->name}}" style="width:40px">
                            @endif
                        </td>

                        <td>{{ $slider->link }}</td>
                        <td>{{$i ? $slider->status ? 'Active' : 'Inactive' : '' }}</td>
                        {{-- <td>{{ $i ? $slider->sort : '' }}</td> --}}


                        <td>
                            @if ($i)

                            {!! Form::open(['route' => ['adminPanel.sliders.destroy', $slider->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                @can('sliders view')
                                <a href="{{ route('adminPanel.sliders.show', [$slider->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                                @endcan
                                @can('sliders edit')
                                <a href="{{ route('adminPanel.sliders.edit', [$slider->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('sliders destroy')
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                                @endcan
                            </div>
                            {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>

                @php $i = 0; @endphp
                @endforeach
         @endforeach
        </tbody>
    </table>
</div>

{{-- {{  'Hello from Data' }} --}}
