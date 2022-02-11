<x-app-layout>
{{--    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">--}}
        <article class="my-8 max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 bg-white p-6 rounded-xl">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ asset('storage/' . $post->photo_path) }}" alt="" class="rounded-xl">


                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <div class="ml-3 text-left">
                        <span class="font-bold">
                            By {{ $post->user->name }}
                        </span>
                    </div>
                </div>
                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="{{ route('post.index') }}"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">{!! $post->content !!}</div>
            </div>


        </article>
{{--    </main>--}}
</x-app-layout>
