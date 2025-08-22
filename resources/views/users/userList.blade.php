@extends('app')

@section('title', 'User List')

@section('content')
    <div class="bg-gray-100 p-[30px] min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold mb-2 text-gray-800 siemreap-regular">សមាជិក</h1>
                <p class="text-md text-gray-500 siemreap-regular">មើល ឬ ចុះឈ្មោះសមាជិកថ្មីបន្ថែម</p>
            </div>
            <div class="flex space-x-4 items-center">
                <div class="relative">
                    <form method="GET" action="{{ route('users.userList') }}" class="relative">
                        <input type="text"
                               name="q"
                               value="{{ request('q') }}"
                               class="w-full bg-white py-2 border border-gray-300 rounded-full pl-10 pr-4 focus:outline-none focus:border-green-800 transition duration-200 siemreap-regular text-md"
                               placeholder="ស្វែងរកសមាជិក">
                        <svg class="text-gray-400 w-5 h-5 absolute top-2.5 left-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56.966 56.966">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92 c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17 s-17-7.626-17-17S14.61,6,23.984,6z"></path>
                        </svg>
                    </form>

                </div>
                <a href="{{ route('users.create') }}" class="px-5 py-2 rounded-3xl bg-green-900 text-white font-medium hover:bg-green-700 transition duration-200 inline-flex items-center space-x-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>

                    <span class="siemreap-regular">បន្ថែមសមាជិក</span>
                </a>
                <button class="bg-white px-5 py-2 border border-gray-300 rounded-3xl text-gray-700 hover:bg-gray-100 transition duration-200 siemreap-regular flex gap-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7zM7 7h7v2H7V7zm10 10H7v-2h10v2zm0-4H7v-2h10v2z"/>
                    </svg>
                    ព្រីនចេញ
                </button>
            </div>
        </div>
        <table class="w-full mt-6 border-collapse shadow-sm rounded-xl overflow-hidden">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">លេខសមាជិក</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">សមាជិក</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">អីមែល</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">លេខទំនាក់ទំនង</th>
                <th class="px-6 py-3 text-left text-md font-semibold text-gray-700 uppercase tracking-wider siemreap-regular">កែទិន្នន័យ</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr class="hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 siemreap-regular">#{{ $user->user_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 siemreap-regular">{{ $user->full_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 siemreap-regular">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 siemreap-regular">{{ $user->phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('users.edit', $user) }}" class="flex gap-2 text-green-800 hover:text-green-900 transition-colors duration-200 cursor-pointer bg-gray-100 hover:bg-gray-200 px-2 py-1 rounded-[8px] siemreap-regular" title="Edit User">
                              <p>កែទិន្នន័យ</p>
                              <svg 
                                 class="text-green-800 h-5 w-4 fill-current" 
                                 xmlns="http://www.w3.org/2000/svg" 
                                 viewBox="0 0 24 24" 
                                 fill="currentColor">
                                 <path d="M17 3a2.85 2.85 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/>
                              </svg>
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="flex gap-2 text-white transition-colors duration-200 cursor-pointer bg-red-800 hover:bg-red-700 px-2 py-1 rounded-[8px] siemreap-regular" title="Delete User">
                                    លុបចោល
                                    <svg 
                                       class="text-white h-5 w-4 fill-current" 
                                       xmlns="http://www.w3.org/2000/svg" 
                                       viewBox="0 0 24 24" 
                                       fill="currentColor">
                                       <path d="M9 2h6a2 2 0 0 1 2 2v2h4v2H3V6h4V4a2 2 0 0 1 2-2zm1 4h4V4h-4v2zm-4 4h12l-1 10a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L6 10zm4 2v6h2v-6h-2zm4 0v6h2v-6h-2z"/>
                                    </svg>

                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-6">
            <div class="flex items-center justify-between">
                <div class="siemreap-regular text-sm text-gray-700">
                    សរុបទិន្នន័យ: {{ $users->total() }}
                </div>
                <div>
                    {{ $users->links('pagination::tailwind') }}
                </div>
            </div>
        </div>

    </div>
@endsection
