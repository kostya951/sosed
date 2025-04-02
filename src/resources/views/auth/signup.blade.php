@extends('layouts.app')
@section('content')
    <div class="container">
        <signup-form>
            <template #csrf>@csrf</template>
            <template #name-field-errors>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </template>
            <template #email-field-errors>
                   <x-input-error :messages="$errors->get('email')" class="mt-2"/>
               </template>
            <template #password-field-errors>
                   <x-input-error :messages="$errors->get('password')" class="mt-2"/>
               </template>
            <template #birthday-field-errors>
                   <x-input-error :messages="$errors->get('birthday')" class="mt-2"/>
            </template>
        </signup-form>
    </div>
@endsection
