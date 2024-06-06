
<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- App css -->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css">

<!-- Icons css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">

<!-- Theme Config Js -->
<script src="assets/js/config.js"></script>


<?php
    use Illuminate\Support\Facades\DB;

    $setting = DB::table('pengaturan')->first();

?>


<a href="{{url('/admin')}}" class="logo-box">
    <!-- Light Brand Logo -->
    <div class="logo-light">
        <img src="{{asset('assets/images/logo-light.png')}}" class="logo-lg h-6" alt="Light logo">
        <img src="{{asset('assets/images/logo-sm.png')}}" class="logo-sm" alt="Small logo">
    </div>

    <!-- Dark Brand Logo -->
    <div class="logo-dark">
        <img src="{{asset('storage/back/setting/'.$setting->foto_perusahaan)}}" class="h-15 w-20" >
        <h5>{{$setting->nama_perusahaan}}</h5>
        <img src="{{asset('assets/images/logo-sm.png')}}" class="logo-sm" alt="Small logo">
    </div>
</a>

<button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
                <span class="sr-only">Menu Toggle Button</span>
                <i class="mgc_round_line text-xl"></i>
            </button>

            

            <div class="srcollbar" data-simplebar>
                <ul class="menu" data-fc-type="accordion">
                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a href="{{url('/admin')}}" class="menu-link">
                            <span class="menu-icon"><i class="mgc_home_3_line"></i></span>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('saldo.index')}}" class="menu-link">
                            <span class="menu-icon"><i class="mgc_bank_fill"></i></span>
                            <span class="menu-text"> Saldo </span>
                        </a>
                    </li>

                    <li class="menu-title">Apps</li>

                    <li class="menu-item">
                        <a href="{{route('pegawai.index')}}" class="menu-link">
                            <span class="menu-icon"><i class="mgc_android_2_fill"></i></span>
                            <span class="menu-text"> Pegawai </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('anggota.index')}}" class="menu-link">
                            <span class="menu-icon"><i class="mgc_badge_line"></i></span>
                            <span class="menu-text"> Anggota </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                            <span class="menu-icon"><i class="mgc_body_line"></i></span>
                            <span class="menu-text"> Simpanan </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <ul class="sub-menu hidden">
                            <li class="menu-item">
                                <a href="{{route('simpanan.index')}}" class="menu-link">
                                    <span class="menu-text">Simpanan</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('jenis_simpanan.index')}}" class="menu-link">
                                    <span class="menu-text">Jenis Simpanan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('pinjaman.index')}}" class="menu-link">
                            <span class="menu-icon"><i class="mgc_bird_fill"></i></span>
                            <span class="menu-text"> Pinjaman </span>
                        </a>
                    </li>
                    

                    <li class="menu-title">setting</li>

                    <li class="menu-item">
                        <a href="{{url('setting')}}" class="menu-link">
                            <span class="menu-icon"><i class="mgc_settings_4_fill"></i></span>
                            <span class="menu-text"> Setting   </span>
                        </a>
                    </li>

                    <li class="menu-title">Logout</li>

                    <li class="menu-item">
                        <a href="{{('logout')}}" class="menu-link">
                            <span class="menu-icon"><i class="mgc_align_arrow_right_fill"></i></span>
                            <span class="menu-text"> Logout </span>
                        </a>
                    </li>
                </ul>
                
                

                <!-- Help Box Widget -->
                {{-- <div class="my-10 mx-5">
                    <div class="help-box p-6 bg-black/5 text-center rounded-md">
                        <div class="flex justify-center mb-4">
                            <svg width="30" height="18" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 0c-4 0-6.5 2-7.5 6 1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C17.08 7.271 18.782 9 22.5 9c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C20.42 1.728 18.718 0 15 0ZM7.5 9C3.5 9 1 11 0 15c1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C9.58 16.271 11.282 18 15 18c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C12.92 10.729 11.218 9 7.5 9Z" fill="#38BDF8"></path>
                            </svg>
                        </div>
                        <h5 class="mb-2">Unlimited Access</h5>
                        <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                        <a href="javascript: void(0);" class="btn btn-sm bg-secondary text-white">Upgrade</a>
                    </div>
                </div> --}}
            </div>
        </div>


        <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/%40frostui/tailwindcss/frostui.js"></script>

    <!-- App Js -->
    <script src="assets/js/app.js"></script>

    <!-- Apexcharts js -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Dashboard Project Page js -->
    <script src="assets/js/pages/dashboard.js"></script>
