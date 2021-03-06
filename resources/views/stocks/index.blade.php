@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4 offset-md-8 py-3">
                    <a href="{{ route('stock.create') }}" class="btn btn-primary float-right">Add Car</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Stock</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Car Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->name }}</td>
                                <td>IDR {{ number_format($car->price, 2) }}</td>
                                <td>{{ $car->stock }}</td>
                                <td>
                                    <form action="{{ route('stock.destroy', $car->id) }}" method="POST" id="delete_stock{{ $car->id }}">
                                    <a href="{{ route('stock.edit', $car->id) }}" class="btn btn-sm btn-warning">Edit</a> |
                                    <a href="javascript:$('#delete_stock{{ $car->id }}').submit();" onclick="return confirm('Are you sure want to delete {{ $car->name }} stock data?');" class="btn btn-sm btn-danger">Delete</a>
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