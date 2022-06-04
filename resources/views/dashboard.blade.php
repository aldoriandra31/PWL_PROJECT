<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Timeline') }}
    </h2>
  </x-slot>
  <x-container>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <form action="{{ route('buat.post') }}" method="post">
        @csrf
        <div class="p-6 bg-white border-b border-gray-200">
          <textarea name="body" class="w-full rounded textarea textarea-primary bg-white @error('body') textarea-error @enderror"
            rows="3" placeholder="Post something">{{ old('body') }}</textarea>
          @error('body')
            <span class="text-error block">{{ $message }}</span>
          @enderror
          <button type="submit" class="btn">Post</button>
        </div>
      </form>
    </div>
    @foreach ($posts as $post)
      <div class="card w-full bg-white text-neutral-focus text-primary-content my-3">
        <div class="card-body">
          <h2 class="card-title">
            {{ $post->user->name }} -
            <span class="text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
            @if (Auth::user()->id == $post->user_id)
              <a href="{{ route('edit.post', [$post]) }}" class="btn btn-primary">Edit</a>
              <form action="{{ route('hapus.post', [$post]) }}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-danger" value="Hapus">
              </form>
            @endif
          </h2>
          <p>{{ $post->body }}</p>
        </div>
        <div class="flex justify-end">
          <a href="{{ route('show.post', $post) }}" class="mx-5">Comment({{ $post->comments_count }})</a>
        </div>
      </div>
    @endforeach
  </x-container>
</x-app-layout>
