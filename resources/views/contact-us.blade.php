@extends('layout')

@section('title')
    Contact Us
@endsection

@section('content')
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://t4.ftcdn.net/jpg/04/81/72/77/360_F_481727770_1u2ylNpie8WRosMVbv1COXDnnEK6ofwh.jpg"
                     class="d-block w-100" alt="Contact Us">
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 align-self-center">
                <div class="card border-0 shadow p-4">
                    <h3 class="text-center mb-5">Contact US!</h3>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                           {{ session('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('contact_us.store') }}" novalidate>
                        @csrf
                        <div class="row g-4">
                            <div class="col-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror "
                                       name="name" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}" placeholder="Email Address">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                          placeholder="Enter your message">{{ old('message') }}</textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col text-center">
                                <button class="btn w-100 btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54127.980309009785!2d35.82980085708524!3d32.01514702534432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca1da1f187f75%3A0xbecd0cd5d805732f!2sAmazon!5e0!3m2!1sen!2sjo!4v1692973816450!5m2!1sen!2sjo"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100"></iframe>
            </div>
        </div>
    </div>
@endsection
