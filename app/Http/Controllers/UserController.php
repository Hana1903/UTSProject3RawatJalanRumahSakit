<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', ['users' => $users]);
    }

    /**
     * Menampilkan formulir untuk menambahkan pengguna baru.
     */
    public function create()
    {
        return view('backend.users.create');
    }

/**
 * Menyimpan pengguna baru ke database.
 */
public function store(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required|unique:users', // Pastikan username diisi
        'email' => 'required|email',
        'nama_lengkap' => 'required',
        'tanggal_registrasi' => 'required|date',
        'nomor_telepon' => 'required|string|max:16',
        'password' => 'required|string|min:8',
        // 'hak_akses' => 'required',
    ]);

    $validatedData['password'] = Hash::make($request->password);

    User::create($validatedData);

    return redirect()->route('user.index')->with('pesan', 'Data Berhasil di Simpan');
}


    /**
     * Menampilkan detail pengguna.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.show', ['user' => $user]);
    }

    /**
     * Menampilkan formulir untuk mengedit pengguna.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit', ['user' => $user]);
    }

    /**
     * Memperbarui pengguna dalam database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:20|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'nama_lengkap' => 'required|string|max:30',
            'tanggal_registrasi' => 'required|date',
            'nomor_telepon' => 'required|string|max:16',
            'password' => 'nullable|string|min:8',
        ]);

        // Update pengguna dalam database
        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->tanggal_registrasi = $request->input('tanggal_registrasi');
        $user->nomor_telepon = $request->input('nomor_telepon');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->route('backend.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Menghapus pengguna dari database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('backend.users.index')->with('success', 'User deleted successfully.');
    }
}
