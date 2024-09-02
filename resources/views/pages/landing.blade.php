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
          <a href="#pricing" class="nav-link text-[#A8AAAE] hover:text-[#4F46E5]">Pricing</a>
        </nav>
        <div class="flex items-center justify-end">
            <a href="{{ route('login')}}" class="text-xs+ font-semibold text-[#1E1E1E]">Login</a>
            <a href="#" class="flex items-center border rounded-lg px-4 py-2 ml-4 bg-[#F7F7F7] hover:shadow-lg transition-shadow">
              <div class="flex flex-col">
                <span class="text-sm+ font-semibold text-primary">Get Started</span>
              </div>
            </a>
        </div>          
      </div>
    </header>
  
    <main class="w-full bg-white">
      <section id="home" class="-z-0 h-screen bg-cover bg-center bg-no-repeat flex flex-col items-center justify-center" style="background-image: url('{{ asset('images/pattern.png') }}');">
        <div class="mt-5">
          <img class="w-1/2 mx-auto" src="{{ asset('images/hero_image.png') }}" alt="Hero Image">
        </div>
      </section>
      
      <section id="features" class="flex items-center justify-center w-full h-full">
        <h2>Pricing</h2>
      </section>
      
      <section id="pricing" class="flex items-center justify-center w-full h-full">
        <h2>Pricing</h2>
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
    </script>
  </x-base-layout>
  