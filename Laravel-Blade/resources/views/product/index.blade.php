<div>
    list of products :

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
            </tr>
        </tbody>
        @endForeach

    </table>
    

</div>
