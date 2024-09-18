<style>
    .active-nav {
      color: #4F46E5 !important; 
      font-weight: 500;
    }
  </style>
  
  <x-base-layout>
    <header class="w-full bg-white fixed top-0 left-0 z-1">
      <div class="container mx-auto flex justify-between items-center" style="height: 80px !important">
        <div class="flex items-center">
          <img class="w-32 h-32 object-contain" src="{{ asset('images/logo_text.png') }}" alt="Posify" />
        </div>
        <nav class="flex space-x-8 text-xs+">
          <a href="#home" class="nav-link text-[#A8AAAE] hover:text-[#4F46E5]">Overview</a>
          <a href="#features" class="nav-link text-[#A8AAAE] hover:text-[#4F46E5]">Features</a>
          <a href="#dok" class="nav-link text-[#A8AAAE] hover:text-[#4F46E5]">Dokumentasi</a>
        </nav>
        <div class="flex items-center justify-end">
            <a href="{{ route('login')}}" class="text-xs+ font-semibold text-[#1E1E1E] hover:underline">Login</a>
            <a href="#" class="flex items-center border rounded-lg px-4 py-2 ml-4 bg-[#F7F7F7] hover:shadow-lg transition-shadow">
              <div class="flex flex-col">
                <span class="text-sm+ font-semibold text-primary">Get Started</span>
              </div>
            </a>
        </div>          
      </div>
    </header>
  
    <main class="w-full bg-white">
      <section id="home" class="h-screen bg-cover bg-center flex flex-col items-center justify-center" style="background-image: url('{{ asset('images/pattern.png') }}'); background-size: cover;">
        <div class="text-center">
          <div class="flex justify-center items-center space-x-4 mb-4">
            <div class="flex items-center space-x-8 bg-white shadow-lg py-1 px-1 rounded-full">
              <!-- Icon -->
              <div class="flex items-center space-x-2">
                  <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-700">
                      <img src="{{ asset('images/posify_dark.png')}}" alt="posify">
                  </div>
                  <span class="font-bold text-gray-900 text-xl">100+</span>
                  <span class="text-gray-400">website aktif</span>
              </div>
          
              <!-- Halaman Dilihat -->
              <div class="flex items-center space-x-2">
                  <span class="font-bold text-gray-900 text-xl">2jt*</span>
                  <span class="text-gray-400">halaman dilihat</span>
              </div>
          
              <!-- Lokasi -->
              <div class="flex items-center space-x-2">
                  <span class="font-bold text-gray-900 text-xl">20+</span>
                  <span class="text-gray-400 pr-2">lokasi</span>
              </div>
            </div>          
          </div>
          
          <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mt-24">
            Bawa bisnis Anda ke level berikutnya,<br>
            dengan solusi cerdas dan terintegrasi
          </h1>
          
          <p class="mt-6 text-xl  text-gray-600 leading-8">
            <strong>Sederhana</strong>, <strong>Cepat</strong>, dan <strong>Efisien</strong>. Kami, kelola pesanan, kasir, dan laporan bisnis <br> Anda dalam satu platform terintegrasi.
          </p>
          
          <div class="mt-12 space-x-4">
            <a href="#" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 font-medium">Explore lebih jauh</a>
            <a href="#" class="text-gray-700 px-6 py-3 font-medium hover:underline">WhatsApp kami</a>
          </div>
        </div>
      </section>
      
      <section id="features" class="h-screen flex flex-col items-center justify-center w-full bg-white">
        <div class="flex space-x-8 mb-8">
          <button id="dashboard-btn" class="text-black text-base font-medium hover:text-black focus:outline-none transition-all duration-300">Dashboard</button>
          <button id="kasir-btn" class="text-slate-400 text-base hover:text-black focus:outline-none transition-all duration-300">Kasir</button>
        </div>
        <img id="preview-image" src="{{ asset('images/preview.png')}}" alt="Preview" class="w-6/12 h-auto mt-10 transition-transform duration-500 transform">
      </section>
      
      <section id="dok" class="h-screen flex items-center justify-center w-full">
        <h2>dok</h2>
      </section>
      
      <footer class="w-full relative h-20 flex items-center justify-between bg-white z-20 px-6 py-6">
        <p class="mt-4 text-slate-400 justify-end" style="font-size: 10px">Hak cipta © 2024 Posify. Seluruh hak cipta dilindungi undang-undang.</p>
      </footer>
    </main>
    
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');
    
        function changeLinkState() {
          let index = sections.length;
    
          while (--index && window.scrollY + 50 < sections[index].offsetTop) {}
          
          navLinks.forEach((link) => link.classList.remove('active-nav'));
          navLinks[index].classList.add('active-nav');
        }
    
        changeLinkState();
        window.addEventListener('scroll', changeLinkState);
    
        navLinks.forEach((link) => {
          link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = e.currentTarget.getAttribute('href').substring(1);
            document.getElementById(targetId).scrollIntoView({ behavior: 'smooth' });
          });
        });
      });

      const dashboardBtn = document.getElementById('dashboard-btn');
      const kasirBtn = document.getElementById('kasir-btn');
      const previewImage = document.getElementById('preview-image');

      const setActiveTab = (buttonToActivate, buttonToDeactivate, newImageSrc) => {
        previewImage.src = newImageSrc;
        previewImage.classList.add('scale-110');
        setTimeout(() => {
          previewImage.classList.remove('scale-110');
        }, 800);

        buttonToActivate.classList.remove('text-slate-400');
        buttonToActivate.classList.add('text-black', 'font-medium');
        buttonToDeactivate.classList.remove('text-black', 'font-medium');
        buttonToDeactivate.classList.add('text-slate-400');
      }

      document.addEventListener('DOMContentLoaded', () => {
        setActiveTab(dashboardBtn, kasirBtn, "{{ asset('images/admin_dashboard.png') }}");
      });

      dashboardBtn.addEventListener('click', function() {
        setActiveTab(dashboardBtn, kasirBtn, "{{ asset('images/admin_dashboard.png') }}");
      });

      kasirBtn.addEventListener('click', function() {
        setActiveTab(kasirBtn, dashboardBtn, "{{ asset('images/preview.png') }}");
      });
    </script>
  </x-base-layout>
  