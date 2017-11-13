@extends('templates.default')

@section('content')
<div class="container">
  <div class="col-md-8">
    <div class="x_panel">
      <div class="x_title">
        Edit Item {{ $item->id }}
      </div>
      <div class="x_content">
      <form action="{{ route('item.update',$item) }}" class="" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
          <div class="form-group">
            <label for="">Name Items</label>
            <input type="text" name="name_items" placeholder="Post title" class="form-control" value="{{ $item->name_items }}"/>
          </div>

          <div class="form-group">
            <label for="">Category Item</label>
            <select name="category_id" id="" class="form-control">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                  @if ($category->id === $item->category_id)
                      selected
                  @endif
                > {{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="">Descriptions</label>
            <textarea name="descriptions" id="" class="form-control" cols="30" rows="5" placeholder="Add Descriptions" >{{ $item->descriptions }}</textarea>
          </div>

          <div class="form-group">
            <label for="">Units</label>
            <input type="text" name="units" placeholder="Add units" class="form-control" value="{{ $item->units }}"/>
          </div>

          <div class="form-group">
            <label for="">Purchase Prices</label>
            <input type="text" name="purchase_prices" placeholder="Add purchase price" class="form-control" value="{{ $item->purchase_prices }}"/>
          </div>

          <div class="form-group has-feedback{{ $errors->has('sale_prices')? 'has-error':''}}">
            <label for="">Sale Prices</label>
            <input type="text" name="sale_prices" placeholder="Add sale prices" class="form-control" value="{{ $item->sale_prices }}"/>
          </div>

          <div class="form-group">
            <label>Photos</label>
            <input type="file" name="image" id="inputimage" class="form-control" value="{{ ($item->image) }}"/>  
            </div>
          <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary">
            <button type="submit" class="btn btn-info"><a href="{{ route('item.index') }}">Back</a></button>
          </div>
          
        </form>
        
      </div>
    </div>

  </div>
  
</div>
@endsection