<x-layout page='DAFS Todo: Criar Tarefa'>

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
           Voltar
        </a>
    </x-slot:btn>

    <section id="task-section">
        <h1>Criar tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf
            <x-form.text_input 
                name="title" 
                label="Título da tarefa" 
                placeholder="Digite o título da tarefa" 
                required="required"
            />
           
            <x-form.text_input 
                type="datetime-local" 
                name="due_date" 
                label="Data de Realização" 
                required="required"
            />
            
            <x-form.select_input 
                name="category_id" 
                label="Categoria" 
                required="required"
            >
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            </x-form.select_input>

            <x-form.textarea
                name="description"
                label="Descrição da tarefa"
                placeholder="Digite uma descrição para a tarefa"
            />
            
            <x-form.form_button resetText="Resetar" submitText="Criar Tarefa"/>
        </form>
    </section>
</x-layout>