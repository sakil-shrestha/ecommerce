<x-layout.frontend>
    <div class="min-h-screen bg-gray-50 pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Page Title -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
                <p class="text-gray-500 mt-1">Review your selected items</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    @foreach ($carts as $cart)
                        <div
                            class="flex flex-col sm:flex-row gap-6 bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                            <!-- Product Image -->
                            <img src="{{ asset($cart->product->product_images->first()->image_path) }}"
                                class="w-full sm:w-28 h-28 rounded-xl object-cover bg-gray-100" alt="Product image">

                            <!-- Product Details -->
                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        {{ $cart->product->name }}
                                    </h3>

                                    <!-- Quantity -->
                                    <div class="flex items-center gap-3 mt-4">
                                        <span class="text-sm text-gray-500">Quantity:</span>

                                        <div class="flex items-center border rounded-lg overflow-hidden text-sm">
                                            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">−</button>

                                            <span class="px-4 py-1 border-x text-gray-800 font-medium">
                                                {{ $cart->quantity ?? 1 }}
                                            </span>

                                            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Remove -->
                                <form action="{{ route('cart.delete', $cart->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm text-red-500 hover:text-red-600 font-medium">
                                        Remove
                                    </button>
                                </form>
                            </div>

                            <!-- Price -->
                            <div class="flex sm:flex-col justify-between items-end">
                                <p class="text-lg font-bold text-gray-900">
                                    Rs. {{ $cart->amount }}
                                </p>
                                <span class="text-xs text-gray-400">
                                    Inclusive of taxes
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="sticky top-24 bg-white rounded-2xl p-6 shadow-md h-fit">

                    <h2 class="text-xl font-semibold text-gray-900 mb-6">
                        Order Summary
                    </h2>

                    <div class="space-y-4 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-medium text-gray-800">
                                Rs. {{ $carts->sum('amount') }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Delivery</span>
                            <span class="font-medium text-gray-800">
                                Rs. 200
                            </span>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="flex justify-between text-lg font-bold text-gray-900">
                        <span>Total</span>
                        <span>
                            Rs. {{ $carts->sum('amount') + 200 }}
                        </span>
                    </div>

                    <!-- Checkout Button -->
                    <div class="mt-6 flex justify-center">
                        <a href="{{route('checkout')}}"
                            class="inline-flex items-center justify-center w-full max-w-md bg-emerald-600 hover:bg-emerald-700
                                 text-white py-3 rounded-xl font-semibold transition shadow-sm">
                            Proceed to Checkout
                        </a>
                    </div>




                    <!-- Continue Shopping -->
                    <a href="{{ route('product') }}"
                        class="block text-center text-sm text-emerald-600 mt-4 hover:underline">
                        ← Continue Shopping
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layout.frontend>
