<?php

namespace App\Http\Controllers;

use App\Models\Rfc;
use Illuminate\Http\Request;

class RfcController extends Controller
{
    public function index()
    {
        $rfcs = Rfc::all(); // Retrieve all RFCs
        return view('rfc.index', [
            "title" => "RFC Uploads",
            "rfc" => $rfcs,
        ], compact('rfcs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        Rfc::create([
            'judul' => $request->input('judul'),
            'text' => $request->input('text'),
            'status' => 'draft',
        ]);

        return redirect()->route('rfc')->with('sukses', 'RFC uploaded successfully');
    }

    public function edit(Rfc $rfc)
    {
        return view('rfc.edit', [
            "title" => "Edit RFC"
        ], compact('rfc'));
    }

    public function update(Request $request, Rfc $rfc)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $rfc->update([
            'text' => $request->input('text'),
        ]);

        return redirect()->route('rfc')->with('sukses', 'RFC updated successfully');
    }


    public function publish($id)
    {
        $rfc = Rfc::find($id);

        if (!$rfc) {
            return redirect()->route('rfc')->with('error', 'RFC not found.');
        }

        if ($rfc->status === 'publish') {
            return redirect()->route('rfc')->with('error', 'RFC is already published.');
        }

        $rfc->status = 'publish';
        $rfc->save();

        return redirect()->route('rfc')->with('success', 'RFC has been published.');
    }

    public function destroy($id)
    {
        $rfc = Rfc::find($id);

        if (!$rfc) {
            return redirect()->route('rfc')->with('error', 'RFC not found.');
        }

        $rfc->delete();

        return redirect()->route('rfc')->with('sukses', 'RFC deleted successfully.');
    }
}
