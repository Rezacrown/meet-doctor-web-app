@extends('layouts.default')

{{-- title --}}
@section('title', 'Payment')

{{-- additional code -> --}}
@push('after-syle')
<link
rel="stylesheet"
href="{{ url('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', []) }}"
/>
@endpush


{{-- content -> --}}
@section('content')
<div class="min-h-screen">
    <div
      class="grid px-4 pb-20 mx-auto max-w-7xl lg:grid-cols-12 pt-14 lg:pt-20 lg:pb-28 lg:divide-x lg:px-16"
    >
      <!-- Detail Payment -->
      <div class="lg:col-span-7 lg:pl-8 lg:pr-20">
        <!-- Doctor Information -->
        <div class="flex flex-wrap items-center space-x-5">
          <div class="flex-shrink-0">
            <img
              src="assets/frontsite/images/doctor-1.png"
              class="object-cover object-top w-20 h-20 bg-center rounded-full"
              alt="Doctor 1"
            />
          </div>

          <div class="flex-1 space-y-1">
            <div class="text-[#1E2B4F] text-lg font-semibold">
              Dr. Galih Pratama
            </div>
            <div class="text-[#AFAEC3]">Cardiologist</div>

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
            <div class="text-[#1E2B4F] font-medium">Jantung sesak</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Level</div>
            <div class="text-[#1E2B4F] font-medium">Medium</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Dijadwalkan pada</div>
            <div class="text-[#1E2B4F] font-medium">12 Januari 2022</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Waktu</div>
            <div class="text-[#1E2B4F] font-medium">15:30 PM</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Status</div>
            <div class="text-[#1E2B4F] font-medium">Waiting for Payment</div>
          </div>
        </div>

        <!-- Payment Information -->
        <div class="mt-16">
          <h5 class="text-[#1E2B4F] text-lg font-semibold">
            Payment Information
          </h5>
          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Biaya konsultasi</div>
            <div class="text-[#1E2B4F] font-medium">$5,000</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Fee dokter</div>
            <div class="text-[#1E2B4F] font-medium">$200</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Fee hospital</div>
            <div class="text-[#1E2B4F] font-medium">$10</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">VAT 20%</div>
            <div class="text-[#1E2B4F] font-medium">$372</div>
          </div>

          <div class="flex items-center justify-between mt-5">
            <div class="text-[#AFAEC3] font-medium">Grand total</div>
            <div class="text-[#2AB49B] font-semibold">$6,500</div>
          </div>
        </div>
      </div>

      <!-- Choose Payment -->
      <div class="mt-10 lg:col-span-5 lg:pl-20 lg:pr-7 lg:mt-0">
        <h3 class="text-[#1E2B4F] text-3xl font-semibold leading-normal">
          Choose Your <br />
          Payment Method
        </h3>
        <form action="" x-data="{ payment: '' }" class="mt-8">
          <!-- List Payment -->
          <div class="grid grid-cols-2 gap-5 sm:grid-cols-4 lg:grid-cols-2">
            <div class="relative">
              <input
                type="radio"
                name="payment"
                x-model="payment"
                value="master-card"
                id="master-card"
                class="sr-only peer"
              />
              <label
                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                for="master-card"
              >
                <img
                  src="assets/frontsite/images/master-card.png"
                  class="max-h-[50px] inline-block"
                  alt="Master card"
                />
              </label>
            </div>

            <div class="relative">
              <input
                type="radio"
                name="payment"
                x-model="payment"
                value="visa"
                id="visa"
                class="sr-only peer"
              />
              <label
                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                for="visa"
              >
                <img
                  src="/assets/frontsite/images/visa.png"
                  class="max-h-[50px] inline-block"
                  alt="Master card"
                />
              </label>
            </div>

            <div class="relative">
              <input
                type="radio"
                name="payment"
                x-model="payment"
                value="cirrus"
                id="cirrus"
                class="sr-only peer"
              />
              <label
                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                for="cirrus"
              >
                <img
                  src="/assets/frontsite/images/cirrus.png"
                  class="max-h-[50px] inline-block"
                  alt="Master card"
                />
              </label>
            </div>

            <div class="relative">
              <input
                type="radio"
                name="payment"
                x-model="payment"
                value="mewallet"
                id="mewallet"
                class="sr-only peer"
              />
              <label
                class="flex flex-col justify-center items-center bg-white border-[#EDEDED] cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-[#0D63F3] peer-checked:ring-2 peer-checked:border-transparent rounded-3xl border-2 p-7"
                for="mewallet"
              >
                <img
                  src="/assets/frontsite/images/mewallet.png"
                  class="max-h-[50px] inline-block"
                  alt="Master card"
                />
                <div class="text-[11px] sm:text-sm mt-3">Balance: $18,000</div>
              </label>
            </div>
          </div>

          <div class="grid mt-10">
            <!--
              button when payment is filled.
            -->
            <a
              href="booking-success.html"
              class="bg-[#0D63F3] text-white px-10 py-3 rounded-full text-center"
              x-show="payment.length"
            >
              Pay Now
            </a>

            <!--
              button when payment is empty.
            -->
            <span
              x-show="!payment.length"
              class="bg-[#C0CADA] text-[#808997] cursor-not-allowed px-10 py-3 rounded-full text-center"
            >
              Pay Now
            </span>
          </div>
        </form>
      </div>
      
    </div>
  </div>
@endsection




