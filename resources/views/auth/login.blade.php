@extends('layouts.auth')

{{-- title -> --}}
@section('title', 'Sign In')

{{-- content -> --}}
@section('content')

    <div class="min-h-screen">
        <div class="grid lg:grid-cols-2">

            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form-->
            <div class="px-4 lg:px-[91px] pt-10">


                <!-- Logo Brand -->
                <a href="{{ route('index') }}" class="inline-flex items-center flex-shrink-0">
                    <img class="h-12 lg:h-16" src="{{ asset('assets/frontsite/images/logo.png') }}" alt="Meet Doctor Logo" />
                </a>

                <div class="flex flex-col justify-center h-screen py-14 lg:min-h-screen">
                    <h2 class="text-[#1E2B4F] text-4xl font-semibold leading-normal">
                        Improve Your <br />
                        Health With Expert
                    </h2>
                    <div class="mt-12">

                        <!-- Form input -->
                        <form method="POST" action="{{ route('login') }}" class="grid gap-6">
                            {{-- token, wajib untuk melakukan request --}}
                            @csrf

                            <label class="block">
                                <input type="email" id="email" name="email" value="{{ Request::old('email') }}" autofocus required
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Email Address" />
                                     {{-- untuk pesan errornya jika ada --}}
                                    @if ($errors->has('email'))
                                        <p class="mb-3 text-sm text-red-500"> {{$errors->first('email')}} </p>
                                    @endif
                            </label>

                            <label class="block">
                                <input type="password"
                                    name="password" id="password" autocomplete="current-password"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Password" />
                                    {{-- untuk pesan errornya jika ada --}}
                                    @if ($errors->has('password'))
                                    <p class="mb-3 text-sm text-red-500"> {{$errors->first('password')}} </p>
                                @endif
                            </label>

                            <div class="grid gap-6 mt-10">
                                <button
                                    type="submit"
                                    class="text-center text-white text-lg font-medium bg-[#0D63F3] px-10 py-4 rounded-full">
                                    Sign In
                                </button>
                                <a href="{{ route('register', []) }}"
                                    class="text-center text-lg text-[#1E2B4F] font-medium bg-[#F2F6FE] px-10 py-4 rounded-full">
                                    New Account
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End Form -->

            <!-- Qoute -->
            <div class="hidden sm:block bg-[#F9FBFC]">
                <div class="flex flex-col justify-center h-full px-24 pt-10 pb-20">
                    <div class="relative">
                        <div class="relative top-0 -left-5 mb-7">
                            <img src="{{ asset('assets/frontsite/images/blockqoutation.svg') }}" class="h-[30px]"
                                alt="" />
                        </div>
                        <p class="text-2xl leading-loose">
                            MeetDoctor telah membantu saya terhubung dengan dokter yang
                            professional dan memberikan dampak yang sangat besar kepada
                            kesehatan yang baik kepada saya
                        </p>
                        <div class="flex-shrink-0 block group mt-7">
                            <div class="flex items-center">
                                <div class="ring-1 ring-[#0D63F3] ring-offset-4 rounded-full">
                                    <img class="inline-block rounded-full h-14 w-14"
                                        src="{{ asset('assets/frontsite/images/patient-testimonial.png') }}"
                                        alt="" />
                                </div>
                                <div class="ml-5">
                                    <p class="font-medium text-[#1E2B4F]">Shayna</p>
                                    <p class="text-sm text-[#AFAEC3]">Product Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Qoute -->

        </div>
    </div>

@endsection
