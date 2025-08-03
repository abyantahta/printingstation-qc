<x-layout>
    <div class="no-print mb-4">
        <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded">Print Labels</button>
        <a href="{{ route('print') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Back to Print Page</a>
    </div>

    @for($i = 0; $i < $printData['quantity']; $i++)
    <div class="print-label w-[30rem] h-60 p-2 bg-white border-2">
        <div class="w-full h-12 flex  box-border outline-1">
            <div class="w-3/4 h-full flex items-center justify-center outline-1">
                <img class="h-full" src="{{ asset('storage/logosdi.png') }}" alt="logo" class="" />
            </div>
            <div class="w-1/4 h-full flex items-center justify-center font-bold">TAG LABEL</div>
        </div>
        <div class="w-full h-[10.3rem] mt-2 ">
            <div class="w-full h-[6rem] flex mt-2  outline-1">
                <div class="w-3/4  h-full">
                    <table class=" w-full">
                        <tbody class="text-[0.72rem] font-bold">

                            <tr class="flex w-full outline-1  ">
                                <td class="h-6 flex items-center  w-22 pl-2 ">PART NO</td>
                                <td class="h-6 flex items-center  grow ">: {{ $printData['label']->part_no}}</td>
                            </tr>
                            <tr class="flex w-full  outline-1">
                                <td class="h-6 flex items-center  w-22 pl-2 ">PART NAME</td>
                                <td class="h-6 flex items-center  grow ">: {{ $printData['label']->part_name}}</td>
                            </tr>
                            <tr class="flex w-full outline-1  ">
                                <td class="h-6 flex items-center  w-22 pl-2 ">LOT NO</td>
                                <td class="h-6 flex items-center  grow ">: {{ $printData['lotNo']}}</td>
                            </tr>
                            <tr class="flex w-full   ">
                                <td class="h-6 flex items-center  w-22 pl-2 ">QUANTITY</td>
                                <td class="h-6 flex items-center  grow ">
                                    <div class="w-[4.1rem] h-full flex items-center ">: {{ $printData['label']->qty . ' pcs'}}</div>
                                    <div class="w-20 text-lg h-full flex items-center justify-center   border-l-1 border-r-1">{{ $printData['label']->kode_unik}}</div>
                                    <div class="w-28 h-full  flex items-center justify-center text-md">{{ $printData['label']->job_no."-".str_pad($i+1, 3, '0', STR_PAD_LEFT)}}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-1/4 ">
                    <div class="w-full h-[4.5rem]  flex items-center justify-center text-5xl font-black outline-none">OK</div>
                    <div class="w-full h-6  font-bold text-[0.6rem] flex items-center justify-center border-t-1 border-l-1">DATE : {{ date('d/m/Y') }}</div>
                </div>
            </div>
            <div class=" flex h-[4.3rem] w-full">
                <div class="w-3/4 flex  h-full outline-1">
                    <div class="grow  font-bold text-[0.7rem]">
                        <div class="h-4 w-full  flex outline-1">
                            <div class="w-22  h-full flex items-center justify-center">D55</div>
                            <div class="w-[4.15rem] h-full  flex items-center justify-center border-r-1 border-l-1">JOB NO</div>
                            <div class="w-[4.9rem]  h-full  flex items-center justify-center ">MARK</div>
                        </div>
                        <div class="h-[3.3rem] w-full flex outline-1">
                            <div class="w-22 text-[1.2rem]  h-full flex items-center justify-center">FINISH <br>GOOD</div>
                            <div class="w-[4.15rem] h-full border-r-1 border-l-1">
                                <div class="w-full h-2/3  flex items-center justify-center border-b-1">{{ $printData['label']->job_no }}</div>
                                <div class="w-full h-1/3  flex items-center justify-center">-</div>
                            </div>
                            <div class="w-[4.9rem] text-2xl h-full  flex items-center justify-center">{{ $printData['label']->marking }}</div>

                        </div>
                    </div>
                                         <div class="w-[8.3rem]  h-full  flex items-center justify-center">
                         <div class="w-16 h-16 flex items-center justify-center">

                             {!! $printData['qrCodes'][$i] !!}
                         </div>
                     </div>
                </div>
                <div class="w-1/4  h-full flex flex-col outline-1">
                    <div class="w-full flex items-center justify-center h-5  text-[0.5rem] font-bold">QC PASS BY :</div>
                    <div class="w-full flex items-center justify-center grow h-auto  text-[0.5rem] font-bold border-t-1 border-b-1">{{ $printData['qcPass']}}</div>
                    <div class="w-full flex items-center justify-center h-5  text-[0.5rem] font-bold">QUALITY INSPECTOR</div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="print-label bg-red-400 mb-4">
        <div class="w-full h-12 flex box-border border border-gray-300">
            <div class="w-3/4 h-full flex items-center justify-center border-r border-gray-300">
                <img class="h-full" src="{{ asset('storage/logosdi.png') }}" alt="logo" />
            </div>
            <div class="w-1/4 h-full flex items-center justify-center font-bold">TAG LABEL</div>
        </div>
        <div class="w-full h-[10.3rem] mt-2 border border-gray-300">
            <div class="w-full h-[6rem] flex mt-2 border-b border-gray-300">
                <div class="w-3/4 h-full border-r border-gray-300">
                    <table class="w-full">
                        <tbody class="text-[0.72rem] font-bold">
                            <tr class="flex w-full border-b border-gray-300">
                                <td class="h-6 flex items-center w-22 pl-2 border-r border-gray-300">PART NO</td>
                                <td class="h-6 flex items-center grow">: {{ $printData['label']->part_no }}</td>
                            </tr>
                            <tr class="flex w-full border-b border-gray-300">
                                <td class="h-6 flex items-center w-22 pl-2 border-r border-gray-300">PART NAME</td>
                                <td class="h-6 flex items-center grow">: {{ $printData['label']->part_name }}</td>
                            </tr>
                            <tr class="flex w-full border-b border-gray-300">
                                <td class="h-6 flex items-center w-22 pl-2 border-r border-gray-300">LOT NO</td>
                                <td class="h-6 flex items-center grow">: {{ $printData['lotNo'] }}</td>
                            </tr>
                            <tr class="flex w-full">
                                <td class="h-6 flex items-center w-22 pl-2 border-r border-gray-300">QUANTITY</td>
                                <td class="h-6 flex items-center grow">
                                    <div class="w-[4.1rem] h-full flex items-center">: {{ $printData['label']->qty }} pcs</div>
                                    <div class="w-20 text-lg h-full flex items-center justify-center border-l border-r border-gray-300">{{ $printData['label']->kode_unik }}</div>
                                    <div class="w-28 h-full flex items-center justify-center text-md">{{ $printData['label']->job_no."-001" }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-1/4">
                    <div class="w-full h-[4.5rem] flex items-center justify-center text-5xl font-black">OK</div>
                    <div class="w-full h-6 font-bold text-[0.6rem] flex items-center justify-center border-t border-l border-gray-300">DATE : {{ $printData['printDate'] }}</div>
                </div>
            </div>
            <div class="flex h-[4.3rem] w-full">
                <div class="w-3/4 flex h-full border-r border-gray-300">
                    <div class="grow font-bold text-[0.7rem]">
                        <div class="h-4 w-full flex border-b border-gray-300">
                            <div class="w-22 h-full flex items-center justify-center border-r border-gray-300">D55</div>
                            <div class="w-[4.15rem] h-full flex items-center justify-center border-r border-l border-gray-300">JOB NO</div>
                            <div class="w-[4.9rem] h-full flex items-center justify-center">MARK</div>
                        </div>
                        <div class="h-[3.3rem] w-full flex">
                            <div class="w-22 text-[1.2rem] h-full flex items-center justify-center border-r border-gray-300">FINISH <br>GOOD</div>
                            <div class="w-[4.15rem] h-full border-r border-l border-gray-300">
                                <div class="w-full h-2/3 flex items-center justify-center border-b border-gray-300">{{ $printData['label']->job_no }}</div>
                                <div class="w-full h-1/3 flex items-center justify-center">-</div>
                            </div>
                            <div class="w-[4.9rem] text-2xl h-full flex items-center justify-center">{{ $printData['label']->marking }}</div>
                        </div>
                    </div>
                    <div class="w-[8.3rem] h-full"></div>
                </div>
                <div class="w-1/4 h-full flex flex-col">
                    <div class="w-full flex items-center justify-center h-5 text-[0.5rem] font-bold border-b border-gray-300">QC PASS BY :</div>
                    <div class="w-full flex items-center justify-center grow h-auto text-[0.5rem] font-bold border-t border-b border-gray-300">{{ $printData['qcPass'] ?: '-' }}</div>
                    <div class="w-full flex items-center justify-center h-5 text-[0.5rem] font-bold">QUALITY INSPECTOR</div>
                </div>
            </div>
        </div>
    </div> --}}
    @endfor

    <script>
        // Auto-print when page loads
        window.onload = function() {
            // Small delay to ensure everything is loaded
            setTimeout(function() {
                window.print();
            }, 500);
        };
    </script>
</x-layout>