<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('id_pendaftaran')->unique();
            
            // Foreign key ke users
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('nisn');
            $table->string('nik');
            $table->string('nama_siswa');
            $table->string('jenis_kelamin');
            $table->string('pas_foto')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();

            // Kontak
            $table->string('email')->nullable();
            $table->string('hp')->nullable();

            // Alamat lengkap
            $table->string('alamat')->nullable();

            // Foreign key ke provinsi
            // $table->unsignedBigInteger('provinsi_id')->nullable();
            // $table->foreign('provinsi_id')
            //     ->references('id')->on('provinsi')
            //     ->onUpdate('cascade')->onDelete('set null');

            
            // // Foreign key ke kabupaten
            // $table->unsignedBigInteger('kabupaten_id')->nullable();
            // $table->foreign('kabupaten_id')
            //     ->references('id')->on('kabupaten')
            //     ->onUpdate('cascade')->onDelete('set null');

            
            // // Foreign key ke kecamatan
            // $table->unsignedBigInteger('kecamatan_id')->nullable();
            // $table->foreign('kecamatan_id')
            //     ->references('id')->on('kecamatan')
            //     ->onUpdate('cascade')->onDelete('set null');
            
            // // Foreign key ke kelurahan
            // $table->unsignedBigInteger('kelurahan_id')->nullable();
            // $table->foreign('kelurahan_id')
            //     ->references('id')->on('kelurahan')
            //     ->onUpdate('cascade')->onDelete('set null');
            
            // Foreign key ke program_studi untuk pilihan 1
            $table->unsignedBigInteger('pil1')->nullable();
            $table->foreign('pil1')
                ->references('id')
                ->on('jurusan')
                ->onUpdate('cascade')->onDelete('set null');
            
            // Foreign key ke program_studi untuk pilihan 2
            $table->unsignedBigInteger('pil2')->nullable();
            $table->foreign('pil2')
                ->references('id')
                ->on('jurusan')
                ->onUpdate('cascade')->onDelete('set null');

            // Data orang tua
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('nohp_ayah')->nullable();
            $table->string('nohp_ibu')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('penghasilan_ibu')->nullable();

            $table->string('status_pendaftaran')->default('Belum Ditentukan');;
            $table->datetime('tgl_pendaftaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
