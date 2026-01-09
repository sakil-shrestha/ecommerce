<x-layout.frontend>
    <div class="container mx-auto py-20 px-4">

        <!-- Search & Filter -->
        <form method="GET" action="{{ route('product.search') }}"
              class="bg-white p-6 rounded-2xl shadow-sm mb-10">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <!-- Product Name -->
                <input type="text" name="search"
                       value="{{ request('search') }}"
                       placeholder="Search product..."
                       class="border rounded-xl px-4 py-3 w-full">

                <!-- Category -->
                <select name="category"
                        class="border rounded-xl px-4 py-3 w-full">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Min Price -->
                <input type="number" name="min_price"
                       value="{{ request('min_price') }}"
                       placeholder="Min Price"
                       class="border rounded-xl px-4 py-3 w-full">

                <!-- Max Price -->
                <input type="number" name="max_price"
                       value="{{ request('max_price') }}"
                       placeholder="Max Price"
                       class="border rounded-xl px-4 py-3 w-full">
            </div>

            <div class="mt-4 flex gap-3 justify-end">
                <a href="#"
                   class="px-6 py-2 rounded-xl border text-gray-600 hover:bg-gray-100">
                    Reset
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700">
                    Search
                </button>
            </div>
        </form>

        <!-- Products -->
        <h1 class="text-3xl mb-6 text-gray-700 font-semibold text-center">
            {{ Route::is('product') ? 'All Products' : 'The Searched Products' }}
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <x-frontend.product-card :product="$product" />
            @empty
                <p class="col-span-full text-center text-gray-500">
                    No products found.
                </p>
            @endforelse
        </div>
    </div>
</x-layout.frontend>
