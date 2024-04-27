<div>
    <section class="mt-10">
        <div class="mx-auto px-4 lg:px-12 ">
            <!-- Start coding here -->
            <div class="bg-white  relative shadow-md sm:rounded-lg">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            {{-- <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div> --}}
                            <input 
                                wire:model.live.debounce.300ms="search"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                        </div>
                    </div>

                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3">Date & Time</th>
                                <th scope="col" class="px-4 py-3">Order ID</th>
                                <th scope="col" class="px-4 py-3">Transaction Type</th>
                                <th scope="col" class="px-4 py-3">Channel</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Amount</th>
                                <th scope="col" class="px-4 py-3">Customer Email</th>
                                <th scope="col" class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $data)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $data->date }}</th>
                                    <td class="px-4 py-3">{{ $data->orderID }}</td>
                                    <td class="px-4 py-3">{{ $data->type }}</td>
                                    <td class="px-4 py-3"><img src="{{ $data->channel== "bri" ? asset('assets/images/bank/bri.png') : ($data->channel == "mandiri" ? asset('assets/images/bank/mandiri.png')  : asset('assets/images/bank/bni.png')) }}" alt=""></td>
                                    <td class="px-4 py-3 {{ $data->status == 'success' ? 'text-green-500' : ($data->status == 'pending' ? 'text-yellow-500' : 'text-red-500') }}">
                                        {{ $data->status }}
                                    </td>
                                    <td class="px-4 py-3">{{ $data->amount }}</td>
                                    <td class="px-4 py-3">{{ $data->email }}</td>
                                    <td class="px-4 py-3"> ------ </td>
                                    {{-- <td class="px-4 py-3 flex items-center justify-end">
                                    <button class="px-3 py-1 bg-red-500 text-white rounded">X</button>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium">Per Page</label>
                            <select
                            wire:model.live="perPage"
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $transactions->links() }}
                </div>
                {{-- <div class="px-4 py-3">{{ $transactions->links() }}</div> --}}
            </div>
        </div>
    </section>

</div>
