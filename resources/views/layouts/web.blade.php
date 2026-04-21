<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
@php
    $isGu   = app()->getLocale() === 'gu';

    $seoTitle = $isGu
        ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ'
        : 'Krishna Niswarth Seva Trust';

    $seoDesc = $isGu
        ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ | નારણપુરા, અમદાવાદ — એકલા રહેતા મધ્યમ વર્ગના અશક્ત વડીલોને ઘરે વિનામૂલ્યે પૌષ્ટિક ભોજન પહોંચાડે છે. ૨૬૪+ લાભાર્થીઓ. દાન કરો — સેવા, પ્રેમ અને કરુણા.'
        : 'Krishna Niswarth Seva Trust | Naranpura, Ahmedabad — Providing free home-delivered nutritious meals to elderly & disabled individuals living alone. Donate to support 264+ beneficiaries.';

    $seoKeywords = $isGu
        ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ, ક્રિષ્ના નિસ્વાર્થ સેવા ટ્રસ્ટ નારણપુરા, ક્રિષ્ના નિસ્વાર્થ સેવા ટ્રસ્ટ અમદાવાદ, ક્રિષ્ના સેવા ટ્રસ્ટ, ક્રિષ્ના ટ્રસ્ટ, ક્રિષ્ના ટ્રસ્ટ નારણપુરા, ક્રિષ્ના ટ્રસ્ટ ગોતા, ક્રિષ્ના ટ્રસ્ટ અમદાવાદ, નારણપુરા, વિના મૂલ્યે ટિફીન સેવા, વૃદ્ધ સેવા, ઘરે ભોજન, NGO અમદાવાદ, ચેરિટી ગુજરાત, ૮૦G કર મુક્તિ, Krishna Niswarth Seva Trust, free tiffin Ahmedabad, elderly meal service Gujarat'
        : 'Krishna Niswarth Seva Trust, Krishna Niswarth Seva Trust Naranpura, Krishna Niswarth Seva Trust Ahmedabad, Krishna Seva Trust, Krishna Trust Naranpura, Krishna Trust Ahmedabad, Naranpura, free food, free tiffin, elderly meal service, NGO Ahmedabad, charity Gujarat, 80G tax exemption, ક્રિષ્ના નિસ્વાર્થ સેવા ટ્રસ્ટ, વિના મૂલ્યે ટિફીન સેવા';

    $ogLocale     = $isGu ? 'gu_IN' : 'en_IN';
    $ogLocaleAlt  = $isGu ? 'en_IN' : 'gu_IN';

    $schemaName = $isGu ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ' : 'Krishna Niswarth Seva Trust';
    $schemaDesc = $isGu
        ? 'નારણપુરા, અમદાવાદમાં એકલા રહેતા મધ્યમ વર્ગના અશક્ત વડીલોને ઘરે વિનામૂલ્યે બે સમયનું પૌષ્ટિક ભોજન પહોંચાડવામાં આવે છે.'
        : 'Providing free home-delivered nutritious meals twice daily to elderly and disabled individuals living alone in Naranpura, Ahmedabad.';
    $schemaStreet   = $isGu ? 'ઈ-૭, પ્રેમકુંજ સોસાયટી, મીરામ્બિકા સ્કૂલ સામે' : 'E-7, Premkunj Society, Opp. Mirambika School';
    $schemaLocality = $isGu ? 'નારણપુરા, અમદાવાદ' : 'Naranpura, Ahmedabad';
    $schemaRegion   = $isGu ? 'ગુજરાત' : 'Gujarat';
    $schemaCity     = $isGu ? 'અમદાવાદ' : 'Ahmedabad';

    $reviewAuthor = $isGu ? 'ચંદ્રકાંતભાઈ પટેલ' : 'Chandrakantbhai Patel';
    $reviewBody   = $isGu
        ? 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ ૩૬૫ દિવસ, અવિરત વૃદ્ધ વડીલોને વિનામૂલ્યે ભોજન પહોંચાડે છે — આ ખરેખર અનુકરણીય સેવાભાવ છે.'
        : 'Excellent service — Krishna Niswarth Seva Trust delivers free meals to elderly people 365 days a year without a break.';
@endphp
<html lang="{{ app()->getLocale() }}" itemscope itemtype="https://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $seoTitle)</title>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WJRKNRWH');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EWS1NNPFEV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-EWS1NNPFEV');
    </script>
    <!-- End Google tag -->

    <!-- Primary Meta Tags -->
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <meta name="author" content="Krishna Niswarth Seva Trust">
    <meta name="description" content="@yield('meta_description', $seoDesc)">
    <meta name="keywords" content="@yield('meta_keywords', $seoKeywords)">
    <meta name="language" content="{{ $isGu ? 'Gujarati' : 'English' }}">

    <!-- Geo Tags for Local SEO -->
    <meta name="geo.region" content="IN-GJ">
    <meta name="geo.placename" content="{{ $isGu ? 'નારણપુરા, અમદાવાદ, ગુજરાત' : 'Naranpura, Ahmedabad, Gujarat' }}">
    <meta name="geo.position" content="23.054789642390173;72.55389999569623">
    <meta name="ICBM" content="23.054789642390173, 72.55389999569623">

    <!-- Open Graph Tags -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $seoTitle }}">
    <meta property="og:locale" content="{{ $ogLocale }}">
    <meta property="og:locale:alternate" content="{{ $ogLocaleAlt }}">
    <meta property="og:title" content="@yield('og_title', $seoTitle)">
    <meta property="og:description" content="@yield('og_description', $seoDesc)">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:alt" content="{{ $seoTitle }} Logo">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', $seoTitle)">
    <meta name="twitter:description" content="@yield('og_description', $seoDesc)">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:image:alt" content="{{ $seoTitle }} Logo">

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Structured Data — NGO -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NGO",
            "name": "{{ $schemaName }}",
            "alternateName": "{{ $isGu ? 'Krishna Niswarth Seva Trust' : 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ' }}",
            "description": "{{ $schemaDesc }}",
            "logo": "{{ asset('images/logo.png') }}",
            "image": "{{ asset('images/logo.png') }}",
            "telephone": ["+919898445831", "+918128445831"],
            "email": "krishnaniswarthsevatrust@gmail.com",
            "url": "https://www.krishnaniswarthsevatrust.com/",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $schemaStreet }}",
                "addressLocality": "{{ $schemaLocality }}",
                "addressRegion": "{{ $schemaRegion }}",
                "postalCode": "380013",
                "addressCountry": "IN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "23.054789642390173",
                "longitude": "72.55389999569623"
            },
            "sameAs": [
                "https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P",
                "https://www.facebook.com/people/Krishna-Niswarth-Seva-Trust/pfbid02JJW4F82dQP3szekEKW7R3cfHeGLG8jAK8USN19vivRu8dVQJUVwBmzfUZz6Y7FMyl/",
                "https://www.youtube.com/@krishnaniswarthsevatrust",
                "https://www.instagram.com/krishnaniswarth/"
            ],
            "foundingDate": "2016",
            "areaServed": {
                "@type": "City",
                "name": "{{ $schemaCity }}"
            },
            "knowsAbout": [
                "{{ $isGu ? 'વૃદ્ધ સંભાળ' : 'Elderly Care' }}",
                "{{ $isGu ? 'ભોજન પહોંચાડવું' : 'Meal Delivery' }}",
                "{{ $isGu ? 'સામુદાયિક સેવા' : 'Community Service' }}",
                "{{ $isGu ? 'દિવ્યાંગ સહાય' : 'Disability Support' }}"
            ]
        }
    </script>

    <!-- Structured Data — Organization with Aggregate Rating -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{ $schemaName }}",
            "url": "https://www.krishnaniswarthsevatrust.com/",
            "logo": "{{ asset('images/logo.png') }}",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.8",
                "bestRating": "5",
                "worstRating": "1",
                "reviewCount": "50"
            },
            "review": {
                "@type": "Review",
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5",
                    "bestRating": "5"
                },
                "author": {
                    "@type": "Person",
                    "name": "{{ $reviewAuthor }}"
                },
                "reviewBody": "{{ $reviewBody }}"
            }
        }
    </script>

    <!-- Structured Data — WebSite with SearchAction -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "{{ $schemaName }}",
            "url": "https://www.krishnaniswarthsevatrust.com/",
            "inLanguage": ["en", "gu"],
            "description": "{{ $schemaDesc }}",
            "publisher": {
                "@type": "NGO",
                "name": "{{ $schemaName }}",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('images/logo.png') }}"
                }
            }
        }
    </script>

    <!-- Structured Data — LocalBusiness (strong local SEO signal) -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": ["LocalBusiness", "NGO"],
            "name": "{{ $schemaName }}",
            "alternateName": "{{ $isGu ? 'Krishna Niswarth Seva Trust' : 'ક્રિષ્ના નિ:સ્વાર્થ સેવા ટ્રસ્ટ' }}",
            "description": "{{ $schemaDesc }}",
            "url": "https://www.krishnaniswarthsevatrust.com/",
            "logo": "{{ asset('images/logo.png') }}",
            "image": "{{ asset('images/logo.png') }}",
            "telephone": ["+919898445831", "+918128445831"],
            "email": "krishnaniswarthsevatrust@gmail.com",
            "foundingDate": "2016",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "E-7, Premkunj Society, Opp. Mirambika School",
                "addressLocality": "Naranpura, Ahmedabad",
                "addressRegion": "Gujarat",
                "postalCode": "380013",
                "addressCountry": "IN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "23.054789642390173",
                "longitude": "72.55389999569623"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
                "opens": "07:00",
                "closes": "20:00"
            },
            "priceRange": "Free",
            "currenciesAccepted": "INR",
            "paymentAccepted": "Cash, UPI",
            "hasMap": "https://maps.app.goo.gl/FYnUp3QTuSUubZYK8",
            "sameAs": [
                "https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P",
                "https://www.facebook.com/people/Krishna-Niswarth-Seva-Trust/pfbid02JJW4F82dQP3szekEKW7R3cfHeGLG8jAK8USN19vivRu8dVQJUVwBmzfUZz6Y7FMyl/",
                "https://www.youtube.com/@krishnaniswarthsevatrust",
                "https://www.instagram.com/krishnaniswarth/"
            ]
        }
    </script>

    <!-- Page-specific structured data -->
    @yield('schema')

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Noto+Sans+Gujarati:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon & App Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <meta name="theme-color" content="#FF6B00">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Hreflang Tags for Multilingual Content -->
    <link rel="alternate" href="https://www.krishnaniswarthsevatrust.com/" hreflang="x-default" />
    <link rel="alternate" href="https://www.krishnaniswarthsevatrust.com/" hreflang="en" />
    <link rel="alternate" href="https://www.krishnaniswarthsevatrust.com/gu" hreflang="gu" />

    @yield('head')
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WJRKNRWH" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Office Relocation Popup -->
    {{-- <div id="relocationPopup" class="modal fade" tabindex="-1" aria-labelledby="popupTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 id="popupTitle" class="modal-title mb-3">📍 New Office Location!</h5>
                <img src="{{ asset('images/new-office-location.jpg') }}" alt="New Office"
                    class="img-fluid mb-3 rounded">
                <p class="mb-3">Our office has moved! Visit us at the new location shown above.</p>
                <a href="https://maps.app.goo.gl/TUG6X4dQHGptBaVi8?g_st=aw" target="_blank" class="btn btn-primary">
                    Set Location
                </a>
            </div>
        </div>
    </div> --}}

    <!-- New Office Location Popup (Gujarati) -->
    {{-- <div id="relocationPopup" class="modal fade" tabindex="-1" aria-labelledby="popupTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 id="popupTitle" class="modal-title mb-3">📍 નવું સંસ્થાનુ સ્થાન!</h5>
                <p class="mb-3">
                    અમારી સંસ્થા હવે નવા સ્થળે ખસેડાઈ ગઈ છે.
                </p>
                <a href="https://maps.app.goo.gl/TUG6X4dQHGptBaVi8?g_st=aw" target="_blank" class="btn btn-primary">
                    સ્થળ બતાવો
                </a>
            </div>
        </div>
    </div> --}}

    <!-- Include the header -->
    @include('web.parts.header')

    <!-- Main content -->
    @yield('content')

    <!-- Include the footer -->
    @include('web.parts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        window.addEventListener('load', function() {
            const hasSeenPopup = sessionStorage.getItem('hasSeenPopup');

            if (!hasSeenPopup) {
                const popup = new bootstrap.Modal(document.getElementById('relocationPopup'));
                popup.show();
                sessionStorage.setItem('hasSeenPopup', 'true');
            } else {
                let isHardRefresh = performance.navigation.type === 1;
                if (performance.getEntriesByType("navigation")[0]?.type === "reload") {
                    isHardRefresh = true;
                }
                if (isHardRefresh) {
                    const popup = new bootstrap.Modal(document.getElementById('relocationPopup'));
                    popup.show();
                }
            }
        });

        document.getElementById('subscribeForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const phone = document.getElementById('phone').value;

            if (phone && phone.length >= 10 && !isNaN(phone)) {
                document.getElementById('successMessage').style.display = 'block';
                document.getElementById('subscribeForm').style.display = 'none';

                const whatsappGroupLink = "https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P";
                const whatsappLink = whatsappGroupLink.replace('phone_number', phone);

                setTimeout(function() {
                    window.open(whatsappLink, '_blank');
                }, 2000);
            } else {
                alert("{{ $isGu ? 'કૃપા કરી માન્ય ફોન નંબર દાખલ કરો.' : 'Please enter a valid phone number.' }}");
            }
        });
    </script>
</body>

</html>
