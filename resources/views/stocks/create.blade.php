@extends('templates.default')


@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="x_panel">
            <div class="x_title">
                Add Stock
            </div>
            <div class="x_content">
                <div class="col-md-8">
                    <form action="{{ route('stock.store') }}" method=post enctype="multipart/form-data" >
                    {{ csrf_field() }}
                        <div class="form-group">
                        <label for="">Item Name</label>
                        <select name="item_id" id="" class="form-control">
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}"> {{ $item->name_items }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="">Supplier Name</label>
                        <select name="supplier_id" id="" class="form-control">
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}"> {{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Stock</label>
                        <input type="text" name="stocks" id="stock" class="form-control" />  
                        </div>

                        <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
</div>


@endsection