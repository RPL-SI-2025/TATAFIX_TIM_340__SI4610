<?php

// app/Http/Controllers/TukangController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TukangController extends Controller
{
    public function index()
    {
        // Ambil user dengan role "tukang"
        $tukangs = User::whereHas('role', function ($query) {
            $query->where('role_name', 'tukang');
        })->paginate(10);

        return view('tukang.index', compact('tukangs'));
    }

    public function edit($id)
    {
        // Gunakan user_id sebagai primary key
        $tukang = User::findOrFail($id);
        return view('tukang.edit', compact('tukang'));
    }

    public function update(Request $request, $id)
    {
        // Gunakan user_id sebagai primary key
        $tukang = User::findOrFail($id);

        $request->validate([
            'name'      => 'required|string|max:200',
            'email'     => 'required|email|unique:users,email,' . $id . ',user_id',
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string',
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $tukang->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'   => $request->address,
        ]);

        if ($request->hasFile('photo')) {
            // Hapus file lama jika ada
            if ($tukang->photo && str_contains($tukang->photo, 'storage/')) {
                $oldPath = str_replace('storage/', 'public/', $tukang->photo);
                if (file_exists(public_path($oldPath))) {
                    unlink(public_path($oldPath));
                }
            }

            $path = $request->file('photo')->store('photos', 'public'); // Secara eksplisit gunakan disk 'public'
            $tukang->photo = 'storage/' . $path; // Simpan path relatif terhadap 'storage/'
            $tukang->save();
        }

        return redirect()->route('tukang.index')->with('success', 'Data tukang berhasil diperbarui.');
    }
}