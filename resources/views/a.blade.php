<div class="bg-white-200">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl text-center font-bold tracking-tight text-gray-900">LETS WATCH TOGETHER</h2>
        <div class="mt-20 p-5 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-2 xl:gap-x-8">
            @foreach ($events as $event)
                <div class="group relative">
                    <img src="/images/{{ $event->photo }}" alt="{{ $event->name }}"
                        class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="{{ route('product.show', $event->id) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $event->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $event->location }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">
                            {{ $event->price ? '$' . number_format($event->price, 2) : 'Free' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>  
    </div>
</div>