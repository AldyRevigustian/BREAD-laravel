@extends('siswa.layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <div>
            <h2>Edit Siswa</h2>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('siswa.index') }}"> Back</a>
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

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4 mt-3">
                <div class="form-group">
                    <strong>Name :</strong>
                    <input type="text" name="name" value="{{ $siswa->name }}" class="form-control"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <div class="form-floating">
                    <div class="form-group">
                        <strong>Kelas :</strong>
                        <select class="form-select" id="floatingSelect" name="kelas">
                            <option value="XII RPL">XII RPL</option>
                            <option value="XI RPL">XI RPL</option>
                            <option value="X RPL">X RPL</option>
                        </select>
                        <label for="floatingSelect">{{ 'Kelas Awal : ' . $siswa->kelas }}</label>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mb-4">
                <div class="form-group">
                    <strong>NIS :</strong>
                    <input type="text" name="nis" class="form-control"  value="{{ $siswa->nis }}" placeholder="NIS">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
