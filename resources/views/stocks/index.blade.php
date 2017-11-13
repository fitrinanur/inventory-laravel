@extends('templates.default')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
       
        <button class="btn btn-success"><a href="{{ route('stock.create')}}">Add Item</a></button>
        
    <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Item</th>
        <th scope="col">Supplier</th>
        <th scope="col">Stock</th>
        </tr>
    </thead>
    <tbody>
    @php
    $no = 1;
    @endphp
    @foreach ($stocks as $stock)
        <tr>
        <th scope="row">@php echo $no++ @endphp</th>
        <td>{{ $stock->item->name_items }}</td>
        <td>{{ $stock->supplier->supplier_name }}</td>
        <td>{{ $stock->stocks }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
</div>
</div>
@endsection