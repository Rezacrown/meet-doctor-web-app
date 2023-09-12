@extends('layouts.auth')


@section('title', 'profile')


@section('content')

    <div class="min-h-screen mx-40">
        <div class="grid lg:grid-cols-2">
            <!-- Form -->
            <div class="px-4 lg:px-[91px] pt-10">

                <!-- Logo Brand -->
                <a href="{{ route('index', []) }}" class="inline-flex items-center flex-shrink-0">
                    <img class="h-12 lg:h-16" src="{{ asset('assets/frontsite/images/logo.png') }}" alt="Meet Doctor Logo" />
                </a>

                <div class="flex flex-col justify-center h-full py-14 lg:min-h-screen">
                    <h2 class="text-[#1E2B4F] text-4xl font-semibold leading-normal">
                        Update Your Profile Data<br />
                    </h2>
                    <div class="mt-12">


                        <!-- Form input -->
                        <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update', [$user->id]) }}" class="grid gap-6">
                            @method('PUT')
                            @csrf
                            {{-- taruh @csrf setelah pembukaan form --}}

                            <label class="block">
                                <input type="text" name="name" id="name"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Complete Name" value="{{ $user->name }}" required autofocus />
                                @if ($errors->has('name'))
                                    <p class="mb-3 text-red-500 text-text-sm"> {{ $errors->first('name') }} </p>
                                @endif
                            </label>

                            {{-- <label class="block">
                                <input type="text" name="age"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Age" value="{{ $request->old('age') }}" required autofocus />
                            </label> --}}

                            <label class="block">
                                <input type="email" name="email" id="email"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Email Address" value="{{ $user->email }}" required autofocus />
                                {{-- @if ($errors->has('email'))
                                        <p class="mb-3 text-sm text-red-500"> {{$errors->first('email')}} </p>
                                    @endif --}}
                                {{-- cara lain --}}
                                @error('email')
                                    {{-- $message untuk nampilin error --}}
                                    <span
                                        class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-lg">{{ $message }}</span>
                                @enderror
                            </label>


                            <label class="block">
                                <input type="text" name="contact" id=""
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Your contact" value="{{ $user->detail_user->contact ?? '' }}" autofocus />
                            </label>

                            <label class="block">
                                <input type="text" name="address" id=""
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Your address" value="{{ $user->detail_user->address ?? '' }}" autofocus />
                            </label>

                            <label class="block">
                                <input type="number" name="age" id=""
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Your age" value="{{ $user->detail_user->age ?? '' }}" autofocus />
                            </label>

                            <label class="block">
                                <select name="gender"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    autofocus>

                                    @if (isset($user->detail_user->gender) && $user->detail_user->gender)
                                        <option selected disabled value="{{ $user->detail_user->gender }}">
                                          Selected {{ $user->detail_user->gender == 1 ? 'Pria' : 'Wanita' }}
                                        </option>
                                    @endif

                                    <option value="1">Pria</option>
                                    <option value="2">Wanita</option>
                                </select>
                            </label>


                            <label class="block">
                                <input type="file" name="photo" id="photo"
                                    class="block w-full rounded-full py-4 text-[#1E2B4F] font-medium placeholder:text-[#AFAEC3] placeholder:font-normal px-7 border border-[#d4d4d4] focus:outline-none focus:border-[#0D63F3]"
                                    placeholder="Your photo" autofocus />
                                {{-- <img src="" alt=""> --}}
                            </label>





                            <div class="grid gap-6 mx-auto mt-10">
                                <button type="submit"
                                    class="text-center text-white text-lg font-medium bg-[#0D63F3] px-10 py-4 rounded-full">
                                    Save
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End Form -->

        </div>
    </div>


@endsection
