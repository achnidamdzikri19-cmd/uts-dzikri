@extends('layouts.app')
@section('title', 'Daftar Pesanan')

@section('content')
<div class="card">
    <h2>Daftar Pesanan</h2>
    <p><a class="btn btn-primary" href="{{ route('pesanan.create') }}">+ Tambah Pesanan</a></p>

    @if (count($daftarPesanan) === 0)
        <div class="alert alert-info">Belum ada data pesanan laundry. Silakan tambahkan data terlebih dahulu.</div>
    @else
        <div style="overflow-x:auto">
        <table>
            <thead>
                <tr>
                    <th>Kode</th><th>Nama Pelanggan</th><th>Layanan</th>
                    <th>Alamat / Outlet</th><th>Berat (kg)</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarPesanan as $pesanan)
                    <tr>
                        <td>{{ $pesanan['kode'] }}</td>
                        <td>{{ $pesanan['pelanggan'] }}</td>
                        <td>{{ $pesanan['layanan'] }}</td>
                        <td>{{ $pesanan['lokasi'] }}</td>
                        <td>{{ $pesanan['jumlah'] }} kg</td>
                        <td>{{ $pesanan['status'] }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('pesanan.show', $pesanan['kode']) }}">Detail</a>
                            <a class="btn btn-warn" href="{{ route('pesanan.edit', $pesanan['kode']) }}">Edit</a>
                            <form class="inline" method="POST" action="{{ route('pesanan.destroy', $pesanan['kode']) }}"
                                  onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif
</div>
@endsection
