@auth
<x-panel>
    <form  method="POST" action="/posts/{{$post->slug}}/comments">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{auth()->user()->id}}" height="60" width="60" alt="" class="rounded-full">
            <h2 class="ml-3">Want to participate?</h2>
        </header>
        <div class="mt-6">
            <textarea
            name="body"
            rows="5"
            class="w-full text-sm focus:outline-none focus:ring"
            placeholder="Quick, think of something to say"
            required
            ></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-form.submit-button>Post</x-form.submit-button>
        </div>
    </form>
</x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">Log in</a> to leave a comment.
    </p>
@endauth
