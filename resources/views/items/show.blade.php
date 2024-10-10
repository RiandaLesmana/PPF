<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200 mb-5">Detail Siswa</h2>

        <!-- Back Button -->
        <a href="{{ route('items.index') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Kembali</a>

        <!-- Student Details -->
        <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg">
            <h3 class="text-xl font-semibold mb-4  text-gray-800 dark:text-gray-200">Informasi Siswa</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow ">              
                <div class="text-gray-600 dark:text-gray-400"><strong>Foto:</strong> @if($item->pas_foto)
                                <img src="{{ Storage::url($item->pas_foto) }}" alt="Foto" class="w-16 h-16 object-cover rounded-full">
                            @else
                                N/A
                            @endif
                </div>
                <div class="text-gray-600 dark:text-gray-400"><strong>ID Pendaftaran:</strong> {{ $item->id_pendaftaran }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>NISN:</strong> {{ $item->nisn }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>NIK:</strong> {{ $item->nik }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Nama Siswa:</strong> {{ $item->nama_siswa }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Tempat Lahir:</strong> {{ $item->tempat_lahir }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Tanggal Lahir:</strong> {{ $item->tanggal_lahir }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Agama:</strong> {{ $item->agama }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Email:</strong> {{ $item->email }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>No HP:</strong> {{ $item->hp }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Alamat:</strong> {{ $item->alamat }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Nilai:</strong> {{ $item->nilai }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Program Studi Pilihan 1:</strong> {{ $item->jurusanPil1 ? $item->jurusanPil1->nama_prodi : 'N/A' }}</div>
                <div class="text-gray-600 dark:text-gray-400"><strong>Program Studi Pilihan 2:</strong> {{ $item->jurusanPil2 ? $item->jurusanPil2->nama_prodi : 'N/A' }}</div>
            </div>
        </div>

        <!-- Parent Details -->
        <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-lg mt-8">
        <h3 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Data Orang Tua</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow">
                <div class="mt-2">
                    <div class="flex justify-between mb-2">
                        <strong>Nama Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nama_ayah }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>Pekerjaan Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pekerjaan_ayah }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>Pendidikan Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pendidikan_ayah }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>Penghasilan Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->penghasilan_ayah }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>No HP Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nohp_ayah }}</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow">
                <div class="mt-2">
                    <div class="flex justify-between mb-2">
                        <strong>Nama Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nama_ibu }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>Pekerjaan Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pekerjaan_ibu }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>Pendidikan Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pendidikan_ibu }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>Penghasilan Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->penghasilan_ibu }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <strong>No HP Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nohp_ibu }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
