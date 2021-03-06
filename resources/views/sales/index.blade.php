@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4 offset-md-8 py-3">
                    <a href="{{ route('sale.create') }}" class="btn btn-primary float-right">Add Sale</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Sales Data</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Buyer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Car Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->name }}</td>
                                <td>{{ $sale->email }}</td>
                                <td>{{ $sale->phone }}</td>
                                <td>{{ $sale->car_name }}</td>
                                <td>
                                    <form action="{{ route('sale.destroy', $sale->id) }}" method="POST" id="delete_sale{{ $sale->id }}">
                                    <a href="javascript:$('#delete_sale{{ $sale->id }}').submit();" onclick="return confirm('Are you sure want to delete {{ $sale->name }} sale data?');" class="btn btn-sm btn-danger">Delete</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" hidden>Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection