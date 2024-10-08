<div>
    Page create



    <form action="{{route('products.store')}}" method="POST">

        @csrf
        {{-- @method('POST') --}}

        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <br>

        <label for="price">Price</label>
        <input type="number" id="price" name="price">
        <br>

        <label for="description">Description</label>
        <input type="text" id="description" name="description">
        <br>

        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock">

        <br>
        <input type="submit">
    </form>

</div>
