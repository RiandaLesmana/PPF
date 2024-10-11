<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['index', 'show']);
    }

    public function index()
    {
        $items = Item::with(['jurusanPil1', 'jurusanPil2'])->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $existingRegistration = Item::where('user_id', auth()->id())->first();
        if ($existingRegistration) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar.');
        }

        $jurusan = Jurusan::all();
        return view('items.create', compact('jurusan'));
    }

    public function store(Request $request)
{
    $request->validate([
        // Validation rules
        'nisn' => 'required|string|max:20',
        'nik' => 'required|string|max:20',
        'nama_siswa' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:10',
        'pas_foto' => 'string',
        'agama' => 'required|string|max:10',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'email' => 'nullable|email',
        'hp' => 'nullable|string|max:15',
        'alamat' => 'nullable|string|max:255',
        'nilai' => 'nullable|integer',
        'pil1' => 'required|exists:jurusan,id',
        'pil2' => 'nullable|exists:jurusan,id',
        'nama_ayah' => 'nullable|string|max:255',
        'pekerjaan_ayah' => 'nullable|string|max:255',
        'pendidikan_ayah' => 'nullable|string|max:255',
        'nama_ibu' => 'nullable|string|max:255',
        'pekerjaan_ibu' => 'nullable|string|max:255',
        'pendidikan_ibu' => 'nullable|string|max:255',
        'penghasilan_ayah' => 'nullable|string|max:255',
        'penghasilan_ibu' => 'nullable|string|max:255',
        'nohp_ayah' => 'nullable|string|max:15',
        'nohp_ibu' => 'nullable|string|max:15',
    ]);

    $latestItem = Item::latest('id')->first();
    $nextNumber = $latestItem ? (int)substr($latestItem->id_pendaftaran, 4) + 1 : 1;
    $idPendaftaran = 'IPCS' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT); 

    if ($request->hasFile('pas_foto')) {
        $file = $request->file('pas_foto');
        $path = $file->store('public/fotos');
        $data['pas_foto'] = $path;
    }

    // Store the new item
    Item::create([
        'user_id' => auth()->id(),
        'id_pendaftaran' => $idPendaftaran,
        'nisn' => $request->nisn,
        'nik' => $request->nik,
        'nama_siswa' => $request->nama_siswa,
        'jenis_kelamin' => $request->jenis_kelamin,
        'pas_foto' => $data['pas_foto'] ?? null,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'agama' => $request->agama,
        'email' => $request->email,
        'hp' => $request->hp,
        'alamat' => $request->alamat,
        'nilai' => $request->nilai,
        'pil1' => $request->pil1,
        'pil2' => $request->pil2,
        'nama_ayah' => $request->nama_ayah,
        'pekerjaan_ayah' => $request->pekerjaan_ayah,
        'pendidikan_ayah' => $request->pendidikan_ayah,
        'nama_ibu' => $request->nama_ibu,
        'pekerjaan_ibu' => $request->pekerjaan_ibu,
        'pendidikan_ibu' => $request->pendidikan_ibu,
        'nohp_ayah' => $request->nohp_ayah,
        'nohp_ibu' => $request->nohp_ibu,
        'penghasilan_ayah' => $request->penghasilan_ayah,
        'penghasilan_ibu' => $request->penghasilan_ibu,
        'tgl_pendaftaran' => Carbon::now(),
    ]);

    return redirect()->route('items.index')->with('success', 'Selamat Anda Berhasil Mendaftar.');
}

    public function show(Item $item)
    {
        $item->load(['jurusanPil1', 'jurusanPil2']);
        return view('items.show', compact('item'));
    }

    public function showPeng()
    {
        $item = Item::where('user_id', auth()->user()->id)->first();

        if (!$item) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan.');
        }

        return view('items.announce', compact('item'));
    }

    public function dashboard()
    {
        $totalRegistrations = Item::count();
        $newRegistrations = Item::where('created_at', '>=', Carbon::now()->subMonth())->count();
        $pendingRegistrations = Item::where('status_pendaftaran', 'Belum Ditentukan')->count();
        $passedRegistrations = Item::where('status_pendaftaran', 'LIKE', '%Lulus%')->count();
        $recentRegistrations = Item::orderBy('created_at', 'desc')->take(5)->get();
        $jurusans = Jurusan::all();
        $totalUsers = User::count(); // Menghitung jumlah pengguna

        return view('dashboard', compact('totalRegistrations', 'newRegistrations', 'pendingRegistrations', 'passedRegistrations', 'recentRegistrations', 'jurusans', 'totalUsers'));
    }

    public function edit(Item $item)
    {
        $jurusan = Jurusan::all();
        return view('items.edit', compact('item', 'jurusan'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'id_pendaftaran' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'nama_siswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'pas_foto' => 'nullable',
            'agama' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'email' => 'nullable|email',
            'hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'nilai' => 'nullable|integer',
            'pil1' => 'required|exists:jurusan,id',
            'pil2' => 'nullable|exists:jurusan,id',
            'nama_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'penghasilan_ayah' => 'nullable|string|max:255',
            'penghasilan_ibu' => 'nullable|string|max:255',
            'nohp_ayah' => 'nullable|string|max:15',
            'nohp_ibu' => 'nullable|string|max:15',
            'status_pendaftaran' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('pas_foto')) {
            if ($item->pas_foto) {
                Storage::delete($item->pas_foto);
            }
    
            $file = $request->file('pas_foto');
            $path = $file->store('public/fotos');
            $data['pas_foto'] = $path;
        } else {
            $data['pas_foto'] = $item->pas_foto;
        }

        $item->update([
            'id_pendaftaran' => $request->id_pendaftaran,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pas_foto' => $data['pas_foto'] ?? null,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'email' => $request->email,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'nilai' => $request->nilai,
            'pil1' => $request->pil1,
            'pil2' => $request->pil2,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'nohp_ayah' => $request->nohp_ayah,
            'nohp_ibu' => $request->nohp_ibu,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'status_pendaftaran' => $request->status_pendaftaran,
        ]);

        $item->status_pendaftaran = $request->input('status_pendaftaran');
        $item->save();

        return redirect()->route('items.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Data Siswa deleted successfully.');
    }
}
