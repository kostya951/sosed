<template>
    <div>
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Вход</div>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            <slot name="csrf"></slot>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-end">E-Mail</label>
                                <div class="col-md-6">
                                    <input
                                        v-model="email"
                                        id="email"
                                        type="email"
                                        name="email"
                                        value=""
                                        required="required"
                                        autocomplete="email"
                                        autofocus="autofocus"
                                        class="form-control">
                                </div>
                                <slot name="email-field-errors"></slot>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-end">Пароль</label>
                                <div class="col-md-6">
                                    <input
                                        v-model="password"
                                        id="password"
                                        type="password"
                                        name="password"
                                        required="required"
                                        autocomplete="current-password"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input v-model="remember" type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">
                                        Запомнить
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                    Вход
                                </button>
                                    <a href="/forgot-password" class="btn btn-link">
                                    Забыли пароль?
                                </a>
                                </div>
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
            email: '',
            password: '',
            remember: false
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
