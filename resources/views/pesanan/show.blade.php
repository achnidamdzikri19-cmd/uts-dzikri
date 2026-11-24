@extends('layouts.app')
@section('title', 'Detail Pesanan')

@section('content')
<div class="card">
    <h2>Detail Pesanan</h2>
    <table>
        <tr><th style="width:30%">Kode</th><td>{{ $pesanan['kode'] }}</td></tr>
        <tr><th>Nama Pelanggan</th><td>{{ $pesanan['pelanggan'] }}</td></tr>
        <tr><th>Layanan</th><td>{{ $pesanan['layanan'] }}</td></tr>
        <tr><th>Alamat / Outlet</th><td>{{ $pesanan['lokasi'] }}</td></tr>
        <tr><th>Berat (kg)</th><td>{{ $pesanan['jumlah'] }} kg</td></tr>
        <tr>
            <th>Status</th>
            <td>
                @if ($pesanan['status'] === 'Selesai')
                    Selesai (siap diambil)
                @elseif ($pesanan['status'] === 'Diambil')
                    Diambil pelanggan
                @else
                    {{ $pesanan['status'] }} (dalam proses)
                @endif
            </td>
        </tr>
    </table>
    <p style="margin-top:20px">
        <a class="btn btn-warn" href="{{ route('pesanan.edit', $pesanan['kode']) }}">Edit</a>
        <form class="inline" method="POST" action="{{ route('pesanan.destroy', $pesanan['kode']) }}"
              onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        <a class="btn btn-gray" href="{{ route('pesanan.index') }}">Kembali</a>
    </p>
</div>
@endsection
