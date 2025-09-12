<x-layout>
    <div class="w-full flex flex-col items-center pt-12">
        <div class="w-full flex flex-col items-center">
            <div class="flex gap-2 mb-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-red-400 py-1 px-2 font-bold rounded-md text-white cursor-pointer">Logout</button>
                </form>
                <a href="{{ route('print') }}"
                    class="bg-blue-400 py-1 px-2 font-bold rounded-md text-white cursor-pointer no-underline">Back to Print</a>
            </div>
            
            <h1 class="font-bold text-4xl mb-8">Print History</h1>
            
            @if($histories->count() > 0)
                <div class="w-full max-w-7xl overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 bg-white shadow-lg">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">Printed By</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">Job No / Part No</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">Part Name</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">Shift</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">Date</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">Quantity</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">QC Pass</th>
                                <th class="border border-gray-300 px-4 py-3 text-left font-bold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-3">{{ $history->printed_by ?? 'Unknown' }}</td>
                                    <td class="border border-gray-300 px-4 py-3">
                                        @if($history->label)
                                            <div class="font-semibold">{{ $history->label->job_no }}</div>
                                            <div class="text-sm text-gray-600">{{ $history->label->part_no }}</div>
                                        @else
                                            <span class="text-gray-500">N/A</span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-3">
                                        @if($history->label)
                                            <div class="max-w-xs truncate" title="{{ $history->label->part_name }}">
                                                {{ $history->label->part_name }}
                                            </div>
                                        @else
                                            <span class="text-gray-500">N/A</span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                            @if($history->shift == 'A') bg-blue-100 text-blue-800
                                            @elseif($history->shift == 'B') bg-green-100 text-green-800
                                            @elseif($history->shift == 'C') bg-purple-100 text-purple-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ $history->shift ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-3">
                                        <div class="text-sm">{{ $history->created_at->format('d/m/Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $history->created_at->format('H:i:s') }}</div>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-3 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            {{ $history->quantity }} pcs
                                        </span>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-3">
                                        @if($history->qcpass)
                                            {{ $history->qcpass->qc_username }}
                                        @else
                                            <span class="text-gray-500">N/A</span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-3">
                                        @if($history->print_status == 'success')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                ✓ Success
                                            </span>
                                        @elseif($history->print_status == 'error')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                ✗ Error
                                            </span>
                                            <!-- @if($history->error_message)
                                                <div class="mt-1 text-xs text-red-600 max-w-xs truncate" title="{{ $history->error_message }}">
                                                    {{ Str::limit($history->error_message, 50) }}
                                                </div>
                                            @endif -->
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                ⏳ Pending
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-6 text-sm text-gray-600">
                    Showing {{ $histories->count() }} print record(s)
                </div>
            @else
                <div class="w-full max-w-md text-center py-12">
                    <div class="text-gray-500 text-lg mb-4">📄</div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Print History Found</h3>
                    <p class="text-gray-500 mb-4">No print records have been created yet.</p>
                    <a href="{{ route('print') }}" 
                        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 transition-colors">
                        Go to Print Page
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layout>
