<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      掲示板 - 編集
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <section class="text-gray-600 body-font relative">
        <div class="container px-5 mx-auto">
          <div class="lg:w- md:w-2/3 mx-auto bg-white p-6 mb-12">

            <form method="POST" action="{{ route('board.update', ['id' => $board->id]) }}">
              @csrf
              <div class="flex flex-wrap -m-2">
                <div class="p-2 w-full">
                  <div class="relative">
                    <label for="title" class="leading-7 text-sm text-gray-600">【title】</label>
                    <input type="text" id="title" name="title" value="{{ $board->title }}"
                      class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <div class="text-red-500 ml-2 mt-2">{{ $errors->first('title') }}</div>

                  </div>
                </div>

                <div class="p-2 w-full">
                  <div class="relative">
                    <label for="content" class="leading-7 text-sm text-gray-600">【content】</label>
                    <textarea id="content" name="content"
                      class="w-full mt-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $board->content }}</textarea>
                    <div class="text-red-500 ml-2 mt-2">{{ $errors->first('content') }}</div>
                  </div>
                </div>

                <div class="p-2 w-full">
                  <button
                    class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </section>


    </div>
  </div>
</x-app-layout>