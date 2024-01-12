<x-app-layout>
    <div class="page-header breadcrumb-wrap mr-10 mt-6">
        <div class="container">
            <div class="breadcrumb">
                <a class="nav_text" href="home" rel="nofollow">Home</a>
                <span></span> Chat Bot
            </div>
        </div>
        <div class="p-6 pb-96 pt-8">
            <h2 class="text-2xl font-semibold mb-4">AI Chat Bot</h2>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-4">

                    <form action="{{ route('chat.post') }}" method="POST" class="flex items-end">
                        @csrf
                        <input type="text" name="message"
                            class="flex-1 rounded-l-md p-2 border border-r-0 focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Type your message...">
                        <button type="submit"
                            class="bg-                blue-500 text-white rounded-r-md p-2 px-5 focus:outline-none hover:bg-blue-600">Send</button>
                    </form>
                </div>
            </div>
            <div class="message-response bg-gray-200 text-gray-800 m-4 p-4 rounded-lg mb-2">
                Q: {{ $question }}
            </div>
            <div class="message-response bg-gray-200 text-gray-800 m-4 p-4 rounded-lg mb-2">
                {{ $message }}
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
