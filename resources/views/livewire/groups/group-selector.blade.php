<div class="p-3">
    @forelse($groups as $group)
        <button wire:click="loadProducts({{ $group->id }})" class="w-20 h-20 m-1 truncate cursor-pointer bg-gray-50 border-2 border-gray-100 p-1 rounded-md shadow-md" value="{{ $group->id }}">{{ $group->name }}</button>
    @empty
    <p>sin grupos, añadelos!</p>
    @endforelse
</div>