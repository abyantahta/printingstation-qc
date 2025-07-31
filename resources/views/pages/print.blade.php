<x-layout>
    {{-- <h1 class="bg-red-400">halo semuanya</h1> --}}
    <div class="w-full flex flex-col items-center pt-16 ">
        <div class="w-full flex flex-col items-center">
            <p class="bg-yellow-200 py-1 px-2 text-2xl font-bold inline-block rounded-md">Welcome, Abyan Tahta !</p>
            <h1 class=" font-bold text-[5rem] -mt-5">Scan Label</h1>
            <div class="flex h-12 gap-3 w-1/2 ">
                <img class="w-12 h-12" src="{{ asset('storage/qricon.png') }}" alt="logo" class="" />
                {{-- <img src="" alt=""> --}}
                <input class="bg-green-200 w-full pl-12 rounded-md placeholder:italic placeholder:text-xl " placeholder="Scan Barcode RFID..." type="text">
            </div>
        </div>
        <div class="w-3/4 shadow-xl h-96 mt-10 p-12 flex gap-12">
            <div class="w-1/2 h-full bg-green-50"></div>
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