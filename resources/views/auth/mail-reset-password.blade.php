<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            background-color: #e5e7eb; /* bg-gray-200 */
            font-family: sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: auto;
        }

        .box {
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem; /* rounded-lg */
            padding: 20px;
            max-width: 36rem;
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .logo {
            margin: 0 auto;
            margin-bottom: 20px;
            height: 4rem;
            width: 4rem;
        }

        .heading {
            font-size: 1.5rem; /* text-2xl */
            font-weight: 600; /* font-semibold */
            color: #1e293b; /* text-slate-900 */
            margin-top: 1rem;
        }

        .text-sm {
            font-size: 0.875rem; /* text-sm */
            color: #64748b; /* text-slate-600 */
        }

        .mt-10 {
            margin-top: 2.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.625rem 1.25rem;
            border-radius: 9999px; /* rounded-full */
            color: white;
            font-size: 0.875rem; /* text-sm */
            font-weight: 500; /* font-medium */
            text-transform: uppercase;
            background-color: #3b82f6; /* bg-blue-500 */
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn:hover {
            background-color: #1d4ed8; /* bg-blue-700 */
        }

        .btn:focus, .btn:active {
            background-color: #1e40af; /* bg-blue-800 */
        }

        .font-extrabold {
            font-weight: 800;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
        }

        .social-btn {
            background-color: #3b82f6;
            padding: 0.5rem;
            font-weight: 600;
            color: white;
            display: inline-flex;
            align-items: center;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .social-btn:hover {
            background-color: #1d4ed8;
        }

        .social-btn:focus, .social-btn:active {
            background-color: #1e40af;
        }
    </style>
</head>
<body>
    <main class="container">
        <!-- Box Container -->
        <div class="box">
            <div class="text-center">
                <!-- Logo -->
                <img class="logo" src="{{ asset('images/logo.png')}}" alt="logo">
                <h2 class="heading">Reset Password</h2>
            </div>

            <div class="mt-1 text-center">
                <p class="text-sm">
                    Klik tombol di bawah ini untuk reset password
                </p>
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('validateForgotPasswordView', ['token' => $token]) }}" class="btn">
                    Reset Password
                </a>
            </div>

            <p class="text-center text-sm font-normal mt-10">
                Jika kamu <span class="font-extrabold">tidak</span> merasa melakukan reset password <span class="font-extrabold">abaikan</span> pesan ini
            </p>

            <!-- Social Media Section -->
            <section id="social" class="mt-20">
                <h2 class="text-l font-base text-center mb-3">Follow Us!</h2>
                <div class="social-icons">

                <img alt="Instagram Icon" src="https://ci3.googleusercontent.com/meips/ADKq_NZUedGKkwdQ9Jw0Y6ClifA4PDpAMyAW1-N0oAWzeWOkcqJmIjw5BHdJOBiVWHCOjj3duW-y3unrjqfIcT4-q92i1dDv5ljZKhjocQMimNWs1PnpumPVQ64k3JBtOtYDCrYTJFUV=s0-d-e1-ft#https://lolstatic-a.akamaihd.net/email-marketing/betabuddies/instagram-logo.png">
                <img alt="Instagram Icon" src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png">
                    <!-- Facebook -->
">

                    <a href="https://www.facebook.com" target="_blank" class="social-btn">
                        <svg class="w-5 h-5" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/posify.inc/" target="_blank" class="social-btn">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/yourphonenumber" target="_blank" class="social-btn">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>
                </div>
            </section>


        </div>
    </main>
</body>

</html>