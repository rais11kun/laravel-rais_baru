<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$data['password'] = Hash::make($request->password);
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
        'name' => 'required|string|max:100', // Menggantikan 'name'
        'email'      => 'required|email|unique:users,email',
        // 'required' hanya saat create, otomatis berlaku di store()
        'password'   => 'required|min:8|confirmed',
    ]);

        $data = [
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
    ];
        User::create($data);

        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataUser'] = User::findOrFail($id);
        return view('admin.User.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:100',
        'email'    => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8|confirmed',
    ]);

    $updateData = [
        'name'  => $request->name,
        'email' => $request->email,
    ];

    if ($request->filled('password')) {
        $updateData['password'] = Hash::make($request->password);
    }

    $user->update($updateData);

    return redirect()->route('user.index')->with('success', 'Perubahan data user berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
