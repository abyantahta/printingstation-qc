<x-layout>
    {{-- <h1 class="bg-red-400">halo semuanya</h1> --}}
    <div class="w-full flex flex-col items-center pt-12 ">
        <div class="w-full flex flex-col items-center">
            <form action="{{ route('logout') }}" class="" method="POST">
                @csrf
                <button type="submit" class="bg-red-400 py-1 px-2 font-bold rounded-md mb-2 text-white cursor-pointer ">Logout</button>
            </form>
            <p class="bg-yellow-200 py-1 px-2 text-2xl font-bold inline-block rounded-md">Welcome, {{$username}} !</p>
            <h1 class=" font-bold text-[5rem] -mt-5">Scan Label</h1>
            <div class="flex h-12 gap-3 w-1/2 ">
                <img class="w-12 h-12" src="{{ asset('storage/qricon.png') }}" alt="logo" class="" />
                {{-- <img src="" alt=""> --}}
                <input class="bg-green-200 w-full pl-12 rounded-md placeholder:italic placeholder:text-xl " placeholder="Scan Barcode RFID..." type="text">
            </div>
        </div>
        <div class="w-3/4 shadow-xl h-96 mt-8 p-12 flex gap-12">
            <div class="w-1/2 h-full flex justify-center bg-green-50">
            <div class="w-[30rem] h-60 p-2 bg-white border-2">
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
                                        <td class="h-6 flex items-center  grow ">: 67404-BZ170-00</td>
                                    </tr>
                                    <tr class="flex w-full  outline-1">
                                        <td class="h-6 flex items-center  w-22 pl-2 ">PART NAME</td>
                                        <td class="h-6 flex items-center  grow ">: FRAME SUB-ASSY, FR DOOR, RR LWR LH</td>
                                    </tr>
                                    <tr class="flex w-full outline-1  ">
                                        <td class="h-6 flex items-center  w-22 pl-2 ">LOT NO</td>
                                        <td class="h-6 flex items-center  grow ">: B250801</td>
                                    </tr>
                                    <tr class="flex w-full   ">
                                        <td class="h-6 flex items-center  w-22 pl-2 ">QUANTITY</td>
                                        <td class="h-6 flex items-center  grow ">
                                            <div class="w-[4.1rem] h-full flex items-center ">: 20pcs</div>
                                            <div class="w-20 text-lg h-full flex items-center justify-center   border-l-1 border-r-1">RR-3</div>
                                            <div class="w-28 h-full  flex items-center justify-center text-md">RC-1886-88</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="w-1/4 ">
                            <div class="w-full h-[4.5rem]  flex items-center justify-center text-5xl font-black outline-none">OK</div>
                            <div class="w-full h-6  font-bold text-[0.6rem] flex items-center justify-center border-1">DATE : 01/08/2025</div>
                        </div>
                    </div>
                    <div class="bg-blue-400 flex h-[4.3rem] w-full">
                        <div class="w-3/4 flex bg-green-400 h-full outline-1">
                            <div class="grow font-bold text-[0.7rem]">
                                <div class="h-4 w-full bg-red-400 flex">
                                    <div class="w-22 bg-yellow-300 h-full flex items-center justify-center outline-1">D55</div>
                                    <div class="w-[4.1rem] h-full bg-yellow-500 flex items-center justify-center">JOB NO</div>
                                    <div class="w-20 h-full bg-blue-300 flex items-center justify-center">MARK</div>
                                </div>
                                <div class="h-[3.3rem] w-full flex bg-red-700">
                                    <div class="w-22 text-[1.2rem] bg-yellow-400 h-full flex items-center justify-center">FINISH <br>GOOD</div>
                                    <div class="w-[4.1rem] h-full bg-yellow-600">
                                        <div class="w-full h-2/3 bg-blue-200 flex items-center justify-center">RC-1886</div>
                                        <div class="w-full h-1/3 bg-blue-300 flex items-center justify-center">-</div>
                                    </div>
                                    <div class="w-20 text-2xl h-full bg-blue-400 flex items-center justify-center">AFL</div>

                                </div>
                            </div>
                            <div class="w-28 h-full bg-yellow-200"></div>
                        </div>
                        <div class="w-1/4 bg-red-300 h-full flex flex-col">
                            <div class="w-full flex items-center justify-center h-5 bg-blue-200 text-[0.5rem] font-bold">QC PASS BY :</div>
                            <div class="w-full flex items-center justify-center grow h-auto bg-blue-300 text-[0.5rem] font-bold">ABYAN TAHTA</div>
                            <div class="w-full flex items-center justify-center h-5 bg-blue-400 text-[0.5rem] font-bold">QUALITY INSPECTOR</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="w-1/2 flex flex-col gap-y-4">
                <select class="border-3 rounded-md h-12 pl-8" name="" id="">
                    <option value="">Pilih Shift</option>
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                </select>
                <select class="border-3 rounded-md h-12 pl-8" name="" id="">
                    <option value="Pilih QC Pass">Pilih QC Pass</option>
                    <option value="Yafi Asyari">Yafi Asyari</option>
                    <option value="Satriyo Adhi">Satriyo Adhi</option>
                    <option value="Haekal D">Haekal D</option>
                </select>
                <div class="flex gap-4 h-10">
                    <button class="flex-grow bg-red-300 border-2 rounded-sm cursor-pointer">-</button>
                    <input placeholder="0" class="border-2 w-56 text-center placeholder:text-xl text-xl" type="number">
                    {{-- <button>-</button> --}}
                    <button class="flex-grow bg-green-300 border-2 rounded-sm cursor-pointer">+</button>
                </div>
                <button class=" bg-blue-300 border-2 h-12 rounded-sm cursor-pointer">Print</button>
            </div>
        </div>
    </div>
</x-layout>