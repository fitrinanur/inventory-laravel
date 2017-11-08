@extends('templates.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        <div class="form-group pull-right">
            <div class="input-group">
            <form action="{{ route('item.search',$items) }}" method="GET">
                <input type="text" class="form-control" name="q" style="width:250px">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-medium btn-primary pull-right">Cari</button>
                </span>
            </form>
            </div>
        </div>
        <button class="btn btn-success"><a href="{{ route('item.create')}}">Add Item</a></button>
        
        <table class="table table-bordered">
            <thead>
                <tr class="heading black">
                <th  scope="col">No</th>
                <th scope="col">Items</th>
                <th scope="col">Category</th>
                <th scope="col">Descriptions</th>
                <th scope="col">Units</th>
                <th scope="col">Purchase</th>
                <th scope="col">Sale</th>
                <th scope="col">Gambar</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
    
            <!-- @if(is_array($items)||is_object($items)) -->
            @php
            $no = 1;
            @endphp
            @foreach( $items as $item)
                <tr>
                <th scope="row">@php echo $no++ @endphp</th>
                <td>{{$item->name_items}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->descriptions}}</td>
                <td>{{$item->units}}</td>
                <td>{{$item->purchase_prices}}</td>
                <td>{{$item->sale_prices}}</td>
                <td><img src="{{ asset('image/'.$item->image)  }}" style="max-height:200px;max-width:200px;margin-top:10px;"></td>
                <td>
                    <button class="btn btn-info"><a href="{{ route('item.edit', $item )}}">edit</a></button>
                    <form action="{{ route('item.destroy',$item)}}" method='post'class=''>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                  <button class="btn btn-danger" type="submit">Hapus</button>  
                  </form>
                </td>

                </tr>
            @endforeach
          
            </tbody>
        </table>
        {!! $items->render() !!}
        <!-- @endif -->
        </div>
    </div>
</div>

@endsection