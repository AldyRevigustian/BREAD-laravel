@extends('seragam.layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <div>
            <h2>Edit Seragam</h2>
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

    <form action="{{ route('seragam.update', $seragam->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4 mt-3">
                <div class="form-group">
                    <strong>Name :</strong>
                    <input type="text" name="name" value="{{ $seragam->name }}" class="form-control"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <div class="form-floating">
                    <div class="form-group">
                        <strong>Ukuran :</strong>
                        <select class="form-select" id="floatingSelect" name="ukuran">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        <label for="floatingSelect">{{ 'Ukuran Awal : ' . $seragam->ukuran }}</label>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <div class="form-group">
                    <strong>Harga :</strong>
                    <input type="text" name="harga" class="form-control"  value="{{ $seragam->harga }}" placeholder="Harga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
