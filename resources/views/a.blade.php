@foreach ($events as $event )
    <div class="group relative">
        <img src="{{ $event->photo }}" alt="{{ $event->name }}"
            class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
        <div class="mt-4 flex justify-between">
            <div>
                <h3 class="text-sm text-gray-700">
                    <a href="{{ route('product.show', $event->id) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $event->name }}
                    </a>
                </h3>
                <p class="mt-1 text-sm text-gray-500">{{ $event->date }}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">
                {{ $event->price ? '$' . number_format($event->price, 2) : 'Free' }}
            </p>
        </div>
    </div>
@endforeach