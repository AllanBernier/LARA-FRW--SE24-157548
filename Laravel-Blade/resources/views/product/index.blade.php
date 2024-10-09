<div>
    list of products :

    @if( session('success'))
        <p>{{session('success')}}</p>
    @endif



    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Description</th>
                <th><a href="{{ route('products.create') }}">Create</a></th>
            </tr>
        </thead>

        @foreach($products as $product )
        <tbody>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{route('products.show', ['product' => $product->id])}}">Show</a>
                    <a href="{{route('products.edit', ['product' => $product->id])}}">Edit</a>
                    <form action="{{route('products.destroy', ['product' => $product->id]) }}" method="post">
                        @method('delete')
                        @csrf

                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endForeach

    </table>

    {{ $products }}
     

</div>
