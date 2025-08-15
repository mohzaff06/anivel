<div class="relative bg-gradient-to-b from-{{ $primaryColor ?? 'purple' }}-900/60 to-slate-900 overflow-hidden">
    <!-- Enhanced animated background elements -->
    <div class="fixed inset-0 w-full h-full overflow-hidden opacity-20 pointer-events-none">
        <!-- Primary floating blobs with improved animation -->
        <div class="absolute {{ $blobPosition1 ?? 'top-[10%] left-[5%]' }} w-[30vw] h-[30vw] max-w-[400px] max-h-[400px] bg-{{ $primaryColor ?? 'purple' }}-600 rounded-full filter blur-3xl animate-float-blob"></div>
        <div class="absolute {{ $blobPosition2 ?? 'top-[60%] right-[10%]' }} w-[25vw] h-[25vw] max-w-[300px] max-h-[300px] bg-{{ $secondaryColor ?? 'blue' }}-600 rounded-full filter blur-3xl animate-float-blob animation-delay-2000"></div>

        <!-- Additional animated elements for more dynamic effect -->
        <div class="absolute top-[30%] right-[20%] w-[15vw] h-[15vw] max-w-[200px] max-h-[200px] bg-pink-500 rounded-full filter blur-3xl animate-pulse-blob animation-delay-1000"></div>
        <div class="absolute bottom-[15%] left-[25%] w-[20vw] h-[20vw] max-w-[250px] max-h-[250px] bg-indigo-500 rounded-full filter blur-3xl animate-rotate-blob animation-delay-3000"></div>
    </div>

    <!-- Header -->
    <x-header :primaryColor="$primaryColor ?? 'purple'" />

    <!-- Hero content with enhanced animations -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="text-center md:text-left max-w-4xl mx-auto md:mx-0">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight animate-fadeIn">
                {!! $title !!}
            </h1>
            <p class="mt-6 text-xl text-gray-300 max-w-3xl animate-slideUp animation-delay-500">
                {{ $description }}
            </p>
            <div class="mt-8 flex flex-wrap gap-4 justify-center md:justify-start animate-fadeIn animation-delay-1000">
                {{ $slot ?? '' }}
            </div>
        </div>
    </div>
</div>
