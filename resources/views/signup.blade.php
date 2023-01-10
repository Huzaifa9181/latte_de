<x-layout>
    <x-slot name="title">Latte Da - Signup</x-slot>
    <x-slot name="data">
        <!-- Page Header Start -->
            <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
                <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
                    <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Sign Up</h1>
                    <div class="d-inline-flex mb-lg-5">
                        <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                        <p class="m-0 text-white px-2">/</p>
                        <p class="m-0 text-white">Sign Up</p>
                    </div>
                </div>
            </div>
        <!-- Page Header End -->

        <!-- Reservation Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">Sign Up</h1>
                                <h1 class="text-white">For Online Reservation , Delivery , Order.</h1>
                            </div>
                            <p class="text-white">Lorem justo clita erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                                ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea</p>
                            <ul class="list-inline text-white m-0">
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</li>
                                <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Lorem ipsum dolor sit amet</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Sign Up Form</h1>
                            <form class="mb-5" action="handle_signup" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control bg-transparent border-primary p-4" placeholder="User Name" name="name"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control bg-transparent border-primary p-4" placeholder="email" name="email"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control bg-transparent border-primary p-4" placeholder="Password" name="password"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control bg-transparent border-primary p-4" placeholder="Confirm Password"
                                        required="required" name="cpass" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation End -->    

    </x-slot>
</x-layout>