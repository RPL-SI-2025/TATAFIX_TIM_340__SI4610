@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <div class="position-relative d-inline-block">
                            <img 
                                src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('images/default-avatar.jpg') }}" 
                                class="rounded-circle border shadow-sm" 
                                width="100" 
                                height="100" 
                                alt="Profile Picture"
                            >
                        </div>
                        <h4 class="mt-3 mb-1">{{ $user->name }}</h4>
                        <small class="text-muted">{{ $user->email }}</small>
                    </div>

                    <div class="text-start px-3 px-md-5">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Nama Lengkap</label>
                            <div class="form-control-plaintext">{{ $user->name }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">No. Handphone</label>
                            <div class="form-control-plaintext">{{ $user->phone ?? '-' }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Email</label>
                            <div class="form-control-plaintext">{{ $user->email }}</div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-center gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary px-4">Edit Profil</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
