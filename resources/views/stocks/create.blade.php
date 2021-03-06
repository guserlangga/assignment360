@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">
                    {{ isset($stock) ? 'Update Care Stock Info' : 'Create New Car Stock' }}
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ isset($stock) ? route('stock.update', $stock->id) : route('stock.store') }}" method="POST">
                        @csrf
                        @if(isset($stock))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Car Name</label>
                            <input type="text" name="name" placeholder="Input Car Name" class="form-control" value="{{ isset($stock) ? $stock->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Car Price</label>
                            <input type="number" min="9" step="any" name="price" placeholder="1000000000" class="form-control" value="{{ isset($stock) ? $stock->price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="stock">Quantity of Car</label>
                            <input type="number" min="1" name="stock" placeholder="100" class="form-control" value="{{ isset($stock) ? $stock->stock : '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($stock) ? 'Update Stock' : "Submit" }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection