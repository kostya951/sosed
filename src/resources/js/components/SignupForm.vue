<template>
    <div>
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Регистрация</div>
                    <div class="card-body">
                        <form method="POST" action="/signup">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-end">Имя</label>
                                <div class="col-md-6">
                                    <input v-model="name" id="name" type="text" name="name" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-end">E-Mail</label>
                                <div class="col-md-6">
                                    <input v-model="email" id="email" type="email" name="email" value="" required="required" autocomplete="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-end">Пароль</label>
                                <div class="col-md-6">
                                    <input v-model="password" id="password" type="password" name="password" required="required" autocomplete="new-password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-end">Подтвердите пароль</label>
                                <div class="col-md-6">
                                    <input v-model="confirmPassword" id="password-confirm" type="password" name="confirm_password" required="required" autocomplete="new-password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-end">Дата рождения</label>
                                <div class="col-md-6">
                                    <input v-model="birthday" id="birthday" type="date" name="birthday" required="required" class="form-control">
                                </div>
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
export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            confirmPassword: '',
            birthday: '',
            sex: '',
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
