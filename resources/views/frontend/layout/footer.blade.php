 <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
     <div class="container py-5">
         <div class="row g-5">
             <div class="col-lg-3 col-md-6">
                 @if (count($abouts) > 0)
                     <h4 class="text-white mb-4">{{ config('app.name') }}</h4>
                     <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $abouts[0]->address }}</p>
                     <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $abouts[0]->phone }}</p>
                     <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $abouts[0]->email }}</p>
                     <div class="d-flex pt-3">
                         @foreach ($abouts[0]->hasmedia as $about)
                             <a class="btn btn-square btn-light rounded-circle me-2" href="{!! $about->link !!}">
                                 {!! $about->icon !!}</a>
                         @endforeach

                     </div>
                 @endif
             </div>

         </div>
     </div>
 </div>

