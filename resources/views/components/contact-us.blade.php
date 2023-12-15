<x-app-layout>
    <section class="flex justify-center items-center mt-16 pb-16">
        <div class="container mx-auto p-8 bg-inherit rounded shadow-sm backdrop-blur-sm">
            <h1 class="text-5xl font-bold mb-6 text-center">Contact Respawn</h1>

            <p class="mb-6 text-lg text-center">Have questions, suggestions, or just want to chat about gaming? Reach out to us using the contact information below:</p>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-2">Email</h2>
                <p class="text-lg">Email us at: <a href="mailto:info@respawngaming.com" class="nav_text">info@respawngaming.com</a></p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-2">Phone</h2>
                <p class="text-lg">Call us at: +1 (123) 456-7890</p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-2">Visit Us</h2>
                <p class="text-lg">Drop by our physical location at:</p>
                <p class="text-lg">123 Gaming Street, Cityville, State, Zip</p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-2">Social Media</h2>
                <p class="text-lg mb-1">Connect with us on social media:</p>
                <h2 class="text-sm font-semibold text-gray-900 uppercase dark:text-black">Follow us on</h2>
                  <ul class="font-medium">
                      <li >
                          <a href="#" class="text-lg nav_text">Github</a>
                      </li>
                      <li>
                          <a href="#" class="text-lg nav_text">Discord</a>
                      </li>
                  </ul>
            </div>

            <img  alt="logo" src="{{asset('assets/images/respawn-contact.png')}}" class=" mx-auto  rounded-lg"  />
        </div>
    </section>
</x-app-layout>
