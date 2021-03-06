@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">
                    {{ isset($sale) ? 'Update Care Sale Info' : 'Create New Car Sale' }}
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
                    <form action="{{ isset($sale) ? route('sale.update', $sale->id) : route('sale.store') }}" method="POST">
                        @csrf
                        @if(isset($sale))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="name">Buyer Name</label>
                            <input type="text" name="name" placeholder="Input Buyer Name" class="form-control" value="{{ isset($sale) ? $sale->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Buyer Email" class="form-control" value="{{ isset($sale) ? $sale->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" min="1" name="phone" placeholder="08112345678" class="form-control" value="{{ isset($sale) ? $sale->phone : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="car_name">Car</label>
                            <select name="car_name" id="car_name" class="form-control">
                                @foreach ($stock as $item)
                                    <option value="{{$item->name}}"> {{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($sale) ? 'Update sale' : "Submit" }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection