<x-layout.frontend>
    <div class="container mx-auto py-20 px-4 text-center">
        <h1 class="text-3xl mb-6 text-emerald-600">All Products</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <x-frontend.product-card :product="$product"/>

            @endforeach
        </div>
    </div>

</x-layout.frontend>
