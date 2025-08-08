<x-layout>
@for($i = 0; $i < $printData['quantity']; $i++)
    <div class="label-outer">
        <div class="label-page">
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
                                                <td class="info-value">{{$printData['label']->part_no}}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">PART NAME</td>
                                                <td class="info-value">{{$printData['label']->part_name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">LOT NO</td>
                                                <td class="info-value">{{$printData['lotNo']}}</td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="info-label">LOT NO</td> --}}
                                                <td class="quantity-label">QUANTITY</td>
                                                <td >
                                                    <table class="quantity-table">
                                                        <tr>
                                                            <td class="quantity-text">{{$printData['label']->qty}} pcs</td>
                                                            <td class="unique-code">{{$printData['label']->kode_unik}}</td>
                                                            <td class="job-number">{{ $printData['label']->job_no."-".str_pad($i+1, 3, '0', STR_PAD_LEFT) }}</td>
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
                                                            <td class="d55-cell">D55</td>
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
                                                            {{-- <td class="mark-content">{{$printData['label']->marking}}</td> --}}
                                                            <td class="mark-content">ORANGE</td>
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