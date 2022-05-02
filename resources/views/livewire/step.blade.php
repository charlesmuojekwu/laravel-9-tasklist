<div>
    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-lg pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer" />
    </div>
    {{-- {{ $steps }} --}}

    @foreach($steps as $step)
        <input type="text" name="step" class="my-1 py-2 px-2 border rounded" placeholder="Describe step {{ $step }}" />
        <span class="fas fa-times text-red-300 cursor-pointer px-2" wire:click="remove({{ $loop->index }})"></span>
    @endforeach

</div>
