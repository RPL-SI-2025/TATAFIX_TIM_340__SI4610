@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <div class="text-center">
                                <i class="bi bi-check-circle-fill text-success fs-1"></i>
                                <p class="mt-2">Perubahan ini telah mengupdate profil Anda. Apakah sudah sesuai?</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('profile.show') }}" class="btn btn-primary">Ya, Sesuai</a>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">Tidak, Batalkan</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <h5 class="mb-4">Informasi Akun</h5>
                        
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            <div class="text-center mb-4">
                                <div class="position-relative d-inline-block">
                                    <img 
                                        src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('images/default-avatar.jpg') }}" 
                                        class="rounded-circle border" 
                                        width="100" 
                                        height="100" 
                                        alt="Profile Image"
                                    >
                                    <label for="profile_image" class="btn btn-primary btn-sm position-absolute bottom-0 end-0">
                                        <i class="bi bi-pencil"></i>
                                    </label>
                                    <input type="file" id="profile_image" name="profile_image" class="d-none">
                                </div>
                                <h4 class="mt-3">{{ $user->name }}</h4>
                                <p class="text-muted small">{{ $user->email }}</p>
                            </div>
                            
                            <div class="mb-3">
                                <label for="name" class="form-label text-muted">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label text-muted">No. Handphone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label text-muted">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary px-4">Batalkan</a>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <div class="bg-primary text-white p-4 rounded">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Akses Cepat</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                            <li><a href="{{ route('services.index') }}" class="text-white">Booking</a></li>
                            <li><a href="#" class="text-white">Jadwal</a></li>
                            <li><a href="#" class="text-white">Chat</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6>Dukungan</h6>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Pusat bantuan</a></li>
                            <li><a href="#" class="text-white">Syarat dan ketentuan</a></li>
                            <li><a href="#" class="text-white">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6>Media Sosial</h6>
                        <div class="d-flex gap-2">
                            <a href="#" class="text-white bg-light bg-opacity-25 rounded-circle p-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-white bg-light bg-opacity-25 rounded-circle p-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-white bg-light bg-opacity-25 rounded-circle p-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-white bg-light bg-opacity-25 rounded-circle p-2"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <small>Copyright © 2023 TataFix All Right Reserved</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection