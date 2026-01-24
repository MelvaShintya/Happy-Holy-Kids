<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegistrationExport;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        // try {
            // Cek apakah update atau create baru
            if ($request->id) {
                $Registration = Registration::findOrFail($request->id);
            } else {
                $Registration = new Registration;
            }

            $request->validate([
                'nama_siswa'       => 'required|string|max:100',
                'tempat_lahir'     => 'required|string|max:100',
                'tanggal_lahir'    => 'required|date',
                'jenis_kelamin'    => 'required|in:Laki-laki,Perempuan',
                'alamat_lengkap'   => 'required|string',

                'nama_ayah'        => 'required|string|max:100',
                'nama_ibu'         => 'required|string|max:100',
                'nomor_telepon'    => 'required|string|max:20',
                'email'            => 'nullable|email',

                'foto_ktp'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'foto_kk'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'pas_foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'bukti_transfer'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

                'keterangan'       => 'nullable|string',
            ], [
                // Pesan error custom
                'nama_siswa.required'     => 'Nama siswa wajib diisi.',
                'tempat_lahir.required'   => 'Tempat lahir wajib diisi.',
                'tanggal_lahir.required'  => 'Tanggal lahir wajib diisi.',
                'jenis_kelamin.required'  => 'Jenis kelamin wajib dipilih.',
                'alamat_lengkap.required' => 'Alamat lengkap wajib diisi.',

                'nama_ayah.required'      => 'Nama ayah wajib diisi.',
                'nama_ibu.required'       => 'Nama ibu wajib diisi.',
                'nomor_telepon.required'  => 'Nomor telepon wajib diisi.',

                'email.email'             => 'Format email tidak valid.',

                'foto_ktp.image'          => 'Foto KTP harus berupa gambar.',
                'foto_kk.image'           => 'Foto KK harus berupa gambar.',
                'pas_foto.image'          => 'Pas foto harus berupa gambar.',
                'bukti_transfer.image'    => 'Bukti transfer harus berupa gambar.',

                'foto_ktp.max'            => 'Ukuran foto KTP maksimal 2MB.',
                'foto_kk.max'             => 'Ukuran foto KK maksimal 2MB.',
                'pas_foto.max'            => 'Ukuran pas foto maksimal 2MB.',
                'bukti_transfer.max'      => 'Ukuran bukti transfer maksimal 2MB.',
            ]);
            
            $data = [];

            // foreach ($_FILES as $key => $file) {
            //     if ($file['size'] > 0) {
            //         $Registration->deleteFile($key);
            //         $path = $Registration->uploadFile($request->file($key), $key);
            //         $Registration->{$key} = $path;
            //     }
            // }
            foreach (['foto_ktp', 'foto_kk', 'pas_foto', 'bukti_transfer'] as $file) {
                if ($request->hasFile($file)) {
                    $data[$file] = $request->file($file)
                        ->store('registration/' . $request->nama_siswa, 'public');
                }
            }
            $Registration->nama_siswa = $request->nama_siswa;
            $Registration->tempat_lahir = $request->tempat_lahir;
            $Registration->tanggal_lahir = $request->tanggal_lahir;
            $Registration->jenis_kelamin = $request->jenis_kelamin;
            $Registration->alamat_lengkap = $request->alamat_lengkap;
            $Registration->nama_ayah = $request->nama_ayah;
            $Registration->nama_ibu = $request->nama_ibu;
            $Registration->nomor_telepon = $request->nomor_telepon;
            $Registration->email = $request->email;
            $Registration->foto_ktp = $data['foto_ktp'] ?? $Registration->foto_ktp;
            $Registration->foto_kk = $data['foto_kk'] ?? $Registration->foto_kk;
            $Registration->pas_foto = $data['pas_foto'] ?? $Registration->pas_foto;
            $Registration->bukti_transfer = $data['bukti_transfer'] ?? $Registration->bukti_transfer;
            $Registration->keterangan = $request->keterangan;
            $Registration->save();

            if (request()->routeIs('registration.admin.*')) {
                return redirect()->route('registration.list')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->route('home')->with('success', 'Data berhasil disimpan!');
            }
        // } catch (\Exception $e) {
        //     return back()->withErrors([
        //         'error' => 'Terjadi kesalahan saat menyimpan data.'
        //     ])->withInput();
        // }
    }

    public function list(Request $request)
    {
        // $Registration = new Registration;
        // $data['Registration'] = $Registration->paginate(10);

        $query = Registration::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_siswa', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                    ->orWhere('tanggal_lahir', 'like', "%{$search}%");
            });
        }

        $data['Registration'] = $query->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.registration.list', ['data' => $data]);
    }

    public function form(?string $id = null)
    {
        if ($id) {
            $data['Registration'] = Registration::findOrFail($id);
        } else {
            $data['Registration'] = null;
        }

        return view('admin.registration.form', ['data' => $data]);
    }

    public function view(string $id)
    {
        $Registration = new Registration;
        $data['Registration'] = $Registration->findOrFail($id);

        return view('admin.registration.view', ['data' => $data]);
    }

    public function destroy(string $id)
    {
        $Registration = new Registration;
        $Registration->findOrFail($id)->delete();

        return redirect()->route('registration.list')
            ->with('success', 'Data berhasil di hapus.');
    }

    public function export()
    {
        return Excel::download(
            new RegistrationExport,
            'data-pendaftaran.xlsx'
        );
    }
}
