@extends('layouts.app')
@section('content')
    <div class="container">
        <login-form>
            <template #csrf>@csrf</template>
            <template #email-field-errors>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </template>
        </login-form>
    </div>
@endsection
