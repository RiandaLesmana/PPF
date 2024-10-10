<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200 mb-5">Tambah Siswa Baru</h2>

        <!-- Back Button -->
        <a href="{{ route('items.index') }}" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Kembali</a>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-600 rounded-lg">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Student Data Section -->
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200 mb-4">Data Siswa</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- NISN -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">NISN</label>
                    <input type="text" name="nisn" value="{{ old('nisn') }}" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- NIK -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">NIK</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Nama Siswa -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Nama Siswa</label>
                    <input type="text" name="nama_siswa" value="{{ old('nama_siswa') }}" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Upload Foto -->
                <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Foto:</label>
                <input type="file" name="pas_foto" accept="image/*" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <button type="button" onclick="openCamera()" class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">Buka Kamera</button>
                <video id="video" width="320" height="240" autoplay class="mt-2 hidden"></video>
                <button type="button" onclick="takePhoto()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 hidden" id="takePhotoButton">Ambil Foto</button>
                <canvas id="canvas" width="320" height="240" class="mt-2 hidden"></canvas>
                <input type="hidden" name="camera_image" id="camera_image">
                </div>

                <!-- Tempat Lahir -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Agama -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Agama</label>
                    <select name="agama" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                        <option value="">-- Pilih --</option>
                        <option value="Katholik" {{ old('agama') == 'Katholik' ? 'selected' : '' }}>Katholik</option>
                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ old('agama') == 'buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Khonghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- No HP -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">No HP</label>
                    <input type="text" name="hp" value="{{ old('hp') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Alamat -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Nilai -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Nilai</label>
                    <input type="number" name="nilai" value="{{ old('nilai') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Program Studi Pilihan 1 -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Program Studi Pilihan 1</label>
                    <select name="pil1" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach ($jurusan as $jur)
                            <option value="{{ $jur->id }}" {{ old('pil1') == $jur->id ? 'selected' : '' }}>{{ $jur->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Program Studi Pilihan 2 -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Program Studi Pilihan 2</label>
                    <select name="pil2" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach ($jurusan as $jur)
                            <option value="{{ $jur->id }}" {{ old('pil2') == $jur->id ? 'selected' : '' }}>{{ $jur->nama_prodi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Parent Data Section -->
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-200 mt-8">Data Orang Tua</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Nama Ayah -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Nama Ayah</label>
                    <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Nama Ibu -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Nama Ibu</label>
                    <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Pekerjaan Ayah -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Pekerjaan Ibu -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Pendidikan Ayah -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Pendidikan Ayah</label>
                    <input type="text" name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Pendidikan Ibu -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Pendidikan Ibu</label>
                    <input type="text" name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Penghasilan Ayah -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Penghasilan Ayah</label>
                    <input type="text" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Penghasilan Ibu -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Penghasilan Ibu</label>
                    <input type="text" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- No HP Ayah -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">No HP Ayah</label>
                    <input type="text" name="nohp_ayah" value="{{ old('nohp_ayah') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- No HP Ibu -->
                <div>
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">No HP Ibu</label>
                    <input type="text" name="nohp_ibu" value="{{ old('nohp_ibu') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <!-- Alamat Orang Tua
                <div class="md:col-span-2">
                    <label class="block font-semibold text-gray-700 dark:text-gray-300">Alamat Orang Tua</label>
                    <input type="text" name="alamat_orang_tua" value="{{ old('alamat_orang_tua') }}" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                </div> -->
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700" onsubmit="return confirmUpdate()">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
