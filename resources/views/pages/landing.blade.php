<x-layout>
    {{-- <h1 class="bg-red-400">halo semuanya</h1> --}}
    <div class="pt-20 ">
        @if ($errors->any())
            <div class="bg-red-400 mb-3 md:px-16 -mt-12  md:text-base flex flex-col md:flex-row items-center justify-center gap-1  py-2 px-8 rounded-md font-bold text-white text-sm"
                role="alert">
                {!! $errors->first() !!}
            </div>
        @endif
        <div class="font-inria pl-28">
            <p class="bg-yellow-200 py-1 px-2 text-2xl font-bold inline-block rounded-md">SANKEI DHARMA INDONESIA</p>
            <h1 class=" font-bold text-[5rem] -mt-5">Printing Station for</h1>
            <h1 class=" font-bold text-[5rem] -mt-10"><span class="text-green-700">Quality Control</span> Label</h1>
        </div>
        <div class="">
            <img class="h-[15rem] overflow-hidden" src='storage/heroImage.png' alt="logo" class="" />
            {{-- <div class=" w-full h-64 bg-[url('/storage/heroImage.png')] bg-green-100"></div> --}}
        </div>
        <div class="">
            {{-- <img src="" alt=""> --}}
            <form class="flex h-12 gap-3 mt-10 pl-28" action="{{ route('login.store') }}" method="POST">
                @csrf
                {{-- <div class="md:mb-4 md:mt-3 flex justify-center"> --}}
                    {{-- <label for="barcode" class="form-label">SCAN BARCODE</label> --}}
                    {{-- <input type="text" class="form-control" id="barcode" name="barcode" readonly  required autofocus> --}}
                    {{-- <div class="flex"> --}}

                        <img class="w-12 h-12" src='storage/qricon.png' alt="logo" class="" />
                        <input type="text" placeholder="Scan Barcode RFID..."
                        class="bg-green-200 w-1/2 h-full pl-6 rounded-md placeholder:italic placeholder:text-xl"
                        id="barcode" name="barcode" readonly onfocus="this.removeAttribute('readonly');" required
                        autofocus>
                    {{-- </div> --}}
                {{-- </div> --}}
            </form>
            {{-- <input class="bg-green-200 w-1/2 pl-6 rounded-md placeholder:italic placeholder:text-xl " placeholder="Scan Barcode RFID..." type="text"> --}}
        </div>
    </div>
</x-layout>