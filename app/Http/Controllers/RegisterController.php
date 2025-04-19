<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255|unique:users,name',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|string|max:20',
            'address'  => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama Wajib Diisikan',
            'email.required' => 'Alamat Email Wajib Diisikan',
            'phone.required' => 'No HP Wajib Diisikan',
            'address.required' => 'Alamat Wajib Diisikan',
            'password.required' => 'Password Wajib Diisikan',
            'password.min' => 'Kata sandi minimal harus terdiri dari 6 karakter.',
            'email.email' => 'Mohon Isikan Format Email dengan benar',
            'email.unique' => 'Email yang anda daftarkan sudah tersedia',
            'name.unique' => 'Nama yang anda daftarkan sudah tersedia',
        ]);

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator);
        } else {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'address'  => $request->address,
                'password' => Hash::make($request->password),
                'role_id'  => '1',
            ]);

            // Login user setelah registrasi
            Auth::login($user);
            
            return redirect('/')->with('success', 'Registrasi berhasil dan Anda telah login!');
        }
    }
}
