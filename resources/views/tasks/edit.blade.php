<x-layout page='DAFS Todo: Editar Tarefa'>

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
           Voltar
        </a>
    </x-slot:btn>

    <section id="task-section">
        <h1>Editar tarefa</h1>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
            <x-form.text_input 
                name="title" 
                label="Título da tarefa" 
                placeholder="Digite o título da tarefa" 
                required="required"
                value="{{$task->title}}"
            />
           
            <x-form.text_input 
                type="datetime-local" 
                name="due_date" 
                label="Data de Realização" 
                required="required"
                value="{{$task->due_date}}"
            />
            
            <x-form.select_input 
                name="category_id" 
                label="Categoria" 
                required="required"
            >
            @foreach ($categories as $category)
                <option value="{{$category->id}}"
                    @if($category->id == $task->category_id)
                        selected
                    @endif
                    >{{$category->title}}</option>
            @endforeach
            </x-form.select_input>
            
            <x-form.checkbox_input
                id="is_done"
                name="is_done"
                label="Tarefa Realizada?"
                checked="{{$task->is_done}}"
            />
            
            <x-form.textarea
                name="description"
                label="Descrição da tarefa"
                placeholder="Digite uma descrição para a tarefa"
                value="{{$task->description}}"
            />
            
            <x-form.form_button resetText="Resetar" submitText="Atualizar Tarefa"/>
        </form>
    </section>
</x-layout>
