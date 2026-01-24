<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Registration::orderBy('id', 'asc')->get();
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->nama_siswa,
            $row->tempat_lahir,
            $row->tanggal_lahir,
            $row->jenis_kelamin,
            $row->alamat_lengkap,
            $row->nama_ayah,
            $row->nama_ibu,
            $row->nomor_telepon,
            $row->email,

            // 👇 FILE JADI LINK
            $this->fileUrl($row->foto_ktp),
            $this->fileUrl($row->foto_kk),
            $this->fileUrl($row->pas_foto),
            $this->fileUrl($row->bukti_transfer),

            $row->keterangan,
            $row->created_at,
            $row->updated_at,
        ];
    }

    private function fileUrl($path)
    {
        return $path
            ? url('storage/' . $path)
            : '-';
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat Lengkap',
            'Nama Ayah',
            'Nama Ibu',
            'Nomor Telepon',
            'Email',
            'Foto KTP',
            'Foto KK',
            'Pas Foto',
            'Bukti Transfer',
            'Keterangan',
            'Dibuat Pada',
            'Diupdate Pada',
        ];
    }
}