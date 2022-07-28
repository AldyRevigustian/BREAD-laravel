@extends('seragam.layout')


@section('content')
    <div class="d-flex flex-row justify-content-between">
        <div class="">
            <h2>Seragam</h2>
        </div>
        <div class="">
            <a class="btn btn-success" href="{{ route('seragam.create') }}">Add Seragam</a>
        </div>
    </div>
    <div class="col-3 my-3">
        <form action="/seragam" method="GET">
            <input type="search" name="search" class="form-control" id="formGroupExampleInput" placeholder="Search...">
        </form>
    </div>

    <div class="col-3 my-3">
        <form action="/seragam" method="GET">
            <div class="row">
                <div class="col">
                    <select class="form-select" aria-label="Default select example" name="filter">
                        <option>Select</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
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

    <table class="table table-bordered table-striped" id="myTable1">
        <tr>
            <th width="50px" style="text-align:center;">No</th>
            <form action="/seragam" method="GET">
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
            <th width="20px" style="text-align:center;">Ukuran</th>
            <th width="230px" style="text-align:center;">Harga</th>
            <th width="230px" style="text-align:center;">Action</th>
        </tr>
        @foreach ($seragam as $seragams)
            <tr>
                <td style="text-align:center;">{{ $loop->iteration }}</td>
                <td>{{ $seragams->name }}</td>
                <td style="text-align:center;">{{ $seragams->ukuran }}</td>
                <td>{{ 'Rp.' . ' ' . $seragams->harga }}</td>
                <td style="text-align:center;">
                    <form action="{{ route('seragam.destroy', $seragams->id) }}" method="POST">
                        {{-- <a class="btn btn-success" href="{{ route('seragam.show', $seragams->id) }}">Show</a> --}}
                        <a class="btn btn-primary" href="{{ route('seragam.edit', $seragams->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
