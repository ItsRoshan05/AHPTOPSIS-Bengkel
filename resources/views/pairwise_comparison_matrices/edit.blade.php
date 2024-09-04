@extends('layouts.app')

@section('content')
    <h1>Edit Pairwise Comparison Matrix</h1>

    <form action="{{ route('pairwise-comparison-matrices.update', $pairwiseComparisonMatrix->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="criteria_1">Criteria 1</label>
            <input type="text" name="criteria_1" id="criteria_1" class="form-control" value="{{ old('criteria_1', $pairwiseComparisonMatrix->criteria_1) }}" required>
        </div>

        <div class="form-group">
            <label for="criteria_2">Criteria 2</label>
            <input type="text" name="criteria_2" id="criteria_2" class="form-control" value="{{ old('criteria_2', $pairwiseComparisonMatrix->criteria_2) }}" required>
        </div>

        <div class="form-group">
            <label for="value">Value</label>
            <input type="number" name="value" id="value" class="form-control" value="{{ old('value', $pairwiseComparisonMatrix->value) }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update Matrix</button>
        <a href="{{ route('pairwise-comparison-matrices.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
