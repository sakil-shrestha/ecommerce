<x-layout.frontend>
    <!-- Container -->
    {{-- {{$product->product_images->first()->image_path}} --}}
    <section class="bg-gray-50 text-gray-800">

        <div class="max-w-7xl mx-auto px-4 pb-10 pt-20">

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
                    <span class="text-sm text-gray-500 uppercase">{{ $product->category->name }}</span>
                    <h1 class="text-3xl font-bold mt-2">{{ $product->name }}</h1>

                    <!-- Rating -->
                    <!-- Average Rating -->
                    <div class="flex items-center gap-3">
                        <div class="text-yellow-400 text-xl">
                            @for($i=1; $i<=floor($product->reviews->avg('rating')); $i++)
                                ★
                            @endfor
                            @for($i=floor($product->reviews->avg('rating'))+1; $i<=5; $i++)
                                ☆
                            @endfor

                        </div>
                        {{-- <span class="text-4xl font-bold">
                            {{ number_format($product->reviews->avg('rating'), 1) }}
                        </span> --}}
                    </div>

                    <!-- Price -->
                    <div class="mt-6">
                        <span class="text-3xl font-bold">Rs. {{ $product->price }}</span>
                        <span class="text-gray-500 line-through ml-3">Rs. 6,499</span>
                    </div>

                    <!-- Description -->
                    <p class="mt-6 text-gray-600 leading-relaxed">
                        {{ $product->description }}
                    </p>

                    <!-- Actions -->
                    <div class="mt-8 flex gap-4">
                        <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
                            @csrf
                            <input type="number" min="1" value="1" max="10"name="quantity"
                                class="w-20 border rounded-xl px-4 py-3 text-center">
                            <button type="submit"
                                class="flex-1 bg-black text-white py-3 px-5 rounded-xl hover:bg-gray-900 transition">
                                Add to Cart
                            </button>
                        </form>
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

            <!-- REVIEWS SECTION -->
            <div class="mt-16 bg-white rounded-2xl shadow-sm p-8">

                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 border-b pb-6">
                    <div>
                        <h2 class="text-2xl font-bold">Customer Reviews</h2>
                        <p class="text-gray-500 text-sm mt-1">
                            Based on {{ $product->reviews->count() }} reviews
                        </p>
                    </div>

                    <!-- Average Rating -->
                    <div class="flex items-center gap-3">
                        <span class="text-4xl font-bold">
                            {{ number_format($product->reviews->avg('rating'), 1) }}
                        </span>
                        <div class="text-yellow-400 text-xl">
                             @for($i=1; $i<=floor($product->reviews->avg('rating')); $i++)
                                ★
                            @endfor
                            @for($i=floor($product->reviews->avg('rating'))+1; $i<=5; $i++)
                                ☆
                            @endfor
                        </div>
                    </div>
                </div>

                <!-- WRITE REVIEW -->
                @if($product->reviews->where('user_id',Auth::user()->id)->isEmpty())
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">Write a Review</h3>

                    <form action="{{ route('review.store', $product->id) }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Star Rating Input -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Your Rating</label>

                            <div class="flex flex-row-reverse justify-end gap-1 text-2xl text-gray-300">
                                @for ($i = 5; $i >= 1; $i--)
                                    <input type="radio" name="rating" id="star{{ $i }}"
                                        value="{{ $i }}" class="hidden peer" />
                                    <label for="star{{ $i }}"
                                        class="cursor-pointer peer-checked:text-yellow-400 hover:text-yellow-400">
                                        ★
                                    </label>
                                @endfor
                            </div>
                        </div>

                        <!-- Review Text -->
                        <div>
                            <label class="block text-sm font-medium mb-2">Your Review</label>
                            <textarea name="review" rows="4" class="w-full rounded-xl border-gray-300 focus:ring-black focus:border-black"
                                placeholder="Share your experience with this product..."></textarea>
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="bg-black text-white px-6 py-3 rounded-xl hover:bg-gray-900 transition">
                            Submit Review
                        </button>
                    </form>
                </div>
                @endif

                <!-- EXISTING REVIEWS -->
                <div class="mt-12 space-y-6">
                    <h3 class="text-lg font-semibold">What customers are saying</h3>

                    @forelse ($product->reviews as $review)
                        <div class="border rounded-xl p-6">
                            <div class="flex justify-between items-center">
                                <div class="font-semibold">
                                    {{ $review->user->name ?? 'Anonymous' }}
                                </div>
                                <div class="text-yellow-400">
                                    {{ str_repeat('★', $review->rating) }}
                                    {{ str_repeat('☆', 5 - $review->rating) }}
                                </div>
                            </div>

                            <p class="text-gray-600 mt-3">
                                {{ $review->review }}
                            </p>

                            <span class="text-xs text-gray-400 mt-2 block">
                                {{ $review->created_at->diffForHumans() }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">No reviews yet. Be the first to review!</p>
                    @endforelse
                </div>

            </div>



            <!-- Product Card -->
            <div class="container mx-auto py-20 px-4 text-center">
                <h1 class="text-3xl mb-6 text-grey-600 font-semibold">Related Products</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($category->products as $product)
                        <x-frontend.product-card :product="$product" />
                    @endforeach
                </div>
            </div>




        </div>
        </div>

        </div>
    </section>
</x-layout.frontend>
