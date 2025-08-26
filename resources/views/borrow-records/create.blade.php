@extends('app')

@section('title', 'Add Borrow Record')

@section('content')
    <div class="bg-gray-100 p-[30px] min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold mb-2 text-gray-800 siemreap-regular">បង្កើតការខ្ចីសៀវភៅថ្មី</h1>
                <p class="text-md text-gray-500 siemreap-regular">បញ្ចូលព័ត៌មានសម្រាប់ការខ្ចីសៀវភៅ</p>
            </div>
            <a href="{{ route('borrow-records.index') }}" class="px-5 py-2 rounded-3xl bg-gray-500 text-white font-medium hover:bg-gray-600 transition duration-200 inline-flex items-center space-x-2 siemreap-regular">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>
                </svg>
                <span>ត្រលប់</span>
            </a>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form action="{{ route('borrow-records.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow-sm">
            @csrf

            <div class="grid grid-cols-2 gap-6">
                <!-- User -->
                <div>
                    <label for="user_search" class="block mb-2 text-md font-semibold text-gray-700 siemreap-regular">លេខសមាជិក</label>
                    <input type="text" id="user_search" class="w-full bg-white py-2 border border-gray-300 rounded-full px-4 focus:outline-none focus:border-green-800 transition duration-200 siemreap-regular text-md"​ placeholder="លេខសមាជិក">
                    <input type="hidden" name="user_id" id="user_id">
                    @error('user_id')
                    <span class="text-red-500 text-sm siemreap-regular">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Book -->
                <div>
                    <label for="book_search" class="block mb-2 text-md font-semibold text-gray-700 siemreap-regular">សៀវភៅ</label>
                    <input type="text" id="book_search" class="w-full bg-white py-2 border border-gray-300 rounded-full px-4 focus:outline-none focus:border-green-800 transition duration-200 siemreap-regular text-md" placeholder="ស្វែងរកសៀវភៅ">
                    <input type="hidden" name="book_id" id="book_id">
                    @error('book_id')
                    <span class="text-red-500 text-sm siemreap-regular">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block mb-2 text-md font-semibold text-gray-700 siemreap-regular">ចំនួន</label>
                    <input type="number"
                           id="quantity"
                           name="quantity"
                           value="{{ old('quantity', 1) }}"
                           min="1"
                           class="w-full bg-white py-2 border border-gray-300 rounded-full px-4 focus:outline-none focus:border-green-800 transition duration-200 siemreap-regular text-md">
                    @error('quantity')
                    <span class="text-red-500 text-sm siemreap-regular">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Check Out Date -->
                <div>
                    <label for="check_out_date" class="block mb-2 text-md font-semibold text-gray-700 siemreap-regular">ថ្ងៃខ្ចី</label>
                    <input type="date"
                           id="check_out_date"
                           name="check_out_date"
                           value="{{ old('check_out_date', now()->format('Y-m-d')) }}"
                           class="w-full bg-white py-2 border border-gray-300 rounded-full px-4 focus:outline-none focus:border-green-800 transition duration-200 siemreap-regular text-md">
                    @error('check_out_date')
                    <span class="text-red-500 text-sm siemreap-regular">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Auto Check In Date (display only, hidden input for form submission) -->
                <div>
                    <label for="check_in_date_display" class="block mb-2 text-md font-semibold text-gray-700 siemreap-regular">ថ្ងៃសង (Auto 14 Days)</label>
                    <input type="text"
                           id="check_in_date_display"
                           class="w-full bg-gray-100 py-2 border border-gray-300 rounded-full px-4 focus:outline-none siemreap-regular text-md"
                           readonly
                           value="{{ old('check_in_date', now()->addDays(14)->format('Y-m-d')) }}">
                    <input type="hidden"
                           id="check_in_date"
                           name="check_in_date"
                           value="{{ old('check_in_date', now()->addDays(14)->format('Y-m-d')) }}">
                    <small class="text-gray-500 siemreap-regular">សងក្រោយ ១៤ថ្ងៃ ពីថ្ងៃខ្ចី</small>
                    @error('check_in_date')
                    <span class="text-red-500 text-sm siemreap-regular">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Penalty -->
                <div>
                    <label class="block mb-2 text-md font-semibold text-gray-700 siemreap-regular">ពិន័យ</label>
                    <input type="text"
                           id="penalty"
                           value="0 $"
                           class="w-full bg-gray-100 py-2 border border-gray-300 rounded-full px-4 focus:outline-none siemreap-regular text-md"
                           readonly>
                    <small class="text-gray-500 siemreap-regular">0.5$/ថ្ងៃ បើសងលើស ១៤ថ្ងៃ</small>
                </div>

                <!-- Submit Button -->
                <div class="col-span-2 flex justify-end mt-6">
                    <button type="submit" class="px-5 py-2 rounded-3xl bg-green-900 text-white font-medium hover:bg-green-700 transition duration-200 inline-flex items-center space-x-2 siemreap-regular">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                        </svg>
                        <span>រក្សាទុក</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#user_search").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('users.search') }}",
                        data: {
                            q: request.term
                        },
                        dataType: "json",
                        cache: false,
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.text,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $('#user_id').val(ui.item.value);
                    $('#user_search').val(ui.item.label);
                    return false;
                }
            });

            $("#book_search").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('books.search') }}",
                        data: {
                            q: request.term
                        },
                        dataType: "json",
                        cache: false,
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.text,
                                    value: item.id
                                };
                            }));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $('#book_id').val(ui.item.value);
                    $('#book_search').val(ui.item.label);
                    return false;
                }
            });

            // Function to calculate and update check-in date (check-out date + 14 days)
            function updateCheckIn() {
                let checkOutInput = $('#check_out_date').val();
                let checkInDateDisplay = $('#check_in_date_display');
                let checkInDateHidden = $('#check_in_date');

                if (checkOutInput) {
                    let checkOut = new Date(checkOutInput);
                    if (!isNaN(checkOut.getTime())) {
                        checkOut.setDate(checkOut.getDate() + 14);
                        let year = checkOut.getFullYear();
                        let month = String(checkOut.getMonth() + 1).padStart(2, '0');
                        let day = String(checkOut.getDate()).padStart(2, '0');
                        let formatted = `${year}-${month}-${day}`;
                        checkInDateDisplay.val(formatted);
                        checkInDateHidden.val(formatted);
                    } else {
                        checkInDateDisplay.val('');
                        checkInDateHidden.val('');
                    }
                } else {
                    let defaultDate = new Date();
                    defaultDate.setDate(defaultDate.getDate() + 14);
                    let year = defaultDate.getFullYear();
                    let month = String(defaultDate.getMonth() + 1).padStart(2, '0');
                    let day = String(defaultDate.getDate()).padStart(2, '0');
                    let formatted = `${year}-${month}-${day}`;
                    checkInDateDisplay.val(formatted);
                    checkInDateHidden.val(formatted);
                }
            }

            // Run on page load
            updateCheckIn();

            // Update in real-time on input or change
            $('#check_out_date').on('input change', function() {
                updateCheckIn();
            });
        });
    </script>
@endpush