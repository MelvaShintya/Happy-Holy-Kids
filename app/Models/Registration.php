<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        // Data Siswa
        'nama_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_lengkap',

        // Data Orang Tua / Wali
        'nama_ayah',
        'nama_ibu',
        'nomor_telepon',
        'email',

        // Upload Dokumen
        'foto_ktp',
        'foto_kk',
        'pas_foto',
        'bukti_transfer',

        // Keterangan Tambahan
        'keterangan',
    ];

    // public function deleteFile(string $field): void
    // {
    //     if (
    //         $this->{$field} &&
    //         Storage::disk('public')->exists($this->{$field})
    //     ) {
    //         Storage::disk('public')->delete($this->{$field});
    //     }
    // }

    // public function uploadFile($file, string $folder = 'registrations'): string
    // {
    //     return $file->store($folder, 'public');
    // }
}
