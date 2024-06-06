<!DOCTYPE html>
<html lang="en">

<?php
    use Illuminate\Support\Facades\DB;

    $setting = DB::table('pengaturan')->first();

?>

<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 06:18:09 GMT -->
<head>
@include('layout.template')
</head>

<body>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
                <form action="{{ ('login') }}" method="POST">
    <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">
            @csrf
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="h-screen w-screen flex justify-center items-center">

            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                <div class="card overflow-hidden sm:rounded-md rounded-none">
                    <div class="p-6">
                        <a href="{{('login')}}" class="block mb-8">
                            <div style="text-align: center;">
                                <h2>Login</h2>
                            </div>
                            <img src="{{asset('storage/back/setting/'.$setting->foto_perusahaan)}}" class="h-15 w-20" >
                            <h5>{{$setting->nama_perusahaan}}</h5><br>
                        </a>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="LoggingEmailAddress">Email Address</label>
                            <input name="email" class="form-input" value="{{ old('email') }}"    type="email" placeholder="Enter your email" >
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="loggingPassword">Password</label>
                            <input  name="password" id="loggingPassword" class="form-input" type="password" placeholder="Enter your password" >
                        </div>

                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <input type="checkbox" class="form-checkbox rounded" id="checkbox-signin">
                                <label class="ms-2" for="checkbox-signin">Remember me</label>
                            </div>
                            <a href="auth-recoverpw.html" class="text-sm text-primary border-b border-dashed border-primary">Forget Password ?</a>
                        </div>

                        <div class="flex justify-center mb-6">
                            <button class="btn w-full text-white bg-primary" type="submit" name="submit"> Log In </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</body>


<!-- Mirrored from coderthemes.com/konrix/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 06:18:09 GMT -->
</html>