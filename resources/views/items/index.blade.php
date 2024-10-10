<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if(Auth::check() && Auth::user()->roles == 'admin') 
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-5">Daftar Siswa Pendaftar</h2>
        @endif 
        @if(Auth::check() && Auth::user()->roles == 'member')  
            <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-5">Selamat Datang Calon Siswa</h2>
        @endif 

        <!-- Success Message -->
        @if ($message = Session::get('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        <!-- Add New Student Button (Admin Only) -->
        @if(Auth::check() && Auth::user()->roles == 'member')  
            <div class="mb-6 flex justify-end">
                <a href="{{ route('items.create') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-lg shadow-md">Daftar</a>
            </div>
        @endif 

        <!-- Table -->
        @if(Auth::check() && Auth::user()->roles == 'admin') 
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-md sm:rounded-lg">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID Pendaftaran</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Foto Siswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama Siswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">NISN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">NIK</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Program Studi Pilihan 1</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Program Studi Pilihan 2</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($items as $item)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->id_pendaftaran }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->pas_foto)
                                <img src="{{ Storage::url($item->pas_foto) }}" alt="Foto" class="w-16 h-16 object-cover rounded-full">
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->nama_siswa }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->nisn }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->nik }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->jurusanPil1 ? $item->jurusanPil1->nama_prodi : 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->jurusanPil2 ? $item->jurusanPil2->nama_prodi : 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('items.show', $item->id) }}" class="text-blue-500 hover:text-blue-700">Show</a>
                            @if(Auth::check() && Auth::user()->roles == 'admin')    
                                <a href="{{ route('items.edit', $item->id) }}" class="ml-2 text-yellow-500 hover:text-yellow-700">Edit</a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline ml-2" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            @endif    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif 
    </div>
</x-app-layout>