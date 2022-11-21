<x-layout page='DAFS Todo: Login'>

    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">
            Ainda não tem uma conta? Registre-se
        </a>
    </x-slot:btn>

    <section id="task-section">
        <h1>Login</h1>
        @if($errors->any())
            <ul class="alert alert-error">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('user.login_action')}}">
            @csrf
           
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

            <x-form.form_button resetText="Limpar" submitText="Login"/>
        </form>
    </section>
</x-layout>