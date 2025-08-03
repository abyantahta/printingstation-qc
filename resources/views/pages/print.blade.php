<x-layout>
    {{-- <h1 class="bg-red-400">halo semuanya</h1> --}}
    <div class="w-full flex flex-col items-center pt-12 ">
        <div class="w-full flex flex-col items-center">
            <div class="flex gap-2 mb-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-400 py-1 px-2 font-bold rounded-md text-white cursor-pointer">Logout</button>
                </form>
                @if($label)
                <form action="{{ route('reset.session') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-orange-400 py-1 px-2 font-bold rounded-md text-white cursor-pointer">Reset Label</button>
                </form>
                @endif
            </div>
            <p class="bg-yellow-200 py-1 px-2 text-2xl font-bold inline-block rounded-md">Welcome, {{$username}} !</p>
            <h1 class=" font-bold text-[5rem] -mt-5">Scan Label</h1>
            {{-- <div class="flex h-12 gap-3 w-1/2 "> --}}
                {{-- <img class="w-12 h-12" src="{{ asset('storage/qricon.png') }}" alt="logo" class="" /> --}}
                {{-- <img src="" alt=""> --}}

                <form class="flex h-12 gap-3 w-1/2" action="{{ route('label.find') }}" method="POST">
                    @csrf
                    {{-- <div class="md:mb-4 md:mt-3 flex justify-center"> --}}
                        {{-- <label for="barcode" class="form-label">SCAN BARCODE</label> --}}
                        {{-- <input type="text" class="form-control" id="barcode" name="barcode" readonly  required autofocus> --}}
                        {{-- <div class="flex"> --}}
    
                            <img class="w-12 h-12" src="{{ asset('storage/qricon.png') }}" alt="logo" class="" />
                            <input placeholder="Scan Barcode RFID..." type="text" placeholder="Scan Barcode RFID..."
                            class="bg-green-200 w-full pl-12 rounded-md placeholder:italic placeholder:text-xl"
                            id="barcode" name="barcode" readonly onfocus="this.removeAttribute('readonly');" required
                            autofocus>
                        {{-- </div> --}}
                    {{-- </div> --}}
                </form>
                
                {{-- <input class="bg-green-200 w-full pl-12 rounded-md placeholder:italic placeholder:text-xl " placeholder="Scan Barcode RFID..." type="text"> --}}
            {{-- </div> --}}
        </div>
        <div class="w-3/4 shadow-xl h-96 mt-8 p-12 flex gap-12">
            <div class="w-1/2 h-full flex justify-center bg-green-50">
                <div class="w-[30rem] h-[15.5rem] p-2 bg-white border-2">
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
                                            <td class="h-6 flex items-center  grow ">: {{ $label ? $label->part_no : '-' }}</td>
                                        </tr>
                                        <tr class="flex w-full  outline-1">
                                            <td class="h-6 flex items-center  w-22 pl-2 ">PART NAME</td>
                                            <td class="h-6 flex items-center  grow ">: {{ $label ? $label->part_name : '-' }}</td>
                                        </tr>
                                        <tr class="flex w-full outline-1  ">
                                            <td class="h-6 flex items-center  w-22 pl-2 ">LOT NO</td>
                                            <td class="h-6 flex items-center  grow ">: {{ $shift ? $shift.date('ymd') : '-' }}</td>
                                        </tr>
                                        <tr class="flex w-full   ">
                                            <td class="h-6 flex items-center  w-22 pl-2 ">QUANTITY</td>
                                            <td class="h-6 flex items-center  grow ">
                                                <div class="w-[4.1rem] h-full flex items-center ">: {{ $label ? $label->qty . ' pcs' : '-' }}</div>
                                                <div class="w-20 text-lg h-full flex items-center justify-center   border-l-1 border-r-1">{{ $label ? $label->kode_unik : '-' }}</div>
                                                <div class="w-28 h-full  flex items-center justify-center text-[0.65rem]">{{ $qr_value ? $qr_value."001" : '-' }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="w-1/4">
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
                                            <div class="w-full h-2/3  flex items-center justify-center border-b-1">{{ $label ? $label->job_no : '-' }}</div>
                                            <div class="w-full h-1/3  flex items-center justify-center">-</div>
                                        </div>
                                        <div class="w-[4.9rem] text-2xl h-full  flex items-center justify-center">{{ $label ? $label->marking : '-' }}</div>

                                    </div>
                                </div>
                                <div class="w-[8.3rem]  h-full "></div>
                            </div>
                            <div class="w-1/4  h-full flex flex-col outline-1">
                                <div class="w-full flex items-center justify-center h-5  text-[0.5rem] font-bold">QC PASS BY :</div>
                                <div class="w-full flex items-center justify-center grow h-auto  text-[0.5rem] font-bold border-t-1 border-b-1">{{ $qcPass ?: '-' }}</div>
                                <div class="w-full flex items-center justify-center h-5  text-[0.5rem] font-bold">QUALITY INSPECTOR</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-[0.5rem]  text-[0.4rem] flex items-center justify-center pt-1 text-center outline-1">
                        FORM QC-001/PROS-SDI-QC-005/REV 1
                    </div>
                    {{-- <div class="w-full h-4 bg-red-400"></div> --}}
                </div>
            </div>
            <div class="w-1/2 flex flex-col gap-y-4">
                <form action="{{ route('update.shift') }}" method="POST" class="w-full">
                    @csrf
                <select class="border-3 rounded-md h-12 pl-8 w-full" name="shift" id="shift" onchange="this.form.submit()">
                    <option value="">Pilih Shift</option>
                    <option value="A" {{ $shift == 'A' ? 'selected' : '' }}>a</option>
                    <option value="B" {{ $shift == 'B' ? 'selected' : '' }}>b</option>
                    <option value="C" {{ $shift == 'C' ? 'selected' : '' }}>c</option>
                </select>
            </form>
                <form action="{{ route('update.qc.pass') }}" method="POST" class="w-full">
                    @csrf
                    <select class="border-3 rounded-md h-12 pl-8 w-full" name="qc_pass" id="qc_pass" onchange="this.form.submit()">
                        <option value="">Pilih QC Pass</option>
                        <option value="Yafi Asyari" {{ $qcPass == 'Yafi Asyari' ? 'selected' : '' }}>Yafi Asyari</option>
                        <option value="Satriyo Adhi" {{ $qcPass == 'Satriyo Adhi' ? 'selected' : '' }}>Satriyo Adhi</option>
                        <option value="Haekal D" {{ $qcPass == 'Haekal D' ? 'selected' : '' }}>Haekal D</option>
                    </select>
                </form>
                <form action="{{ route('print.label') }}" method="POST" class="w-full">
                    @csrf
                    <div class="flex gap-4 h-10">
                        <input name="quantity" placeholder="0" class="border-3 bg-white rounded-md font-bold text-center placeholder:text-xl text-xl w-full" type="number" min="1" value="{{ session('print_quantity', '') }}" required>
                    </div>
                    <button type="submit" class="bg-blue-300 mt-4 font-bold hover:brightness-110 hover:duration-200 border-2 h-12 rounded-sm cursor-pointer w-full">Print</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>