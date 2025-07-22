@extends('layouts.app')

@section('content')
    <div class="bg-white py-16 sm:py-24">
        <div class="container mx-auto px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-base font-semibold leading-7 text-gray-800">Our Story</h2>
                <p class="mt-2 text-4xl font-bold tracking-tight text-neutral-800 sm:text-5xl">About NOCTVIBE</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Kami percaya bahwa pakaian adalah kanvas untuk mengekspresikan diri. NOCTVIBE lahir dari hasrat untuk menciptakan fashion yang unik, berani, dan otentik bagi mereka yang tidak takut untuk tampil beda.
                </p>
            </div>

            <div class="mt-16 max-w-2xl mx-auto sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-red-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582" />
                                </svg>
                            </div>
                            Desain Eksklusif
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">Setiap desain kami dibuat dengan cermat, menggabungkan tren terkini dengan sentuhan personal yang menjadi ciri khas brand kami.</dd>
                    </div>
                    <div class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-red-600">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1.5-1.5m1.5 1.5l1.5-1.5m0 0l.5 1.5m.5-1.5l.5 1.5" />
                                </svg>
                            </div>
                            Kualitas Premium
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">Kami hanya menggunakan bahan-bahan berkualitas tinggi untuk memastikan setiap produk tidak hanya terlihat bagus, tetapi juga nyaman dipakai dan tahan lama.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection