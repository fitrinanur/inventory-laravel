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
                Add Supplier
            </div>
            <div class="x_content">
                <div class="col-md-8">
                    <form action="{{ route('supplier.store') }}" method=post enctype="multipart/form-data" >
                    {{ csrf_field() }}
                        <div class="form-group">
                        <label>Name Supplier</label>
                        <input type="text" name="supplier_name" class="form-control" placeholder="Add Supplier Name.."/>  
                        </div>

                        <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Add Phone Number.."/>  
                        </div>

                        <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Add Emai.."/>  
                        </div>

                        <div class="form-group">
                        <label>Address</label>
                        <textarea col= 10 row=5 name="address" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                        <label for="">City</label>
                        <select name="city_id" id="" class="form-control">
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}"> {{ $city->city_name }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Photos</label>
                        <input type="file" name="image" id="inputimage" class="form-control" />  
                        </div>

                        <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </form>
                 </div>
                 <div class="col-md-4">
                 <img class="form-control "src="http://placehold.it/300x300" id="showimage" style="max-width:300px;max-height:300px;float:left;" />
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection