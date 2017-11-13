@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showimage').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }

    $("#inputimage").change(function (e) {
      // console.log(e);
      readURL(this);
    });

</script>

@stop


@extends('templates.default')

@section('content')
<div class="container">
  <div class="col-md-8">
    <div class="x_panel">
      <div class="x_title">
        Add Data Item
      </div>  
      <div class="x_content">
          <form action="{{ route('item.store') }}" class="" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="form-group has-feedback{{ $errors->has('name_items')? 'has-error':''}}">
            <label for="">Name Items</label>
            <input type="text" name="name_items" placeholder="Post title" class="form-control" value="{{ old('name_items') }}"/>
            @if ($errors->has('name_items'))
            <span class="help-block">
              <p>{{ $errors->first('name_items') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group">
            <label for="">Category Item</label>
            <select name="category_id" id="" class="form-control">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="form-group has-feedback{{ $errors->has('descriptions')? 'has-error':''}}">
            <label for="">Descriptions</label>
            <textarea name="descriptions" id="" class="form-control" cols="30" rows="5" placeholder="Add Descriptions" value="">{{ old('descriptions') }}</textarea>
            @if ($errors->has('descriptions'))
            <span class="help-block">
              <p>{{ $errors->first('descriptions') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('units')? 'has-error':''}}">
            <label for="">Units</label>
            <input type="text" name="units" placeholder="Add units" class="form-control" value="{{ old('units') }}"/>
            @if ($errors->has('units'))
            <span class="help-block">
              <p>{{ $errors->first('units') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('purchase_prices')? 'has-error':''}}">
            <label for="">Purchase Prices</label>
            <input type="text" name="purchase_prices" placeholder="Add purchase price" class="form-control" value="{{ old('purchase_prices') }}"/>
            @if ($errors->has('purchase_prices'))
            <span class="help-block">
              <p>{{ $errors->first('purchase_prices') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('sale_prices')? 'has-error':''}}">
            <label for="">Sale Prices</label>
            <input type="text" name="sale_prices" placeholder="Add sale prices" class="form-control" value="{{ old('sale_prices') }}"/>
            @if ($errors->has('sale_prices'))
            <span class="help-block">
              <p>{{ $errors->first('sale_prices') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('image')? 'has-error':''}}">
            <label for="">Image</label>
            <input type="file" name="image" id="inputimage" class="form-control"/>
            <img src="http://placehold.it/400x400" id="showimage" style="max-width:300px;max-height:600px;float:left;" />
            @if ($errors->has('image'))
            <span class="help-block">
              <p>{{ $errors->first('image') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary">
          </div>
          
        </form>
      </div>
    </div>
  </div>
  
</div>
@endsection