@extends('layouts.default')

{{-- title --}}
@section('title', 'Payment')

{{-- additional code -> --}}
@push('after-syle')
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', []) }}" />
@endpush


{{-- content -> --}}
@section('content')
    <div class="min-h-screen">
        <div class="grid px-4 pb-20 mx-auto max-w-7xl lg:grid-cols-12 pt-14 lg:pt-20 lg:pb-28 lg:divide-x lg:px-16">
            <!-- Detail Payment -->
            <div class="lg:col-span-7 lg:pl-8 lg:pr-20">
                <!-- Doctor Information -->
                <div class="flex flex-wrap items-center space-x-5">
                    <div class="flex-shrink-0">
                        <img src="{{ $appointment?->doctor?->photo ? url(Storage::url($appointment->doctor?->photo)) : '' }}"
                            class="object-cover object-top w-20 h-20 bg-center rounded-full" alt="Doctor 1" />
                    </div>

                    <div class="flex-1 space-y-1">
                        <div class="text-[#1E2B4F] text-lg font-semibold">
                            Dr. Galih Pratama
                        </div>
                        <div class="text-[#AFAEC3]">{{ $appointment->doctor->specialist->name ?? '' }}</div>

                        <!--
                                  Icon when mobile is show.
                                  star icon mobile: "flex/show", star icon dekstop: "hidden"
                                -->
                        <div class="flex items-center lg:hidden gap-x-2">
                            <div class="flex items-center gap-2">

                                {{-- rating start --}}
                                @include('pages.frontsite.payment.rating')
                                {{-- end rating start --}}

                            </div>
                            <span class="text-[#1E2B4F] font-medium"> (12,495) </span>
                        </div>
                    </div>

                    <!--
                                  Icon when desktop is show.
                                  star icon mobile: "hidden", star icon dekstop: "flex/show"
                              -->
                    <div class="items-center hidden lg:flex gap-x-2">
                        <div class="flex items-center gap-2">

                            {{-- rating start --}}
                            @include('pages.frontsite.payment.rating')
                            {{-- end rating start --}}

                        </div>
                        <span class="text-[#1E2B4F] font-medium"> (12,495) </span>
                    </div>
                </div>

                <!-- Appoinment Information -->
                <div class="mt-16">
                    <h5 class="text-[#1E2B4F] text-lg font-semibold">Appointment</h5>
                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Kebutuhan konsultasi</div>
                        <div class="text-[#1E2B4F] font-medium">{{ $appointment->consultation->name ?? 'N/A' }}</div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Level</div>
                        <div class="text-[#1E2B4F] font-medium">
                            @switch($appointment->level)
                                @case(1)
                                    Low
                                @break

                                @case(2)
                                    Medium
                                @break

                                @case(3)
                                    High
                                @break

                                @default
                                    {{ 'N/A' }}
                            @endswitch
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Dijadwalkan pada</div>
                        <div class="text-[#1E2B4F] font-medium">
                            {{-- langsung format datetimenya dengan date format bawaan PHP nya --}}
                            {{ date('d F Y', strtotime($appointment->date)) ?? '' }}
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Waktu</div>
                        <div class="text-[#1E2B4F] font-medium">
                            {{-- format dulu ke time, karena jika diambil dari DB maka akan otomatis di convert ke string --}}
                            {{ date('H:i', strtotime($appointment->time)) ?? '' }}
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Status</div>
                        <div class="text-[#1E2B4F] font-medium">
                            @if ($appointment->status == 1)
                                {{ 'Payment Completed' }}
                            @elseif ($appointment->status == 2)
                                {{ 'Waiting Payment' }}
                            @else
                                {{ 'N/A' }}
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="mt-16">
                    <h5 class="text-[#1E2B4F] text-lg font-semibold">
                        Payment Information
                    </h5>
                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Biaya konsultasi</div>
                        <div class="text-[#1E2B4F] font-medium">
                            {{ 'IDR ' . number_format($appointment->doctor->specialist->price) ?? '' }}
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Fee dokter</div>
                        <div class="text-[#1E2B4F] font-medium">
                            {{ 'IDR ' . number_format($appointment->doctor->fee) ?? '' }}
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Fee hospital</div>
                        <div class="text-[#1E2B4F] font-medium">
                            {{ 'IDR ' . number_format($config_payment->fee) ?? '' }}
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">VAT 20%</div>
                        <div class="text-[#1E2B4F] font-medium">
                            {{ 'IDR ' . number_format($total_with_vat) ?? '' }}

                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-5">
                        <div class="text-[#AFAEC3] font-medium">Grand total</div>
                        <div class="text-[#2AB49B] font-semibold">
                            {{ 'IDR ' . number_format($grand_total) ?? '' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Choose Payment -->
            <div class="mt-10 lg:col-span-5 lg:pl-20 lg:pr-7 lg:mt-0">
                <h3 class="text-[#1E2B4F] text-3xl font-semibold leading-normal">
                    Choose Your <br />
                    Payment Method
                </h3>


                <form method="POST" action="{{ route('payment.store', []) }}" x-data="{ payment: '' }" class="mt-8">

                    @csrf

                    <!-- List Payment -->
                    <div class="grid grid-cols-2 gap-5 sm:grid-cols-4 lg:grid-cols-2">
                        <div class="relative">
                            <input type="radio" name="payment" x-model="payment" value="master-card" id="master-card"
                                class="sr-only peer" />
                            <label
                                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                                for="master-card">
                                <img src="{{ asset('assets/frontsite/images/master-card.png') }}"
                                    class="max-h-[50px] inline-block" alt="Master card" />
                            </label>
                        </div>

                        <div class="relative">
                            <input type="radio" name="payment" x-model="payment" value="visa" id="visa"
                                class="sr-only peer" />
                            <label
                                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                                for="visa">
                                <img src="{{ asset('/assets/frontsite/images/visa.png') }}"
                                    class="max-h-[50px] inline-block" alt="Master card" />
                            </label>
                        </div>

                        <div class="relative">
                            <input type="radio" name="payment" x-model="payment" value="cirrus" id="cirrus"
                                class="sr-only peer" />
                            <label
                                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                                for="cirrus">
                                <img src="{{ asset('/assets/frontsite/images/cirrus.png') }}"
                                    class="max-h-[50px] inline-block" alt="Master card" />
                            </label>
                        </div>

                        <div class="relative">
                            <input type="radio" name="payment" x-model="payment" value="mewallet" id="mewallet"
                                class="sr-only peer" />
                            <label
                                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                                for="mewallet">
                                <img src="{{ asset('/assets/frontsite/images/mewallet.png') }}"
                                    class="max-h-[50px] inline-block" alt="Master card" />
                                <div class="text-[11px] sm:text-sm mt-3">Balance: $18,000</div>
                            </label>
                        </div>
                    </div>

                    {{-- appointment_id --}}
                    <input type="hidden" name="appointment_id" value="{{ $id ?? '' }}">
                    {{-- appointment_id end --}}

                    <div class="grid mt-10">
                        <!--
                                  button when payment is filled.
                                -->
                        <button type="submit" class="bg-[#0D63F3] text-white px-10 py-3 rounded-full text-center"
                            x-show="payment.length">
                            Pay Now
                        </button>

                        <!--
                                  button when payment is empty.
                                -->
                        <button x-show="!payment.length"
                            class="bg-[#C0CADA] text-[#808997] cursor-not-allowed px-10 py-3 rounded-full text-center">
                            Pay Now
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
