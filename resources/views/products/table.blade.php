<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>@lang('models/products.fields.enabled')</th>
        <th>@lang('models/products.fields.category_id')</th>
        <th>@lang('models/products.fields.name')</th>
        <th>@lang('models/products.fields.img_url')</th>
        <th>@lang('models/products.fields.price')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->enabled }}</td>
            <td>{{ $product->category_id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->img_url }}</td>
            <td>{{ $product->price }}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
