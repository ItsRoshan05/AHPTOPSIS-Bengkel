@extends('layouts.app')

@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <h1>Decision Matrices</h1>
    <a href="{{ route('decision-matrices.create') }}" class="btn btn-primary mb-3">Create New Matrix</a>
    <table id="decisionTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Alternative</th>
                <th>Harga</th>
                <th>Pelayanan</th>
                <th>Fasilitas</th>
                <th>Kualitas</th>
                <th>Image</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matrices as $matrix)
                <tr>
                    <td>{{ $matrix->alternative }}</td>
                    <td>{{ $matrix->harga }}</td>
                    <td>{{ $matrix->ketersediaan_pelayanan }}</td>
                    <td>{{ $matrix->fasilitas_ruang_tunggu }}</td>
                    <td>{{ $matrix->kualitas_pelayanan }}</td>
                    <td>
                        @if ($matrix->image)
                            <img src="{{ asset('storage/images/' . $matrix->image) }}" alt="Image" style="max-width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $matrix->address }}</td>
                    <td>
                        <a href="{{ route('decision-matrices.edit', $matrix->id) }}" class="btn btn-sm btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('decision-matrices.destroy', $matrix->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#decisionTable').DataTable();
        });
    </script>
@endsection
