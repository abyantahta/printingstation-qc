<x-layout>
    {{-- <h1 class="bg-red-400">halo semuanya</h1> --}}
    <div class="w-full flex flex-col items-center pt-12 ">
        
        <div class="w-full flex flex-col items-center ">
            <div class="flex gap-2 mb-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-red-400 py-1 px-2 font-bold rounded-md text-white cursor-pointer">Logout</button>
                </form>
                @if ($label)
                    <form action="{{ route('reset.session') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-orange-400 py-1 px-2 font-bold rounded-md text-white cursor-pointer">Reset
                            Label</button>
                        </form>
                        @endif
                    </div>
                    <p class="bg-yellow-200 py-1 px-2 text-2xl font-bold inline-block rounded-md">Welcome, {{ $username }} !
            </p>
            <h1 class=" font-bold text-[5rem] -mt-5">Scan Label</h1>
            {{-- <div class="flex h-12 gap-3 w-1/2 "> --}}
                {{-- <img class="w-12 h-12" src="{{ asset('storage/qricon.png') }}" alt="logo" class="" /> --}}
                {{-- <img src="" alt=""> --}}
                @if ($errors->any())
            
                    <div class=" mb-3 md:px-16 md:text-base flex flex-col md:flex-row items-center justify-center gap-1  py-2 px-8 rounded-md font-bold text-white text-sm"
                        role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

            <form class="flex h-12 gap-3 w-1/2" action="{{ route('label.find') }}" method="POST">
                @csrf
                {{-- <div class="md:mb-4 md:mt-3 flex justify-center"> --}}
                {{-- <label for="barcode" class="form-label">SCAN BARCODE</label> --}}
                {{-- <input type="text" class="form-control" id="barcode" name="barcode" readonly  required autofocus> --}}
                {{-- <div class="flex"> --}}




                <img class="w-12 h-12" src="storage/qricon.png" alt="logo" class="" />
                <input placeholder="Scan Barcode RFID..." type="text" placeholder="Scan Barcode RFID..."
                    class="bg-green-200 w-full pl-12 rounded-md placeholder:italic placeholder:text-xl" id="barcode"
                    name="barcode" readonly onfocus="this.removeAttribute('readonly');" required autofocus>
                {{-- </div> --}}
                {{-- </div> --}}
            </form>

            {{-- <input class="bg-green-200 w-full pl-12 rounded-md placeholder:italic placeholder:text-xl " placeholder="Scan Barcode RFID..." type="text"> --}}
            {{-- </div> --}}
        </div>
        <div class=" w-full lg:w-3/4 shadow-xl h-96 mt-8 p-12 flex gap-12">
            <div class="w-1/2 h-full flex justify-center ">
                <div class="w-[30rem] h-[15.5rem] lg {{ $label ? $label->warna_kertas : '-' }} p-2  border-2">
                    <div class="w-full h-12 flex  box-border outline-1">
                        <div class="w-3/4 h-full flex items-center justify-center outline-1">
                            <img class="h-full" src="storage/logosdi" alt="logo"
                                class="" />
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
                                            <td class="h-6 flex items-center  grow ">:
                                                {{ $label ? $label->part_no : '-' }}</td>
                                        </tr>
                                        <tr class="flex w-full  outline-1">
                                            <td class="h-6 flex items-center  w-22 pl-2 ">PART NAME</td>
                                            <td class="h-6 flex items-center font-bold text-[0.63rem]  grow ">:
                                                {{ $label ? $label->part_name : '-' }}</td>
                                        </tr>
                                        <tr class="flex w-full outline-1  ">
                                            <td class="h-6 flex items-center  w-22 pl-2 ">LOT NO</td>
                                            <td class="h-6 flex items-center  grow ">:
                                                {{ $shift ? $shift . date('ymd') : '-' }}</td>
                                        </tr>
                                        <tr class="flex w-full  ">
                                            <td class="h-6 flex items-center  w-22 pl-2 ">QUANTITY</td>
                                            <td class="h-6 flex items-center  grow ">
                                                <div class="w-[29.5%]  h-full flex items-center ">:
                                                    {{ $label ? $label->qty . ' pcs' : '-' }}</div>
                                                <div
                                                    class="w-[36.5%] text-lg h-full flex items-center justify-center   border-l-1 border-r-1">
                                                    {{ $label ? $label->kode_unik : '-' }}</div>
                                                <div
                                                    class="w-[34%]  h-full  flex items-center justify-center text-[0.60rem]">
                                                    {{ $qr_value ? $qr_value . '001' : '-' }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="w-1/4">
                                <div
                                    class="w-full h-[4.5rem]  flex items-center justify-center text-5xl font-black outline-none">
                                    OK
                                </div>
                                <div
                                    class="w-full h-6  font-bold text-[0.6rem] flex items-center justify-center border-t-1 border-l-1">
                                    DATE : {{ date('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                        <div class=" flex h-[4.3rem] w-full">
                            <div class="w-3/4 flex  h-full outline-1">
                                <div class="grow  font-bold text-[0.7rem]">
                                    <div class="h-4 w-full  flex outline-1">
                                        <div class="w-22  h-full flex items-center justify-center">
                                            {{ $label ? $label->model : '-' }}</div>
                                        <div
                                            class="w-[4.15rem] h-full  flex items-center justify-center border-r-1 border-l-1">
                                            JOB NO</div>
                                        <div class="w-[4.9rem]  h-full  flex items-center justify-center ">MARK</div>
                                    </div>
                                    <div class="h-[3.3rem] w-full flex outline-1">
                                        <div class="w-22 text-[1.2rem]  h-full flex items-center justify-center">FINISH
                                            <br>GOOD</div>
                                        <div class="w-[4.15rem] h-full border-r-1 border-l-1">
                                            <div class="w-full h-2/3  flex items-center justify-center border-b-1">
                                                {{ $label ? $label->job_no : '-' }}</div>
                                            <div class="w-full h-1/3  flex items-center justify-center">-</div>
                                        </div>
                                        <div class="w-[4.9rem] text-lg h-full  flex items-center justify-center">
                                            {{ $label ? $label->marking : '-' }}</div>

                                    </div>
                                </div>
                                <div class="w-[8.3rem]  h-full "></div>
                            </div>
                            <div class="w-1/4  h-full flex flex-col outline-1">
                                <div class="w-full flex items-center justify-center h-5  text-[0.5rem] font-bold">QC
                                    PASS BY :</div>
                                <div
                                    class="w-full flex items-center justify-center grow h-auto  text-[0.5rem] font-bold border-t-1 border-b-1">
                                    {{ $qcPass ?: '-' }}</div>
                                <div class="w-full flex items-center justify-center h-5  text-[0.5rem] font-bold">
                                    QUALITY INSPECTOR</div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full h-[0.5rem]  text-[0.4rem] flex items-center justify-center pt-1 text-center outline-1">
                        FORM QC-001/PROS-SDI-QC-005/REV 1
                    </div>
                    {{-- <div class="w-full h-4 bg-red-400"></div> --}}
                </div>
            </div>
            <div class="w-1/2 flex flex-col gap-y-4">
                <form action="{{ route('update.shift') }}" method="POST" class="w-full">
                    @csrf
                    <select required class="border-3 rounded-md h-12 pl-8 w-full" name="shift" id="shift">
                        <option class="" value="">Pilih Shift</option>
                        <option class="" value="A" {{ $shift == 'A' ? 'selected' : '' }}>A</option>
                        <option class="" value="B" {{ $shift == 'B' ? 'selected' : '' }}>B</option>
                        <option class="" value="C" {{ $shift == 'C' ? 'selected' : '' }}>C</option>
                    </select>
                </form>
                <form action="{{ route('update.qc.pass') }}" method="POST" class="w-full">
                    @csrf
                    <select required class="border-3 rounded-md h-12 pl-8 w-full" name="qc_pass" id="qc_pass">
                        <option class="" value="">Pilih QC Pass</option>
                        @foreach ($qc_pass as $qc)
                            <option class="" value="{{ $qc->qc_username }}"
                                {{ $qcPass == $qc->qc_username ? 'selected' : '' }}>{{ $qc->qc_username }}</option>
                        @endforeach
                        {{-- <option class="" value="Satriyo Adhi" {{ $qcPass == 'Satriyo Adhi' ? 'selected' : '' }}>Satriyo Adhi</option>
                        <option class="" value="Haekal D" {{ $qcPass == 'Haekal D' ? 'selected' : '' }}>Haekal D</option> --}}
                    </select>
                </form>
                <form action="{{ route('print.label') }}" method="POST" class="w-full" id="printForm">
                    @csrf
                    <div class="flex gap-4 h-10">
                        <input name="quantity" id="quantity" placeholder="0"
                            class="border-3 bg-white rounded-md font-bold text-center placeholder:text-xl text-xl w-full"
                            type="number" min="1" value="{{ session('print_quantity', '') }}" required>
                    </div>
                    <button id="submitBtn" type="submit"
                        class="mt-4 font-bold border-2 h-12 rounded-sm w-full transition-all duration-200"
                        disabled>Download PDF</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            const shift = document.getElementById('shift').value;
            const qcPass = document.getElementById('qc_pass').value;
            const quantity = document.getElementById('quantity').value;
            const submitBtn = document.getElementById('submitBtn');

            // Check if all required fields are filled
            const isValid = shift !== '' && qcPass !== '' && quantity !== '' && parseInt(quantity) > 0;

            // Enable/disable submit button and update styling
            submitBtn.disabled = !isValid;

            if (isValid) {
                submitBtn.className =
                    'mt-4 font-bold border-2 h-12 rounded-sm w-full transition-all duration-200 bg-blue-300 hover:brightness-110 cursor-pointer text-black';
            } else {
                submitBtn.className =
                    'mt-4 font-bold border-2 h-12 rounded-sm w-full transition-all duration-200 bg-gray-300 cursor-not-allowed text-gray-500';
            }
        }

        // Validate form when page loads
        document.addEventListener('DOMContentLoaded', function() {
            validateForm();

            // Add event listeners to form fields
            document.getElementById('shift').addEventListener('change', function() {
                validateForm();
                // Submit the shift form to update the session
                this.form.submit();
            });

            document.getElementById('qc_pass').addEventListener('change', function() {
                validateForm();
                // Submit the QC pass form to update the session
                this.form.submit();
            });

            document.getElementById('quantity').addEventListener('input', validateForm);
        });

        // Prevent form submission if validation fails
        document.getElementById('printForm').addEventListener('submit', function(e) {
            const shift = document.getElementById('shift').value;
            const qcPass = document.getElementById('qc_pass').value;
            const quantity = document.getElementById('quantity').value;

            if (shift === '' || qcPass === '' || quantity === '' || parseInt(quantity) <= 0) {
                e.preventDefault();
                alert('Please fill in all required fields: Shift, QC Pass, and Quantity (must be greater than 0)');
                return false;
            }
        });
    </script>
</x-layout>

{{-- <div class="label-page">
    <div class="label-container">
        <!-- Header -->
        <table class="header-table">
            <tr>
                <td class="logo-cell">
                    <img src="{{ asset('storage/logosdi.png') }}" alt="logo" />
                </td>
                <td class="title-cell">TAG LABEL</td>
            </tr>
        </table>
        
        <!-- Content -->
        <table class="content-table">
            <tr>
                <td>
                    <!-- Info Section --> 
                    <table style="width: 100%; padding:0;">
                        <tr style="">
                            <td>
                                <table class="info-table">
                                    <tr>
                                        <td class="info-label">PART NO</td>
                                        <td class="info-value">: 25051-BZ060-00</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">PART NAME</td>
                                        <td class="info-value">: FRAME SUB-ASSY, FR DOOR, FR</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">LOT NO</td>
                                        <td class="info-value">: B250872 </td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">LOT NO</td> 
                                        <td class="quantity-label">QUANTITY</td>
                                        <td >
                                            <table class="quantity-table">
                                                <tr>
                                                    <td class="quantity-text">: 20  pcs</td>
                                                    <td class="unique-code">XLR</td>
                                                    <td class="job-number">BX-0841-00</td>
                                                </tr>
                                            </table>
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 25%;height:100%">
                                <table class="status-table">
                                    <tr>
                                        <td class="ok-status">OK</td>
                                    </tr>
                                    <tr>
                                        <td class="date-section">DATE : 20/07/2025</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    
                    <!-- Bottom Section -->
                    <table class="bottom-table">
                        <tr>
                            <td class="left-section">
                                <table style="width: 100%;">
                                    <tr style="">
                                        <td style="">
                                            <table class="grid-table">
                                                <tr style="">
                                                    <td class="d55-cell">D55</td>
                                                    <td class="job-cell">JOB NO</td>
                                                    <td class="mark-cell">MARK</td>
                                                </tr>
                                                <tr>
                                                    <td class="finish-good">FINISH<br>GOOD</td>
                                                    <td style="padding: 0;">
                                                        <table style="width: 100%;">
                                                            <tr>
                                                                <td class="job-top">BX-0841</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="job-bottom">-</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td class="mark-content">XL</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="qr-section">
                                            <div class="qr-container">
                                                dasdas
                                                {!! $printData['qrCodes'][$i] !!}
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="qc-section">
                                <table class="qc-table">
                                    <tr>
                                        <td class="qc-footer">QC PASS BY :</td>
                                    </tr>
                                    <tr>
                                        <td class="qc-footer">Abyan Tahta F.A.P</td>
                                    </tr>
                                    <tr>
                                        <td class="qc-footer">QUALITY INSPECTOR</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    
                    <!-- Form Footer -->
                    <div class="form-footer">
                        FORM QC-001/PROS-SDI-QC-005/REV 1
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div> --}}
