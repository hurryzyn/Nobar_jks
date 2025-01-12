<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <form action="{{ route('payment') }}" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        @csrf
        <div class="mx-auto max-w-3xl">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Order summary</h2>

            <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Billing & Delivery information</h4>

                <dl>
                    <dt class="text-base font-medium text-gray-900 dark:text-white">Individual</dt>
                    <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">{{ $user->name }} - {{ $user->email }}</dd>
                </dl>

                <button type="button" data-modal-target="billingInformationModal" data-modal-toggle="billingInformationModal" class="text-base font-medium text-primary-700 hover:underline dark:text-primary-500">Edit</button>
            </div>

            <div class="mt-6 sm:mt-8">
                <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                    <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            <tr>
                                <td class="whitespace-nowrap py-4 md:w-[384px]">
                                    <div class="flex items-center gap-4">
                                        <a href="#" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                            <img class="h-auto w-full max-h-full dark:hidden" src="{{ $event->image_url }}" alt="Event image" />
                                        </a>
                                        <div>
                                            <p class="text-base font-semibold text-gray-900 dark:text-white">{{ $event->name }}</p>
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $event->description }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap py-4 text-right">
                                    <p class="text-base font-semibold text-gray-900 dark:text-white">Price: {{ $price }}</p>
                                    <div class="mt-2">
                                        <label for="quantity" class="sr-only">Quantity</label>
                                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-16 text-center border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-800 dark:text-white" onchange="updateTotalPrice()">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 sm:mt-8">
                <p class="text-lg font-semibold text-gray-900 dark:text-white">Total Price: <span id="totalPrice">{{ $price }}</span></p>
            </div>

            <div class="mt-6 sm:mt-8">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md">Proceed to Payment</button>
            </div>
        </div>
    </form>
</section>

<script>
    function updateTotalPrice() {
        const price = {{ $price }};
        const quantity = document.getElementById('quantity').value;
        const totalPrice = price * quantity;
        document.getElementById('totalPrice').innerText = totalPrice;
    }
</script>