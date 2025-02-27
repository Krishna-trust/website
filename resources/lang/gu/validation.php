<?php
return [

    // Donation Validation
    'required_receipt_number' => 'રસીદ નંબર જરૂરી છે.',
    'string_receipt_number' => 'રસીદ નંબર માન્ય સ્ટ્રિંગ હોવું જોઈએ.',

    'required_date' => 'તારીખ જરૂરી છે.',
    'date_date' => 'તારીખ માન્ય તારીખ હોવું જોઈએ.',

    'required_full_name' => 'પૂર્ણ નામ જરૂરી છે.',
    'size_full_name' => 'પૂર્ણ નામ 1 થી 255 અક્ષરો વચ્ચે હોવું જોઈએ.',

    'required_mobile_number' => 'મોબાઇલ નંબર જરૂરી છે.',
    'size_mobile_number' => 'મોબાઇલ નંબર ચોક્કસ 10 અંક હોવો જોઈએ.',
    'regex_mobile_number' => 'મોબાઇલ નંબરમાં ફક્ત અંક હોવા જોઈએ.',

    'string_address' => 'સરનામું માન્ય સ્ટ્રિંગ હોવું જોઈએ.',

    'required_amount' => 'રકમ જરૂરી છે.',
    'numeric_amount' => 'રકમ માન્ય સંખ્યા હોવી જોઈએ.',
    'min_amount' => 'રકમ ઓછામાં ઓછું :min હોવી જોઈએ.',

    'required_donation_for' => 'દાન માટેનું કારણ જરૂરી છે.',
    'string_donation_for' => 'દાન માટેનું કારણ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',

    'string_comment' => 'ટિપ્પણી માન્ય સ્ટ્રિંગ હોવું જોઈએ.',

    'regex_pan_number' => 'પેન નંબર XXXXX9999X સ્વરૂપમાં હોવો જોઈએ.',

    'required_payment_mode' => 'ચુકવણીનો મોડ પસંદ કરવો જરૂરી છે.',
    'in_payment_mode' => 'ચુકવણી મોડમાંથી એક પસંદ કરો: નકદ, ચેક, અથવા ઓનલાઇન.',

    'string_bank_name' => 'બેંકનું નામ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',

    'string_cheque_number' => 'ચેક નંબર માન્ય સ્ટ્રિંગ હોવું જોઈએ.',

    'date_cheque_date' => 'ચેકની તારીખ માન્ય તારીખ હોવી જોઈએ.',

    'string_transaction_id' => 'લેણદેણ ID માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'date_transaction_date' => 'લેણદેણ તારીખ માન્ય તારીખ હોવી જોઈએ.',
    'required_transaction_date' => 'લેણદેણ તારીખ જરૂરી છે.',


    // Labharthi Validation
    'required_name' => 'નામ જરૂરી છે.',
    'string_name' => 'નામ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'max_name' => 'નામમાં ઓછામાં ઓછું :max અક્ષર હોવું જોઈએ.',
    'required_address' => 'સરનામું જરૂરી છે.',
    'string_address' => 'સરનામું માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'required_native_place' => 'મૂલભૂત સ્થાન જરૂરી છે.',
    'string_native_place' => 'મૂલભૂત સ્થાન માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'max_native_place' => 'મૂલભૂત સ્થાનમાં ઓછામાં ઓછું :max અક્ષર હોવું જોઈએ.',
    'required_cast' => 'કાસ્ટ જરૂરી છે.',
    'string_cast' => 'કાસ્ટ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'max_cast' => 'કાસ્ટમાં ઓછામાં ઓછું :max અક્ષર હોવું જોઈએ.',
    'required_sub_cast' => 'ઉપ કાસ્ટ જરૂરી છે.',
    'string_sub_cast' => 'ઉપ કાસ્ટ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'max_sub_cast' => 'ઉપ કાસ્ટમાં ઓછામાં ઓછું :max અક્ષર હોવું જોઈએ.',
    'required_adhar_number' => 'આધાર નંબર જરૂરી છે.',
    'string_adhar_number' => 'આધાર નંબર માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'size_adhar_number' => 'આધાર નંબરમાં ચોક્કસ :size અંકો હોવા જોઈએ.',
    'regex_adhar_number' => 'આધાર નંબરમાં ફક્ત અંક હોવા જોઈએ.',
    'required_mobile_number' => 'મોબાઇલ નંબર જરૂરી છે.',
    'string_mobile_number' => 'મોબાઇલ નંબર માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'size_mobile_number' => 'મોબાઇલ નંબરમાં ચોક્કસ :size અંકો હોવા જોઈએ.',
    'regex_mobile_number' => 'મોબાઇલ નંબરમાં ફક્ત અંક હોવા જોઈએ.',
    'required_category' => 'કાર્યક્રમ જરૂરી છે.',
    'required_work' => 'કામ જરૂરી છે.',
    'string_work' => 'કામ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'max_work' => 'કામમાં ઓછામાં ઓછું :max અક્ષર હોવું જોઈએ.',
    'required_identification_mark' => 'આઈડેન્ટિફિકેશન માર્ક જરૂરી છે.',
    'string_identification_mark' => 'આઈડેન્ટિફિકેશન માર્ક માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'max_identification_mark' => 'આઈડેન્ટિફિકેશન માર્કમાં ઓછામાં ઓછું :max અક્ષર હોવું જોઈએ.',
    'required_income_source' => 'આવકનો સ્ત્રોત જરૂરી છે.',
    'string_income_source' => 'આવકનો સ્ત્રોત માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'required_property' => 'સમ્મત મિલકત જરૂરી છે.',
    'string_property' => 'સમ્મત મિલકત માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'required_reasion_for_not_working' => 'કામ ન કરવાનો કારણ જરૂરી છે.',
    'string_reasion_for_not_working' => 'કામ ન કરવાનો કારણ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'required_reasion_for_tifin' => 'ટીફિન માટેનો કારણ જરૂરી છે.',
    'string_reasion_for_tifin' => 'ટીફિન માટેનો કારણ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'required_comment_from_trust' => 'ટ્રસ્ટ પાસેથી ટિપ્પણી જરૂરી છે.',
    'string_comment_from_trust' => 'ટ્રસ્ટ પાસેથી ટિપ્પણી માન્ય સ્ટ્રિંગ હોવું જોઈએ.',
    'required_tifin_starting_date' => 'ટીફિન શરૂ થવાની તારીખ જરૂરી છે.',
    'date_tifin_starting_date' => 'ટીફિન શરૂ થવાની તારીખ માન્ય તારીખ હોવી જોઈએ.',
    'required_tifin_ending_date' => 'ટીફિન સમાપ્ત થવાની તારીખ જરૂરી છે.',
    'date_tifin_ending_date' => 'ટીફિન સમાપ્ત થવાની તારીખ માન્ય તારીખ હોવી જોઈએ.',
    'required_reasion_for_tifin_stop' => 'ટીફિન બંધ થવાનું કારણ જરૂરી છે.',
    'string_reasion_for_tifin_stop' => 'ટીફિન બંધ થવાનું કારણ માન્ય સ્ટ્રિંગ હોવું જોઈએ.',

];
