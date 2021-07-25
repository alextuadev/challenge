@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>New product</h2>
                <form action="{{ route('product.store') }} " method="post" class="row g-3">
                    @csrf
                    <div class="col-md-12 mb-2">
                        <label for="invoice" class="form-label">Invoice</label>
                        <select id="invoice" required class="form-select" name="invoice_id">
                            <option value="">Choose one</option>
                            @foreach ($invoices as $invoice)
                                <option value="{{ $invoice->id }} ">Invoice:#{{ $invoice->id }} </option>
                            @endforeach
                        </select>
                        @error('invoice_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input required name="quantity" type="number" class="form-control" id="quantity"
                            value="{{ old('quantity') }}">
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input required name="price" type="number" class="form-control" id="price"
                            value="{{ old('price') }}">
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">Product name</label>
                        <textarea required name="name" class="form-control" id="name"
                            rows="3">{{ old('name') }}</textarea>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
