<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    
    public function create()
    {
        return view('menu.create');
    }

    
    public function store(Request $request)
{
    // ✅ Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
    ]);

    Menu::create([
        'nama' => $request->nama,
        'harga' => $request->harga,
    ]);

    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
}


    
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    
    public function update(Request $request, $id)
{
    // ✅ Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
    ]);

    $menu = Menu::findOrFail($id);
    $menu->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
    ]);

    return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui');
}

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }
}
