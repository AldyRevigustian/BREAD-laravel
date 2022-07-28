@extends('siswa.layout')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <div class="">
            <h2>Siswa</h2>
        </div>
        <div class="">
            <a class="btn btn-success" href="{{ route('siswa.create') }}">Add Siswa</a>
        </div>
    </div>
    <div class="col-3 my-3">
        <form action="/siswa" method="GET">
            <input type="search" name="search" class="form-control" id="formGroupExampleInput" placeholder="Search...">
            {{-- <select class="form-select" name="sort">
                <option value="ASC">ASC</option>
                <option value="DESC">DESC</option>
            </select> --}}
        </form>
    </div>

    <div class="col-3 my-3">
        <form action="/siswa" method="GET">
            <div class="row">
                <div class="col">
                    <select class="form-select" aria-label="Default select example" name="filter">
                        <option>Select</option>
                        <option value="XII RPL">XII RPL</option>
                        <option value="XI RPL">XI RPL</option>
                        <option value="X RPL">X RPL</option>
                    </select>
                </div>
                <div class="col">

                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped" id="myTable2">
        <tr>
            <th width="50px" style="text-align:center;">No</th>

            <form action="/siswa" method="GET">
                <th style="text-align:center;" class="name-hover">
                    Nama
                    <span>
                        <button name="sort" value="ASC">
                            <i class="fa-solid fa-caret-up"></i>
                        </button>
                    </span>
                    <span>
                        <button name="sort" value="DESC">
                            <i class="fa-solid fa-caret-down"></i>
                        </button>
                    </span>
                </th>
            </form>

            <th width="100px" style="text-align:center;">Kelas</th>
            <th width="250px" style="text-align:center;">Nis</th>
            <th width="230px" style="text-align:center;">Action</th>
        </tr>
        @foreach ($siswa as $siswas)
            <tr>
                <td style="text-align:center;">{{ ++$i }}</td>
                <td>{{ $siswas->name }}</td>
                <td style="text-align:center;">{{ $siswas->kelas }}</td>
                <td style="text-align:center;">{{ $siswas->nis }}</td>
                <td style="text-align:center;">
                    <form action="{{ route('siswa.destroy', $siswas->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('siswa.edit', $siswas->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
