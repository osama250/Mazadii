<div class="table-responsive-sm">
    <table class="table table-striped" id="contacts-table">
        <thead>
            <tr>
                <th>@lang('models/contacts.fields.name')</th>
                <th>@lang('models/contacts.fields.email')</th>
                <th>@lang('models/contacts.fields.code')</th>
                <th>@lang('models/contacts.fields.message')</th>
                <th>@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name ?? '' }}</td>
                <td>{{ $contact->email ?? '' }}</td>
                <td>{{ $contact->code ?? '' }}</td>
                <td>{{ Str::limit($contact->message, 20) }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('contacts view')
                        <a href="{{ route('adminPanel.contacts.show', [$contact->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        {{-- <a href="{{ route('adminPanel.contacts.edit', [$contact->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a> --}}
                        @can('contacts destroy')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
