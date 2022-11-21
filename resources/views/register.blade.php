<x-layout page='DAFS Todo: Registro'>

    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary">
            Já tem uma conta? Faça login
        </a>
    </x-slot:btn>

    <section id="task-section">
        <h1>Registrar-se</h1>
        @if($errors->any())
            <ul class="alert alert-error">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('user.register_action')}}">
            @csrf
            <x-form.text_input 
                name="name" 
                label="Seu nome" 
                placeholder="Seu nome" 
                required="required"
            />
           
            <x-form.text_input 
                type="email" 
                name="email" 
                label="Seu e-mail" 
                placeholder="Seu e-mail"
                required="required"
            />
            
            <x-form.text_input 
                type="password"
                name="password" 
                label="Sua senha"
                placeholder="Sua senha" 
                required="required"
            />
            <x-form.text_input 
                type="password"
                name="password_confirmation" 
                label="Confirme sua senha"
                placeholder="Confirme sua senha" 
                required="required"
            />

            <x-form.form_button resetText="Limpar" submitText="Registrar-se"/>
        </form>
    </section>
</x-layout>