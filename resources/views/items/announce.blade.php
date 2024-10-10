<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-8">Pengumuman Siswa</h2>

        <!-- Student Details -->
        <div class="bg-white dark:bg-gray-800 p-8 shadow-lg rounded-lg">
            <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Informasi Siswa</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                <div class="text-center col-span-1">
                    <strong class="block text-gray-600 dark:text-gray-400 mb-2">Foto:</strong>
                    @if($item->pas_foto)
                        <img src="{{ Storage::url($item->pas_foto) }}" alt="Foto" class="w-32 h-32 object-cover rounded-full mx-auto transition-transform duration-300 hover:scale-110">
                    @else
                        <span class="block mt-2 text-gray-600 dark:text-gray-400">N/A</span>
                    @endif
                </div>
                <div class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
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
                </div>
            </div>
        </div>

        <!-- Parent Details -->
        <div class="bg-white dark:bg-gray-800 p-8 shadow-lg rounded-lg mt-10">
            <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Data Orang Tua</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <div class="mt-2">
                        <div class="flex justify-between mb-4">
                            <strong>Nama Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nama_ayah }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>Pekerjaan Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pekerjaan_ayah }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>Pendidikan Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pendidikan_ayah }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>Penghasilan Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->penghasilan_ayah }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>No HP Ayah:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nohp_ayah }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <div class="mt-2">
                        <div class="flex justify-between mb-4">
                            <strong>Nama Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nama_ibu }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>Pekerjaan Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pekerjaan_ibu }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>Pendidikan Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->pendidikan_ibu }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>Penghasilan Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->penghasilan_ibu }}</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <strong>No HP Ibu:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->nohp_ibu }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Program Studi Pilihan -->
        <div class="bg-white dark:bg-gray-800 p-8 shadow-lg rounded-lg mt-10">
            <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Program Studi Pilihan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <div class="mt-2">
                        <div class="flex justify-between mb-4">
                            <strong>Program Studi Pilihan 1:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->jurusanPil1 ? $item->jurusanPil1->nama_prodi : 'N/A' }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <div class="mt-2">
                        <div class="flex justify-between mb-4">
                            <strong>Program Studi Pilihan 2:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $item->jurusanPil2 ? $item->jurusanPil2->nama_prodi : 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graduation Result -->
        <div class="bg-white dark:bg-gray-800 p-8 shadow-lg rounded-lg mt-10">
            <h3 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Hasil Kelulusan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                <div class="mt-2">
                    <strong>
                        @if($item->status_pendaftaran === 'Lulus')
                            <span class="text-green-600 text-xl">{{ $item->status_pendaftaran }}</span>
                        @elseif($item->status_pendaftaran === 'Belum Ditentukan')
                            <span class="text-yellow-600 text-xl">Status pendaftaran masih belum ditentukan</span>
                        @else
                            <span class="text-red-600 text-xl">{{ $item->status_pendaftaran }}</span>
                        @endif
                    </strong>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>