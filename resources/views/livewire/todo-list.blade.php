<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-2xl rounded-2xl border border-indigo-100">
    <h2 class="text-2xl font-black text-indigo-600 mb-6 text-center">My Tasks ✅</h2>

    <div class="flex gap-2 mb-6">
        <input wire:model="task" 
               wire:keydown.enter="addTodo"
               type="text" 
               placeholder="What needs to be done?" 
               class="flex-1 px-4 py-2 border-2 border-indigo-100 rounded-xl focus:border-indigo-500 focus:outline-none">
         @error('task') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <button wire:click="addTodo" 
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-bold transition-all active:scale-90">
            +
        </button>
    </div>

    <ul class="space-y-3">
    @foreach($todos as $todo)
        <li class="flex items-center justify-between p-4 {{ $todo->is_completed ? 'bg-gray-100 opacity-60' : 'bg-indigo-50' }} rounded-xl border border-indigo-100 shadow-sm transition-all">
            
            {{-- Edit Mode UI --}}
            @if($editingTodoId === $todo->id)
                <div class="flex flex-1 gap-2 items-center">
                    <input wire:model="editingTodoTask" 
                           type="text" 
                           class="flex-1 px-3 py-1 border-2 border-indigo-400 rounded-lg focus:outline-none">
                     @error('editingTodoTask') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                    <button wire:click="updateTodo" class="text-green-600 font-bold text-sm bg-green-100 px-2 py-1 rounded">Save</button>
                    <button wire:click="cancelEdit" class="text-gray-500 text-sm">Cancel</button>
                </div>
            @else
                {{-- Normal View Mode --}}
                <div class="flex items-center gap-3">
                    <button wire:click="toggleTodo({{ $todo->id }})" class="focus:outline-none">
                        @if($todo->is_completed)
                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        @else
                            <div class="w-6 h-6 border-2 border-indigo-300 rounded-full"></div>
                        @endif
                    </button>

                    <span class="{{ $todo->is_completed ? 'line-through text-gray-500' : 'text-indigo-900' }} font-medium">
                        {{ $todo->task }}
                    </span>
                </div>

                <div class="flex items-center gap-2">
                    <button wire:click="editTodo({{ $todo->id }})" 
                            class="text-gray-400 hover:text-indigo-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                    </button>

                    <button
                        onclick="confirm('Are you sure you want to delete this task?') || event.stopImmediatePropagation()"
                        wire:click="deleteTodo({{ $todo->id }})"
                        class="text-red-400 hover:text-red-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                    </button>

                </div>
            @endif
        </li>
    @endforeach
    </ul>

    <div class="mt-8 pt-6 border-t border-indigo-100 flex justify-between items-center text-sm font-semibold">
        <div class="flex flex-col items-center p-3 bg-indigo-50 rounded-xl flex-1 mr-2 shadow-inner">
            <span class="text-gray-500 uppercase text-[10px] tracking-widest">Total</span>
            <span class="text-indigo-600 text-xl">{{ $totalCount }}</span>
        </div>

        <div class="flex flex-col items-center p-3 bg-green-50 rounded-xl flex-1 ml-2 shadow-inner">
            <span class="text-gray-500 uppercase text-[10px] tracking-widest">Completed</span>
            <span class="text-green-600 text-xl">{{ $completedCount }}</span>
        </div>
    </div>

    {{-- Empty State Message --}}
    @if($totalCount === 0)
        <p class="text-center text-gray-400 mt-10 italic">No tasks yet. Add one to get started! ✨</p>
    @endif
</div>