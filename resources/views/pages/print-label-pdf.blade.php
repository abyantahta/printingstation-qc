<x-layout>
@for($i = 0; $i < $printData['quantity']; $i++)
    <div class="label-outer">
        <div class="label-page">
            <div class="label-container">
                <!-- Header -->
                <table class="header-table">
                    <tr>
                        <td class="logo-cell">
                            <img src="{{ public_path('storage/logosdi.png') }}" alt="logo" />
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
                                <tr style="width: 100%">
                                    <td style="width: 75%;height:100%"> 
                                        <table class="info-table">
                                            <tr>
                                                <td class="info-label">PART NO</td>
                                                <td class="info-value">: {{$printData['label']->part_no}}</td>
                                            </tr>
                                            @if(str_contains(strtoupper($printData['label']->part_name), 'RH'))
                                            <tr style="">
                                                <td class="info-label">PART NAME</td>
                                                <td class="info-value" style="background-color: black; color: white;">: {{$printData['label']->part_name}}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td class="info-label">PART NAME</td>
                                                <td class="info-value">: {{$printData['label']->part_name}}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td class="info-label">LOT NO</td>
                                                <td class="info-value">: {{$printData['shift'].$printData['lotNo']}}</td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="info-label">LOT NO</td> --}}
                                                <td class="quantity-label">QUANTITY</td>
                                                <td class="row-quantity">
                                                    <table class="quantity-table">
                                                        <tr>
                                                            <td style="margin-left: -10px" id="quantity-text">: {{$printData['label']->qty}} pcs</td>
                                                            <td class="unique-code">{{$printData['label']->kode_unik}}</td>
                                                            @if(strlen($printData['qrValue'])==4 || strlen($printData['qrValue'])==5 ||strlen($printData['qrValue'])==6 ||strlen($printData['qrValue'])==7 ||strlen($printData['qrValue'])==8)
                                                            <td class="job-number">{{ $printData['qrValue']."-".str_pad($i+1, 3, '0', STR_PAD_LEFT) }}</td>
                                                            @else
                                                            <td class="job-number">{{ $printData['qrValue'].str_pad($i+1, 3, '0', STR_PAD_LEFT) }}</td>
                                                            @endif
                                                            {{-- <td class="job-number">14110-52S00-00001</td> --}}
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
                                                <td class="date-section">DATE : {{$printData['printDate']}}</td>
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
                                                            <td class="d55-cell">{{$printData['label']->model}}</td>
                                                            <td class="job-cell">JOB NO</td>
                                                            <td class="mark-cell">MARK</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="finish-good">FINISH<br>GOOD</td>
                                                            <td style="padding: 0;">
                                                                <table style="width: 100%;">
                                                                    <tr>
                                                                        <td class="job-top">{{$printData['label']->job_no}}</td>
                                                                        {{-- <td class="job-top">MANIFOLD</td> --}}
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="job-bottom">-</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td class="mark-content">{{$printData['label']->marking}}</td>
                                                            {{-- <td class="mark-content">ORANGE</td> --}}
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="qr-section">
                                                    <div class="qr-container">
                                                        {{-- dasdas --}}
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
                                                <td class="qc-footer">{{$printData['qcPass']}}</td>
                                            </tr>
                                            <tr>
                                                <td class="qc-footer">QUALITY INSPECTOR</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Form Footer -->
                            {{-- <div class="form-footer">
                                FORM QC-001/PROS-SDI-QC-005/REV 1
                            </div> --}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endfor
</x-layout>