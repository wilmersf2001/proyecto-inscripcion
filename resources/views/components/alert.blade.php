 <div class="alert absolute bottom-0 left-1/2 transform -translate-x-1/2 w-72">
     <div class="flex items-center p-4 mb-4 text-gray-500 bg-white rounded-lg shadow">
         <div
             class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
             <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 aria-hidden="true">
                 <path stroke-linecap="round" stroke-linejoin="round"
                     d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
             </svg>
         </div>
         <div class="ml-3 text-sm text-gray-600">Importe insuficiente para acceder a dicha modalidad</div>
     </div>
 </div>

 <script>
     const message = document.querySelector('.alert');
     message.classList.add('animate-fade-in');
     setTimeout(function() {
         message.style.display = 'none';
     }, 3000);
 </script>

