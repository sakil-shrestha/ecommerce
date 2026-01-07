<x-layout.frontend>

<!-- ABOUT PAGE START -->
<section class="font-sans">

    <!-- ================= HERO ================= -->
    <section
        class="relative min-h-screen bg-gradient-to-br from-slate-950 via-emerald-950 to-teal-900 text-white overflow-hidden">

        <!-- Animated Blobs -->
        <div class="absolute w-[500px] h-[500px] bg-emerald-500/30 rounded-full blur-3xl -top-40 -left-40 animate-pulse"></div>
        <div class="absolute w-[500px] h-[500px] bg-teal-500/30 rounded-full blur-3xl -bottom-40 -right-40 animate-pulse"></div>

        <div class="relative max-w-6xl mx-auto px-6 py-32 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Crafting Meaningful
                <span class="text-emerald-400">Shopping Experiences</span>
            </h1>

            <p class="text-gray-300 max-w-3xl mx-auto text-lg md:text-xl mb-10">
                Design-driven, trust-focused, and built for people who value quality.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#story"
                    class="bg-emerald-500 text-black px-8 py-4 rounded-full font-semibold hover:scale-105 transition">
                    Our Story
                </a>
                <a href="/shop"
                    class="border border-white/30 px-8 py-4 rounded-full hover:bg-white/10 transition">
                    Shop Now
                </a>
            </div>
        </div>
    </section>

    <!-- ================= STORY ================= -->
    <section id="story" class="bg-white py-24 px-6">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Built With Purpose
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    We started with a single goal: make online shopping delightful,
                    transparent, and human.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Every pixel, interaction, and product is designed to earn trust
                    and create lasting value.
                </p>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-emerald-500 to-teal-500 rounded-3xl blur-xl opacity-30"></div>
                <img
                    src="https://images.unsplash.com/photo-1556745757-8d76bdb6984b"
                    class="relative rounded-3xl shadow-2xl hover:scale-105 transition duration-500"
                    alt="About ecommerce">
            </div>
        </div>
    </section>

    <!-- ================= STATS ================= -->
    <section class="bg-slate-100 py-20 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-10 text-center">
            <div>
                <h3 class="text-4xl font-extrabold text-emerald-600">10K+</h3>
                <p class="text-gray-600 mt-2">Happy Customers</p>
            </div>
            <div>
                <h3 class="text-4xl font-extrabold text-emerald-600">500+</h3>
                <p class="text-gray-600 mt-2">Products</p>
            </div>
            <div>
                <h3 class="text-4xl font-extrabold text-emerald-600">99%</h3>
                <p class="text-gray-600 mt-2">Positive Reviews</p>
            </div>
            <div>
                <h3 class="text-4xl font-extrabold text-emerald-600">24/7</h3>
                <p class="text-gray-600 mt-2">Support</p>
            </div>
        </div>
    </section>

    <!-- ================= JOURNEY ================= -->
    <section class="bg-white py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">
                Our Journey
            </h2>

            <div class="relative border-l-4 border-emerald-500 pl-10 space-y-16">
                <div>
                    <span class="text-emerald-600 font-semibold">2022</span>
                    <h3 class="text-xl font-semibold mt-2">The Beginning</h3>
                    <p class="text-gray-600">A bold idea to reimagine ecommerce.</p>
                </div>

                <div>
                    <span class="text-emerald-600 font-semibold">2023</span>
                    <h3 class="text-xl font-semibold mt-2">Growth</h3>
                    <p class="text-gray-600">Thousands of customers joined us.</p>
                </div>

                <div>
                    <span class="text-emerald-600 font-semibold">2024</span>
                    <h3 class="text-xl font-semibold mt-2">Innovation</h3>
                    <p class="text-gray-600">Faster checkout, smarter UX.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= CORE VALUES ================= -->
    <section class="bg-slate-50 py-24 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-16">Our Values</h2>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-3xl shadow hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-4">Customer First</h3>
                    <p class="text-gray-600">Every decision starts with users.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-4">Quality</h3>
                    <p class="text-gray-600">No compromises, only excellence.</p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-4">Innovation</h3>
                    <p class="text-gray-600">Always improving experiences.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= TESTIMONIALS ================= -->
    <section class="bg-white py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">
                What Customers Say
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-50 p-8 rounded-3xl shadow">
                    <p class="text-gray-600 mb-6">
                        “Smooth experience and premium feel.”
                    </p>
                    <h4 class="font-semibold">Aarav Sharma</h4>
                </div>

                <div class="bg-slate-50 p-8 rounded-3xl shadow">
                    <p class="text-gray-600 mb-6">
                        “One of the best ecommerce UIs I’ve used.”
                    </p>
                    <h4 class="font-semibold">Nisha K.</h4>
                </div>

                <div class="bg-slate-50 p-8 rounded-3xl shadow">
                    <p class="text-gray-600 mb-6">
                        “Fast, clean, and trustworthy.”
                    </p>
                    <h4 class="font-semibold">Rahul P.</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FAQ ================= -->
    <section class="bg-slate-100 py-24 px-6">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">
                FAQs
            </h2>

            <div class="space-y-6">
                <details class="bg-white p-6 rounded-2xl">
                    <summary class="font-semibold cursor-pointer">
                        Is this platform secure?
                    </summary>
                    <p class="text-gray-600 mt-4">
                        Yes, we use industry-standard security.
                    </p>
                </details>

                <details class="bg-white p-6 rounded-2xl">
                    <summary class="font-semibold cursor-pointer">
                        Do you offer customer support?
                    </summary>
                    <p class="text-gray-600 mt-4">
                        24/7 support via chat and email.
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- ================= CTA ================= -->
    <section class="bg-gradient-to-r from-emerald-600 to-teal-600 py-20 px-6 text-center text-white">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Ready to Experience Better Shopping?
        </h2>
        <p class="mb-10 text-emerald-100">
            Join thousands of happy customers today.
        </p>
        <a href="/shop"
            class="inline-block bg-white text-emerald-700 px-10 py-4 rounded-full font-semibold hover:scale-105 transition">
            Start Shopping
        </a>
    </section>

    <!-- ================= MOBILE STICKY CTA ================= -->
    <div class="fixed bottom-0 left-0 w-full bg-white shadow-lg p-4 flex justify-between items-center md:hidden z-50">
        <span class="font-semibold">Ready to shop?</span>
        <a href="/shop"
            class="bg-emerald-500 text-black px-6 py-3 rounded-full font-semibold">
            Start Now
        </a>
    </div>

</section>
<!-- ABOUT PAGE END -->


</x-layout.frontend>

