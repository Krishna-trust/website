<?php
return [
    // Login Validation
    'required_email' => 'Email is required.',
    'string_email' => 'Email must be a valid string.',
    'required_password' => 'Password is required.',

    // Registration Validation
    'email_unique' => 'Email is already taken.',
    'required_name' => 'Name is required.',
    'string_name' => 'Name must be a valid string.',
    'max_name' => 'Name must be at most :max characters.',
    'required_password' => 'Password is required.',
    'string_password' => 'Password must be a valid string.',
    'min_password' => 'Password must be at least :min characters.',
    'confirmed_password' => 'Password confirmation does not match.',
    'required_password_confirmation' => 'Password confirmation is required.',
    'string_password_confirmation' => 'Password confirmation must be a valid string.',
    'min_password_confirmation' => 'Password confirmation must be at least :min characters.',

    // change password validation
    'required_current_password' => 'current password is required',
    'string_current_password' => 'current password must be a valid string',

    'required_new_password' => 'new password is required',
    'string_new_password' => 'new password must be a valid string',

    'required_confirm_new_password' => 'confirm new password is required',
    'string_confirm_new_password' => 'confirm new password must be a valid string',

    // Donation Validation
    'required_receipt_number' => 'Receipt number is required.',
    'string_receipt_number' => 'Receipt number must be a valid string.',

    'required_date' => 'Date is required',
    'date_date' => 'Date must be a valid Date',

    'required_full_name' => 'Full name is required.',
    'size_full_name' => 'Full name must be between 1 and 255 characters.',

    'required_mobile_number' => 'Mobile number is required.',
    'size_mobile_number' => 'Mobile number must be exactly 10 digits.',
    'regex_mobile_number' => 'Mobile number must contain only digits.',

    'string_address' => 'Address must be a valid string.',

    'required_amount' => 'Amount is required.',
    'numeric_amount' => 'Amount must be a valid number.',
    'min_amount' => 'Amount must be at least :min.',

    'required_donation_for' => 'Donation for is required.',
    'string_donation_for' => 'Donation for must be a valid string.',

    'string_comment' => 'Comment must be a valid string.',

    // 'required_pan_number' => 'Pan number is required.',
    'regex_pan_number' => 'Pan number must be in the format XXXXX9999X.',

    'required_payment_mode' => 'Payment mode is required.',
    'in_payment_mode' => 'Payment mode must be one of the following: cash, cheque, or online.',

    'string_bank_name' => 'Bank name must be a valid string.',

    'string_cheque_number' => 'Check number must be a valid string.',

    'date_cheque_date' => 'Check date must be a valid date.',

    'string_transaction_id' => 'Transaction ID must be a valid string.',
    'date_transaction_date' => 'Transaction date must be a valid date.',
    'required_transaction_date' => 'Transaction date is required.',



    // Labharthi Validation
    'required_name' => 'Name is required.',
    'string_name' => 'Name must be a valid string.',
    'max_name' => 'Name must be at most :max characters.',
    'required_address' => 'Address is required.',
    'string_address' => 'Address must be a valid string.',
    'required_native_place' => 'Native place is required.',
    'string_native_place' => 'Native place must be a valid string.',
    'max_native_place' => 'Native place must be at most :max characters.',
    'required_cast' => 'Cast is required.',
    'string_cast' => 'Cast must be a valid string.',
    'max_cast' => 'Cast must be at most :max characters.',
    'required_sub_cast' => 'Sub cast is required.',
    'string_sub_cast' => 'Sub cast must be a valid string.',
    'max_sub_cast' => 'Sub cast must be at most :max characters.',
    'required_adhar_number' => 'Adhar number is required.',
    'string_adhar_number' => 'Adhar number must be a valid string.',
    'size_adhar_number' => 'Adhar number must be exactly :size digits.',
    'regex_adhar_number' => 'Adhar number must contain only digits.',
    'required_mobile_number' => 'Mobile number is required.',
    'string_mobile_number' => 'Mobile number must be a valid string.',
    'size_mobile_number' => 'Mobile number must be exactly :size digits.',
    'regex_mobile_number' => 'Mobile number must contain only digits.',
    'required_category' => 'Category is required.',
    'required_work' => 'Work is required.',
    'string_work' => 'Work must be a valid string.',
    'max_work' => 'Work must be at most :max characters.',
    'required_identification_mark' => 'Identification mark is required.',
    'string_identification_mark' => 'Identification mark must be a valid string.',
    'max_identification_mark' => 'Identification mark must be at most :max characters.',
    'required_income_source' => 'Income source is required.',
    'string_income_source' => 'Income source must be a valid string.',
    'required_property' => 'Property is required.',
    'string_property' => 'Property must be a valid string.',
    'required_reasion_for_not_working' => 'Reason for not working is required.',
    'string_reasion_for_not_working' => 'Reason for not working must be a valid string.',
    'required_reasion_for_tifin' => 'Reason for TIFIN is required.',
    'string_reasion_for_tifin' => 'Reason for TIFIN must be a valid string.',
    'required_comment_from_trust' => 'Comment from trust is required.',
    'string_comment_from_trust' => 'Comment from trust must be a valid string.',
    'required_tifin_starting_date' => 'TIFIN starting date is required.',
    'date_tifin_starting_date' => 'TIFIN starting date must be a valid date.',
    'required_tifin_ending_date' => 'TIFIN ending date is required.',
    'date_tifin_ending_date' => 'TIFIN ending date must be a valid date.',
    'required_reasion_for_tifin_stop' => 'Reason for TIFIN stop is required.',
    'string_reasion_for_tifin_stop' => 'Reason for TIFIN stop must be a valid string.',

    // contact us validation
    'required_name' => 'Name is required.',
    'string_name' => 'Name must be a valid string.',
    'max_name' => 'Name must be at most :max characters.',
    'required_email' => 'Email is required.',
    'string_email' => 'Email must be a valid string.',
    'required_mobile_number' => 'Mobile number is required.',
    'size_mobile_number' => 'Mobile number must be exactly 10 digits.',
    'regex_mobile_number' => 'Mobile number must contain only digits.',
    'required_address' => 'Address is required.',
    'string_address' => 'Address must be a valid string.',
    'required_phone' => 'Phone is required.',
    'string_phone' => 'Phone must be a valid string.',
    'required_message' => 'Message is required.',
    'string_message' => 'Message must be a valid string.',
    'required_subject' => 'Subject is required.',
    'string_subject' => 'Subject must be a valid string.',

    // service validation
    'required_title' => 'title is required.',
    'required_description' => 'description is required.',
    'required_status' => 'Status is required.',
    'required_image' => 'Image is required.',
    'image' => 'Image must be a valid image.',
    'max' => 'Image must be at most :max kilobytes.',
    'uploaded' => 'Image must be uploaded.',
];
