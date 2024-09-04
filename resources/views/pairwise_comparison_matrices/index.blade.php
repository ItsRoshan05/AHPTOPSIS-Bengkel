@extends('layouts.app')

@section('css')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <h1>Pairwise Comparison Matrices</h1>
    <a href="{{ route('pairwise-comparison-matrices.create') }}" class="btn btn-primary mb-3">Create New Matrix</a>
    <table id="pairwiseTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Criteria 1</th>
                <th>Criteria 2</th>
                <th>Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matrices as $matrix)
                <tr>
                    <td>{{ $matrix->criteria_1 }}</td>
                    <td>{{ $matrix->criteria_2 }}</td>
                    <td>{{ $matrix->value }}</td>
                    <td>
                        <a href="{{ route('pairwise-comparison-matrices.edit', $matrix->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pairwise-comparison-matrices.destroy', $matrix->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
            $('#pairwiseTable').DataTable();
        });
    </script>
@endsection
