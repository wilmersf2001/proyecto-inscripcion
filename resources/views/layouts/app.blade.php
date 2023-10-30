<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/logo_unprg.png') }}" alt="UNPRG" width="40"
                                height="40" />
                        </div>
                        <div class="flex-col ml-2 hidden lg:grid">
                            <p class="text-xs font-semibold text-white">UNIVERSIDAD NACIONAL</p>
                            <p class="text-ms text-white">PEDRO RUIZ GALLO</p>
                        </div>
                    </div>
                    <div class="flex items-baseline">
                        <p class="text-white mr-4">PROCESO DE ADMISIÓN</p>
                        <h4 class="text-yellow-300 font-semibold text-2xl">2024-I</h4>
                    </div>
                </div>
            </div>
        </nav>
        <main class="min-h-full">
          @yield('content')
        </main>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const questionTriggers = document.querySelectorAll(".question-trigger");
            questionTriggers.forEach(function(trigger) {
                trigger.addEventListener("mouseenter", function() {
                    const popover = this.nextElementSibling;
                    popover.style.display = "flex";
                });
                trigger.addEventListener("mouseleave", function() {
                    const popover = this.nextElementSibling;
                    popover.style.display = "none";
                });
            });
        });
    </script>
    @livewireScripts
</body>

</html>
