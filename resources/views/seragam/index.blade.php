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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped" id="myTable1">
        <tr>
            <th width="50px" style="text-align:center;">No</th>
            <th style="text-align:center;">Nama</th>
            <th width="20px" style="text-align:center;">Ukuran</th>
            <th width="230px" style="text-align:center;">Harga</th>
            <th width="230px" style="text-align:center;">Action</th>
        </tr>
        @foreach ($seragam as $seragams)
            <tr>
                <td style="text-align:center;">{{ ++$i }}</td>
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

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable1");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Check if the two rows should switch place,
                based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount++;
            } else {
                /* If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
