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
                <form action="{{ route('update.pegawai', $users->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Name</label>
                            <input value="{{old('name',$users->name)}}"  name="name" type="text" class="form-input" id="inputAddress" placeholder="Masukkan Nama Anda">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Email</label>
                            <input value="{{old('email',$users->email)}}"  name="email" type="text" class="form-input" id="inputAddress" placeholder=" Masukkan Email Anda ">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2"> Telepon </label>
                            <input value="{{old('telepon',$users->telepon)}}" name="telepon"  type="text" class="form-input" id="inputAddress2" placeholder="Masukkan Telepon Anda">
                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2"> Alamat </label>
                            <input value="{{old('alamat',$users->alamat)}}" name="alamat" type="text" class="form-input" id="inputAddress2" placeholder="Masukkan Telepon Anda">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="inputAddress2" class="text-gray-800 text-sm font-medium inline-block mb-2">Role</label>
                            <select name="role" id="role" class="form-input">
                                <option value="hidden" disabled hidden>Pilih Role</option>
                                <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="manager" {{ $users->role == 'manager' ? 'selected' : '' }}>Manager</option>
                                <option value="supervisor" {{ $users->role == 'supervisor' ? 'selected' : '' }}>Supervisor</option>
                                <option value="petugas" {{ $users->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div>
                            <label  class="text-gray-800 text-sm font-medium inline-block mb-2">Upload Foto</label>
                             <br>   
                            <input value="{{old('foto_profile',$users->foto_profile)}}" name="foto_profile" type="file" class="form-input">
                            <img src="{{asset('storage/back/foto-profile/'.$users->foto_profile)}}" >
                            @error('foto_profile')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                       
                    </div>
            
                    
            
                        <br>
            
            
                    <button type="submit" class="btn bg-primary text-white">Tambah</button>
                </form>
               
            </div>
            </div>
            </div> <!-- end col -->
            
    </div>
</div>
@endsection