<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageItemController extends Controller
{
    public function index()
    {
        $items = Item::where('user_id', Auth::id())
            ->orderBy('tanggal_input', 'desc')
            ->get();

        return view('checker.manageitem.index', compact('items'));

        return view('checker.manageitem.index', compact('items'));
    }

    public function create()
    {
        return view('checker.manageitem.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'kode_barang'   => 'required|string|max:100|unique:items,kode_barang',
            'tanggal_input' => 'required|date',
            'deadline_acc'  => 'required|date|after_or_equal:tanggal_input',
        ]);

        Item::create([
            'user_id'       => Auth::id(),
            'nama_barang'   => $request->nama_barang,
            'kode_barang'   => $request->kode_barang,
            'tanggal_input' => $request->tanggal_input,
            'deadline_acc'  => $request->deadline_acc,
            'tanggal_acc'   => null, // checker belum acc
        ]);

        return redirect()
            ->route('checker.manageitem.create')
            ->with('success', 'Item berhasil ditambahkan');
    }

    public function edit(Item $item)
    {
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        return view('checker.manageitem.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'kode_barang'   => 'required|string|max:100|unique:items,kode_barang,' . $item->id,
            'deadline_acc'  => 'required|date|after_or_equal:tanggal_input',
        ]);

        $item->update([
            'nama_barang'  => $request->nama_barang,
            'kode_barang'  => $request->kode_barang,
            'deadline_acc' => $request->deadline_acc,
        ]);

        return redirect()
            ->route('checker.manageitem.index')
            ->with('success', 'Item berhasil diperbarui');
    }

    public function destroy(Item $item)
    {
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();

        return redirect()
            ->route('checker.manageitem.index')
            ->with('success', 'Item berhasil dihapus');
    }
}
