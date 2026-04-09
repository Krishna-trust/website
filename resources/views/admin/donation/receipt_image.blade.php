<!DOCTYPE html>
<html lang="gu">
<head>
    <meta charset="UTF-8">
    <title>રસીદ {{ $donation->receipt_number }}</title>
    <style>
        @font-face {
            font-family: 'Rasa';
            src: url('data:font/truetype;base64,{{ $fontBase64 }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Rasa';
            src: url('data:font/truetype;base64,{{ $fontBase64 }}') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            padding: 20px;
            background: #eaf4ff;
            font-family: 'Rasa', sans-serif;
            color: #002e5b;
        }

        .receipt {
            width: 900px;
            margin: auto;
            background: #ffffff;
            border: 3px solid #1976d2;
            border-radius: 10px;
            padding: 25px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 3px solid gold;
            flex-shrink: 0;
        }

        .title {
            text-align: center;
            flex: 1;
            padding: 0 15px;
        }

        .title h1 {
            margin: 0;
            color: #c62828;
            font-size: 32px;
            font-weight: bold;
        }

        .title p {
            margin: 5px 0 0;
            font-weight: bold;
            font-size: 15px;
        }

        .contact {
            font-size: 15px;
            font-weight: bold;
            text-align: right;
            flex-shrink: 0;
        }

        .address {
            background: #fff176;
            padding: 10px;
            margin: 15px 0;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            color: #b71c1c;
            border-radius: 5px;
        }

        .motto {
            text-align: center;
            margin-bottom: 20px;
        }

        .motto span {
            background: #1a237e;
            color: white;
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        td {
            padding: 6px 4px;
            font-size: 15px;
            vertical-align: bottom;
        }

        .label {
            font-weight: bold;
            white-space: nowrap;
        }

        .line {
            display: inline-block;
            border-bottom: 1px dotted #002e5b;
            padding-bottom: 2px;
            color: #00008b;
            min-width: 40px;
        }

        td > .line:only-child,
        td > span.line {
            width: 100%;
        }

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .sign {
            border-top: 1px solid #000;
            width: 200px;
            text-align: center;
            padding-top: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .quote {
            text-align: center;
            color: #c62828;
            font-weight: bold;
            font-size: 15px;
        }
    </style>
</head>
<body>

<div class="receipt" id="receipt-card">

    {{-- Header --}}
    <div class="header">
        @php
            $logoPath = public_path('images/logo.png');
            if (!file_exists($logoPath)) { $logoPath = public_path('images/logo.jpg'); }
        @endphp
        @if(file_exists($logoPath))
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents($logoPath)) }}" class="logo">
        @else
            <div class="logo" style="display:flex;align-items:center;justify-content:center;font-size:10px;background:#eee;">LOGO</div>
        @endif

        <div class="title">
            <h1>{{ $donation->trust_name }}</h1>
            <p>{{ $donation->register_number }}</p>
        </div>

        <div class="contact">
            ચંદ્રકાન્તભાઈ પટેલ<br>
            ૯૯૨૪૮૧૯૩૫૬
        </div>
    </div>

    {{-- Address bar --}}
    <div class="address">
        ઈ-૭, પ્રેમકુંજ સોસાયટી, મીરામ્બિકા સ્કૂલ સામે, નારણપુરા, અમદાવાદ – ૩૮૦૦૧૩.
    </div>

    {{-- Motto --}}
    <div class="motto">
        <span>આવક વિનાના અસકતને ઘરે મફત જમવાનું પહોંચાડતી સંસ્થા</span>
    </div>

    {{-- Receipt No & Date --}}
    <table>
        <tr>
            <td style="width:1%; white-space:nowrap;"><span class="label">રસીદ નં.: </span></td>
            <td style="width:79%;">{{ $donation->receipt_number }}</td>
            <td style="width:1%; white-space:nowrap; text-align:right;"><span class="label">તા.: </span></td>
            <td>{{ \Carbon\Carbon::parse($donation->date)->format('d / m / Y') }}</td>
        </tr>
    </table>

    {{-- Name & Phone --}}
    <table>
        <tr>
            <td style="width:1%; white-space:nowrap;"><span class="label">શ્રી: </span></td>
            <td style="width:80%;"><span class="line">{{ $donation->full_name }}</span></td>
            <td style="width:1%; white-space:nowrap; text-align:right;"><span class="label">ફોન: </span></td>
            <td><span class="line">{{ $donation->mobile_number }}</span></td>
        </tr>
    </table>

    {{-- Address --}}
    <table>
        <tr>
            <td style="width:5%;"><span class="label">સરનામું:</span></td>
            <td><span class="line">{{ $donation->address ?? 'N/A' }}</span></td>
        </tr>
    </table>

    {{-- Village --}}
    <table>
        <tr>
            <td style="width:1%;"><span class="label">ગામ: </span></td>
            <td>
                <span class="line">
                    @php
                        $addressParts = explode(',', $donation->address ?? '');
                        echo e(count($addressParts) > 1 ? trim(end($addressParts)) : 'અમદાવાદ');
                    @endphp
                </span>
            </td>
        </tr>
    </table>

    {{-- Amount --}}
    <table>
        <tr>
            <td style="width:1%; white-space:nowrap;"><span class="label">રૂા.: </span></td>
            <td style="width:30%;"><span class="line">{{ number_format($donation->amount, 0) }}/-</span></td>
            <td style="width:1%; white-space:nowrap; text-align:right;"><span class="label">અંકે રૂા.: </span></td>
            <td><span class="line">{{ numberToGujaratiWords($donation->amount) }} પુરા</span></td>
        </tr>
    </table>

    {{-- Payment mode --}}
    <table>
        <tr>
            <td style="width:1%; white-space:nowrap;"><span class="label">વિગત: </span></td>
            <td>
                <span class="line">
                    @if($donation->payment_mode == 'cash')
                        રોકડ દાન પેટે મળ્યા છે.
                    @elseif($donation->payment_mode == 'cheque')
                        ચેક (નં. {{ $donation->cheque_number }}) દાન પેટે મળ્યા છે.
                    @else
                        ઓનલાઇન ટ્રાન્ઝેકશન દ્વારા દાન પેટે મળ્યા છે.
                    @endif
                </span>
            </td>
        </tr>
    </table>

    {{-- Donation for --}}
    <table>
        <tr>
            <td style="width:1%; white-space:nowrap;"><span class="label">દાન માટે: </span></td>
            <td><span class="line">{{ $donation->donation_for }}</span></td>
        </tr>
    </table>

    {{-- Footer --}}
    <div class="footer">
        <div class="sign">નાણા આપનારની સહી</div>
        <div class="quote">
            "અન્નદાન શ્રેષ્ઠ દાન"<br>
            "ટુકડો ત્યાં હરી ટુકડો"
        </div>
        <div class="sign">નાણા લેનારની સહી</div>
    </div>

</div>

<script src="{{ asset('js/html2canvas.min.js') }}"></script>

<script>
    document.fonts.ready.then(function () {
        var card = document.getElementById('receipt-card');

        html2canvas(card, {
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: '#ffffff',
            logging: false,
            width: card.offsetWidth,
            height: card.offsetHeight
        }).then(function (canvas) {
            var filename = 'receipt-{{ addslashes($donation->receipt_number ?? $donation->id) }}.jpg';
            var link = document.createElement('a');
            link.download = filename;
            link.href = canvas.toDataURL('image/jpeg', 0.92);
            link.click();
            window.parent.postMessage('receipt-image-done', '*');
        }).catch(function () {
            window.parent.postMessage('receipt-image-error', '*');
        });
    });
</script>

</body>
</html>
