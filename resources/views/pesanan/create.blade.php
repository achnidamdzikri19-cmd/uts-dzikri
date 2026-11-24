@extends('layouts.app')
@section('title', 'Tambah Pesanan')

@section('content')
<div class="card">
    <h2>Tambah Pesanan</h2>
    <form method="POST" action="{{ route('pesanan.store') }}">
        @csrf
        @include('pesanan._form')
        <p style="margin-top:20px">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-gray" href="{{ route('pesanan.index') }}">Batal</a>
        </p>
    </form>
</div>
@endsection
