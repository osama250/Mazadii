<div class="table-responsive-sm">
    <table class="table table-striped" id="rules-table">
        <thead>
            <tr>
                <th>@lang('models/faqCategories.fields.id')</th>
                <th>@lang('models/metas.fields.language')</th>
                <th>@lang('models/rules.fields.title')</th>
                <th>@lang('models/rules.fields.description')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rules as $rule)
             @php $i = 1;@endphp
             @foreach ( config('langs') as $locale => $name)
                <tr>
                    <td>{{ $rule->id }}</td>
                    <td>{{ $name }}</td>
                    <td>{{ $rule->translateOrNew($locale)->title }}</td>
                    <td>{{Str::limit($rule->translateOrNew($locale)->description, 150 ) }}</td>
                    <td>
                        {!! Form::open(['route' => ['adminPanel.rules.destroy', $rule->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('adminPanel.rules.show', [$rule->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('adminPanel.rules.edit', [$rule->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!} --}}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
             @php $i = 0; @endphp
             @endforeach
            @endforeach
        </tbody>
    </table>
</div>
