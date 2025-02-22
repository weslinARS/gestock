<div class="flex flex-col gap-2 bg-base-100-500 w-[20vw] sticky shadow-md shadow-primary-700/10 rounded-md ">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex flex-col items-center justify-center">
        <span class="text-primary-500 font-black ">Gestock</span>
        @if($userProfile)
            <x-badge  primary :label="$userProfile->role" />
        @endif
    </div>
    <div class="flex flex-col gap-y-2 items-center">
        <span class="text-secondary-500 font-semibold">Menu</span
        <div class="flex flex-col items-center">
            @if ($userProfile->role == "admin")
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                <x-button outline label="Default" wire:click="" />
            @endif
        </div>
    </div>
</div>
