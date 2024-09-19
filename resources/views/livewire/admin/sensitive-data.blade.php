<span wire:click.debounce.100ms="toggle" class="cursor-pointer">
    @if ($this->isVisible)
        {!! $this->content !!}
    @else
        <span class="italic text-gray-500">
            {{ __('Hidden') }}
        </span>
    @endif
</span>