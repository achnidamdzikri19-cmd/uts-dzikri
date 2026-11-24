@php
    $statusList = ['Diterima', 'Diproses', 'Selesai', 'Diambil'];
    $val = fn ($f) => old($f, $pesanan[$f] ?? '');
@endphp

<label for="kode">Kode Pesanan</label>
<input type="text" id="kode" name="kode" value="{{ $val('kode') }}" {{ isset($pesanan) ? 'readonly' : '' }}>
@error('kode') <div class="err">{{ $message }}</div> @enderror

<label for="pelanggan">Nama Pelanggan</label>
<input type="text" id="pelanggan" name="pelanggan" value="{{ $val('pelanggan') }}">
@error('pelanggan') <div class="err">{{ $message }}</div> @enderror

<label for="layanan">Layanan</label>
<select id="layanan" name="layanan">
    <option value="">-- Pilih layanan --</option>
    @foreach (["Cuci Kering", "Cuci Setrika", "Setrika Saja", "Express"] as $l)
        <option value="{{ $l }}" @selected($val('layanan') === $l)>{{ $l }}</option>
    @endforeach
</select>
@error('layanan') <div class="err">{{ $message }}</div> @enderror

<label for="lokasi">Alamat / Outlet</label>
<input type="text" id="lokasi" name="lokasi" value="{{ $val('lokasi') }}">
@error('lokasi') <div class="err">{{ $message }}</div> @enderror

<label for="jumlah">Berat (kg)</label>
<input type="number" id="jumlah" name="jumlah" min="0.1" step="0.1" value="{{ $val('jumlah') }}">
@error('jumlah') <div class="err">{{ $message }}</div> @enderror

<label for="status">Status</label>
<select id="status" name="status">
    <option value="">-- Pilih status --</option>
    @foreach ($statusList as $k)
        <option value="{{ $k }}" @selected($val('status') === $k)>{{ $k }}</option>
    @endforeach
</select>
@error('status') <div class="err">{{ $message }}</div> @enderror