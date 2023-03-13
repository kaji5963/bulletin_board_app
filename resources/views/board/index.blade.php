<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      掲示板
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <section class="text-gray-600 body-font relative">
        <div class="container px-5 mx-auto">
          <div class="lg:w- md:w-2/3 mx-auto bg-white p-6 mb-12">
            <form method="POST" action="{{ route('board.store') }}">
              @csrf
              <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full">
                  <div class="relative">
                    <label for="title" class="leading-7 text-sm text-gray-600">【title】</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                      class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <div class="text-red-500 ml-2 mt-2">{{ $errors->first('title') }}</div>
                  </div>
                </div>

                <div class="p-2 w-full">
                  <div class="relative">
                    <label for="content" class="leading-7 text-sm text-gray-600">【content】</label>
                    <textarea id="content" name="content"
                      class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('content') }}</textarea>
                    <div class="text-red-500 ml-2 mt-2">{{ $errors->first('content') }}</div>
                  </div>
                </div>

                <div class="p-2 w-full">
                  <button
                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規投稿</button>
                </div>

              </div>
            </form>

          </div>
        </div>
      </section>

      @foreach ($boards as $board)
      <div class="flex justify-center">
        <div class="w-4/5 bg-white px-6 pt-6 pb-12 overflow-hidden shadow-sm sm:rounded-lg my-5">
          @if ($user->id == $board->user_id)
          <div class="flex justify-end mb-2 text-blue-500">
            <a class="mr-6" href="{{ route('board.edit', ['id' => $board->id]) }}">編集</a>
            <a href="{{ route('board.delete', ['id'=> $board->id]) }}">削除</a>
          </div>
          @endif

          <div class="flex justify-between mb-6">
            <div class="mr-10">
              <p>【投稿No】{{ $board->id }}</p>
            </div>

            <div>
              <p>【投稿日】{{ $board->created_at }}</p>
            </div>
          </div>

          <div class="mb-6 mr-40">
            <p>【投稿者】{{ $board->user->name }}</p>
            {{-- <p>【投稿者】{{ $user->name }}</p> --}}
          </div>

          <div class="mb-6">
            <p>【タイトル】{{ $board->title }}</p>
          </div>

          <div>
            <p class="mb-2">【投稿内容】</p>
            <p class="ml-2">{{ $board->content }}</p>
          </div>
        </div>
      </div>
      @endforeach
      {{ $boards->links() }}
    </div>
  </div>
</x-app-layout>