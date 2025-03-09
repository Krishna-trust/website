@extends('layouts.web')

@section('title', __('messages.privacy_policy') . ' - ' . __('messages.trust_name'))

@section('content')

<body>
    <main class="container pt-3">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-auto">
                <h1>{{ trans('messages.privacy_policy') }}</h1>
            </div>
            <div class="col-auto">
                <h4>Updated on: 20 May 2025</h4>
            </div>
        </div>
        <section>
            <!-- <h2>Introduction</h2> -->
            <p>At {{ trans('messages.trust_name') }}, we are committed to protecting your privacy. This Privacy Policy outlines the types of personal information we collect and how we use, protect, and share it. By using our website and services, you agree to the practices described in this policy.</p>

            <h2>Information We Collect</h2>
            <p>We collect the following types of information:</p>
            <ul>
                <li><strong>Personal Identification Information:</strong> When you donate, request services, or contact us, we may collect personal information such as your name, email address, phone number, and PAN card number (for tax exemption purposes).</li>
                <li><strong>Non-Personal Information:</strong> We may collect non-personal information such as your IP address, browser type, and usage data to improve the functionality of our website.</li>
            </ul>

            <h2>How We Use Your Information</h2>
            <p>We use your personal information to:</p>
            <ul>
                <li>Provide you with the services you request, such as food, medical assistance, or educational support.</li>
                <li>Process donations and provide you with tax exemption receipts.</li>
                <li>Communicate with you about our programs and updates.</li>
            </ul>

            <h2>Data Protection</h2>
            <p>We take the protection of your personal information seriously. We implement appropriate security measures to safeguard your data from unauthorized access or disclosure.</p>

            <h2>Sharing of Information</h2>
            <p>We will never sell or rent your personal information to third parties. However, we may share your information with trusted service providers or legal authorities if required by law or to ensure the operation of our services.</p>

            <h2>Use of PAN Card Information</h2>
            <p>If you choose to donate and require a tax exemption, we may request your PAN card number. This information will only be used for the purpose of issuing tax receipts and will be kept confidential.</p>

            <h2>Cookies</h2>
            <p>Our website may use cookies to enhance your experience. Cookies are small files stored on your device that help us improve website functionality. You can choose to disable cookies through your browser settings.</p>

            <h2>Your Rights</h2>
            <p>You have the right to access, correct, or delete your personal information. If you wish to exercise any of these rights, please contact us at our location or mobile number.</p>

            <h2>Changes to This Privacy Policy</h2>
            <p>We reserve the right to update this Privacy Policy at any time. Any changes will be posted on this page, and the updated date will be reflected at the top of this page.</p>

            <h2>Contact Us</h2>
            <p>If you have any questions or concerns about this Privacy Policy or our practices, please contact us at our location or mobile number.</p>
        </section>
    </main>

</body>
@endsection
