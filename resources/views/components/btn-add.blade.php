<!-- Add Button -->
<a
class="flex items-center justify-between p-2 text-sm font-semibold text-purple-100 bg-teal-500 rounded-md shadow-md focus:outline-none focus:shadow-outline-purple active:bg-teal-300 hover:bg-teal-400"
href="{{$url}}"
>
<div class="flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
    </svg>
    <span>{{ $btn }}</span>
</div>
</a>
