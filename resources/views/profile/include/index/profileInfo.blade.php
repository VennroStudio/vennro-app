@if(empty($user->profile))
    <div class="p-5 mb-3 bg-body-tertiary rounded-3 text-center">
    <img src="/img/no_wall.png" width="40px" class="mb-4">
    @if(Auth::user()->id == $user->id)
        <p class="text-muted mb-0">Вы еще не добавили информацию о себе.</p>
        <p class="text-muted">Для добавления перейдите в <a href="#">Настройки</a></p>
    @else
        <p class="text-muted">Пользователь еще не добавил информацию о себе</p>
    @endif
    </div>
@else
    <div class="p-5 mb-3 bg-body-tertiary rounded-3">
    @if(!empty($user->profile->date_birth))
        <p class="fw-medium"><span class="text-muted">Дата рождения: </span>{{ $user->profile->date_birth }}</p>
    @endif
    @if(!empty($user->profile->course))
        <p class="fw-medium"><span class="text-muted">Курс: </span>{{ $user->profile->course }}</p>
    @endif
    @if(!empty($user->profile->group))
        <p class="fw-medium"><span class="text-muted">Группа: </span>{{ $user->profile->group }}</p>
    @endif
    @if(!empty($user->profile->mobile))
        <p class="fw-medium"><span class="text-muted">Телефон: </span>{{ $user->profile->mobile }}</p>
    @endif
    @if(!empty($user->profile->email))
        <p class="fw-medium"><span class="text-muted">Почта: </span>{{ $user->profile->email }}</p>
    @endif
    @if(!empty($user->profile->tg))
        <p class="fw-medium"><span class="text-muted">Телеграмм: </span>{{ $user->profile->tg }}</p>
    @endif
    @if(!empty($user->profile->vk))
        <p class="fw-medium"><span class="text-muted">Вк: </span>{{ $user->profile->vk }}</p>
    @endif
    </div>
@endif
