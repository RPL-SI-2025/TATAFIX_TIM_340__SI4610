<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Tukang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-xl font-bold mb-6 text-center">Edit Profil Tukang</h2>

        <div class="flex justify-center mb-6">
            <div class="relative w-32 h-32">
            <img src="{{ asset($tukang->photo ?? 'https://i.pravatar.cc/150') }}" class="w-32 h-32 rounded-full object-cover">

            </div>
        </div>

        <form method="POST" action="{{ route('tukang.update', $tukang->user_id) }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-1">Nama</label>
                <input type="text" name="name" value="{{ $tukang->name }}" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Domisili</label>
                <input type="text" name="domicile" value="{{ $tukang->address }}" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">No. HP</label>
                <input type="text" name="phone" value="{{ $tukang->phone }}" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ $tukang->email }}" class="w-full border rounded-lg p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Ganti Foto</label>
                <input type="file" name="photo" class="w-full border rounded-lg p-2">
            </div>

            <div class="flex justify-end space-x-2 pt-4">
                <a href="{{ route('tukang.index') }}" class="px-4 py-2 rounded-lg bg-gray-300 text-sm">Batal</a>
                <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>