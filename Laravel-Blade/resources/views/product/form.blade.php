

@if(isset($product->id))
  <form action="{{route('products.update', ['product' => $product->id])}}" method="POST">
  @method('put')
@else
  <form action="{{route('products.store')}}" method="POST">
@endif

  @csrf
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="{{old('name', $product->name)}}">
  @error('name') {{$message}} @enderror
  <br>

  <label for="price">Price</label>
  <input type="number" id="price" name="price" value="{{old('price', $product->price)}}">
  @error('price') {{$message}} @enderror
  <br>

  <label for="description">Description</label>
  <input type="text" id="description" name="description" value="{{old('description', $product->description)}}">
  @error('description') {{$message}} @enderror
  <br>

  <label for="stock">Stock</label>
  <input type="number" id="stock" name="stock" value="{{old('stock', $product->stock)}}">
  @error('stock') {{$message}} @enderror

  <br>

    <button type="submit">
    @if($product->id)
      Modifier le produict
    @else
      Créer le produit
    @endif
    </button>

</form>
