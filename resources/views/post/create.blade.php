<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new post') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full sm:max-w-3xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

                <!-- Title -->
                <x-form-input :name="'title'" :text="'Title'" :value="old('title')"></x-form-input>

                <!-- Last Name -->
                <div class="mt-4">
                    <x-jet-label class="mb-1" for="content" :value="__( 'Post content' )"  />

                    <textarea name="content">{!! old('content') !!}</textarea>
                </div>

                <div x-data="{photoName: null, photoPreview: null}" class="mt-4 col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                           name="photo"
                           wire:model="photo"
                           x-ref="photo"
                           x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                    <x-jet-label for="photo" value="{{ __('Photo') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <img x-bind:src="photoPreview">
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                </div>
                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
</x-app-layout>
