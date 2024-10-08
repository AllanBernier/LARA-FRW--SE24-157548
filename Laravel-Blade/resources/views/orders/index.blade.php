<div>


    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>paid_at</th>
                <th>total_price</th>
            </tr>
        </thead>

        @foreach($orders as $order)
        <tbody>
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->paid_at }}</td>
                <td>{{ $order->total_price }}</td>
            </tr>
        </tbody>
        @endForeach

    </table>
</div>
