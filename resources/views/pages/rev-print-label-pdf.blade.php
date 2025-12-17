<x-layout>
@for($i = 0; $i < $printData['quantity']; $i++)
    <div class="label-outer">
        <div class="label-page">
            <div class="label-container">
                <!-- Header -->
                <table class="rev-table-outer">
                    <tr style="height:25%;width:100%">
                        <td style="width: 100%">
                            <table style="height:100%">
                                <tr>

                                    <td style="width:25%;height:100%;display:inline-block;height:100%;">
                                        <img style="width: 50px;height:50px;margin:0 auto;" src="{{ public_path('storage/logosdi2.png') }}" alt="logo" />
                                    </td>
                                    <td style="width:18%;height:100%;display:inline-block;height:100%;text-align:center;border-left:1px solid black;">
                                        <table style="height:100%">
                                            <tr style="height:15%;background-color: #adaaaa;padding:0 2px;"><td>ID SUPPLIER</td></tr>
                                            <tr style="height:85%;font-size:15px"><td>300268</td></tr>
                                        </table>
                                    </td>
                                    <td style="width:18%;height:100%;display:inline-block;height:100%;text-align:center;border-left:1px solid black;">
                                        <table style="height:100%">
                                            <tr style="height:15%;background-color: #adaaaa"><td>JOB NO</td></tr>
                                            <tr style="height:85%;font-size:15px"><td>{{$printData['label']->job_no}}</td></tr>
                                        </table>
                                    </td>
                                    <td style="width:18%;height:100%;display:inline-block;height:100%;text-align:center;border-left:1px solid black;">
                                        <table style="height:100%">
                                            <tr style="height:15%;background-color: #adaaaa"><td>BACK NO</td></tr>
                                            <tr style="height:85%;font-size:20px"><td>-</td></tr>
                                        </table>
                                    </td>
                                    <td style="width:21%;height:100%;display:inline-block;height:100%;text-align:center;border-left:1px solid black;">
                                        <table style="height:100%">
                                            <tr style="height:15%;background-color: #adaaaa"><td>ID TMMIN</td></tr>
                                            <tr style="height:85%;font-size:20px"><td>-</td></tr>
                                        </table>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="height:12%;border:1px solid black;width:100%">
                        <td style="width: 100%">
                            <table>
                                <tr>
                                    <td style="width:20%;display:inline-block;padding-left:5px">
                                        PART NO
                                    </td>
                                    <td style="width:80%;display:inline-block">
                                        : {{$printData['label']->part_no}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="height:12%;border:1px solid black;width:100%">
                        <td style="width: 100%">
                            <table>
                                @if(str_contains(strtoupper($printData['label']->part_name), 'RH'))
                                <tr>
                                    <td style="width:20%;display:inline-block;background-color:black;color:white;padding-left:5px">
                                        PART NAME
                                    </td>
                                    <td style="width:80%;display:inline-block;background-color:black;color:white">
                                        : {{$printData['label']->part_name}}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td style="width:20%;display:inline-block;padding-left:5px">
                                        PART NAME
                                    </td>
                                    <td style="width:80%;display:inline-block">
                                        : {{$printData['label']->part_name}}
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>

                    <tr style="height:12%">

                        <td style="width:43%;height:100%;display:inline-block; black;height:100%">
                            <table style="width:100%;height:100%">
                                <tr>
                                    <td style="width:47%;padding-left:5px">DATE</td>
                                    <td style="width:53%">: {{$printData['printDate']}}</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width:18%;height:100%;display:inline-block;border-left:1px solid black;height:100%;text-align:center;padding-top:7px">
                            {{$printData['shift'].$printData['lotNo']}}
                        </td>
                        <td style="width:18%;height:100%;display:inline-block;border-left:1px solid black;height:100%;text-align:center;padding-top:7px">
                            MARKING
                        </td>

                        @if(strlen($printData['qrValue'])==3 || strlen($printData['qrValue'])==4 || strlen($printData['qrValue'])==5 ||strlen($printData['qrValue'])==6 ||strlen($printData['qrValue'])==7 ||strlen($printData['qrValue'])==8)
                        <td style="width:21%;height:100%;display:inline-block;border-left:1px solid black;height:100%;text-align:center;padding-top:5px;font-size:10px">
                            {{ $printData['qrValue']."-".str_pad($i+1, 3, '0', STR_PAD_LEFT) }}
                            {{-- 25051-BZ230-00-KZ001 --}}
                        </td>
                        @else
                        <td style="width:21%;height:100%;display:inline-block;border-left:1px solid black;height:100%;text-align:center;padding-top:5px;font-size:11px">
                            {{ $printData['qrValue'].str_pad($i+1, 3, '0', STR_PAD_LEFT) }}
                            {{-- 25051-BZ230-00-KZ001 --}}
                        </td>
                        @endif
                        </td>


                    </tr>
                    <tr style="height:30%;width:100%">
                        <td style="width: 100%;">
                            <table style="height:100%">
                                <tr>
                                    <td style="width:13%;height:100%;display:inline-block;;height:100%;text-align:center">
                                        <table style="border-top:1px solid black;height:100%">
                                            <tr style="height:15%;background-color: #adaaaa"><td>Status</td></tr>
                                            <tr style="height:85%;font-size:30px"><td>FG</td></tr>
                                        </table>
                                    </td>
                                    <td style="width:12%;height:100%;display:inline-block;;height:100%;text-align:center">
                                        <table style="border-left:1px solid black;border-top:1px solid black;height:100%">
                                            <tr style="height:15%;background-color: #adaaaa;"><td>Qty<span style="font-size:7px">(pcs)</span></td></tr>
                                            <tr style="height:85%;font-size:20px"><td>{{$printData['label']->qty}}</td></tr>
                                        </table>
                                    </td>
                                    <td style="width:18%;height:100%;display:inline-block;;height:100%;text-align:center">
                                        <table style="border-left:1px solid black;border-top:1px solid black;height:100%">
                                            <tr style="height:15%;background-color: #adaaaa;"><td>Quality</td></tr>
                                            <tr style="height:85%;font-size:30px"><td>OK</td></tr>
                                        </table>
                                    </td>
                                    <td style="width:18%;height:100%;display:inline-block;;height:100%;text-align:center">
                                        <table style="border-left:1px solid black;border-top:1px solid black;height:100%">
                                            <tr style="height:15%;background-color: #adaaaa;"><td>QC PASS</td></tr>
                                            <tr style="height:85%;line-height:14px"><td>{{$printData['qcPass']}}</td></tr>
                                        </table>
                                    </td>
                                    @if(strlen($printData['label']->marking)>3 )
                                    <td style="border-left:1px solid black;border-top:1px solid black;width:18%;height:100%;display:inline-block;;height:100%;text-align:center;font-size:15px;padding-top:15px">
                                        {{$printData['label']->marking}}
                                    </td>
                                    
                                    @else
                                    <td style="border-left:1px solid black;border-top:1px solid black;width:18%;height:100%;display:inline-block;;height:100%;text-align:center;font-size:20px;padding-top:15px">
                                        {{$printData['label']->marking}}
                                    </td>

                                    @endif
                                    <td class="rev-qr-container" style="border-left:1px solid black;width:21%;height:100%;display:inline-block;height:100%;text-align:center;padding:5px">
                                        {!! $printData['qrCodes'][$i] !!}
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endfor
</x-layout>