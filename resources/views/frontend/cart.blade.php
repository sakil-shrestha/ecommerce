<x-layout.frontend>
    <div class="min-h-screen bg-gray-50 pb-10 pt-20">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Page Title -->
            <h1 class="text-3xl font-bold text-gray-800 mb-8">
                Shopping Cart
            </h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    @foreach ($carts as $cart)
                        <!-- Cart Item -->
                        <div class="flex items-center bg-white rounded-2xl shadow-sm p-5 gap-5">
                            <img src="{{ asset($cart->product->product_images->first()->image_path) }}"
                                class="w-24 h-24 rounded-xl object-cover" alt="Product">

                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    {{ $cart->product->name }}
                                </h3>
                                {{-- <p class="text-sm text-gray-500">Black Color</p> --}}

                                <div class="flex items-center mt-4 gap-4">
                                    <!-- Quantity -->
                                    {{-- <input type="number" min="1" value="1"
                                        class="w-20 border rounded-xl px-3 py-2 text-center"> --}}

                                    <!-- Remove -->
                                    <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 hover:text-red-600 text-sm font-medium">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-800">Rs.{{ $cart->amount }} </p>
                            </div>
                        </div>
                    @endforeach


                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-2xl shadow-sm p-6 h-fit sticky top-10">

                    <h2 class="text-xl font-semibold text-gray-800 mb-6">
                        Order Summary
                    </h2>

                    <div class="space-y-4 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rs. {{ $carts->sum('amount') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Delivery</span>
                            <span>Rs. 200</span>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="flex justify-between text-lg font-bold text-gray-800">
                        <span>Total</span>
                        <span>Rs. {{ $carts->sum('amount') + 200 }}</span>
                    </div>

                    <!-- Checkout Button -->
                    <button
                        class="mt-6 w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-xl font-semibold transition">
                        Proceed to Checkout
                    </button>

                    <!-- Continue Shopping -->
                    <a href="{{ route('product') }}"
                        class="block text-center text-sm text-emerald-600 mt-4 hover:underline">
                        Continue Shopping
                    </a>

                </div>

            </div>
        </div>
    </div>

</x-layout.frontend>
