@props(['post'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="{{ asset('storage/' . $post->photo_path) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a class="transition-colors duration-300 hover:text-blue-500" href="/posts/{{ $post->it }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center lg:justify-center text-sm">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <div class="ml-3 text-left lg:max-w-24">
                        <span class="text-sm">
                            By {{ $post->user->name }}
                        </span>
                    </div>
                </div>

                <div class="">
                    <a href="{{ route('post.show', ['post' => $post]) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-4"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>