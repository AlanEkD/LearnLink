<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
  <main class="min-h-screen flex flex-col items-center pt-20">
    <div>
    <img
  class="h-[512px] w-[512px]"
  src="{{ asset('img/LOGO.png') }}"
  alt="Logo">

    </div>
    <h1 class="text-4xl font-semibold text-gray-800">
        Bienvenido a LearnLink
    </h1>
  <div class="flex w-full  justify-center">
  <input 
    placeholder="Realiza una busqueda"
    class="mt-5 py-2 px-4 rounded-xl  shadow-lg w-1/3 "
    type="text">
  </div>
  </main>

</body>
</html>