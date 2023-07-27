<x-layout>
    <section class="py-8 max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
    <x-panel class="max-w-sm mx-auto">

        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="title"
                    id="title"
                    value="{{old('title')}}"
                    required
                    >
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{old('slug')}}"
                    required
                    >
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Thumbnail
                    </label>
                    <input
                    class="border border-gray-400 p-2 w-full"
                    type="file"
                    name="thumbnail"
                    id="thumbnail">

                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full"
                        name="excerpt"
                        id="excerpt"
                        required
                    > {{old('excerpt')}}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full"
                        name="body"
                        id="body"
                        required
                    > {{old('body')}}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                       Category
                    </label>
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option
                            value="{{$category->id}}"
                            {{ old('category_id') == $category->id ? 'selected' : ''}}
                            >
                            {{ucwords($category->name)}}</option>
                        @endforeach

                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>
        </form>
        </x-panel>
    </section>
</x-layout>