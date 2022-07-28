@extends('seragam.layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <div>
            <h2>Add New Seragam</h2>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('seragam.index') }}"> Back</a>
        </div>

    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('seragam.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4 mt-3">
                <div class="form-group">
                    <strong>Name :</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <div class="form-group">
                    <strong>Ukuran :</strong>
                    <select class="form-select" id="floatingSelect" name="ukuran">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <div class="form-group">
                    <strong>Harga :</strong>
                    <input type="number" name="harga" class="form-control" placeholder="Harga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
