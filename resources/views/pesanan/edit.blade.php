@extends('layouts.app')
@section('title', 'Edit Pesanan')

@section('content')
<div class="card">
    <h2>Edit Pesanan</h2>
    <form method="POST" action="{{ route('pesanan.update', $pesanan['kode']) }}">
        @csrf
        @method('PUT')
        @include('pesanan._form')
        <p style="margin-top:20px">
            <button type="submit" class="btn btn-warn">Perbarui</button>
            <a class="btn btn-gray" href="{{ route('pesanan.index') }}">Batal</a>
        </p>
    </form>
</div>
@endsection
