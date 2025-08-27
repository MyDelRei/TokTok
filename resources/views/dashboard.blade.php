@extends('app')

@section('title', 'Admin Dashboard')
@section('content')
<div class="overflow-y-auto max-h-[900px] siemreap-regular max-w-7xl mx-auto space-y-6 p-4">

    <!-- Page Header -->
    <header class="pb-4">
        <h1 class="text-4xl font-bold text-gray-800">កម្រងទិន្នន័យ</h1>
    </header>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">សៀវភៅកំពុងខ្ចី</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $borrowBooks }}</p>
        </div>
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">សៀវភៅបានត្រឡប់</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $checkInBooks }}</p>
        </div>
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">លើសកាលកំណត់</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $overdue }}</p>
        </div>
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">សៀវភៅបាត់</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $lostBooks }}</p>
        </div>
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">សៀវភៅសរុប</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBooks }}</p>
        </div>
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">អ្នកទស្សនា​សរុប</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalVisitors }}</p>
        </div>
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">សមាជិក</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalMembers }}</p>
        </div>
        <div class="bg-white rounded-md shadow-md p-6">
            <p class="text-gray-500 text-sm uppercase font-semibold">ប្រាក់ចំណូល</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($revenue) }} ៛</p>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Borrow Record Chart -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">កំណត់ត្រាការខ្ចីសៀវភៅ</h2>
            <canvas id="borrowRecord" class="w-full h-64"></canvas>
        </div>

        <!-- Overdue Table -->
        <div class="bg-white rounded-xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">លើសកាលកំណត់</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">សមាជិក#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">សៀវភៅ</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">លេខ ISBN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ស្ថានភាព</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ពិន័យ</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($overdueRecords as $record)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $record->user->user_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $record->book->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $record->book->isbn }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">លើសកាលកំណត់</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">${{ number_format($record->penalty, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">មិនមានកំណត់ត្រាលើសកាលកំណត់</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <!-- Check-Out Transactions Table -->
    <div class="bg-white rounded-xl shadow-md p-6 overflow-x-auto">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">ប្រតិបត្តិការចេញសៀវភៅ</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">សមាជិក #</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ឈ្មោះសមាជិក</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ចំណងជើង</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ប្រភេទ</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">លេខ ISBN</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">កាលបរិច្ឆេទចេញសៀវភៅ</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">កាលបរិច្ឆេទត្រឡប់</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($checkoutRecords as $record)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">#{{ $record->user->user_id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $record->user->full_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $record->book->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $record->book->category->category_name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $record->book->isbn }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($record->check_out_date)->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $record->check_in_date ? \Carbon\Carbon::parse($record->check_in_date)->format('Y-m-d') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">មិនមានកំណត់ត្រាចេញសៀវភៅ</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('borrowRecord').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [
                {
                    label: 'Checked Out',
                    data: @json($checkedOutData),
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Checked In',
                    data: @json($checkedInData),
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.2)',
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
</script>
@endsection
