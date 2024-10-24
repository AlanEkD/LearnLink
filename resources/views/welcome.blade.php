<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <header class="w-full py-4 px-8 bg-white shadow-md flex justify-between items-center">
    <!-- Logo -->
    <div class="text-2xl font-bold text-indigo-700">LearnLink</div>
    
    <!-- Links -->
    <nav class="hidden md:flex space-x-8 text-indigo-700">
      <a href="#" class="hover:underline">Facultades</a>
      <a href="#" class="hover:underline">Cursos</a>
      <a href="#" class="hover:underline">Libros</a>
    </nav>

    <!-- Login Button -->
    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full shadow-lg">
      Iniciar sesión
    </button>
  </header>

  <!-- Sidebar Toggle Button for smaller screens -->
  <button class="toggle-btn fixed top-4 left-4 z-20 lg:hidden bg-indigo-700 text-white px-2 py-2 rounded-full" id="toggleBtn" onclick="toggleSidebar()">☰ Menú</button>

  <div class="flex">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-indigo-700 text-white transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 z-10">
      <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Menú</h2>
        <ul class="space-y-4 overflow-y-auto h-[calc(100vh-5rem)]">
          <li><button class="w-full text-left hover:bg-indigo-600 p-2 rounded-lg">Ingeniería Mecatrónica</button></li>
          <li><button class="w-full text-left hover:bg-indigo-600 p-2 rounded-lg">Ingeniería Biomédica</button></li>
          <li><button class="w-full text-left hover:bg-indigo-600 p-2 rounded-lg">Ingeniería Aeronáutica</button></li>
          <li><button class="w-full text-left hover:bg-indigo-600 p-2 rounded-lg">Ingeniería Mecánica y Eléctrica</button></li>
          <li><button class="w-full text-left hover:bg-indigo-600 p-2 rounded-lg">Ingeniería en Software</button></li>
          <!-- Añade más botones según sea necesario -->
        </ul>
      </div>
    </div>

    <!-- Main content -->
    <main class="flex-1 ml-0 lg:ml-64 min-h-screen flex flex-col items-center justify-center bg-gray-100">
      <div class="flex flex-col items-center">
        <img
          class="h-64 w-64 rounded-full shadow-xl bg-gradient-to-br from-indigo-500 to-purple-500"
          src="{{ asset('img/LOGO.png') }}"
          alt="Logo"
        >
      </div>
      <h1 class="text-5xl font-extrabold mt-8 text-indigo-700 text-center">
          Juntos seremos más inteligentes
      </h1>
      <p class="mt-4 text-lg text-indigo-600 text-center">
          Explora los recursos educativos y selecciona una ingeniería.
      </p>

      <!-- Search Box -->
      <div class="mt-8 w-full flex justify-center">
        <input 
          placeholder="Buscar materias, libros o documentos"
          class="py-3 px-6 rounded-full shadow-lg w-1/2 focus:ring-4 focus:ring-indigo-300 text-gray-800 placeholder-gray-400 outline-none"
          type="text">
      </div>
    </main>
  </div>

  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById("sidebar");
      if (sidebar.classList.contains("-translate-x-full")) {
        sidebar.classList.remove("-translate-x-full");
      } else {
        sidebar.classList.add("-translate-x-full");
      }
    }
  </script>
  
</body>
</html>
