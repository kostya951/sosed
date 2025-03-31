<div class="row bg-primary p-4">
    <div class="col-6 justify-content-start">
        <nav class="nav">
            <a class="navbar-brand" href="#">
                <img class="logo" src="/img/logo.png" alt="ZMS-24 - Новая социальная сеть" title="ZMS-24 - Новая социальная сеть" />
            </a>
          <a class="nav-link" href="#">Главная</a>
          <a class="nav-link" href="#">Статьи</a>
          <a class="nav-link" href="#">Обсуждения</a>
          <a class="nav-link" href="#">Объявления</a>
          <a class="nav-link" href="#">Найти соседей</a>
          <a class="nav-link" href="#">Районы</a>
        </nav>
    </div>
    <div class="col-6">
        @guest
            <nav class="nav justify-content-end">
              <a class="nav-link" href="#">Войти</a>
              <a class="nav-link" href="#">Регистрация</a>
            </nav>
        @endguest
        @auth
            <nav class="nav justify-content-end mx-5">
                <a class="nav-link" href="#"><img src="/img/person-circle.svg" alt="Уведомления"></a>
                <a class="nav-link" href="#"><img src="/img/bell.svg" alt="Уведомления"></a>
            </nav>
        @endauth
    </div>
</div>
