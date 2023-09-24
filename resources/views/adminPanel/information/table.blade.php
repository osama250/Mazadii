<div class="table-responsive-sm">
    <table class="table table-striped" id="information-table">
        <thead>
            <tr>
                <th>@lang('models/metas.fields.id')</th>
                {{-- <th>@lang('models/metas.fields.language')</th> --}}
                <th>@lang('models/information.fields.name')</th>
                <th>@lang('models/information.fields.status')</th>
                <th>@lang('models/information.fields.actions')</th>
            </tr>
        </thead>

        <tbody>

            @foreach($information as $info)
            @php $i = 1; @endphp
            {{-- @foreach ( config('langs') as $locale => $name) --}}
            <tr>
                <td>{{ $info->id }}</td>
                {{-- <td>{{ $name }}</td> --}}
                <td>{{ $info->name }}</td>
                <td>{{$i ? $info->status ? 'Active' : 'Inactive' : '' }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.information.destroy', $info->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('information view')
                        <a href="{{ route('adminPanel.information.show', [$info->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('information edit')
                        <a href="{{ route('adminPanel.information.edit', [$info->id])}}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!} --}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @php $i = 0; @endphp
          {{--  @endforeach --}}
            @endforeach
        </tbody>
    </table>
</div>
