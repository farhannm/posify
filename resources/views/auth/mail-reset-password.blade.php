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
            margin: 0;
            padding: 0;
        }

        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }

        .box {
            position: relative;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.75rem; /* rounded-lg */
            padding: 2rem;
            max-width: 36rem;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            z-index: 1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(59, 130, 246, 0.2);
            z-index: -1; 
        }

        .circle-1 {
            width: 200px;
            height: 200px;
            top: 80px;
            left: 80px;
        }

        .circle-2 {
            width: 150px;
            height: 150px;
            top: 150px;
            left: 50px;
        }

        .circle-3 {
            width: 250px;
            height: 250px;
            top: 350px;
            left: 350px;
        }

        .circle-4 {
            width: 100px;
            height: 100px;
            top: 90px;
            right: 60px;
        }

        .text-center {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo {
            margin: 0 auto;
            margin-bottom: 1rem;
            height: 5rem;
            width: 4rem;
        }

        .heading {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1e293b;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .text-sm {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.625rem 1.25rem;
            border-radius: 9999px;
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
            background-color: #3b82f6;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }

        .btn:hover {
            background-color: #1d4ed8;
        }

        .btn:focus, .btn:active {
            background-color: #1e40af;
        }

        .font-extrabold {
            font-weight: 800;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 2.5rem;
        }

        .icon {
            width: 1.5rem;
            height: 1.5rem;
            vertical-align: middle;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .circle-1, .circle-2, .circle-3, .circle-4 {
                display: none;
            }

            .box {
                padding: 1.5rem;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            }
        }

        @media (max-width: 480px) {
            .heading {
                font-size: 1.25rem;
            }

            .btn {
                font-size: 0.75rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <main class="container">
        <!-- Box Container -->
        <div class="box">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
            <div class="circle circle-4"></div>
            <div class="text-center">
                <!-- Logo -->
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="logo">
                <h2 class="heading">Reset Password</h2>
            </div>

            <div class="text-center">
                <p class="text-sm">
                    Klik tombol di bawah ini untuk reset password
                </p>
            </div>

            <div class="text-center mt-10">
                <a class="btn">
                    Reset Password
                </a>
            </div>

            <p class="text-center text-sm font-normal">
                Jika kamu <span class="font-extrabold">tidak</span> merasa melakukan reset password <span class="font-extrabold">abaikan</span> pesan ini
            </p>

            <!-- Social Media Section -->
            <section id="social" class="text-center mt-20">
                <h2 class="text-l font-base text-center mb-3">Follow Us!</h2>
                <div class="social-icons">
                    <a href="https://www.instagram.com/posify.id/" target="_blank">
                        <img src="{{ asset('images/Instagram.jpg') }}" alt="instagram" class="icon">
                    </a>
                </div>
           </section>
        </div>
    </main>
</body>
</html>