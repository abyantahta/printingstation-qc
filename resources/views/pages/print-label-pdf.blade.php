<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Labels</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @page {
            size: 480pt 240pt; /* 30rem x 15rem (1rem=16px=12pt) adjust as needed */
            margin: 0;
        }
        body {
            margin: 0;
            padding: 0;
            background: #f9fafb;
        }
        .label-page {
            page-break-after: always;
            width: 480pt;
            height: 240pt;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .label-page:last-child {
            page-break-after: avoid;
        }
    </style>
</head>
<body class="bg-gray-100">
@for($i = 0; $i < $printData['quantity']; $i++)
    <div class="label-page">
        <div class="w-[28rem] h-[13rem] border-2 border-black bg-white flex flex-col p-2 justify-between">
            <!-- Header -->
            <div class="flex items-center border-b border-black pb-1">
                <div class="w-3/4 flex items-center justify-center">
                    <img src="{{ public_path('storage/logosdi.png') }}" alt="logo" class="h-10 object-contain" />
                </div>
                <div class="w-1/4 flex items-center justify-center font-bold text-lg">TAG LABEL</div>
            </div>
            <!-- Info Section -->
            <div class="flex flex-row mt-1 flex-grow">
                <div class="w-3/4 pr-2 flex flex-col justify-between">
                    <div class="text-xs font-bold flex"><span class="w-20">PART NO</span><span class="flex-1">: {{ $printData['label']->part_no }}</span></div>
                    <div class="text-xs font-bold flex"><span class="w-20">PART NAME</span><span class="flex-1">: {{ $printData['label']->part_name }}</span></div>
                    <div class="text-xs font-bold flex"><span class="w-20">LOT NO</span><span class="flex-1">: {{ $printData['lotNo'] }}</span></div>
                    <div class="flex items-center mt-1">
                        <span class="w-20 text-xs font-bold">QUANTITY</span>
                        <span class="text-xs font-bold">: {{ $printData['label']->qty }} pcs</span>
                        <span class="mx-2 px-2 text-base font-bold border-x border-black">{{ $printData['label']->kode_unik }}</span>
                        <span class="text-xs font-bold">{{ $printData['label']->job_no."-".str_pad($i+1, 3, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>
                <div class="w-1/4 flex flex-col items-center justify-between border-l border-black pl-2">
                    <div class="text-4xl font-black leading-none">OK</div>
                    <div class="text-[0.6rem] font-bold border-t border-black w-full text-center mt-1">DATE : {{ $printData['printDate'] }}</div>
                </div>
            </div>
            <!-- Bottom Section -->
            <div class="flex flex-row mt-1 flex-grow">
                <div class="w-3/4 flex flex-col justify-between pr-2">
                    <div class="flex text-xs font-bold border-b border-black">
                        <div class="w-20 text-center">D55</div>
                        <div class="w-24 text-center border-x border-black">JOB NO</div>
                        <div class="flex-1 text-center">MARK</div>
                    </div>
                    <div class="flex items-center h-12">
                        <div class="w-20 text-center text-lg font-bold">FINISH<br>GOOD</div>
                        <div class="w-24 flex flex-col border-x border-black">
                            <div class="flex-1 flex items-center justify-center border-b border-black">{{ $printData['label']->job_no }}</div>
                            <div class="flex-1 flex items-center justify-center">-</div>
                        </div>
                        <div class="flex-1 text-2xl font-bold text-center">{{ $printData['label']->marking }}</div>
                    </div>
                    <div class="flex justify-center items-center mt-2">
                        <div class="w-16 h-16 flex items-center justify-center">
                            {!! $printData['qrCodes'][$i] !!}
                        </div>
                    </div>
                </div>
                <div class="w-1/4 flex flex-col items-center justify-between border-l border-black pl-2">
                    <div class="text-[0.5rem] font-bold">QC PASS BY :</div>
                    <div class="text-[0.5rem] font-bold border-y border-black w-full text-center py-1">{{ $printData['qcPass'] }}</div>
                    <div class="text-[0.5rem] font-bold">QUALITY INSPECTOR</div>
                </div>
            </div>
            <div class="text-[0.4rem] text-center border-t border-black pt-1 mt-1">FORM QC-001/PROS-SDI-QC-005/REV 1</div>
        </div>
    </div>
@endfor
</body>
</html>