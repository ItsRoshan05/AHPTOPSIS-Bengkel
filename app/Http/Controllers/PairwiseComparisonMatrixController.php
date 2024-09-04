<?php
namespace App\Http\Controllers;

use App\Models\PairwiseComparisonMatrix;
use Illuminate\Http\Request;

class PairwiseComparisonMatrixController extends Controller
{
    public function index()
    {
        $matrices = PairwiseComparisonMatrix::all();
        return view('pairwise_comparison_matrices.index', compact('matrices'));
    }

    public function create()
    {
        return view('pairwise_comparison_matrices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'criteria_1' => 'required',
            'criteria_2' => 'required',
            'value' => 'required|numeric',
        ]);

        PairwiseComparisonMatrix::create($request->all());

        return redirect()->route('pairwise-comparison-matrices.index')
                         ->with('success', 'Pairwise Comparison Matrix created successfully.');
    }

    public function show(PairwiseComparisonMatrix $pairwiseComparisonMatrix)
    {
        return view('pairwise_comparison_matrices.show', compact('pairwiseComparisonMatrix'));
    }

    public function edit(PairwiseComparisonMatrix $pairwiseComparisonMatrix)
    {
        return view('pairwise_comparison_matrices.edit', compact('pairwiseComparisonMatrix'));
    }

    public function update(Request $request, PairwiseComparisonMatrix $pairwiseComparisonMatrix)
    {
        $request->validate([
            'criteria_1' => 'required',
            'criteria_2' => 'required',
            'value' => 'required|numeric',
        ]);

        $pairwiseComparisonMatrix->update($request->all());

        return redirect()->route('pairwise-comparison-matrices.index')
                         ->with('success', 'Pairwise Comparison Matrix updated successfully.');
    }

    public function destroy(PairwiseComparisonMatrix $pairwiseComparisonMatrix)
    {
        $pairwiseComparisonMatrix->delete();

        return redirect()->route('pairwise-comparison-matrices.index')
                         ->with('success', 'Pairwise Comparison Matrix deleted successfully.');
    }
}
