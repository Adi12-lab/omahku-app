 @extends('layouts.app')
 @section('content')
     {{ Breadcrumbs::render('agent') }}
     <!-- LISTING LIST -->
     <section class="profile__agents">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="row">
                         @foreach ($agents as $agent)
                             <div class="col-lg-4 mt-4">
                                 <div class="cards mt-0">
                                     <div class="profile__agents-header">
                                         <a href="#" class="profile__agents-avatar">
                                             <img src="{{ asset($agent->image ?? 'assets/image/500x400.jpg') }}"
                                                 alt="" class="img-fluid">
                                             <div class="total__property-agent">{{ $agent->properties_count }} Properti
                                             </div>
                                         </a>
                                     </div>
                                     <div class="profile__agents-body">
                                         <div class="profile__agents-info">
                                             <h5 class="text-capitalize">
                                                 <a href="{{route("frontend.agent.view", $agent->id)}}" target="_blank">{{ $agent->name }}</a>
                                             </h5>
                                             <p class="text-capitalize mb-1">Agen Properti</p>

                                             <ul class="list-unstyled mt-2">

                                                 <li><a href="#">
                                                         <span>
                                                             <i class="fa fa-whatsapp"></i> Whatsapp :
                                                         </span>
                                                         {{ formatPhoneNumber($agent->whatsapp) }}
                                                     </a>
                                                 </li>

                                                 <li><a href="#" class="text-capitalize"><span><i
                                                                 class="fa fa-fax"></i>
                                                             fax : </span> 342 655</a></li>
                                                 <li><a href="#"><span><i class="fa fa-envelope"></i> Email :</span>
                                                         {{ $agent->emailAgent }}</a></li>
                                             </ul>
                                             <p class="mb-0 mt-3">
                                                 <a href="{{ url($agent->facebook) }}"
                                                     class="btn btn-social btn-social-o facebook mr-1">
                                                     <i class="fa fa-facebook-f"></i>
                                                 </a>
                                                 <a href="{{ url($agent->twitter) }}"
                                                     class="btn btn-social btn-social-o twitter mr-1">
                                                     <i class="fa fa-twitter"></i>
                                                 </a>

                                                 <a href="{{ url($agent->linkedin) }}"
                                                     class="btn btn-social btn-social-o linkedin mr-1">
                                                     <i class="fa fa-linkedin"></i>
                                                 </a>
                                                 <a href="{{ url($agent->instagram) }}"
                                                     class="btn btn-social btn-social-o instagram mr-1">
                                                     <i class="fa fa-instagram"></i>
                                                 </a>

                                                 <a href="{{ url($agent->youtube) }}"
                                                     class="btn btn-social btn-social-o youtube mr-1">
                                                     <i class="fa fa-youtube"></i>
                                                 </a>
                                             </p>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>
             <div class="row mt-4">
                 <div class="col">
                     {{ $agents->links() }}

                 </div>
             </div>
         </div>
     </section>

     <!-- END LISTING LIST -->
 @endsection
