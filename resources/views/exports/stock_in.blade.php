<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Size</th>
            <th>Supplier</th>
            <th>Qty</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stockIns as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->productSize->size }}</td>
            <td>{{ $item->supplier->name }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>