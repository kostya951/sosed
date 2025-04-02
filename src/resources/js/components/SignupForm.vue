<template>
    <div>
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Регистрация</div>
                    <div class="card-body">
                        <form @submit.prevent="submit" method="POST" action="/register">
                            <slot name="csrf"></slot>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-end">Имя</label>
                                <div class="col-md-6">
                                    <input v-model="name" id="name" type="text" name="name" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
                                </div>
                                <slot name="name-field-errors"></slot>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-end">E-Mail</label>
                                <div class="col-md-6">
                                    <input v-model="email" id="email" type="email" name="email" value="" required="required" autocomplete="email" class="form-control">
                                </div>
                                <slot name="email-field-errors"></slot>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-end">Пароль</label>
                                <div class="col-md-6">
                                    <input v-model="password" id="password" type="password" name="password" required="required" autocomplete="new-password" class="form-control">
                                </div>
                                <slot name="password-field-errors"></slot>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-end">Подтвердите пароль</label>
                                <div class="col-md-6">
                                    <input v-model="confirmPassword" id="password-confirm" type="password" name="password_confirmation" required="required" autocomplete="new-password" class="form-control">
                                </div>
                                <div ref="confirmation" id="password-confirm-error" hidden="hidden" style="color:red" class="text-center">Пароли должны совпадать</div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-end">Дата рождения</label>
                                <div class="col-md-6">
                                    <input v-model="birthday" id="birthday" type="date" name="birthday" required="required" class="form-control">
                                </div>
                                <slot name="birthday-field-errors"></slot>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-end">Пол</label>
                                <div class="col-md-6"><div class="form-check">
                                    <input v-model="sex" value="1" type="radio" name="sex" id="flexRadioDefault1" class="form-check-input">
                                    <label for="flexRadioDefault1" class="form-check-label">
                                        Мужской
                                    </label>
                                </div>
                                    <div class="form-check">
                                        <input v-model="sex" value="2" type="radio" name="sex" id="flexRadioDefault2" checked="checked" class="form-check-input">
                                        <label for="flexRadioDefault2" class="form-check-label">
                                        Женский
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0 col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Регистрация
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            confirmPassword: '',
            birthday: '',
            sex: 2,
        }
    },
    methods: {
        submit(e) {
            console.log(this.name);
            console.log(this.email);
            console.log(this.password);
            console.log(this.confirmPassword);
            console.log(this.birthday);
            console.log(this.sex);
            if(this.passwordsMatch()){
                e.target.submit();
            }
        },
        passwordsMatch(){
            return this.password === this.confirmPassword;
        },
    },
    watch: {
        confirmPassword(newPassword){
            if(this.password !== newPassword){
                this.$refs.confirmation.hidden = false;
            }else{
                this.$refs.confirmation.hidden = true;
            }
        }
    }
}
</script>
<style>
    .card{
        border: 1px solid #ccc;

    }
    .card-header {
        font-weight: bold;
        font-size: 20px;
        text-align: center;
        border-bottom: 1px solid #ccc;
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
    }
</style>
