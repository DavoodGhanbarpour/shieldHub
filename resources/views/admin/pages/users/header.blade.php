<div class="form-selectgroup">

    <label class="form-selectgroup-item">
        <a class="text-decoration-none" href="{{route('admin.users.subscriptions', ['user' => $user->id])}}">
            <input type="radio" name="pageTab" value="HTML" class="form-selectgroup-input"
                {{Route::is('admin.users.subscriptions') ? ' checked="checked"' : ''}}>
            <span class="form-selectgroup-label">{{__('app.subscriptions.subscriptions')}}</span>
        </a>
    </label>

    <label class="form-selectgroup-item">
            <a class="text-decoration-none" href="{{route('admin.users.invoices', ['user' => $user->id])}}">
            <input type="radio" name="pageTab" value="HTML" class="form-selectgroup-input"
                {{Route::is('admin.users.invoices') ? ' checked="checked"' : ''}}>
            <span class="form-selectgroup-label">{{__('app.invoices.invoices')}}</span>
        </a>
    </label>

</div>
