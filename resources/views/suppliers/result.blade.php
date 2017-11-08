@extends('templates.default')

@section('content')
@if (count($results))
<div class="x_panel green white-text">Hasil pencarian : <b>{{$query}}</b></div>
    <div class="container">
		<div class="col-md-12">
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
                $no=1;
                @endphp
                @foreach( $results as $result)
                    <tr>
                    <th scope="row">@php echo $no++ @endphp</th>
                    <td>{{$result->supplier_name}}</td>
                    <td>{{$result->phone}}</td>
                    <td>{{$result->email}}</td>
                    <td>{{$result->address}}</td>
                    <td>{{$result->city->city_name}}</td>
                    <td><img src="{{ asset('supplier/'.$result->image)  }}" style="max-height:200px;max-width:200px;margin-top:10px;"></td>
                    <td>
                        <button class="btn btn-xs btn-info"><a href="{{ route('supplier.edit', $result )}}">edit</a></button>
                        <form action="{{ route('supplier.destroy',$result)}}" method='post'class=''>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                    <button class="btn btn-xs btn-danger" type="submit">Hapus</button>  
                    </form>
                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
                
		</div>
	</div>
	

</div>

{{ $results->render() }}
	
@else
   <div class="card-panel red darken-3 white-text">Oops.. Data <b>{{$query}}</b> Tidak Ditemukan</div>
@endif
	

@endsection