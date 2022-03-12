<div class="col-12 col-md-3 d-none d-lg-block">
        <div class="card border-light p-2">
            <div class="card-body p-2">
                <div class="profile-thumbnail mx-auto" style="height:100px; width:100px;"><img src="{{ asset('assets/img/profile_pic.jpg') }}" class="card-img-top rounded-circle border-white" alt="Joseph Portrait" /></div>
                <h2 class="h5 font-weight-normal text-center mt-3 mb-0">{{ auth()->user()->name }} </h2>
                <ul class="list-unstyled">
                    <li class="mt-3">
                                        <span class="icon icon-shape icon-sm icon-shape-success rounded-circle mr-3 mb-4 mb-md-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                            </svg>
                                        </span>
                        {{ auth()->user()->phone }}
                    </li>
                    <li class="mt-3">
                                        <span class="icon icon-shape icon-sm icon-shape-success rounded-circle mr-3 mb-4 mb-md-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                            </svg>
                                        </span> {{ auth()->user()->email }}
                    </li>
                    <li class="mt-3">
                                        <span class="icon icon-shape icon-sm icon-shape-success rounded-circle mr-3 mb-4 mb-md-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                              <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                            </svg>
                                        </span> Name Shop : {{ auth()->user()->shop->name }}
{{--                        {{ auth()->user()->country }}, {{ auth()->user()->city }}--}}
                    </li>
                </ul>
            </div>
        </div>
    </div>

