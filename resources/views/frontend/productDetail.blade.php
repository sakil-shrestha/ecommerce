<x-layout.frontend>
    <!-- Container -->
    {{-- {{$product->product_images->first()->image_path}} --}}
    <section class="bg-gray-50 text-gray-800">

        <div class="max-w-7xl mx-auto px-4 py-10">

            <!-- PRODUCT SECTION -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <!-- LEFT: Image Gallery -->
                <div>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <img src="{{ asset($product->product_images->first()->image_path) }}"
                            class="w-full h-[450px] object-cover hover:scale-105 transition duration-300">
                    </div>

                    <!-- Thumbnails -->
                    <div class="flex gap-4 mt-4">
                        @foreach ($product->product_images as $image)
                            <img src="{{ asset($image->image_path) }}"
                                class="w-20 h-20 rounded-xl border cursor-pointer hover:ring-2 ring-black">
                        @endforeach
                    </div>
                </div>

                <!-- RIGHT: Product Info -->
                <div>
                    <span class="text-sm text-gray-500 uppercase">Electronics</span>
                    <h1 class="text-3xl font-bold mt-2">Wireless Headphones Pro</h1>

                    <!-- Rating -->
                    <div class="flex items-center gap-2 mt-3">
                        ⭐⭐⭐⭐⭐
                        <span class="text-sm text-gray-500">(124 reviews)</span>
                    </div>

                    <!-- Price -->
                    <div class="mt-6">
                        <span class="text-3xl font-bold">Rs. 4,999</span>
                        <span class="text-gray-500 line-through ml-3">Rs. 6,499</span>
                    </div>

                    <!-- Description -->
                    <p class="mt-6 text-gray-600 leading-relaxed">
                        Premium noise-cancelling wireless headphones with crystal-clear sound,
                        long battery life, and ultra-comfortable design.
                    </p>

                    <!-- Actions -->
                    <div class="mt-8 flex gap-4">
                        <button class="flex-1 bg-black text-white py-3 rounded-xl hover:bg-gray-900 transition">
                            Add to Cart
                        </button>
                        <button class="flex-1 border border-black py-3 rounded-xl hover:bg-gray-100 transition">
                            Buy Now
                        </button>
                    </div>

                    <!-- Trust Info -->
                    <div class="mt-6 grid grid-cols-3 text-center text-sm text-gray-600">
                        <div>🚚 Free Delivery</div>
                        <div>↩ 7-Day Return</div>
                        <div>🔒 Secure Payment</div>
                    </div>
                </div>
            </div>

            <!-- TABS -->
            <div class="mt-16 bg-white rounded-2xl shadow-sm p-8">
                <div class="flex gap-8 border-b pb-4">
                    <button class="font-semibold border-b-2 border-black">Description</button>
                    <button class="text-gray-500">Specifications</button>
                    <button class="text-gray-500">Reviews</button>
                </div>

                <div class="mt-6 text-gray-600 leading-relaxed">
                    Experience immersive sound with advanced noise cancellation technology.
                    Designed for comfort and built for durability, perfect for daily use.
                </div>
            </div>

            <!-- RELATED PRODUCTS -->
            <div class="mt-20">
                <h2 class="text-2xl font-bold mb-8">Related Products</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- Product Card -->
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden">
                        <img src="{{ $product->product_images->first()->image_path }}" class="h-48 w-full object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Bluetooth Speaker</h3>
                            <p class="text-sm text-gray-500 mt-1">Rs. 2,999</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden">
                        <img src="https://via.placeholder.com/300" class="h-48 w-full object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Smart Watch</h3>
                            <p class="text-sm text-gray-500 mt-1">Rs. 6,499</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden">
                        <img src="https://via.placeholder.com/300" class="h-48 w-full object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Earbuds Mini</h3>
                            <p class="text-sm text-gray-500 mt-1">Rs. 1,999</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden">
                        <img src="https://via.placeholder.com/300" class="h-48 w-full object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold">Gaming Headset</h3>
                            <p class="text-sm text-gray-500 mt-1">Rs. 3,499</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</x-layout.frontend>
