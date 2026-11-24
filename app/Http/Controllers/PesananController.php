<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PesananController extends Controller
{
    private const SESSION_KEY = 'pesanan';

    // ---------- Helper data session ----------
    private function semua(): array
    {
        return session(self::SESSION_KEY, []);
    }

    private function simpan(array $data): void
    {
        session([self::SESSION_KEY => $data]);
    }

    private function aturan(): array
    {
        return [
            'pelanggan'     => ['required', 'string', 'max:100'],
            'layanan' => ['required', 'string', 'max:50'],
            'lokasi'   => ['required', 'string', 'max:100'],
            'jumlah'   => ['required', 'numeric', 'min:0.1', 'max:999'],
            'status'   => ['required', 'in:Diterima,Diproses,Selesai,Diambil'],
        ];
    }

    private function tidakDitemukan(): RedirectResponse
    {
        return redirect()->route('pesanan.index')
            ->with('error', 'Data pesanan dengan kode tersebut tidak ditemukan.');
    }

    // ---------- Aksi ----------

    /** Mengambil data pesanan dari session dan mengirimkannya ke halaman daftar. */
    public function index(): View
    {
        return view('pesanan.index', ['daftarPesanan' => $this->semua()]);
    }

    /** Menampilkan form tambah pesanan. */
    public function create(): View
    {
        return view('pesanan.create');
    }

    /** Menerima input form, membentuk data pesanan, menyimpan ke session, lalu redirect. */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(array_merge(
            ['kode' => ['required', 'string', 'max:20', 'regex:/^[A-Za-z0-9\-_]+$/']],
            $this->aturan()
        ));

        $data = $this->semua();

        if (isset($data[$validated['kode']])) {
            return back()->withInput()
                ->withErrors(['kode' => 'Kode pesanan sudah digunakan.']);
        }

        $data[$validated['kode']] = $validated;
        $this->simpan($data);

        return redirect()->route('pesanan.index')
            ->with('success', "Pesanan atas nama {$validated['pelanggan']} berhasil ditambahkan.");
    }

    /** Menampilkan detail satu pesanan berdasarkan kode. */
    public function show(string $kode): View|RedirectResponse
    {
        $data = $this->semua();
        if (!isset($data[$kode])) {
            return $this->tidakDitemukan();
        }

        return view('pesanan.show', ['pesanan' => $data[$kode]]);
    }

    /** Menampilkan form edit dengan data pesanan yang dipilih. */
    public function edit(string $kode): View|RedirectResponse
    {
        $data = $this->semua();
        if (!isset($data[$kode])) {
            return $this->tidakDitemukan();
        }

        return view('pesanan.edit', ['pesanan' => $data[$kode]]);
    }

    /** Memperbarui data pesanan pada session berdasarkan kode. */
    public function update(Request $request, string $kode): RedirectResponse
    {
        $data = $this->semua();
        if (!isset($data[$kode])) {
            return $this->tidakDitemukan();
        }

        $validated = $request->validate($this->aturan());
        $data[$kode] = array_merge(['kode' => $kode], $validated);
        $this->simpan($data);

        return redirect()->route('pesanan.index')
            ->with('success', "Pesanan atas nama {$validated['pelanggan']} berhasil diperbarui.");
    }

    /** Menghapus pesanan dari session berdasarkan kode. */
    public function destroy(string $kode): RedirectResponse
    {
        $data = $this->semua();
        if (!isset($data[$kode])) {
            return $this->tidakDitemukan();
        }

        $nama = $data[$kode]['pelanggan'];
        unset($data[$kode]);
        $this->simpan($data);

        return redirect()->route('pesanan.index')
            ->with('success', "Pesanan atas nama {$nama} berhasil dihapus.");
    }
}
