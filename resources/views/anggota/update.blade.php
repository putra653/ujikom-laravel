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
                <form action="{{ route('update.anggota', $anggota->kode_anggota) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Kode Anggota</label>
                            <input value="{{old('anggota',$anggota->kode_anggota)}}"  name="kdoe_anggota" type="text" class="form-input" id="inputAddress" readonly>
                            @error('kode_anggota')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Nik</label>
                            <input value="{{old('nik',$anggota->nik)}}"  name="nik" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Nama</label>
                            <input value="{{old('nama',$anggota->nama)}}"  name="nama" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Alamat</label>
                            <input value="{{old('alamat',$anggota->alamat)}}"  name="alamat" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                            <input value="{{old('email',$anggota->email)}}"  name="email" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Telepon</label>
                            <input value="{{old('telepon',$anggota->telepon)}}"  name="telepon" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Status</label>
                            <select name="status" id="status" class="form-input">
                                <option value="hidden" disabled hidden>Pilih Status</option>
                                <option value="1" {{ $anggota->status == '1' ? 'selected' : '' }}>1</option>
                                <option value="0" {{ $anggota->status == '0' ? 'selected' : '' }}>0</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                       
                       
                    </div>
                    
                    <button type="submit" class="btn bg-primary text-white">Tambah</button>
                </form>

                    @endsection