<?php

use App\Models\PortalActivities;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Hash;

if (!function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}

// encrypt string 
if (!function_exists('encryptResponse')) {
    function encryptResponse($responseData, $aesKey, $aesIv)
    {
        $encryptedResponse = openssl_encrypt($responseData, 'aes-256-cbc', $aesKey, 0, $aesIv);
        return $encryptedResponse;
    }
}

// decrypt string
if (!function_exists('decryptAesResponse')) {
    function decryptAesResponse($responseData, $aesKey, $aesIv)
    {
        // $encryptedResponse = openssl_encrypt($responseData, 'aes-256-cbc', $aesKey, 0, $aesIv);
        $decryptedResponse = openssl_decrypt(base64_decode($responseData['response']), 'AES-256-CBC', $aesKey, OPENSSL_RAW_DATA, $aesIv);
        return $decryptedResponse;
    }
}

// audit log
// if (!function_exists('createPortalActivity')) {
//     function createPortalActivity($userId = 0, $moduleName = '', $request_data = [], $response_data = [], $properties = [])
//     {
//         $device = Agent::device();
//         $browser = Agent::browser();
//         $version = Agent::version($browser);
//         $platform = Agent::platform();
//         $platformVersion = Agent::version($platform);

//         $requestVia = '';

//         if (Agent::isPhone()) {
//             $requestVia = 'Phone';
//         } else if (Agent::isTablet()) {
//             $requestVia = 'Tablet';
//         } else if (Agent::isDesktop()) {
//             $requestVia = 'Desktop';
//         }

//         $properties = array_merge($properties, [
//             'device' => $device,
//             'platform' => [
//                 'type' => $platform,
//                 'version' => $platformVersion,
//             ],
//             'browser' => [
//                 'type' => $browser,
//                 'version' => $version,
//             ],
//             'requestFrom' => $requestVia,
//             'ip_address' => getIp(),
//         ]);
//         // var_dump($response_data);
//         // dd($response_data);
//         $responseData = "";
//         if(!empty($response_data)){
//             if (is_array($response_data)) {
//                 $responseData = json_encode($response_data);
//             } elseif (is_object($response_data)) {
//                 $responseData = json_encode($response_data);
//             } else {
//                 $responseData = (string) $response_data;
//             }
//         }

//         $insActivity = new PortalActivities();
//         $insActivity->source_ip = getIp();
//         $insActivity->user_id = $userId;
//         $insActivity->module_name = $moduleName;
//         $insActivity->request_data = json_encode($request_data);
//         $insActivity->response_data = $responseData ?? "";
//         $insActivity->properties = json_encode($properties);
//         $insActivity->created_at = now();
//         $insActivity->updated_at = now();
//         $insActivity->save();
//     }
// }

// fetch ip address
// if (!function_exists('getIp')) {
//     function getIp()
//     {
//         try {
//             $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com")) ?? request()->ip();
//         } catch (Exception $th) {
//             $ip = request()->ip();
//         }
//         return $ip;
//     }
// }

// Format mobile number for display: +91 XXXXX XXXXX
if (!function_exists('formatMobileNumber')) {
    function formatMobileNumber($mobile = '', $withoutCountryCode = false)
    {
        if (empty($mobile)) return '-';
        $digits = preg_replace('/\D/', '', $mobile);
        // Strip country code 91 if 12 digits
        if (strlen($digits) === 12 && str_starts_with($digits, '91')) {
            $digits = substr($digits, 2);
        }
        if (strlen($digits) === 10) {
            if ($withoutCountryCode) {
                return substr($digits, 0, 5) . ' ' . substr($digits, 5);
            }
            return '+91 ' . substr($digits, 0, 5) . ' ' . substr($digits, 5);
        }
        return $mobile;
    }
}

// Format Aadhaar number for display: XXXX XXXX XXXX
if (!function_exists('formatAdharNumber')) {
    function formatAdharNumber($adhar = '')
    {
        if (empty($adhar)) return '-';
        $digits = preg_replace('/\D/', '', $adhar);
        if (strlen($digits) === 12) {
            return substr($digits, 0, 4) . ' ' . substr($digits, 4, 4) . ' ' . substr($digits, 8, 4);
        }
        return $adhar;
    }
}

if (!function_exists('plainAmount')) {
    function plainAmount($formattedAmount = 0)
    {
        return preg_replace('/[^\d.]/', '', $formattedAmount);
    }
}
if (!function_exists('formattedAmount')) {
    function formattedAmount($amount = 0)
    {
        return number_format($amount, 2);
    }
}
// if (!function_exists('generateRandomIntUdid')) {
//     // Output: 0F239913-F9D6-4238-BA0B-6A6F03A575F8
//     function generateRandomIntUdid()
//     {
//         $part1 = strtoupper(bin2hex(random_bytes(4))); // 8 characters
//         $part2 = strtoupper(bin2hex(random_bytes(2))); // 4 characters
//         $part3 = strtoupper(bin2hex(random_bytes(2))); // 4 characters
//         $part4 = strtoupper(bin2hex(random_bytes(2))); // 4 characters
//         $part5 = strtoupper(bin2hex(random_bytes(6))); // 12 characters

//         // Combine parts with dashes
//         return "{$part1}-{$part2}-{$part3}-{$part4}-{$part5}";
//     }
// }

// if (!function_exists('generateIntUdid')) {
//     function generateIntUdid()
//     {
//         $ip = Request::ip();
//         $userAgent = Request::header('User-Agent');

//         $uniqueId = hash('sha256', $ip . $userAgent);
//         // dd($uniqueId);
//         return $uniqueId;
//     }
// }

// formate number as *****1234
// if (!function_exists('maskedLeftSide')) {
//     function maskedLeftSide($mobileNumber = '', $lastDigitsToShow = 3)
//     {
//         if (!empty($mobileNumber)) {
//             $totalLength = strlen($mobileNumber);

//             // Check if the number is long enough to hide some digits
//             if ($totalLength > $lastDigitsToShow) {
//                 // Calculate how many characters to mask
//                 $maskLength = $totalLength - $lastDigitsToShow;

//                 // Mask the middle part and keep the last digits
//                 $maskedNumber = str_repeat('*', $maskLength) . substr($mobileNumber, -$lastDigitsToShow);
//             } else {
//                 // If the number is too short, just return it as is
//                 $maskedNumber = $mobileNumber;
//             }

//             return $maskedNumber;
//         } else {
//             return false;
//         }
//     }
// }

// if (!function_exists('getInitials')) {
//     function getInitials($fullName)
//     {
//         $words = explode(' ', $fullName);
//         $initials = '';

//         foreach ($words as $word) {
//             if (!empty($word)) {
//                 $initials .= strtoupper($word[0]);
//             }
//         }

//         return substr($initials, 0, 2);
//     }
// }

// format number by count of groups
if (!function_exists('formatByGroups')) {
    function formatByGroups($number = '', $group = 5)
    {
        if (!empty($number)) {
            return trim(preg_replace('/(\d{' . $group . '})(?=\d)/', '$1 ', $number));
        } else {
            return false;
        }
    }
}

// clearing string
// if (! function_exists('cleanString')) {
//     function cleanString($string, $removeChars = []) {
//         // Ensure the input array is not empty
//         if (!empty($removeChars)) {
//             return str_replace($removeChars, '', $string);
//         }
//         return $string; // Return the original string if no characters are specified
//     }
// }

if (!function_exists('numberToGujaratiWords')) {
    function numberToGujaratiWords($number)
    {
        if ($number == 0) return 'શૂન્ય';

        $words = array(
            1 => 'એક', 2 => 'બે', 3 => 'ત્રણ', 4 => 'ચાર', 5 => 'પાંચ', 6 => 'છ', 7 => 'સાત', 8 => 'આઠ', 9 => 'નવ', 10 => 'દસ',
            11 => 'અગિયાર', 12 => 'બાર', 13 => 'તેર', 14 => 'ચૌદ', 15 => 'પંદર', 16 => 'સોળ', 17 => 'સત્તર', 18 => 'અઢાર', 19 => 'ઓગણીસ', 20 => 'વીસ',
            21 => 'એકવીસ', 22 => 'બાવીસ', 23 => 'તેવીસ', 24 => 'ચોવીસ', 25 => 'પચીસ', 26 => 'છવ્વીસ', 27 => 'સત્યાવીસ', 28 => 'અઠ્ઠાવીસ', 29 => 'ઓગણત્રીસ', 30 => 'ત્રીસ',
            31 => 'એકત્રીસ', 32 => 'બત્રીસ', 33 => 'તેત્રીસ', 34 => 'ચોત્રીસ', 35 => 'પાંત્રીસ', 36 => 'છત્રીસ', 37 => 'સાડત્રીસ', 38 => 'આડત્રીસ', 39 => 'ઓગણચાલીસ', 40 => 'ચાલીસ',
            41 => 'એકતાલીસ', 42 => 'બેતાલીસ', 43 => 'તેતાલીસ', 44 => 'ચોતાલીસ', 45 => 'પિસ્તાલીસ', 46 => 'છેતાલીસ', 47 => 'સુડતાલીસ', 48 => 'અડતાલીસ', 49 => 'ઓગણપચાસ', 50 => 'પચાસ',
            51 => 'એકાવન', 52 => 'બાવન', 53 => 'ત્રેપન', 54 => 'ચોપન', 55 => 'પંચાવન', 56 => 'છપ્પન', 57 => 'સત્તાવન', 58 => 'અઠ્ઠાવન', 59 => 'ઓગણસાઇઠ', 60 => 'સાઇઠ',
            61 => 'એકસઠ', 62 => 'બાસઠ', 63 => 'ત્રેસઠ', 64 => 'ચોસઠ', 65 => 'પાંસઠ', 66 => 'છાસઠ', 67 => 'સડસઠ', 68 => 'અડસઠ', 69 => 'ઓગણસિત્તેર', 70 => 'સિત્તેર',
            71 => 'એકોતેર', 72 => 'બોતેર', 73 => 'તોતેર', 74 => 'ચુમોતેર', 75 => 'પંચોતેર', 76 => 'છોતેર', 77 => 'સિત્યોતેર', 78 => 'ઈઠ્યોતેર', 79 => 'ઓગણએંસી', 80 => 'એંસી',
            81 => 'એક્યાસી', 82 => 'બ્યાસી', 83 => 'ત્યાસી', 84 => 'ચોર્યાસી', 85 => 'પંચાસી', 86 => 'છ્યાસી', 87 => 'સત્યાસી', 88 => 'અઠ્યાસી', 89 => 'નેવ્યાસી', 90 => 'નેવું',
            91 => 'એકાણું', 92 => 'બાણું', 93 => 'ત્રાણું', 94 => 'ચોરાણું', 95 => 'પંચાણું', 96 => 'છેન્નું', 97 => 'સત્તાણું', 98 => 'અઠ્ઠાણું', 99 => 'નવ્વાણું', 100 => 'સો', 1000 => 'હજાર', 10000 => 'દસ હજાર'
        );

        $result = '';

        if ($number >= 10000000) {
            $crore = floor($number / 10000000);
            $result .= numberToGujaratiWords($crore) . ' કરોડ ';
            $number %= 10000000;
        }

        if ($number >= 100000) {
            $lakh = floor($number / 100000);
            $result .= numberToGujaratiWords($lakh) . ' લાખ ';
            $number %= 100000;
        }

        if ($number >= 1000) {
            $thousand = floor($number / 1000);
            $result .= numberToGujaratiWords($thousand) . ' હજાર ';
            $number %= 1000;
        }

        if ($number >= 100) {
            $hundred = floor($number / 100);
            $result .= numberToGujaratiWords($hundred) . ' સો ';
            $number %= 100;
        }

        if ($number > 0) {
            if ($result != '') $result .= ' ';
            $result .= $words[(int)$number];
        }

        return trim($result);
    }
}
