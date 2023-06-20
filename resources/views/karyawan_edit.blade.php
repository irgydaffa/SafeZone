@extends('layout.app')
@section('title', 'Tambah Karyawan')
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Karyawan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('karyawan.edit.update', $karyawan->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" value="{{ $karyawan->id }}">
                            <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $karyawan->email }}">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control">{{ $karyawan->alamat }}</textarea>
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="number" name="no_telp" class="form-control" value="{{ $karyawan->no_telp }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
