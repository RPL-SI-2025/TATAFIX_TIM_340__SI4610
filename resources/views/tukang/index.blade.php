<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Tukang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-7xl mx-auto">
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-2xl font-bold mb-6">Master Data Tukang</h2>

            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-100 text-left text-gray-700">
                    <tr>
                        <th class="p-3">Foto</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Domisili</th>
                        <th class="p-3">No. HP</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($tukangs as $tukang)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3">
                            <!-- Menampilkan foto tukang, jika tidak ada menggunakan foto default -->
                            <img src="{{ asset($tukang->photo ?? 'https://i.pravatar.cc/150') }}" class="w-32 h-32 rounded-full object-cover">
                        </td>
                        <td class="p-3">{{ $tukang->name }}</td>
                        <td class="p-3">{{ $tukang->address }}</td>
                        <td class="p-3">{{ $tukang->phone }}</td>
                        <td class="p-3">{{ $tukang->email }}</td>
                        <td class="p-3">
                            <a href="{{ route('tukang.edit', $tukang->user_id) }}" class="text-blue-600 hover:underline">✏️</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                {{ $tukangs->links() }}
            </div>
        </div>
    </div>

</body>
</html>
