<?php
namespace App\Http\Controllers;

use App\Models\DecisionMatrix;
use Illuminate\Http\Request;

class DecisionMatrixController extends Controller
{
    public function index()
    {
        $matrices = DecisionMatrix::all();
        return view('decision_matrices.index', compact('matrices'));
    }
    public function dashboard()
{
    $matrices = DecisionMatrix::all();
    return view('dashboard', compact('matrices'));
}


    public function create()
    {
        return view('decision_matrices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'alternative' => 'required',
            'harga' => 'required|numeric',
            'ketersediaan_pelayanan' => 'required|numeric',
            'fasilitas_ruang_tunggu' => 'required|numeric',
            'kualitas_pelayanan' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        DecisionMatrix::create($data);

        return redirect()->route('decision-matrices.index')
                         ->with('success', 'Decision Matrix created successfully.');
    }

    public function show(DecisionMatrix $decisionMatrix)
    {
        return view('decision_matrices.show', compact('decisionMatrix'));
    }

    public function edit(DecisionMatrix $decisionMatrix)
    {
        return view('decision_matrices.edit', compact('decisionMatrix'));
    }

    public function update(Request $request, DecisionMatrix $decisionMatrix)
    {
        $request->validate([
            'alternative' => 'required',
            'harga' => 'required|numeric',
            'ketersediaan_pelayanan' => 'required|numeric',
            'fasilitas_ruang_tunggu' => 'required|numeric',
            'kualitas_pelayanan' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($decisionMatrix->image) {
                \Storage::delete('public/images/' . $decisionMatrix->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $decisionMatrix->update($data);

        return redirect()->route('decision-matrices.index')
                         ->with('success', 'Decision Matrix updated successfully.');
    }

    public function destroy(DecisionMatrix $decisionMatrix)
    {
        // Delete the image
        if ($decisionMatrix->image) {
            \Storage::delete('public/images/' . $decisionMatrix->image);
        }

        $decisionMatrix->delete();

        return redirect()->route('decision-matrices.index')
                         ->with('success', 'Decision Matrix deleted successfully.');
    }
}
