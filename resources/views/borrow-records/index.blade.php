@extends('app')

@section('title', 'Borrow List')

@section('content')
    <div class="bg-gray-100 p-[30px] min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold mb-2 text-gray-800 siemreap-regular">អ្នកខ្ចីសៀវភៅ</h1>
                <p class="text-md text-gray-500 siemreap-regular">មើល ឬ បន្ថែមអ្នកខ្ចីសៀវភៅថ្មី</p>
            </div>
            <div class="flex space-x-4 items-center">
                <div class="relative">
                    <form method="GET" action="{{ route('borrow-records.index') }}" class="relative">
                        <input type="text"
                               name="q"
                               value="{{ request('q') }}"
                               class="w-full bg-white py-2 border border-gray-300 rounded-full pl-10 pr-4 focus:outline-none focus:border-green-800 transition duration-200 siemreap-regular text-md"
                               placeholder="ស្វែងរកសៀវភៅ">
                        <svg class="text-gray-400 w-5 h-5 absolute top-2.5 left-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92 c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17 s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                        </svg>
                    </form>
                </div>
                <a href="{{ route('borrow-records.create') }}"  class="px-5 py-2 rounded-3xl bg-green-900 text-white font-medium hover:bg-green-700 transition duration-200 inline-flex items-center space-x-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <span class="siemreap-regular">បន្ថែមអ្នកខ្ចីសៀវភៅ</span>
                </a>
            </div>
        </div>

        <table class="w-full mt-6 border-collapse shadow-sm rounded-xl overflow-hidden">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">លេខសមាជិក</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">សមាជិក</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">សៀវភៅ</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">អ្នកនិពន្ធ</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">ថ្ងៃខ្ចី</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">ថ្ងៃសង</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">កែប្រែទិន្នន័យ</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($records as $record)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4 text-sm text-gray-700 siemreap-regular">#{{ $record->user_id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 siemreap-regular">{{ $record->user->full_name ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 siemreap-regular">{{ $record->book->title ?? '-' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 siemreap-regular">{{ $record->book->authors->pluck('author_name')->join(', ')}}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 siemreap-regular">{{ $record->check_out_date }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 siemreap-regular">{{ $record->check_in_date }}</td>
                    
                    <td class="px-6 ​py-4 flex items-center justify-center text-sm font-medium">
                        @if($record->borrow_status == 'checked_out' || $record->borrow_status == 'over_due')
                            <!-- Return Button -->
                            <form action="{{ route('borrow-records.return', $record->br_id) }}" method="POST" onsubmit="return confirm('តើអ្នកចង់សងសៀវភៅនេះមែនទេ?')">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded">សង</button>
                            </form>

                            <!-- Extend Button -->
                            <form action="{{ route('borrow-records.extend', $record->br_id) }}" method="POST" onsubmit="return confirm('តើអ្នកចង់បន្តអានសៀវភៅនេះមែនទេ?')">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="px-3 py-1 bg-yellow-500 text-white rounded">បន្តអាន</button>
                            </form>
                        @elseif($record->borrow_status == 'checked_in')
                            <span class="px-3 py-1 bg-gray-400 text-white rounded">បានសង</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <div class="flex items-center justify-between">
                <div class="siemreap-regular text-sm text-gray-700">
                    សរុបទិន្នន័យ: {{ $records->count() }}
                </div>
            </div>
        </div>
    </div>
@endsection
