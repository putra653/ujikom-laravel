@extends ('admin.admin')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="card">
    <div class="card-header">
        <div class="flex justify-between items-center">
            <h4 class="card-title">Edit Tambah</h4>                            

            
        </div>
    </div>
    <div class="p-6">
            <div class="p-6">
              
                @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div> 
                </div> 
                @endif
                <form action="{{ route('update.simpanan', $simpanan->kode_simpanan_debet) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Kode Simpanan</label>
                            <input value="{{old('simpanan',$simpanan->kode_simpanan_debet)}}"  name="kode_simpanan" type="text" class="form-input" id="inputAddress" readonly>
                            @error('kode_simpanan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Anggota</label>
                            <select class="form-select" name="anggota_kode" id="anggota_kode" aria-label="Default select example" >
                                <option selected disabled hidden>Pilih Nama Anggota</option>
                                @foreach ($anggota as $item)
                                    <option value="{{ $item->kode_anggota }}" @if ($simpanan->anggota_kode == $item->kode_anggota)
                                        selected
                                    @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('anggota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Tanggal</label>
                            <input value="{{old('tanggal',$simpanan->tanggal)}}"  name="tanggal" type="date" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Jenis Pembayaran</label>
                            <select name="jenis_pembayaran" id="role" class="form-input">
                                <option value="hidden" disabled hidden>Pilih Jenis Pembayaran</option>
                                <option value="tunai" {{ $simpanan->jenis_pembayaran == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                <option value="nontunai" {{ $simpanan->jenis_pembayaran == 'nontunai' ? 'selected' : '' }}>Nontunai</option>
                            </select>
                            @error('jenis_pembayaran')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Transaksi</label>
                            <select name="transaksi" id="role" class="form-input">
                                <option value="hidden" disabled hidden>Pilih Transaksi</option>
                                <option value="debet" {{ $simpanan->transaksi == 'debet' ? 'selected' : '' }}>Debet</option>
                                <option value="kredit" {{ $simpanan->transaksi == 'kredit' ? 'selected' : '' }}>Kredit</option>
                            </select>
                            @error('transaksi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Divisi</label>
                            <select name="divisi" id="role" class="form-input">
                                <option value="hidden" disabled hidden>Pilih Status</option>
                                <option value="simpan" {{ $simpanan->divisi == 'simpan' ? 'selected' : '' }}>simpan</option>
                                <option value="pinjam" {{ $simpanan->divisi == 'pinjam' ? 'selected' : '' }}>Pinjam</option>
                            </select>
                            @error('divisi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Status Buku</label>
                            <select name="status_buku" id="role" class="form-input">
                                <option value="hidden" disabled hidden>Pilih Status</option>
                                <option value="aktif" {{ $simpanan->status_buku == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ $simpanan->status_buku == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            @error('status_buku')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                       
                       
                    </div>
                    
                    <button type="submit" class="btn bg-primary text-white">Tambah</button>
                </form>

                    @endsection