@extends('templates.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="form-group pull-right">
            <div class="input-group">
                <form action="{{ route('supplier.search',$suppliers)}}" method="GET">
                    <input type="text" class="form-control" name="supplierkey" style="width:350px">
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-medium btn-primary">Cari</button>
                    </span> 
                </form>
            </div>
        </div>
        <button class="btn btn-success"><a href="{{ route('supplier.create')}}">Add Item</a></button>
        
    <table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">Photo</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    @php
    $no = 1;
    @endphp
    @foreach ($suppliers as $supplier)
        <tr>
        <th scope="row">@php echo $no++ @endphp</th>
        <td>{{ $supplier->supplier_name }}</td>
        <td>{{ $supplier->phone }}</td>
        <td>{{ $supplier->email }}</td>
        <td>{{ $supplier->address }}</td>
        <td>{{ $supplier->city->city_name }}</td>
        <td><img src="{{ asset('supplier/'.$supplier->Image)  }}" style="max-height:200px;max-width:200px;margin-top:10px;"></td>
        <td>
            <button class="btn btn btn-info"><a href="{{ route('supplier.edit', $supplier )}}">edit</a></button>
            <form action="{{ route('supplier.destroy',$supplier)}}" method='post'class=''>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            <button class="btn btn btn-danger" type="submit">Hapus</button>  
            </form>
        </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
</div>
</div>
@endsection