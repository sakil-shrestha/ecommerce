 @props(['product'])
 <div class="border rounded-lg p-4 hover:shadow-lg transition">
     <img src="{{ asset($product->product_images->first()->image_path) }}" alt="{{ $product->name }}"
         class="w-full h-48 object-cover mb-4">
     <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
     <p class="text-gray-700 mb-4">${{ number_format($product->price, 2) }}</p>
     <a href="{{ route('product.detail', $product->slug) }}" class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700 transition">View
         Details</a>
 </div>
