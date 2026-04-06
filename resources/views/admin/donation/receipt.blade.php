<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Donation Receipt - {{ $donation->receipt_number }}</title>
    <style>
        @page {
            margin: 0px;
        }
        @php
            $fontPath = storage_path('fonts/NotoSansGujarati-Regular.ttf');
            $fontBase64 = '';
            if (file_exists($fontPath)) {
                $fontBase64 = base64_encode(file_get_contents($fontPath));
            }
        @endphp
        @font-face {
            font-family: 'NotoSansGujarati';
            @if($fontBase64)
                src: url("data:font/ttf;base64,{{ $fontBase64 }}") format("truetype");
            @else
                src: url('{{ $fontPath }}') format("truetype");
            @endif
            font-weight: normal;
            font-style: normal;
        }
        body {
            font-family: 'NotoSansGujarati', sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 700px;
            margin: 30px auto;
            padding: 40px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #ff3366;
            padding-bottom: 20px;
            position: relative;
        }
        .logo-container {
            margin-bottom: 15px;
        }
        .logo {
            height: 80px;
        }
        .trust-name {
            font-size: 28px;
            font-weight: bold;
            color: #ff3366;
            margin: 5px 0;
            text-transform: uppercase;
        }
        .guj-trust-name {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }
        .trust-details {
            font-size: 12px;
            line-height: 1.6;
            color: #666;
        }
        .receipt-title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px;
            background-color: #fff5f7;
            border: 1px solid #ffccd5;
            color: #ff3366;
            border-radius: 5px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .details-table td {
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: bold;
            color: #555;
            width: 35%;
            background-color: #fafafa;
        }
        .value {
            width: 65%;
            color: #000;
            font-weight: 500;
        }
        .footer {
            margin-top: 60px;
            min-height: 150px;
        }
        .signature-box {
            float: right;
            text-align: center;
            width: 220px;
        }
        .signature-line {
            border-top: 2px solid #333;
            margin-top: 70px;
            padding-top: 10px;
            font-weight: bold;
            font-size: 13px;
        }
        .stamp-placeholder {
            height: 80px;
            margin-bottom: 10px;
            font-style: italic;
            color: #ccc;
            padding-top: 30px;
        }
        .thanks-note {
            margin-top: 40px;
            text-align: center;
            font-style: italic;
            color: #ff3366;
            font-size: 16px;
        }
        .note {
            font-size: 11px;
            color: #999;
            margin-top: 80px;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .row-group {
            display: table;
            width: 100%;
        }
        .col-half {
            display: table-cell;
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-container">
                @php
                    $logoPath = public_path('images/logo.png');
                    if (!file_exists($logoPath)) {
                        $logoPath = public_path('images/logo.jpg');
                    }
                @endphp
                @if(file_exists($logoPath))
                    <img src="{{ $logoPath }}" class="logo">
                @endif
            </div>
            <h1 class="trust-name">શ્રી કૃષ્ણ સેવા ટ્રસ્ટ</h1>
            <div class="trust-details">
                રજીસ્ટ્રેશન નં: ઇ/૧૨૩૪૫/સુરત<br>
                સરનામું: ૧૨૩, ટ્રસ્ટ હાઉસ, મંદિર પાસે, સુરત, ગુજરાત - ૩૯૫૦૦૬<br>
                સંપર્ક: +૯૧ ૯૮૭૬૫ ૪૩૨૧૦ | ઇમેઇલ: [EMAIL_ADDRESS]
            </div>
        </div>

        <div class="receipt-title">દાનની રસીદ</div>

        <div class="row-group">
            <div class="col-half">
                <table class="details-table" style="border-right: 1px solid #eee;">
                    <tr>
                        <td class="label">રસીદ નં:</td>
                        <td class="value">{{ $donation->receipt_number ?? '-' }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-half">
                <table class="details-table">
                    <tr>
                        <td class="label" style="padding-left: 20px;">Date / તારીખ:</td>
                        <td class="value">{{ $donation->date ? date('d-m-Y', strtotime($donation->date)) : '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <table class="details-table">
            <tr>
                <td class="label">દાતાનું નામ:</td>
                <td class="value">{{ $donation->full_name }}</td>
            </tr>
            <tr>
                <td class="label">રકમ:</td>
                <td class="value" style="font-size: 18px; color: #ff3366;">₹ {{ number_format($donation->amount, 2) }}</td>
            </tr>
            <tr>
                <td class="label">હેતુ:</td>
                <td class="value">
                    @php
                        $purposes = [
                            'meals' => 'ભોજન સહાય',
                            'medical' => 'મેડિકલ સહાય',
                            'education' => 'શૈક્ષણિક સહાય',
                            'rasankit' => 'રાશન કિટ સહાય',
                            'other' => 'અન્ય (Other)'
                        ];
                        $purposeValue = $donation->donation_for;
                    @endphp
                    {{ $purposes[$purposeValue] ?? ucfirst($purposeValue) }}
                </td>
            </tr>
            <tr>
                <td class="label">Payment Mode / પ્રકાર:</td>
                <td class="value">
                    @php
                        $modes = [
                            'cash' => 'રોકડ',
                            'cheque' => 'ચેક',
                            'online' => 'ઓનલાઇન'
                        ];
                        $modeValue = $donation->payment_mode;
                    @endphp
                    {{ $modes[$modeValue] ?? ucfirst($modeValue) }}
                </td>
            </tr>
            @if($donation->payment_mode == 'online' && $donation->transaction_id)
            <tr>
                <td class="label">સંદર્ભ નં:</td>
                <td class="value">{{ $donation->transaction_id }}</td>
            </tr>
            @endif
            @if($donation->payment_mode == 'cheque' && $donation->cheque_number)
            <tr>
                <td class="label">ચેકની વિગત:</td>
                <td class="value">No: {{ $donation->cheque_number }} | Date: {{ $donation->cheque_date ? date('d-m-Y', strtotime($donation->cheque_date)) : '-' }}</td>
            </tr>
            @endif
            @if($donation->pan_number)
            <tr>
                <td class="label">પાન નં:</td>
                <td class="value">{{ $donation->pan_number }}</td>
            </tr>
            @endif
        </table>

        <div class="thanks-note">
            "તમારો સહયોગ ફેરફાર લાવશે. તમારા સપોર્ટ માટે આભાર!"
        </div>

        <div class="footer">
            <div class="signature-box">
                <div class="stamp-placeholder">
                    (Trust Stamp)
                </div>
                <div class="signature-line">
                    અધિકૃત સહી
                </div>
            </div>
        </div>

        <div class="note">
            નોંધ: આ કોમ્પ્યુટર દ્વારા જનરેટ કરેલ ડિજિટલ રસીદ છે અને તેમાં ભૌતિક સહીની જરૂર નથી.
        </div>
    </div>
</body>
</html>
