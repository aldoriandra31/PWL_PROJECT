<x-app-layout>
  <x-slot name="header">
    <h2 class="h-5 font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Post') }}
    </h2>
  </x-slot>
  <x-container>
    {{-- {{ dd($post) }} --}}
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <form action="{{ route('update.post', $post) }}" method="post">
        @method('PUT')
        @csrf
        <div class="p-6 bg-white border-b border-gray-200">
          <textarea name="body" class="w-full rounded textarea textarea-primary bg-white @error('body') textarea-error @enderror"
            rows="3" placeholder="leave Post ...">{{ $post->body }}</textarea>
          @error('body')
            <span class="text-error block">{{ $message }}</span>
          @enderror
          <button type="submit" class="btn">Simpan</button>
        </div>
      </form>
    </div>
  </x-container>
</x-app-layout>
