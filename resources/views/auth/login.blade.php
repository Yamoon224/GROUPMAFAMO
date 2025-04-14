<x-auth-layout>
    <div class="text-center">
        <h3 class="title mb-2">@lang('locale.sign_in')</h3>
        <p class="mb-4">{{ !empty($errors) && !empty($errors->all()) ? implode('', $errors->all()) : (session('status') ? session('status') : "") }}</p>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="mb-1 text-dark">@lang('locale.email') / @lang('locale.phone')</label>
            <input type="text" name="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full" placeholder="email@gmpsarl.com | 624568790" required>
        </div>
        <div class="mb-3 relative">
            <label class="mb-1 text-dark">@lang('locale.password')</label>
            <input type="password" id="dz-password" class="form-control relative text-[13px] h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 focus:border-primary dark:hover:border-b-color outline-none w-full text-body-color" placeholder="@lang('locale.password')" name="password" required>
            <span class="show-pass eye absolute right-5 bottom-[10px] text-body-color cursor-pointer">
                <i class="fa fa-eye-slash"></i>
                <i class="fa fa-eye"></i>
            </span>
        </div>
        <div class="form-row flex justify-between mt-2">
            <div>
                <div class="leading-normal block min-h-[1.3125rem] pl-[1.5em] custom-checkbox mb-4 whitespace-nowrap">
                    <input type="checkbox" class="form-check-input ml-[-1.5em]" id="rememberme" name="remember">
                    <label class="mt-[5px] text-body-color ml-[0.3125rem]" for="rememberme">@lang('locale.remember_me')</label>
                </div>
            </div>
            @if (Route::has('password.request'))
            <div>
                <a href="{{ route('password.request') }}" class="sm:text-sm text-xs text-primary whitespace-nowrap dark:text-white">@lang('locale.forgot_pwd')</a>
            </div>
            @endif
        </div>
        <div class="text-center mb-2">
            <button class="block w-full rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 mb-2">@lang('locale.submit')</button>
        </div>
    </form>
</x-auth-layout>
