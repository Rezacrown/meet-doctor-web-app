@extends('layouts.default')

@section('title', 'Dashboard')



@section('content')



    <div class="container relative mx-auto mt-20 overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-lg">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3 text-lg">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3 text-lg">
                        Consultation
                    </th>
                    <th scope="col" class="px-6 py-3 text-lg">
                        Level
                    </th>
                    <th scope="col" class="px-6 py-3 text-lg">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse ($appointment as $key => $appointment_item)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row"
                            class="px-6 py-4 text-lg font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $appointment_item->date }}
                        </th>
                        <td class="px-6 py-4 text-lg">
                            {{ $appointment_item->users->name }}
                        </td>
                        <td class="px-6 py-4 text-lg font-medium">
                            {{ $appointment_item->consultation->name }}
                        </td>
                        <td class="px-6 py-4 text-lg">
                            @if ($appointment_item->level == 1)
                                <span class="px-2 py-1 text-white bg-blue-400 rounded-md">Low</span>
                            @elseif($appointment_item->level == 2)
                                <span class="px-2 py-1 text-white bg-yellow-400 rounded-md">Medium</span>
                            @else
                                <span class="px-2 py-1 text-white bg-red-400 rounded-md">High</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-lg">

                            @if ($appointment_item->status == 1)
                                <span class="px-2 py-1 text-white bg-green-400 rounded-md">success</span>
                            @else
                                <span class="px-2 py-1 text-white bg-yellow-500 rounded-md">Waiting Payment</span>
                            @endif
                        </td>
                    </tr>

                @empty
                    {{--  --}}
                @endforelse




            </tbody>
        </table>
    </div>



@endsection



{{-- style --}}
