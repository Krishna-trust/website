@extends('layouts.web')

@section('title', __('messages.terms_of_service') . ' - ' . __('messages.trust_name'))

@section('content')

<body>
    <main class="container pt-3">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-auto">
                <h1>{{ trans('messages.terms_of_service') }}</h1>
            </div>
            <div class="col-auto">
                <h4>Updated on: 20 May 2025</h4>
            </div>
        </div>

        <section>
            <!-- <h2>Introduction</h2> -->
            <p>Welcome to {{ trans('messages.trust_name') }}! These Terms and Conditions ("Terms") govern your use of our website, services, and programs. By accessing or using our website and services, you agree to comply with and be bound by these Terms. If you do not agree with these Terms, please do not use our services.</p>

            <h2>Our Services</h2>
            <p>{{ trans('messages.trust_name') }} is a charitable trust dedicated to supporting individuals in need. Our primary services include:</p>
            <ul>
                <li><strong>Free Food Distribution:</strong> We provide free meals to elderly individuals and others who require support but do not wish to ask their family or colleagues for help.</li>
                <li><strong>Medical Support:</strong> We provide medical assistance by offering free medicines to those in need.</li>
                <li><strong>Educational Support:</strong> We assist underprivileged students by providing books, educational materials, and help with tuition fees.</li>
            </ul>

            <h2>Eligibility for Services</h2>
            <p>To benefit from our services, individuals must meet the following criteria:</p>
            <ul>
                <li>Be in need of food, medical assistance, or educational support.</li>
                <li>Not have the ability to pay for these services or support themselves through family or colleagues.</li>
            </ul>

            <h2>Donation Policy</h2>
            <p>We greatly appreciate the generosity of donors who help us fulfill our mission. If you wish to donate to [Trust Name], we may request your PAN card number for tax exemption purposes. Your personal details, including the PAN card number, will be handled securely and used solely for the purpose of providing tax exemptions.</p>

            <h2>Use of Website</h2>
            <p>By using this website, you agree not to engage in any of the following activities:</p>
            <ul>
                <li>Attempting to access or disrupt the website’s functionality.</li>
                <li>Using the website for any illegal or harmful purpose.</li>
                <li>Misleading or providing false information in order to misuse the services offered.</li>
            </ul>

            <h2>Limitation of Liability</h2>
            <p>[Trust Name] is not responsible for any loss or damage caused by the use of the website or services. We strive to provide accurate and helpful support, but we make no guarantees regarding the results or outcomes.</p>

            <h2>Amendments</h2>
            <p>We reserve the right to modify or update these Terms and Conditions at any time. Any changes will be effective immediately upon posting the updated Terms on the website. We encourage you to periodically review this page.</p>

            <h2>Governing Law</h2>
            <p>These Terms are governed by the laws of [Your Country/State]. Any disputes related to these Terms will be resolved in the courts located in Chandlodiya, Ahmedabad, India.</p>

            <h2>Contact Us</h2>
            <p>If you have any questions about these Terms and Conditions, please contact us at our location or mobile number..</p>
        </section>
    </main>

</body>
@endsection
