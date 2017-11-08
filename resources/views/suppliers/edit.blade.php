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

    $("#inputimage").change(function () {
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
                Edit Supplier id : {{ $supplier->id }}
            </div>
            <div class="x_content">
                <div class="col-md-8">
                    <form action="{{ route('supplier.update',$supplier) }}" method=post enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <div class="form-group">
                        <label>Name Supplier</label>
                        <input type="text" name="supplier_name" class="form-control" value="{{ $supplier->supplier_name }}"/>  
                        </div>

                        <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}"/>  
                        </div>

                        <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $supplier->email }}"/>  
                        </div>

                        <div class="form-group">
                        <label>Address</label>
                        <textarea col= 10 row=5 name="address" class="form-control">{{ $supplier->address }}</textarea>
                        </div>

                        <div class="form-group">
                        <label for="">City</label>
                        <select name="city_id" id="" class="form-control">
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}"
                            @if ($city->id === $supplier->city_id)
                                selected
                            @endif
                          > {{ $city->city_name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Photos</label>
                        <input type="file" name="image" id="inputimage" class="form-control" value="{{ $supplier->image }}"/>  
                        </div>

                        <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection