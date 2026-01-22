<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class TodoList extends Component
{
    // Public properties for data binding
    public $task = ''; 
    public $editingTodoId = null;
    public $editingTodoTask = '';

    /**
     * Create a new task in the database
     */
    public function addTodo()
    {
        $this->task = trim($this->task);
        // Validation: Ensure task is not empty and has minimum 2 characters
        $this->validate([
            'task' => 'required|min:2'
        ]);

        // Database insertion
        Todo::create([
            'task' => $this->task
        ]);

        // Reset input field
        $this->task = '';
    }

    /**
     * Delete a task by ID
     */
    public function deleteTodo($id)
    {
        if ($todo = Todo::find($id)) {
            $todo->delete();
        }
    }


    /**
     * Toggle the completion status of a task
     */
    public function toggleTodo($id)
    {
        if ($todo = Todo::find($id)) {
            $todo->update([
                'is_completed' => ! $todo->is_completed
            ]);
        }
    }


    /**
     * Prepare a task for editing
     */
    public function editTodo($id)
    {
        $todo = Todo::find($id);
        $this->editingTodoId = $id;
        $this->editingTodoTask = $todo->task;
    }

    /**
     * Update an existing task in the database
     */
    public function updateTodo()
    {   
        $this->editingTodoTask = trim($this->editingTodoTask);
        $this->validate(['editingTodoTask' => 'required|min:2']);
        
        $todo = Todo::find($this->editingTodoId);
        $todo->task = $this->editingTodoTask;
        $todo->save();

        $this->cancelEdit(); 
    }

    /**
     * Reset edit state
     */
    public function cancelEdit()
    {
        $this->editingTodoId = null;
        $this->editingTodoTask = '';
    }

    /**
     * Render the component with live statistics
     */
    public function render()
    {
        $todos = Todo::latest()->get();

        return view('livewire.todo-list', [
            'todos' => $todos,
            'totalCount' => $todos->count(),
            'completedCount' => $todos->where('is_completed', true)->count(),
        ]);
    }

}