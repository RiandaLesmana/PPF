<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Siswa</h2>
        <a href="{{ route('items.index') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Kembali</a>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-white-700">Foto:</label>
                    @if($item->pas_foto)
                        <div class="mb-2">
                            <img src="{{ Storage::url($item->pas_foto) }}" alt="Foto" class="w-32 h-32 object-cover rounded-md">
                        </div>
                    @endif
                    <input type="file" name="pas_foto" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">ID Pendaftaran:</label>
                    <input type="text" name="id_pendaftaran" value="{{ $item->id_pendaftaran }}" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">NISN:</label>
                    <input type="text" name="nisn" value="{{ $item->nisn }}" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">NIK:</label>
                    <input type="text" name="nik" value="{{ $item->nik }}" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Nama Siswa:</label>
                    <input type="text" name="nama_siswa" value="{{ $item->nama_siswa }}" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir" value="{{ $item->tempat_lahir }}" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ $item->tanggal_lahir }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Agama:</label>
                    <select name="agama" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        <option value="">-- Pilih --</option>
                        <option value="Katholik" {{ $item->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                        <option value="Kristen" {{ $item->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Islam" {{ $item->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Hindu" {{ $item->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ $item->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ $item->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Email:</label>
                    <input type="email" name="email" value="{{ $item->email }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">No HP:</label>
                    <input type="text" name="hp" value="{{ $item->hp }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Alamat:</label>
                    <input type="text" name="alamat" value="{{ $item->alamat }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Nilai:</label>
                    <input type="number" name="nilai" value="{{ $item->nilai }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Program Studi Pilihan 1:</label>
                    <select name="pil1" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach ($jurusan as $jur)
                            <option value="{{ $jur->id }}" {{ $item->pil1 == $jur->id ? 'selected' : '' }}>{{ $jur->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Program Studi Pilihan 2:</label>
                    <select name="pil2" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach ($jurusan as $jur)
                            <option value="{{ $jur->id }}" {{ $item->pil2 == $jur->id ? 'selected' : '' }}>{{ $jur->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <h3 class="text-lg font-semibold mt-6">Data Orang Tua</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium text-white-700">Nama Ayah:</label>
                    <input type="text" name="nama_ayah" value="{{ $item->nama_ayah }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Pekerjaan Ayah:</label>
                    <input type="text" name="pekerjaan_ayah" value="{{ $item->pekerjaan_ayah }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Pendidikan Ayah:</label>
                    <input type="text" name="pendidikan_ayah" value="{{ $item->pendidikan_ayah }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Nama Ibu:</label>
                    <input type="text" name="nama_ibu" value="{{ $item->nama_ibu }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Pekerjaan Ibu:</label>
                    <input type="text" name="pekerjaan_ibu" value="{{ $item->pekerjaan_ibu }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Pendidikan Ibu:</label>
                    <input type="text" name="pendidikan_ibu" value="{{ $item->pendidikan_ibu }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">No HP Ayah:</label>
                    <input type="text" name="nohp_ayah" value="{{ $item->nohp_ayah }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">No HP Ibu:</label>
                    <input type="text" name="nohp_ibu" value="{{ $item->nohp_ibu }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Penghasilan Ayah:</label>
                    <input type="text" name="penghasilan_ayah" value="{{ $item->penghasilan_ayah }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label class="block text-sm font-medium text-white-700">Penghasilan Ibu:</label>
                    <input type="text" name="penghasilan_ibu" value="{{ $item->penghasilan_ibu }}" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
            </div>

            <h3 class="text-lg font-semibold mt-6">Seleksi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status:</label>
                    <select name="status_pendaftaran" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                        @php
                            $nilai = $item->nilai;
                            $prodiPil1 = $item->jurusanPil1 ? $item->jurusanPil1->nama_prodi : null;
                            $prodiPil2 = $item->jurusanPil2 ? $item->jurusanPil2->nama_prodi : null;

                            $nilaiLulusPil1 = [
                                'TEKNIK KOMPUTER' => 100,
                                'MANAJEMEN INFORMASI' => 95,
                                'TEKNOLOGI REKAYASA PERANGKAT LUNAK' => 90,
                                'TEKNOLOGI REKAYASA MULTIMEDIA GRAFIS' => 90,
                            ];

                            $nilaiLulusPil2 = [
                                'TEKNIK KOMPUTER' => 90,
                                'MANAJEMEN INFORMASI' => 85,
                                'TEKNOLOGI REKAYASA PERANGKAT LUNAK' => 80,
                                'TEKNOLOGI REKAYASA MULTIMEDIA GRAFIS' => 80,
                            ];

                            $statusOptions = ['Belum Ditentukan'];

                            if ($prodiPil1 && $nilai >= $nilaiLulusPil1[$prodiPil1]) {
                                $statusOptions[] = 'Lulus di Pilihan 1';
                            } elseif ($prodiPil2 && $nilai >= $nilaiLulusPil2[$prodiPil2]) {
                                $statusOptions[] = 'Lulus di Pilihan 2';
                            } else {
                                $statusOptions[] = 'Tidak Lulus';
                            }
                        @endphp

                        @foreach($statusOptions as $status)
                            <option value="{{ $status }}" {{ $item->status_pendaftaran === $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
