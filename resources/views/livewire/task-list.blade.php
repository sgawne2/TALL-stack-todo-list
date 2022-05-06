<div class="relative flex flex-col justify-end pt-6 overflow-hidden rounded-b-xl">
    <div 
        class="relative flex justify-between cursor-pointer group rounded-xl before:absolute before:inset-y-0 before:right-0 before:w-1/2 before:rounded-r-xl before:bg-gradient-to-r before:from-transparent before:opacity-0 before:transition before:duration-500 hover:before:opacity-100
        {{ ($task->priority === "Low" ? 'bg-blue-200 before:to-blue-600' : '') }}
        {{ ($task->priority === "Normal" ? 'bg-green-200 before:to-green-600' : '') }}
        {{ ($task->priority === "High" ? 'bg-amber-200 before:to-amber-600' : '') }}
        {{ ($task->priority === "Urgent" ? 'bg-rose-200 before:to-rose-600' : '') }}
        ">
        <div class="relative p-4 space-y-1">
            <h4 class="text-lg 
                {{ ($task->priority === "Low" ? 'text-blue-900' : '') }}
                {{ ($task->priority === "Normal" ? 'text-green-900' : '') }}
                {{ ($task->priority === "High" ? 'text-amber-900' : '') }}
                {{ ($task->priority === "Urgent" ? 'text-rose-900' : '') }}
            ">title: {{ $task->title }}</h4>
            <div 
                class="relative h-6 text-sm
                {{ ($task->priority === "Low" ? 'text-blue-800' : '') }}
                {{ ($task->priority === "Normal" ? 'text-green-800' : '') }}
                {{ ($task->priority === "High" ? 'text-amber-800' : '') }}    
                {{ ($task->priority === "Urgent" ? 'text-rose-800' : '') }} 
                ">
                <span class="transition duration-300 group-hover:invisible group-hover:opacity-0">
                    Requested by: Michael Jackson
                    {{-- {{ $users->where('id', $task->assigner)->get(0) }} --}}
                </span>
                <span class="absolute top-0 left-0 flex items-center invisible gap-3 transition duration-300 translate-y-3 group-hover:visible group-hover:translate-y-0">
                    <span wire:click="toggleStatus({{ $task->id }}, {{ $task->finished }})">Mark as completed</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition duration-300 -translate-x-4 group-hover:translate-x-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
        </div>
        <img class="absolute bottom-0 right-6 w-[6rem] transition duration-300 group-hover:scale-[1.4]" src="https://raw.githubusercontent.com/Meschacirung/Tailus-website/main/public/images/singers/Michael-Jackson.png" alt="" />
    </div>
</div>