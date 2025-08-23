@extends('app')

@section('title', 'Print Preview - User List')

@section('content')
<div class="bg-gray-100 p-[30px] min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h1 class="text-2xl font-bold mb-2 text-gray-800 siemreap-regular">ព្រីនតារាងសមាជិក</h1>
            <p class="text-gray-600 siemreap-regular">ជ្រើសរើសទិន្នន័យដែលចង់ព្រីន</p>
        </div>

        <!-- Print Options -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <form id="printForm" action="{{ route('users.print.pdf') }}" method="GET" target="_blank">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Print Options -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3 siemreap-regular">
                            ជ្រើសរើសចំនួនដែលចង់ព្រីន:
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" name="print_option" value="all" checked
                                       class="mr-2 text-green-600 focus:ring-green-500">
                                <span class="siemreap-regular">ព្រីនទាំងអស់ ({{ $users->count() }} សមាជិក)</span>
                            </label>
{{--                           <label class="flex items-center">--}}
{{--                                <input type="radio" name="print_option" value="5" class="mr-2 text-green-600 focus:ring-green-500">--}}
{{--                                <span class="siemreap-regular">ព្រីន 5 ដំបូង</span>--}}
{{--                            </label>--}}
{{--                            <label class="flex items-center">--}}
{{--                                <input type="radio" name="print_option" value="10" class="mr-2 text-green-600 focus:ring-green-500">--}}
{{--                                <span class="siemreap-regular">ព្រីន 10 ដំបូង</span>--}}
{{--                            </label>--}}
{{--                            <label class="flex items-center">--}}
{{--                                <input type="radio" name="print_option" value="20" class="mr-2 text-green-600 focus:ring-green-500">--}}
{{--                                <span class="siemreap-regular">ព្រីន 20 ដំបូង</span>--}}
{{--                            </label> --}}
                            <label class="flex items-center">
                                <input type="radio" name="print_option" value="custom" class="mr-2 text-green-600 focus:ring-green-500">
                                <span class="siemreap-regular">ព្រីនតាមចំនួនដែលកំណត់</span>
                            </label>
                        </div>

                        <!-- Custom Limit Input -->
                        <div id="customLimitDiv" class="mt-3 hidden">
                            <input type="number" name="custom_limit" min="1" max="{{ $users->count() }}" value=""
                                   class="w-full px-3 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-1 focus:ring-green-900 siemreap-regular"
                                   placeholder="បញ្ចូលចំនួន">
                        </div>
                    </div>

                    <!-- Preview Area -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3 siemreap-regular">
                            ទិន្នន័យ:
                        </label>
                        <div id="previewArea" class="border border-gray-200 rounded-md p-4 max-h-64 overflow-y-auto bg-gray-50">
                            <div id="previewContent">
                                <!-- Preview content will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center mt-6 pt-4 border-t">
                    <a href="{{ route('users.userList') }}"
                       class="px-4 py-2 text-gray-600 bg-gray-200 rounded-3xl    hover:bg-gray-300 transition duration-200 siemreap-regular">
                        បោះបង់
                    </a>
                    <div class="flex space-x-3">
                        <button type="button" id="previewBtn"
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 siemreap-regular cursor-pointer hidden">
                            មើលមុន
                        </button>
                        <button
                            type="submit"
                            class="px-6 py-2 bg-green-900 text-white rounded-3xl hover:bg-green-800 transition duration-200 siemreap-regular cursor-pointer flex gap-2"
                            >
                            <span>ព្រីនឥឡូវ</span>
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M17 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7zM7 7h7v2H7V7zm10 10H7v-2h10v2zm0-4H7v-2h10v2z"/>
                        </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const users = @json($users->all()); // ensure pure array
    const printOptions = document.querySelectorAll('input[name="print_option"]');
    const customLimitDiv = document.getElementById('customLimitDiv');
    const customLimitInput = document.querySelector('input[name="custom_limit"]');
    const previewContent = document.getElementById('previewContent');
    const previewBtn = document.getElementById('previewBtn');

    function updatePreview() {
        if (!users || users.length === 0) {
            previewContent.innerHTML = `<p class="text-gray-500 text-sm siemreap-regular">គ្មានទិន្នន័យ</p>`;
            return;
        }

        const selectedOption = document.querySelector('input[name="print_option"]:checked').value;
        let limit;

        switch(selectedOption) {
            case '5': limit = 5; break;
            case '10': limit = 10; break;
            case '20': limit = 20; break;
            case 'custom': limit = parseInt(customLimitInput.value) || 10; break;
            case 'all':
            default: limit = users.length; break;
        }

        const previewUsers = users.slice(0, limit);

        let html = `
            <div class="text-sm">
                <p class="font-semibold mb-2 siemreap-regular">នឹងព្រីនសមាជិក ${previewUsers.length} នាក់:</p>
                <div class="space-y-1">
        `;

        previewUsers.forEach(user => {
            html += `<div class="flex justify-between text-xs bg-white p-2 rounded siemreap-regular">
                        <span>#${user.user_id} - ${user.full_name}</span>
                        <span>${user.email}</span>
                     </div>`;
        });

        if (previewUsers.length < users.length) {
            html += `<div class="text-gray-500 text-xs mt-2 siemreap-regular">... និង ${users.length - previewUsers.length} សមាជិកផ្សេងទៀត</div>`;
        }

        html += `</div></div>`;
        previewContent.innerHTML = html;
    }

    // Toggle custom limit
    printOptions.forEach(option => {
        option.addEventListener('change', function() {
            if (this.value === 'custom') {
                customLimitDiv.classList.remove('hidden');
            } else {
                customLimitDiv.classList.add('hidden');
            }
            updatePreview();
        });
    });

    customLimitInput.addEventListener('input', updatePreview);
    previewBtn.addEventListener('click', updatePreview);

    // Initial preview
    updatePreview();
});
</script>

@endsection
