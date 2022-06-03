<x-app-layout>
  <x-slot name="header">
    <h2 class="h-5 font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Post Detail') }}
    </h2>
  </x-slot>
  <x-container>
    {{-- {{ dd($post) }} --}}
    <div class="card w-full bg-white text-neutral-focus text-primary-content my-3">
      <div class="card-body">
        <h2 class="card-title">
          {{ $post->user->name }} - <span class="text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
        </h2>
        <p>{{ $post->body }}</p>
      </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <form action="{{ route('buat.comment', $post) }}" method="post">
        @csrf
        <div class="p-6 bg-white border-b border-gray-200">
          <textarea name="body" class="w-full rounded textarea textarea-primary bg-white @error('body') textarea-error @enderror"
            rows="3" placeholder="leave Comment ...">{{ old('body') }}</textarea>
          @error('body')
            <span class="text-error block">{{ $message }}</span>
          @enderror
          <button type="submit" class="btn">Comment</button>
        </div>
      </form>
    </div>
    {{-- {{ dd($post->comments) }} --}}
    <h1 class="text-gray-500">Comment</h1>
    @foreach ($post->comments as $comment)
      <div class="card w-full bg-white text-neutral-focus text-primary-content my-3">
        <div class="card-body">
          <h2 class="card-title">
            {{ $comment->user->name }} -
            <span class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
            @if (Auth::user()->id == $comment->user_id)
              <a href="{{ route('edit.comment', [$post, $comment]) }}" class="btn btn-primary">Edit</a>
            @endif
            @if (Auth::user()->id == $post->user_id)
              <form action="{{ route('hapus.comment', [$post, $comment]) }}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn btn-danger" value="Hapus">
              </form>
            @endif
          </h2>
          <p>{{ $comment->body }}</p>
        </div>
      </div>
    @endforeach

  </x-container>
</x-app-layout>
