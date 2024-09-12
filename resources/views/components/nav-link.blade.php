<a  {{ $attributes }}
    class=" {{ $active ? 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
