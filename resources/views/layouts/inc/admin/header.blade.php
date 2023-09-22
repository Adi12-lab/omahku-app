 <header id="page-topbar">
     <div class="navbar-header">
         <div class="d-flex">
             <!-- LOGO -->
             <div class="navbar-brand-box">
                 <a href="index.html" class="logo logo-dark">
                     <span class="logo-sm">
                         <img src="{{ asset('admin/images/logo-sm-dark.png') }}" alt="logo-sm-dark" height="26">
                     </span>
                     <span class="logo-lg">
                         <img src="{{ asset('admin/images/logo-dark.png') }}" alt="logo-dark" height="24">
                     </span>
                 </a>

                 <a href="index.html" class="logo logo-light">
                     <span class="logo-sm">
                         <img src="{{ asset('admin/images/logo-sm-light.png') }}" alt="logo-sm-light" height="26">
                     </span>
                     <span class="logo-lg">
                         <img src="{{ asset('admin/images/logo-light.png') }}" alt="logo-light" height="24">
                     </span>
                 </a>
             </div>

             <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                 id="vertical-menu-btn">
                 <i class="ri-menu-2-line align-middle"></i>
             </button>

         </div>

         <div class="d-flex">

             <div class="dropdown d-none d-sm-inline-block">
                 <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                     <img class="" src="{{ asset('admin/images/flags/us.jpg') }}" alt="Header Language"
                         height="16">
                 </button>
                 <div class="dropdown-menu dropdown-menu-end">

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="{{ asset('admin/images/flags/spain.jpg') }}" alt="user-image" class="me-1"
                             height="12">
                         <span class="align-middle">Spanish</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="{{ asset('admin/images/flags/germany.jpg') }}" alt="user-image" class="me-1"
                             height="12">
                         <span class="align-middle">German</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="{{ asset('admin/images/flags/italy.jpg') }}" alt="user-image" class="me-1"
                             height="12">
                         <span class="align-middle">Italian</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                         <img src="{{ asset('admin/images/flags/russia.jpg') }}" alt="user-image" class="me-1"
                             height="12">
                         <span class="align-middle">Russian</span>
                     </a>
                 </div>
             </div>

             <div class="dropdown d-none d-lg-inline-block ms-1">
                 <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                     <i class="ri-fullscreen-line"></i>
                 </button>
             </div>
             @php
                 $unreads = auth()
                     ->user()
                     ->messages()
                     ->where('read_at', null)
                     ->get();
     
             @endphp
             {{-- @dd($unreads->count() > 0) --}}
             <div class="dropdown d-inline-block">
                 <button type="button" class="btn header-item noti-icon waves-effect"
                     id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="ri-notification-3-line"></i>
                     <span class="noti-dot {{ $unreads->count() === 0 ? "d-none" : "" }}"></span>
                 </button>
                 <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                     <div class="p-3">
                         <div class="row align-items-center">
                             <div class="col">
                                 <h6 class="m-0"> Notifikasi </h6>
                             </div>

                             <div class="col-auto">
                                 <a href="{{ route('messages') }}" class="small"> Lihat semua</a>
                             </div>
                         </div>
                     </div>
                     <div data-simplebar style="max-height: 230px;" id="notification-items">
                         <div class="text-center" id="empty-notif">


                             @forelse ($unreads as $unread)
                                 <div class="text-reset notification-item">
                                     <div class="d-flex">
                                         <div class="flex-1">
                                             <h6 class="mb-1">{{ $unread->subject }}</h6>
                                             <div class="font-size-12 text-muted">
                                                 <p class="mb-1">{{ str()->limit($unread->message, 10) }}</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @empty
                                 <strong>Notifikasi Kosong</strong>
                             @endforelse
                         </div>
                     </div>
                     <div class="p-2 border-top">
                         <div class="d-grid">
                             <a class="btn btn-sm btn-link font-size-14 text-center" href="{{ route('messages') }}">
                                 <i class="mdi mdi-arrow-right-circle me-1"></i> Lebih Lengkap..
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="dropdown d-inline-block user-dropdown">
                 <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="rounded-circle header-profile-user img-cover"
                         src="{{ asset(auth()->user()->image) }}" alt="Header Avatar">
                     <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->username }}</span>
                     <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                 </button>
                 <div class="dropdown-menu dropdown-menu-end">
                     <!-- item-->
                     <a class="dropdown-item" href="{{ route('profile') }}"><i
                             class="ri-user-line align-middle me-1"></i>
                         Profile</a>

                     <div class="dropdown-divider"></div>
                     <form action="{{ route('logout') }}" method="POST">
                         @csrf
                         <button type="submit" class="dropdown-item text-danger" href="#"><i
                                 class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</button>
                     </form>
                 </div>
             </div>

             <div class="dropdown d-inline-block">
                 <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                     <i class="ri-settings-2-line"></i>
                 </button>
             </div>

         </div>
     </div>
 </header>
