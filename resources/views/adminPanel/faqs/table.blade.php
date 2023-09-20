<div class="table-responsive-sm">
    <table class="table table-striped" id="faqs-table">
        <thead>
            <tr>
                <th>@lang('models/faqs.fields.id')</th>
                <th>@lang('models/pages.fields.language')</th>
                <th>@lang('models/faqs.fields.question')</th>
                <th>@lang('models/faqs.fields.answer')</th>
                <th>@lang('models/faqs.fields.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
            @php $i = 1;@endphp
            @foreach ( config('langs') as $locale => $name)
            <tr>
                <td>{{ $faq->id }}</td>
                <td> {{ $name  }}</td>
                <td>{{ $faq->translateOrNew($locale)->question }}</td>
                <td>{!! $faq->translateOrNew($locale)->answer !!}</td>
                <td>
                    {!! Form::open(['route' => ['adminPanel.faqs.destroy', $faq->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('faqs view')
                        <a href="{{ route('adminPanel.faqs.show', [$faq->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endcan
                        @can('faqs edit')
                        <a href="{{ route('adminPanel.faqs.edit', [$faq->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('faqs destroy')
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
