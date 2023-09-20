<div class="table-responsive-sm">
    <table class="table table-striped" id="faqCategories-table">
        <thead>
            <tr>
                <th>@lang('models/faqCategories.fields.id')</th>
                <th>@lang('models/pages.fields.language')</th>
                <th>@lang('models/faqCategories.fields.name')</th>
                <th>@lang('models/faqCategories.fields.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqCategories as $faqCategory)
            @php $i = 1;@endphp
            @foreach ( config('langs') as $locale => $name)
            <tr>
                <td>{{ $faqCategory->id }}</td>
                <td>{{ $name }}</td>
                <td>{{ $faqCategory->translateOrNew($locale)->name }}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.faqCategories.destroy', $faqCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('faqCategories view')
                        <a href="{{ route('adminPanel.faqCategories.show', [$faqCategory->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('faqCategories edit')
                        <a href="{{ route('adminPanel.faqCategories.edit', [$faqCategory->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('faqCategories destroy')
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
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
