<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            $table->enum('kelas', ['PG', 'TK A', 'TK B'])->nullable();
            $table->string('nama_siswa')->nullable();         
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->text('alamat_lengkap')->nullable();

            $table->string('nama_ayah')->nullable();            
            $table->string('nama_ibu')->nullable();             
            $table->string('nomor_telepon')->nullable();        
            $table->string('email')->nullable();    

            $table->string('foto_ktp')->nullable();         
            $table->string('foto_kk')->nullable();          
            $table->string('foto_akta_lahir')->nullable();          
            $table->string('pas_foto')->nullable();         
            $table->string('bukti_transfer')->nullable();   

            $table->text('keterangan')->nullable();         

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};