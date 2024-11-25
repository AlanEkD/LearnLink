<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- TailwindCSS -->
  @vite('resources/css/app.css')
 
  <link rel="icon" href="{{ asset('img/LOGO.png') }}" >
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <header class="w-full py-4 px-8 bg-white shadow-md flex justify-between items-center" id="header">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
      <a href="#" class="flex items-center space-x-2">
        <!-- Logo -->
        <img class="h-12 w-12 rounded-full shadow-lg bg-gradient-to-br from-green-500 to-purple-500" src="{{ asset('img/LOGO.png') }}" alt="Logo">
        <!-- Text -->
        <span class="text-2xl font-semibold text-indigo-700">LearnLink</span>
      </a>
    </div>
    
    
   <!-- Navigation Links -->
<nav class="flex space-x-8 text-indigo-700 relative p-4 bg-gray-100">
  
  <!-- Dropdown para Facultades -->
  <div class="relative">
    <a href="#" onclick="toggleDropdown(event, 'facultadesDropdown')" class="hover:underline text-xl font-bold">Facultades</a>
  
    <!-- Dropdown que contiene la tabla de facultades -->
    <div id="facultadesDropdown" class="hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg py-4 min-w-[500px] w-fit z-10 border border-gray-300">
      <div class="p-5">
        @foreach($facultades as $facultad)
          <button type="button" class="facultad-button flex items-center gap-4 mt-2 mb-2" data-id="{{ $facultad->id }}">
            <!-- Contenedor de la Imagen -->
            <div class="flex-shrink-0">
              @if($facultad->foto)
                <img src="{{ asset('images/facultades/' . $facultad->foto) }}" alt="Logo de {{ $facultad->nombre }}" class="w-16 h-16 object-cover rounded-md">
              @else
                <span>No hay logo</span>
              @endif
            </div>
            <!-- Contenedor de Texto -->
            <h1 class="max-w-[400px] truncate overflow-hidden whitespace-nowrap">
              {{ $facultad->nombre }}
            </h1>
          </button>
        @endforeach
      </div>
  
  
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </div>
  </div>

  <script>
    function toggleDropdown(event, dropdownId) {
      const dropdown = document.getElementById(dropdownId);
      dropdown.classList.toggle('hidden');
    }
  
    $(document).ready(function() {
      $('.facultad-button').on('click', function() {
        const facultadId = $(this).data('id');
  
        $.ajax({
          url: '{{ route("get.carreras") }}', // Ruta a tu controlador
          method: 'POST',
          data: {
            id: facultadId,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            let carrerasContent = '<h2 class="text-lg font-semibold">Carreras</h2>';
            
            if (response.length > 0) {
              carrerasContent += '<ul class="list-disc pl-5">';
              response.forEach(function(carreras) {
                // Genera un enlace para cada carrera
                carrerasContent += `
                  <li>
                    <a href="/ruta/${carreras.id}" class="text-blue-500 hover:underline">
                      ${carreras.nombre}
                    </a>
                  </li>`;
              });
              carrerasContent += '</ul>';
            } else {
              carrerasContent += '<p>No hay carreras disponibles para esta facultad.</p>';
            }
  
            // Actualiza el contenedor de carreras
            $('#carreras-container').html(carrerasContent);
          },
          error: function(xhr, status, error) {
            console.error(`Error: ${status} - ${error}`);
            alert('Hubo un problema al obtener las carreras.');
          }
        });
      });
    });
  </script>
  

  <!-- Dropdown for Cursos -->
  <div class="relative">
    <a href="#" onclick="toggleDropdown(event, 'cursosDropdown')" class="hover:underline text-xl font-bold">Cursos</a>
    <div id="cursosDropdown" class="hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg py-4 w-64 z-10 border border-gray-300">
      <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">Curso de Python</a>
      <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">Curso de C++</a>
      <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">Curso de Java</a>
    </div>
  </div>

  <!-- Dropdown for Libros -->
  <div class="relative">
    <a href="#" onclick="toggleDropdown(event, 'librosDropdown')" class="hover:underline text-xl font-bold">Libros</a>
    <div id="librosDropdown" class="hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg py-4 w-64 z-10 border border-gray-300">
      <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">Libro de Matemáticas</a>
      <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">Libro de Física</a>
      <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">Libro de Programación</a>
    </div>
  </div>
  <!-- Dropdown for Paginas -->
  <div class="relative">
    <a href="#" onclick="toggleDropdown(event, 'paginasDropdown')" class="hover:underline text-xl font-bold">Paginas de apoyo</a>
    <div id="paginasDropdown" class="hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg py-4 w-64 z-10 border border-gray-300">
      <a href="https://www.geeksforgeeks.org" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">geeks4geeks</a>
      <a href="https://www.w3schools.com" class="block px-4 py-2 text-gray-700 hover:bg-indigo-100">w3schools</a>
      
    </div>
  </div>
</nav>
    <!-- Authentication Button -->
    @auth
      <a href="{{ route('dashboard') }}" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white px-4 py-2 rounded-full shadow-lg hover:shadow-md transition duration-300">
        Mi perfil
      </a>
    @else
      <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-full shadow-lg hover:shadow-md transition duration-300">
        Iniciar sesión
      </a>
    @endauth
  </header>

  <!-- Main layout with Sidebar and Content -->
  <div class="flex">
    <!-- Sidebar -->
    <div id="sidebar" class="w-64 min-h-screen bg-gray-900 text-white p-6 lg:sticky top-0">
      <!-- Contenedor del contenido del sidebar -->
      <div id="sidebar-content">
        <!-- Logo and Title in the same row -->
        <div class="flex items-center space-x-4 mb-6">
          <img src="{{ asset('img/UANL.png') }}" alt="Logo" class="h-12 w-12 rounded-full bg-gradient-to-br from-gray-400 to-gray-100">
          <h2 class="text-xl font-semibold">Menú</h2>
        </div>
        <p>
          LearnLink es una plataforma educativa diseñada para la Universidad Autónoma de Nuevo León, con el objetivo de facilitar el acceso a recursos académicos y apoyar a estudiantes y docentes en la gestión y organización de materiales de estudio. Con una interfaz intuitiva y herramientas colaborativas, LearnLink ofrece un espacio centralizado donde se pueden encontrar documentos, guías y apuntes clasificados por facultad, carrera y semestre, promoviendo un aprendizaje eficiente y accesible para todos los usuarios de la UANL.
        </p>
      </div>
    </div>
 


    <!-- Main content -->
    <main id="mainContent" class="flex-1 min-h-screen flex flex-col items-center justify-center bg-gray-50">
      <div class="flex flex-col items-center">
        <img class="h-48 w-48 rounded-full shadow-xl bg-gradient-to-br from-green-500 to-purple-500" src="{{ asset('img/LOGO.png') }}" alt="Logo">
      </div>
      <h1 class="text-4xl font-bold mt-8 text-indigo-700 text-center">Juntos seremos más inteligentes</h1>
      <p class="mt-4 text-lg text-indigo-600 text-center">Explora los recursos educativos o selecciona una carrera.</p>

     <!-- Search Box (hidden after selecting an engineering) -->
        <div id="initialSearch" class="mt-8 w-full flex justify-center">
          <div class="flex w-1/2">
              <input 
                  placeholder="Buscar materias, libros o documentos" 
                  class="py-3 px-6 rounded-l-full shadow-md w-full focus:ring-4 focus:ring-indigo-300 text-gray-800 placeholder-gray-400 outline-none" 
                  type="text">
              <button 
                  class="bg-gray-400 text-white px-6 rounded-r-full shadow-md hover:bg-indigo-600 transition duration-300 ease-in-out focus:ring-4 focus:ring-indigo-300">
                  Buscar
              </button>
          </div>
        </div>


      <!-- Grid of 2 columns for Types of Subject -->
      <div class="mt-12 w-full max-w-5xl px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <!-- Button 1 -->
          <a href="https://www.uanl.mx" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-8 px-6 rounded-lg text-center shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300">
            Conoce nuestra universidad
          </a>
          <!-- Button 2 -->
          <a href="https://www.uanl.mx/eventos/" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-8 px-6 rounded-lg text-center shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300">
            Eventos
          </a>
          <!-- Button 3 -->
          <a href="https://cienciauanl.uanl.mx" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-8 px-6 rounded-lg text-center shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300">
            Ciencia UANL
          </a>
          <!-- Button 4 -->
          <a href="https://recursos.db.uanl.mx" class="bg-gradient-to-br from-indigo-500 to-purple-500 text-white py-8 px-6 rounded-lg text-center shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300">
          Biblioteca Digital UANL
          </a>
         
        </div>
      </div>
    </main>
  </div>

 <!-- Footer -->
 <footer class="bg-gray-900 text-gray-400 py-6">
  <div class="container mx-auto">
      <div class="grid grid-cols-5 gap-8 text-sm">
          <!-- Primera columna: Información de contacto -->
          <div>
              <h3 class="text-white mb-4">Contáctanos</h3>
              <ul class="space-y-2">
                  <li><i class="fas fa-envelope mr-2"></i> correo@learnlink.com</li>
                  <li><i class="fas fa-phone mr-2"></i> +52 81 1234 5678</li>
                  <li><i class="fas fa-map-marker-alt mr-2"></i> Monterrey, Nuevo León, México</li>
              </ul>
          </div>

          <!-- Segunda columna: Redes Sociales -->
          <div>
              <h3 class="text-white mb-4">Síguenos</h3>
              <div class="flex space-x-4">
                <ul>
                  <li>
                    <a href="https://www.facebook.com/groups/134493809953990" target="_blank" class="hover:text-white transition duration-300">
                      <i class="fab fa-facebook-square text-2xl">facebook</i>
                  </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/fime.oficial?igsh=MTE2OGNteDM0ZTcyOQ==" target="_blank" class="hover:text-white transition duration-300">
                      <i class="fab fa-instagram text-2xl">instagram</i>
                  </a>
                  </li>
                </ul>
              </div>
          </div>

          <!-- Tercera columna: Enlaces útiles -->
          <div>
              <h3 class="text-white mb-4">Enlaces útiles</h3>
              <ul class="space-y-2">
                  <li><a href="https://www.fime.uanl.mx" target="_blank" class="hover:text-white transition duration-300"><i class="fas fa-globe mr-2"></i> Portal FIME</a></li>
                  <li><a href="https://www.uanl.mx" target="_blank" class="hover:text-white transition duration-300"><i class="fas fa-graduation-cap mr-2"></i> UANL</a></li>
                  <li><a href="https://www.conricyt.mx/" target="_blank" class="hover:text-white transition duration-300"><i class="fas fa-book mr-2"></i> Biblioteca Digital</a></li>
              </ul>
          </div>

          <!-- Cuarta columna: Suscripción al boletín -->
          <div>
              <h3 class="text-white mb-4">Suscríbete al boletín</h3>
              <form action="/subscribe" method="POST" class="flex flex-col space-y-2">
                  <input type="email" name="email" placeholder="Tu correo electrónico" class="p-2 rounded-lg text-gray-800">
                  <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 rounded-lg">
                      Suscribirse
                  </button>
              </form>
          </div>

          <!-- Quinta columna: Derechos reservados -->
          <div>
              <h3 class="text-white mb-4">Soporte</h3>
              <ul class="space-y-2">
                  <li><a href="/privacidad" class="hover:text-white transition duration-300"><i class="fas fa-lock mr-2"></i> Política de privacidad</a></li>
                  <li><a href="/terminos" class="hover:text-white transition duration-300"><i class="fas fa-file-alt mr-2"></i> Términos de uso</a></li>
              </ul>
          </div>
      </div>

      <!-- Línea separadora y derechos reservados -->
      <div class="border-t border-gray-700 mt-6 pt-4 text-center text-gray-500 text-xs">
          © 2024 LearnLink. Todos los derechos reservados.
      </div>
  </div>
</footer>



  <!-- FontAwesome Icons CDN -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <!-- JavaScript for Dropdown functionality -->
<!-- Script para manejar la solicitud AJAX y actualizar el sidebar -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.facultad-button').on('click', function() {
      const facultadId = $(this).data('id');

      $.ajax({
        url: '{{ route("get.carreras") }}',
        method: 'POST',
        data: {
          id: facultadId,
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          // Asegúrate de que response.facultad y response.carreras existen
          let sidebarContent = 
            '<div class="flex items-center space-x-4 mb-6">' +
              `<img src="{{ asset("images/facultades/") }}/${response.facultad.foto}" alt="Logo de ${response.facultad.nombre}" class="h-12 w-12 rounded-full bg-gradient-to-br from-gray-400 to-gray-100">` +
              '<h2 class="text-xl font-semibold">Carreras</h2>' +
            '</div>';
          
          if (response.carreras.length > 0) {
            sidebarContent += '<ul class="list-disc pl-5">';
            response.carreras.forEach(function(carrera) {

              sidebarContent += '<li><a href="/ruta/' + carrera.id + '">' + carrera.nombre + '</a></li>';
            });
            sidebarContent += '</ul>';
          } else {
            sidebarContent += '<p>No hay carreras disponibles para esta facultad.</p>';
          }

          // Actualiza el contenido del sidebar con las carreras
          $('#sidebar-content').html(sidebarContent);
        },
        error: function() {
          alert('Hubo un problema al obtener las carreras.');
        }
      });
    });
  });
</script>



</body>
</html>
