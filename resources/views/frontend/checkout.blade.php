<x-layout.frontend>
    <div class="min-h-screen bg-gray-50 pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <!-- Page Title -->
            <div class="mb-10">
                <h1 class="text-3xl font-bold text-gray-900">Checkout</h1>
                <p class="text-gray-500 mt-1">
                    Complete your order by providing delivery details
                </p>
            </div>

            <!-- Main Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT SIDE (Address + Payment) -->
                <div class="lg:col-span-2 space-y-8">


                    @if ($address)
                        <div
                            class="relative bg-white rounded-3xl p-7 border border-gray-100 shadow-sm hover:shadow-lg transition duration-300">

                            <!-- Floating Badge -->
                            <span
                                class="absolute -top-3 left-6 px-4 py-1 text-xs font-semibold rounded-full bg-emerald-600 text-white shadow">
                                Default Address
                            </span>

                            <!-- Header -->
                            <div class="flex justify-between items-start mb-6">

                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 flex items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-500 text-white shadow">
                                        📍
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Delivery Address
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            Used for shipping your orders
                                        </p>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex gap-2">
                                    <button onclick="openEditModal()"
                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition">
                                        ✏️
                                    </button>

                                    <form action="{{route('address.delete',$address->id)}}" method="POST"
                                        onsubmit="return confirm('Delete this address?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-red-50 text-red-500 hover:bg-red-100 transition">
                                            🗑️
                                        </button>
                                    </form>
                                </div>

                            </div>

                            <!-- Content -->
                            <div class="space-y-4 text-sm">

                                <!-- Name -->
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400">👤</span>
                                    <p class="font-semibold text-gray-900">
                                        {{ $address->full_name }}
                                    </p>
                                </div>

                                <!-- Phone -->
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400">📞</span>
                                    <p>{{ $address->phone }}</p>
                                </div>

                                <!-- Address -->
                                <div class="flex items-start gap-3">
                                    <span class="text-gray-400 mt-0.5">🏠</span>
                                    <p class="leading-relaxed">
                                        {{ $address->tole }}, {{ $address->city }}<br>
                                        {{ $address->province }}, {{ $address->country }}
                                    </p>
                                </div>

                                <!-- Postal Code -->
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400">📮</span>
                                    <p class="text-gray-600">
                                        Postal Code: {{ $address->postal_code }}
                                    </p>
                                </div>

                            </div>

                        </div>
                    @else
                        <!-- Address Details -->
                        <div class="bg-white rounded-2xl shadow-sm p-8">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6">
                                Delivery Address
                            </h2>

                            <form class="space-y-6" action="{{ route('address.store') }}" method="POST">
                                @csrf

                                <!-- Full Name & Phone -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                                            Full Name
                                        </label>
                                        <div class="relative">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                                👤
                                            </span>
                                            <input id="full_name" name="full_name"
                                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 transition">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                                            Phone Number
                                        </label>
                                        <div class="relative">
                                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                                📞
                                            </span>
                                            <input id="phone" name="phone"
                                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 transition">
                                        </div>
                                    </div>
                                </div>

                                <!-- Country & Province -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Country
                                        </label>
                                        <select name="country"
                                            class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                                            <option>Nepal</option>
                                            <option>India</option>
                                            <option>USA</option>
                                            <option>Australia</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Province
                                        </label>
                                        <select name="province"
                                            class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                                            <option>Select Province</option>
                                            <option>Bagmati</option>
                                            <option>Koshi</option>
                                            <option>Lumbini</option>
                                            <option>Gandaki</option>
                                            <option>Madhesh</option>
                                            <option>Karnali</option>
                                            <option>SudurPaschim</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- City & Area -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            City
                                        </label>
                                        <input type="text" name="city"
                                            class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                                            placeholder="Kathmandu">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Tole / Area
                                        </label>
                                        <input type="text" name="tole"
                                            class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                                            placeholder="New Baneshwor">
                                    </div>
                                </div>

                                <!-- Postal Code -->
                                <div class="max-w-sm">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Postal Code
                                    </label>
                                    <input type="text" name="postal_code"
                                        class="w-full rounded-xl border-gray-300 focus:border-emerald-500 focus:ring-emerald-500"
                                        placeholder="44600">
                                </div>
                                <button type="submit"
                                    class="mt-6 w-20 bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-xl font-semibold transition shadow-sm">
                                    Save </button>
                            </form>
                        </div>
                    @endif







                    <!-- Payment Method -->
                    <div class="bg-white rounded-2xl shadow-sm p-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6">
                            Payment Method
                        </h2>

                        <div class="space-y-4">

                            <!-- Cash on Delivery -->
                            <label
                                class="flex items-center justify-between border rounded-xl p-4 cursor-pointer hover:border-emerald-500 transition">
                                <div class="flex items-center gap-4">
                                    <input type="radio" name="payment_method" checked
                                        class="text-emerald-600 focus:ring-emerald-500">
                                    <div>
                                        <p class="font-medium text-gray-800">
                                            Cash on Delivery
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Pay when your order arrives
                                        </p>
                                    </div>
                                </div>
                                <span class="text-sm font-semibold text-emerald-600">
                                    Recommended
                                </span>
                            </label>

                            <!-- eSewa -->
                            <label
                                class="flex items-center gap-4 border rounded-xl p-4 cursor-pointer hover:border-emerald-500 transition">
                                <input type="radio" name="payment_method"
                                    class="text-emerald-600 focus:ring-emerald-500">
                                <img src="{{ asset('https://th.bing.com/th/id/OIP.22AxOY5ROotj1UdjeDSNDwHaD4?w=317&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3') }}"
                                    class="h-8" alt="eSewa">
                                <div>
                                    <p class="font-medium text-gray-800">eSewa</p>
                                    <p class="text-sm text-gray-500">
                                        Pay securely via eSewa
                                    </p>
                                </div>
                            </label>

                            <!-- Khalti -->
                            <label
                                class="flex items-center gap-4 border rounded-xl p-4 cursor-pointer hover:border-emerald-500 transition">
                                <input type="radio" name="payment_method"
                                    class="text-emerald-600 focus:ring-emerald-500">
                                <img src="{{ asset('https://www.bing.com/th/id/OIP.ssPILiiQIDt6Swz7GIs_cQHaHa?w=185&h=211&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2') }}"
                                    class="h-8" alt="Khalti">
                                <div>
                                    <p class="font-medium text-gray-800">Khalti</p>
                                    <p class="text-sm text-gray-500">
                                        Fast digital payment
                                    </p>
                                </div>
                            </label>

                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE (Order Summary) -->
                <div class="bg-white rounded-2xl shadow-md p-6 h-fit sticky top-24">

                    <h2 class="text-xl font-semibold text-gray-900 mb-6">
                        Order Summary
                    </h2>

                    <!-- Items -->
                    <div class="space-y-4 text-sm">
                        @foreach ($carts as $cart)
                            <div class="flex justify-between text-gray-700">
                                <span>
                                    {{ $cart->product->name }}
                                    <span class="text-gray-400">
                                        × {{ $cart->quantity ?? 1 }}
                                    </span>
                                </span>
                                <span class="font-medium">
                                    Rs. {{ $cart->amount }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <hr class="my-5">

                    <!-- Price -->
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-medium">
                                Rs. {{ $carts->sum('amount') }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span>Delivery</span>
                            <span class="font-medium">Rs. 200</span>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="flex justify-between text-lg font-bold">
                        <span>Total</span>
                        <span>
                            Rs. {{ $carts->sum('amount') + 200 }}
                        </span>
                    </div>

                    <!-- Place Order -->
                    <a href="{{route('order')}}"
                        class="block mt-6 text-center bg-emerald-600 hover:bg-emerald-700
                               text-white py-3 rounded-xl font-semibold transition">
                        Place Order
                    </a>

                    <p class="text-xs text-gray-400 text-center mt-4">
                        🔒 Secure checkout • Cash on Delivery available
                    </p>

                </div>

            </div>
        </div>
    </div>

    <!-- ================= MODERN EDIT ADDRESS MODAL ================= -->
    @if($address)
    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-md">

        <div class="relative w-full max-w-2xl rounded-3xl bg-white shadow-2xl p-10 animate-fadeIn">

            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        Edit Delivery Address
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Update where your order will be delivered
                    </p>
                </div>

                <button onclick="closeEditModal()"
                    class="h-10 w-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600">
                    ✕
                </button>
            </div>

            <!-- FORM -->
            <form action="{{ route('address.update', $address->id) }}" id="editForm" method="POST"
                class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Full Name & Phone -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            Full Name
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                👤
                            </span>
                            <input id="full_name" name="full_name" value="{{ $address->full_name }}"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 transition">
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            Phone Number
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                📞
                            </span>
                            <input id="phone" name="phone" value="{{ $address->phone }}"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 transition">
                        </div>
                    </div>
                </div>

                <!-- Country & Province -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            Country
                        </label>
                        <select id="country" name="country"
                            class="w-full py-3 px-4 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="Nepal" {{ old('country', $address->country) == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                            <option value="India" {{ old('country', $address->country) == 'India' ? 'selected' : '' }}>India</option>
                            <option value="USA" {{ old('country', $address->country) == 'USA' ? 'selected' : '' }}>USA</option>
                            <option value="Australia" {{ old('country', $address->country) == 'Australia' ? 'selected' : '' }}>Australia</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            Province
                        </label>
                        <select id="province" name="province"
                            class="w-full py-3 px-4 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                            <option value="Bagmati" {{$address->province=='Bagmati'?'selected':''}}>Bagmati</option>
                            <option value="Koshi" {{$address->province=='Koshi'?'selected':''}}>Koshi</option>
                            <option value="Lumbini" {{$address->province=='Lumbini'?'selected':''}}>Lumbini</option>
                            <option value="Gandaki" {{$address->province=='Gandaki'?'selected':''}}>Gandaki</option>
                            <option value="Madhesh" {{$address->province=='Madhesh'?'selected':''}}>Madhesh</option>
                            <option value="Karnali" {{$address->province=='Karnali'?'selected':''}}>Karnali</option>
                            <option value="SudurPaschim" {{$address->province=='SudurPaschim'?'selected':''}}>SudurPaschim</option>
                        </select>
                    </div>
                </div>

                <!-- City & Area -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            City
                        </label>
                        <input id="city" name="city" value="{{ $address->city }}"
                            class="w-full px-4 py-3
                            rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-2 block">
                            Tole / Area
                        </label>
                        <input id="tole" name="tole" value="{{ $address->tole }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                    </div>
                </div>

                <!-- Postal Code -->
                <div class="max-w-sm">
                    <label class="text-sm font-medium text-gray-700 mb-2 block">
                        Postal Code
                    </label>
                    <input id="postal_code" name="postal_code" value="{{ $address->postal_code }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 pt-6 border-t">
                    <button type="button" onclick="closeEditModal()"
                        class="px-6 py-3 rounded-xl border text-gray-600 hover:bg-gray-100">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-8 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-500 text-white font-semibold shadow-lg hover:from-emerald-700 hover:to-emerald-600 transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
    <!-- ================= END MODAL ================= -->


    <!-- ================= SCRIPT ================= -->
    <script>
        function openEditModal(address) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');

            // document.getElementById('editForm').action = `/address/${address.id}`;

            // document.getElementById('full_name').value = address.full_name;
            // document.getElementById('phone').value = address.phone;
            // document.getElementById('country').value = address.country;
            // document.getElementById('province').value = address.province;
            // document.getElementById('city').value = address.city;
            // document.getElementById('tole').value = address.tole;
            // document.getElementById('postal_code').value = address.postal_code;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }
    </script>



</x-layout.frontend>
