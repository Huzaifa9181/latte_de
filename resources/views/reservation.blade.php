<x-layout>
    <x-slot name="title">Latte Da - Reservation</x-slot>
    <x-slot name="data">
        <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Reservation</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Reservation</p>
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
                                <h1 class="display-3 text-primary">30% OFF</h1>
                                <h1 class="text-white">For Online Reservation</h1>
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
                            @if(session('loggedin') == 'true')
                            <h1 class="text-white mb-4 mt-5">Book Your Table</h1>
                                <form class="mb-5" action="handle_book" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control bg-transparent border-primary p-4" name="name" placeholder="Name"
                                            required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control bg-transparent border-primary p-4" name="email" placeholder="Email"
                                            required="required" />
                                    </div>
                                    <div class="form-group">
                                        <div class="date" id="date" data-target-input="nearest">
                                            <input type="date" name="date" class="form-control bg-transparent border-primary p-4 datetimepicker-input" placeholder="Date"  required="required"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="time" id="time" data-target-input="nearest">
                                            <input type="text" name="time" class="form-control bg-transparent border-primary p-4 datetimepicker-input" placeholder="Time" data-target="#time" required="required" data-toggle="datetimepicker"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select bg-transparent border-primary px-4" required="required" name="person" style="height: 49px;">
                                            <option selected>Person</option>
                                            <option value="1">Person 1</option>
                                            <option value="2">Person 2</option>
                                            <option value="3">Person 3</option>
                                            <option value="4">Person 4</option>
                                            <option value="5">Person 5</option>
                                            <option value="6">Person 6</option>
                                            
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Book Now</button>
                                    </div>
                                </form>
                            @else
                            <h1 class="text-white mb-4 mt-5">First You Logged In Then Book Your Table</h1>
                            @endif    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation End -->
    </x-slot>
</x-layout>