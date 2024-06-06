@extends ('admin.admin')
@section('content')




<div class="p-6">
    
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Setting</h4>                            
    
                
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
    <form  action="{{route('update.setting', $setting->first()->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
            <div class="lg:col-span-2">
                <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Name Perusahaan</label>
                <input name="nama_perusahaan" value="{{ old('nama', $setting->first()->nama_perusahaan) }}" type="text" class="form-input" id="inputAddress" placeholder="Masukkan Nama Perusahaan Anda">

                @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                <div class="lg:col-span-2">
                    <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Telepon</label>
                    <input name="telepon" value="{{ old('nama', $setting->first()->telepon) }}" type="text" class="form-input" id="inputAddress" placeholder="Masukkan Telepon">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <div class="lg:col-span-2">
                        <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Nib</label>
                        <input name="nib" value="{{ old('nama', $setting->first()->nib) }}" type="text" class="form-input" id="inputAddress" placeholder="Masukkan Nib">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Web</label>
                            <input name="web" value="{{ old('nama', $setting->first()->web) }}" type="text" class="form-input" id="inputAddress" placeholder="Masukkan Web">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                 </div>
                </div>
                 <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <div class="lg:col-span-2">
                        <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Alamat</label>
                        <input name="alamat" value="{{ old('nama', $setting->first()->alamat) }}" type="text" class="form-input" id="inputAddress" placeholder="Masukkan Alamat Perusahaan">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                 </div>
                 </div>
                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                        <div class="lg:col-span-2">
                            <label for="inputAddress" class="text-gray-800 text-sm font-medium inline-block mb-2">Kode Pos</label>
                            <input name="kodepos" value="{{ old('nama', $setting->first()->kodepos) }}" type="text" class="form-input" id="inputAddress" placeholder="Masukkan Kode Pos">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                </div>
                <div>
                    <label  class="text-gray-800 text-sm font-medium inline-block mb-2">Upload Foto</label>
                    <input name="foto_perusahaan" type="file" class="form-input">
                    <br>
                    <img src="{{asset('storage/back/setting/'.$setting->foto_perusahaan)}}" >
                    @error('foto_perusahaan')
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
@endsection