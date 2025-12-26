<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Carbon\Carbon;

class ItemApprovalController extends Controller
{
    public function index()
    {
        // hanya item yang belum di-ACC
        $items = Item::whereNull('tanggal_acc')
            ->orderBy('tanggal_input', 'asc')
            ->get();

        return view('pic.item.index', compact('items'));
    }

    public function approve(Item $item)
    {
        // Proteksi tambahan
        if ($item->tanggal_acc !== null) {
            abort(400, 'Item sudah di-ACC');
        }

        $item->update([
            'tanggal_acc' => now(),
        ]);

        return redirect()
            ->route('pic.item.index')
            ->with('success', 'Item berhasil di-ACC');
    }
}
