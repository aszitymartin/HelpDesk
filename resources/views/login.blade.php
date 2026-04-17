@extends('layouts.app')

@section('content')
    
    <section class="flex flex-col bg-[#1a1e2e] gap-4 p-6 m-auto w-200 border-soft box-shadow relative">
        
        <div class="flex flex-row items-center justify-between w-full">
            <img id="modalLogo" class="modalLogo" src="{{ asset('assets/img/icon.png') }}">
            <span class="text-gray-400 font-medium text-xs ml-auto uppercase">Bejelentkezés</span>
        </div>

        <section class="formcarry-container w-full modalContent mt-12 m-auto padding-2">
            
            
            <form class="mx-auto w-full">

                @csrf

                <div class="mb-5 w-full">
                    <label
                        for="username"
                        class="block mb-2.5 text-sm font-medium text-heading text-white"
                    >Felhasználónév</label>
                    <input
                        type="text"
                        id="username"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="johndoe@example.com"
                        required
                    />
                </div>

                <div class="mb-5 w-full">
                    <label
                        for="password"
                        class="block mb-2.5 text-sm font-medium text-heading text-white"
                    >Jelszó</label>
                    <input
                        type="password"
                        id="password"
                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                        placeholder="••••••••••••••"
                        required
                    />
                </div>
                
                <button
                    type="submit"
                    class="text-white button w-full"
                >Bejelentkezés</button>

            </form>

        </section>

    </section>

@endsection