@extends('app')

@section('title', 'Checkin')

@section('content')
    <section class="max-w-6xl mx-auto p-10">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div id="status-message" class="hidden mb-4"></div>

        <form action="{{ route('checkins.store') }}" method="POST">
            @csrf
            <div class="flex flex-col mb-10">
                <label for="user_id" class="siemreap-regular ml-2">លេខសមាជិក</label>
                <input type="text" name="user_id" id="user_id"
                       value="{{ old('user_id') }}"
                       placeholder="បញ្ចូលលេខសមាជិក"
                       class="w-full siemreap-regular rounded-full border border-gray-300 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-green-800">
                @error('user_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col mb-10">
                <label for="book_id" class="siemreap-regular ml-2">លេខសៀវភៅ</label>
                <input type="text" name="book_id" id="book_id"
                       value="{{ old('book_id') }}"
                       placeholder="បញ្ចូលលេខសៀវភៅ"
                       class="w-full siemreap-regular rounded-full border border-gray-300 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-green-800">
                @error('book_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-5 max-sm:gap-2">
                <div class="flex flex-col mb-5 w-3/4">
                    <label for="qty" class="siemreap-regular ml-2">ចំនួន</label>
                    <input type="number" name="qty" id="qty"
                           value="{{ old('qty', 1) }}"
                           placeholder="បញ្ចូលចំនួន"
                           class="w-full siemreap-regular rounded-full border border-gray-300 py-3 px-4 focus:outline-none focus:ring-1 focus:ring-green-800">
                    @error('qty')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/4">
                    <button type="submit" class="w-full flex items-center justify-center gap-2 siemreap-regular bg-green-900 text-white px-2 py-3 rounded-full cursor-pointer hover:bg-green-800 transition duration-200">
                        បន្ត
                        <svg class="" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 5L19 12L12 19" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userIdInput = document.getElementById('user_id');
            const bookIdInput = document.getElementById('book_id');
            const statusMessage = document.getElementById('status-message');

            function checkStatus() {
                if (userIdInput.value && bookIdInput.value) {
                    fetch('{{ route("checkins.check-status") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        body: JSON.stringify({
                            user_id: userIdInput.value,
                            book_id: bookIdInput.value
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            statusMessage.classList.remove('hidden');
                            if (data.status === 'error') {
                                statusMessage.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4';
                                statusMessage.textContent = data.message;
                            } else {
                                const record = data.data;
                                statusMessage.className = 'bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4';
                                statusMessage.textContent = កាលបរិច្ឆេទត្រូវត្រឡប់: ${record.dueDate} +
                                    (record.isOverdue ?  (យឺតយ៉ាវ ${record.daysOverdue} ថ្ងៃ) : '');
                            }
                        });
                }
            }

            userIdInput.addEventListener('blur', checkStatus);
            bookIdInput.addEventListener('blur', checkStatus);
        });
    </script>
@endpush