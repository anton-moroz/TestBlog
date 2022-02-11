<x-app-layout>
    <div class="mt-8 max-w-4xl mx-auto gap-x-10 bg-white px-6 lg:pt-6 py-4 rounded-xl">
    @if ($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
    @else
        <p class="text-center">No posts yet. Please check back later.</p>
    @endif
    </div>
</x-app-layout>
