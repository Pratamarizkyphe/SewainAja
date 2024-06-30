<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#7776B3] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#9B86BD] focus:bg-[#7776B3] active:bg-[#7776B3] focus:outline-none focus:ring-2 focus:ring-[#7776B3] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
